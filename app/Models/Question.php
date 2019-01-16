<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $table = 'questions';
    protected $guarded = ['id'];
    protected $fillable = ['content_question', 'subject_id'];

    public function answer()
    {
        return $this -> hasMany('App\Model\Answer', 'question_id');
    }
    
    public function userQuestions()
    {
        return $this -> hasMany('App\Model\UserQuestion', 'question_id');
    }

    public function subjects()
    {
        return $this -> belongsTo('App\Model\Subject');
    }
}
