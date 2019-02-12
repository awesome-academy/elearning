@extends('homepages.master')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="content container">
    <div id="question" class="row">
    <div class="col-md-12">
        <h2><b>{{ Lang::get('label.suggested_question') }}</b></h2>

        {!! Form::open(['class' => 'new_question', 'url' => '/suggest/new']) !!}
        {!! Form::label('question_subject', Lang::get('label.subjects')) !!}
        {!! Form::select('exam_subject', $subjects->pluck('component_type', 'id'), null, ['class' => 'form-control']) !!}
        {!! Form::label('question_content', Lang::get('label.content')) !!}
        {!! Form::textarea('question_content', null, ['class' => 'form-control', 'id' => 'question_content']) !!}

        <span class="help-block">User can use <code>&lt;pre&gt;&lt;code class="language-css"&gt;your code here&lt;/code&gt;&lt;/pre&gt;</code> to input it on question content.</span><br>

        {!! Form::label('question_type', Lang::get('label.question_type')) !!}
        {!! Form::select('question[question_type]', ['single_choice' => 'single choice', 'multiple_choice' => 'multiple choice'], null, ['class' => 'form-control width-question-type']) !!}
        
        <div class="space-top">
            <div class="group">
            <div id="answer1" class="form-group answer-field-box clearfix">
            
            {!! Form::label('question_content', Lang::get('label.option')) !!}

            <div class="col-md-12">
                <div class="col-md-8">
                    {!! Form::text('sg_answer', null, ['class' => 'form-control']) !!}
                </div>
                <div class="check-box-remove">
                <div class="col-md-2 ">
                    {!! Form::checkbox('question[options_attributes][0][correct]', '1', false, ['class' => 'check-box']) !!}
                    {!! Form::label('question_options_attributes_0_correct', Lang::get('label.correct')) !!}
                </div>
                <div class="col-md-2 space-top-remove">
                    
                <a id="answer1" class="remove-button text-danger" href="" style="font-size: 18px">
                <span class="glyphicon glyphicon-trash"></span>{{ Lang::get('label.remove') }}</a>
                </div>
                </div>
            </div>
          </div>
        </div>
        <p class="option-fields">
        <a id="add-answer" class="fa fa-plus" href=""><span class="glyphicon glyphicon-plus "></span>{{ Lang::get('label.add_more') }}</a>
        </p>
        </div>
        {!! Form::submit('Suggest', ['class' => 'btn btn-primary button space-top-submit']) !!}
        {!! Form::close() !!}
    </div>
    </div>
</div>
</div>
@endsection
@push('js')
    <script src="{{ asset('js/usr/suggest.js') }}"></script> 
@endpush