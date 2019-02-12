@extends('homepages.master')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row exam">
    <div class="title">
    {!! $exams->created_at !!}<br>
    <center><b><h2>{!! $exams->components->component_type !!}</h2></b></center>
    <hr>
    {!! Form::hidden('exam_id', $exams->id, ['id' => 'exam_id']) !!}
    {!! Form::hidden('duration', '0') !!}
    {!! Form::hidden('token', Session::token(), ['id' => 'token']) !!}
    </div>
    {!! Form::open(['class' => 'edit_exam', 'url' => '']) !!}
    <ol>
        @foreach($userQs[0]->questions as $qs)
            <li class="questions_class" id="{{ $qs->pivot->id }}">
            <strong>{!! $qs->content_question !!}</strong>     

            @foreach($qs->answers as $answer) 
                <label class="radio" for="exam_results_attributes_0_answers_attributes_0_option_id">
                    {!! Form::radio($answer->question_id, $answer->id ,
                        ($ans::where('answer_id', $answer->id)->count() == 1) ? "true":"") !!}
                    {{ $answer->content_answer }}
                </label>
            @endforeach  
            </li> 
        @endforeach
        <br><br>
    </ol>
    {!! Form::close() !!}
    <div id="btn-submit-form-group">
    <div class="container">
    <div class="row">
        {!! Form::submit('Save', ['id' => 'btSave', 'class' => 'btn btn-primary btn-submit submit-time-out']) !!}
        {!! Form::submit('Finish', ['id' => 'btFinish', 'class' => 'btn btn-danger btn-submit pull-right']) !!}
    </div>
    </div>
    </div>
        
    <div class="timer">
        <h4>{{ Lang::get('label.time_remaining') }}</h4>
        <div id="clock" class="is-countdown">
            <div id='tiles'></div>
            <span class="countdown-row countdown-show3">
                <span class="countdown-section">
                    <span class="countdown-amount" id="hours"></span>
                    <span class="countdown-period">{{ Lang::get('label.hours') }}</span>
                </span>
                <span class="countdown-section">
                    <span class="countdown-amount" id="minutes"></span>
                    <span class="countdown-period">{{ Lang::get('label.minutes') }}</span>
                </span>
                <span class="countdown-section">
                    <span class="countdown-amount" id="seconds"></span>
                    <span class="countdown-period">{{ Lang::get('label.seconds') }}</span>
                </span>
            </span>
        </div>
    </div>
    </div>
</div>

@endsection
@push('js')
    <script src="{{ asset('js/usr/exam.js') }}"></script>
@endpush
