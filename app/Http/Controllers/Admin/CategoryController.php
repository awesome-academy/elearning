<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
        $this->middleware('permission:category-list', ['only' => ['index']]);
        $this->middleware('permission:category-create', ['only' => ['create','store']]);
        $this->middleware('permission:category-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:category-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($name)
    {
        return view('admin.category.categoryIndex');
    }
    public function tableData($name)
    {
        return $this->category->datatable($name);
    } 
    public function getTree($name)
    {
        return json_encode($this->category->getSelect($name));
    }
    public function getCategory($name)
    {
        return json_encode($this->category->getCategory($name));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.categoryNew');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $category = $request->category;
            $image = isset($request->image) ? ['url' => $request->image] : ['url' => config('controlpanel.default_image')];
            $parent = $this->category->where('id',$category['parent_id'])->first();
            $category['root'] = $parent->root;
            $node = new $this->category->model($category);

            DB::beginTransaction();
            $parent->prependNode($node);
            $node = $this->category->where(['parent_id' => $category['parent_id'],'slug' => $category['slug']])->first();
            $node->image()->create($image);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'message' => $e], 500);
        }

        return response()->json(['success' => true, 'message' => ___('controlpanel.category.update_success')], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($name,$id)
    {
        $node = $this->category->with('image')->where(['id' => $id, 'root' => $name])->where('parent_id', '<>', null)->first();
        if (isset($node) && $node != null) {
            return view('admin.category.categoryEdit', compact('node'));
        }
        else
            abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $name, $id)
    {
        try {
            $category = $request->category;
            $node = $this->category->find($id);
            DB::beginTransaction();
            $node->fill($category)->save();
            $node->image->url = $request->image;
            $node->image->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();

            return response()->json(['success' => false, 'message' => $e], 500);
        }

        return response()->json(['success' => true, 'message' => ___('controlpanel.category.update_success')], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $node=$this->category->find($id);
            $node->delete();
        } catch (Exception $e) {
            return response()->json(['success' => false], 500);
        }

        return response()->json(['success' => true], 200);
    }
}
