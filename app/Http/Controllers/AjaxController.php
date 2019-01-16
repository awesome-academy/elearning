<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\SubjectModel;
use App\Model\QuestionModel;

class AjaxController extends Controller
{
    public function get($idSubject)
    {
        $question = QuestionModel::with('answer')->where('subject_id',$idSubject)->get();
        foreach($question as $qs)
        {
            echo "<label> Question </label>";
            echo "<input type='text' class='form-control' name='content_question' id='content_question' readonly value='".$qs -> content_question."'/> <br/>";
            foreach ($qs->answer as $an)
            {
                echo "<input type='text' readonly value='".$an -> content_answer."'>";
                $checked = ($an->correct==1)?"checked":"";
                echo "<input type='checkbox' name='correct' disabled ".$checked."><br/>";
            }
            echo "<button type='submit' class='btn btn-default' id='btSave'><a href='admin/question/edit/".$qs -> id."'> Edit </a></button>";
            echo "<button type='reset' class='btn btn-default'> <a href='admin/question/delete/".$qs -> id."'> Delete</a> </button><br/>";
        }
    }
}
