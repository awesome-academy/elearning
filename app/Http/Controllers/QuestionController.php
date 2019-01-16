<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Question;
use App\Model\Subject;
use App\Model\Answer;

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
        $subject = Subject::all();
        
        return view('question.question_list', compact('subject'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //
        $subject = Subject::all();

        return view('question.them', compact('subject'));
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
        $qs = new Question([
            'content_question' => $data[0]['qs_content'],
            'subject_id' => $data[0]['subject_id'],
        ]);
        $qs->save();
        foreach ($data as $r)
        {
            $ans = new Answer([
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
        $question = Question::with('answer')->where('id', $id)->get();

        return view('question.sua', compact('question'));
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
        $qs = Question::find($id);
        $qs->content_question=$data[0]['qs_content'];
        $qs->save();
        foreach ($data as $r)
        {
            $ans=Answer::where('question_id', $id);
            $ans->content_answer=$r['ans_content'];
            $ans->correct=$r['correct'];
            $ans->save();
        }

        return redirect('admin/question/edit/'.$id);
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
        $qs=Question::find($id);
        $qs->answer()->delete();
        $qs->delete();

        return redirect('admin/question/list');
    }
}
