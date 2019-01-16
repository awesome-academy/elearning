<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    //
    protected $table = 'answers';
    protected $fillable = ['question_id', 'content_answer', 'correct'];
    
    public function userAnswers()
    {
        return $this -> hasMany('App\Model\UserAnswer', 'answer_id', 'id');
    }

    public function questions()
    {
        return $this -> belongsTo('App\Model\Question', 'question_id');
    }
}
