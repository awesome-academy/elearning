<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubjectModel extends Model
{
    //
    protected $table = "subjects";
    protected $guarded = ['id'];
    protected $fillable = [
        'name_subject',
        'question_number',
        'duration',
        'description',
    ];

    public function exams()

    {
        return $this -> hasMany('App\Model\ExamModel', 'subject_id');
    }
    
    public function questions()
    {
        return $this-> hasMany('App\Model\QuestionModel', 'subject_id');
    }
}
