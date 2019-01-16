<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\QuestionModel;
use App\Model\SubjectModel;
use App\Model\AnswerModel;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subject = SubjectModel::all();
        $question = QuestionModel::all();
        $answer = AnswerModel::all();
        return view('question.question_list',['question' => $question,'answer' => $answer,'subject' => $subject]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        $subject = SubjectModel::all();
        return view('question.them',['subject' => $subject]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store()
    {
        $data = request()->post()['data'];
        $qs = new QuestionModel([
            'content_question' => $data[0]['qs_content'],
            'subject_id' => $data[0]['subject_id'],
        ]);
        $qs->save();
        foreach ($data as $r)
        {
            $ans = new AnswerModel([
                'question_id' => $qs->id,
                'content_answer' => $r['ans_content'],
                'correct' => $r['correct'],
            ]);
            $ans->save();
        }
        return redirect('admin/question/add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $question = QuestionModel::with('answer')->where('id',$id)->get();
        // dd($question);
        return view('question.sua',['question' => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = request()->post()['data'];
        $qs = new QuestionModel([
            'content_question' => $data[0]['qs_content'],
            'subject_id' => $data[0]['subject_id'],
        ]);
        $qs->save();
        foreach ($data as $r)
        {
            $ans = new AnswerModel([
                'question_id' => $qs->id,
                'content_answer' => $r['ans_content'],
                'correct' => $r['correct'],
            ]);
            $ans->save();
        }
        return redirect('admin/question/add');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
