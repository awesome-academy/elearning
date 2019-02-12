<?php
namespace App\Repositories\Eloquents;

use App\Repositories\CategoryRepository;
use App\Repositories\Contracts\BaseRepositoryEloquent;
use App\Models\Category;
use Yajra\DataTables\Facades\DataTables;

class CategoryRepositoryEloquent extends BaseRepositoryEloquent implements CategoryRepository
{
    public function model()
    {
        return Category::class;
    }
    public function getCourse()
    {
        $rootId = $this->model->where(['root' => 'course', 'parent_id' => null])->first()->id;
        $table = $this->model->buildTable(
            $this->model->with('courses')->descendantsOf($rootId)->toTree()->toArray()
        );

        return $table;
    }
    public function datatable($name)
    {
    	$rootId = $this->model->where(['root' => $name, 'parent_id' => null])->first()->id;
    	$table = $this->model->buildTable($this->model->with('image')->withCount($name . 's')->descendantsOf($rootId)->toTree()->toArray());

    	return Datatables::of($table)->skipPaging()->make(true);
    }
    public function getTree()
    {
        $table = $this->model->with('ancestors')->withDepth()->get()->toTree()->toArray();

        return $table;
    }
    public function getCategory($name)
    {
        $rootId = $this->model->where(['root' => $name, 'parent_id' => null])->first()->id;
        $table = $this->model->with('image')->withDepth()->descendantsOf($rootId)->toTree();

        return $table;
    }
    public function getSelect($name)
    {
        $rootId = $this->model->where(['root' => $name, 'parent_id' => null])->first()->id;
        $table = $this->model->buildTable(
            $this->model->descendantsAndSelf($rootId)->toTree()->toArray()
        );
        
        return $table;
    }
}
