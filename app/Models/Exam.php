<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'user_id', 
        'component_id', 
        'spent_time', 
        'duration', 
        'status', 
        'score',
    ];

    public function components()
    {
        return $this->belongsTo('App\Models\Component');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question', 'exam_question', 'exam_id', 'question_id')->withPivot('id');
    }
}
