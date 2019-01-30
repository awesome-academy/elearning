<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuggestQuestion extends Model
{
    protected $table = 'suggest_questions';

    protected $guarded = ['id'];
    
    protected $fillable = [
        'component_id', 
        'user_id', 
        'content_question',
    ];

    public function suggestAns()
    {
        return $this->hasMany('App\Models\SuggestAns', 'suggest_question_id');
    }

    public function components()
    {
        return $this->belongsTo('App\Models\Component');
    }
}
