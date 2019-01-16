<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class QuestionModel extends Model
{
    //
    protected $table = "questions";
    protected $guarded = ['id'];
    protected $fillable = ['content_question','subject_id'];    

    public function answer()
    {
        return $this -> hasMany('App\Model\AnswerModel', 'question_id');
    }
    
    public function user_question()
    {
        return $this -> hasMany('App\Model\UserQuestionModel', 'question_id');
    }

    public function subjects()
    {
        return $this -> belongsTo('App\Model\SubjectModel');
    }
}
