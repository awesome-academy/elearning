<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $guarded = ['id'];

    protected $fillable = [
        'question_id',
        'content_answer',
        'correct',
        'created_at',
    ];

    public function questions()
    {
        return $this->belongsTo('App\Models\Question');
    }

    public function examAnswer()
    {
        return $this->hasMany('App\Models\ExamAnswer', 'answer_id');
    }
}
