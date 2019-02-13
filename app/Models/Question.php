<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'component_id', 
        'content_question',
    ];

    public function components()
    {
        return $this->belongsTo('App\Models\Component');
    }

    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam', 'exam_question', 'question_id', 'exam_id')->withPivot('id');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer', 'question_id');
    }
}
