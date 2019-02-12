<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuggestAnswer extends Model
{
    protected $table = 'suggest_answers';

    protected $guarded = ['id'];
    
    protected $fillable = [
        'suggest_question_id',
        'content_answer',
        'correct',
    ];

    public function suggestAns()
    {
        return $this->belongsTo('App\Models\SuggestQuestion');
    }
}
