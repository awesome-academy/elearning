<?php
namespace App\Repositories\Eloquents;

use App\Repositories\ProgramRepository;
use App\Repositories\Contracts\BaseRepositoryEloquent;
use App\Models\Program;
use Yajra\DataTables\Facades\DataTables;

class ProgramRepositoryEloquent extends BaseRepositoryEloquent implements ProgramRepository
{
    public function model()
    {
        return Program::class;
    }
    public function datatable()
    {
    	return Datatables::of($this->model->with('courses'))->make(true);
    }
}
