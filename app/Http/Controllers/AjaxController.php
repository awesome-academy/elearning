<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\Subject;
use App\Model\Question;

class AjaxController extends Controller
{
    public function get($idSubject)
    {
        $question = Question::with('answer')->where('subject_id', $idSubject)->get();
        foreach ($question as $qs)
        {
            echo '<label> {{ trans('question.question') }} </label>';
            echo "<input type='text' class='form-control' name='content_question'
            id='content_question' readonly value='".$qs -> content_question."'/><br/>";
            foreach ($qs->answer as $an)
            {
                echo "<input type='text' readonly value='".$an -> content_answer."'>";
                $checked = ($an->correct==1)?'checked':'';
                echo "<input type='checkbox' name='correct' disabled ".$checked.'><br/>';
            }
            echo "<a href='admin/question/edit/".$qs -> id."'>{{ trans('question.edit')}}
            </a>";
            echo "<a href='admin/question/delete/".$qs -> id."'>
            {{trans('question.delete')}}</a><br/>";
        }
    }
}
