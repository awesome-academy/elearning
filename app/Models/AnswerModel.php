<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AnswerModel extends Model
{
    //
    protected $table = "answers";
    protected $fillable = ['question_id','content_answer','correct'];
    
    public function user_answer()
    {
        return $this -> hasMany('App\Model\UserAnswerModel', 'answer_id', 'id');
    }

    public function questions()
    {
        return $this -> belongsTo('App\Model\QuestionModel', 'question_id');
    }
}
