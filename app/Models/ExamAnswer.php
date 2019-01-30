<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExamAnswer extends Model
{
    protected $guarded = ['id'];
    
    protected $fillable = [
        'exam_question_id', 
        'answer_id',
    ];

    public function examQuestion()
    {
        return $this->belongsTo('App\Models\ExamQuestion', 'exam_question_id');
    }

    public function answer()
    {
        return $this->belongsTo('App\Models\Answer');
    }
}
