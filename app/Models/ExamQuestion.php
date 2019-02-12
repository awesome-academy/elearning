<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamQuestion extends Model
{
    protected $guarded = ['id'];
    
    protected $fillable = [
        'question_id', 
        'exam_id',
    ];

    public function exams()
    {
        return $this->belongsTo('App\Models\Exam');
    }

    public function questions()
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function examAnswer()
    {
        return $this->hasMany('App\Models\ExamAnser', 'exam_question_id');
    }
}
