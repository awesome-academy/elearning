<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProgramRepository;
use App\Repositories\CategoryRepository;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $program;
    protected $category;

    function __construct(ProgramRepository $program, CategoryRepository $category)
    {
        $this->program = $program;
        $this->category = $category;
        $this->middleware('permission:program-list', ['only' => ['index']]);
        $this->middleware('permission:program-create', ['only' => ['create','store']]);
        $this->middleware('permission:program-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:program-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        return view('admin.program.programIndex');
    }

    public function tableData()
    {
        return $this->program->datatable();
    } 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.program.programNew');
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
            $program = $request->program;
            $image = isset($request->image) ? ['url' => $request->image] : ['url' => config('controlpanel.default_image')];
            DB::beginTransaction();
            $row = $this->program->create($program);
            $row->categories()->sync($request->category);
            $row->courses()->sync($request->courses);
            $row->image()->create($image);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

        return response()->json(['success' => true, 'message' => trans('controlpanel.category.store_success')], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $program = $this->program->with('courses','categories','image')->find($id);
        return view('admin.program.programEdit',compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $program = $request->program;
            DB::beginTransaction();
            $row = $this->program->find($id);
            $row->fill($program)->save();
            $row->categories()->sync($request->category);
            $row->courses()->sync($request->courses);
            $row->image->url = $request->image;
            $row->image->save();
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
        }

        return response()->json(['success' => true, 'message' => trans('controlpanel.category.update_success')], 200);
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
            $this->program->delete($id);
        } catch (Exception $e) {
            return response()->json(['success' => false], 500);
        }

        return response()->json(['success' => true], 200);
    }
}
