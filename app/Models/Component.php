<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $guarded = ['id'];
    
    protected $fillable = [
        'component_type', 
        'unit_id', 
        'question_number', 
        'duration', 
        'description',
    ];

    public function exams()
    {
        return $this->hasMany('App\Models\Exam', 'component_id');
    }

    public function questions()
    {
        return $this->hasMany('App\Models\Question', 'component_id');
    }

    public function suggestQues()
    {
        return $this->hasMany('App\Models\SuggestQuestion', 'component_id');
    }
}
