<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
	use NodeTrait;

    protected $table_tree = [];

	protected $fillable = [
        'name',
        'parent_id',
        'slug',
        'description',
        'root'
    ];
    
    public function courses()
    {
        return $this->morphedByMany('App\Models\Course', 'categorizable');
    }
    public function programs()
    {   
        return $this->morphedByMany('App\Models\Program', 'categorizable');
    }
    public function image()
    {
        return $this->morphOne('App\Models\ImageMeta','image_meta');
    }
    public function scopeProgramCategories($query)
    {
        return $query->where('root', 'program');
    }
    public function scopeCourseCategories($query)
    {
        return $query->where('root', 'course');
    }
    public function buildTable($metaData,$depth=0)
    {
        if (!empty($metaData)) {
            foreach ($metaData as $data) {
                $node = $data;
                $node['level'] = $depth;
                unset($node['children']);
                array_push($this->table_tree , $node);
                if (!empty($data['children'])) {
                    $this->buildTable($data['children'], $depth+1);
                }
            }
        }
        
        return $this->table_tree;
    }
}
