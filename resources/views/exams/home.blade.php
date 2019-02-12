@extends('homepages.master')
@section('title', 'Home')
@section('content')
<div class="container">

    <div class="row exam">
        <div class="col-md-12">
            <div class="form-exam">
                @if(!Auth::check())
                    die();
                @endif
                @if ($subjects->isEmpty())
                     <p>{{ Lang::get('label.there_is_no_subject') }}</p>
                @else
                {!! Form::open(['class' => 'new_exam', 'url' => '/exams']) !!}
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    @if (session('status'))
                        <div class="alert alert-success">
                        {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::token() !!}

                <div class="select-subject col-md-2">
                    {!! Form::select('exam_subject', $subjects->pluck('component_type', 'id') ) !!}
                @endif
                {!! Form::submit('Create Exam', ['class' => 'btn-create']) !!} 
                </div>
                {!! Form::close() !!}
            </div>
            <hr>
            <h3>{{ Lang::get('label.list_of_exams') }}</h3>
            <table class="table">
            <thead>
                <tr><th class="created_date">{{ Lang::get('label.created_date') }}</th>
                <th class="subject">{{ Lang::get('label.subjects') }}</th>
                <th class="status-ff">{{ Lang::get('label.status') }}</th>
                <th class="duration">{{ Lang::get('label.duration') }}</th>
                <th class="question_number">{{ Lang::get('label.question_number') }}</th>
                <th class="spent_time">{{ Lang::get('label.spent_time') }}</th>
                <th class="score">{{ Lang::get('label.score') }}</th>
                <th class="action"></th></tr>
                <th class="nowrap"></th>
            </thead>
            <tbody>
                @if ($exams->isEmpty())
                     <p>{{ Lang::get('label.there_is_no_exam.') }}</p>
                @else
                @foreach($exams as $exam)
                    <tr>
                    <td>{!! $exam->created_at !!}</td>
                    <td>{!! $exam->components->component_type !!}</td>
                    <td class="status">
                        {!! $exam->status !!}
                    </td>
                    <td>{!! $exam->components->duration !!}</td>
                    <td>{!! $exam->components->question_number !!}</td>
                    <td>@if(is_null($exam->spent_time))
                                {{ '00:00:00' }}
                        @endif
                    </td>
                    <td>@if($exam->status != 'checked' && $exam->status != 'unchecked')
                            {{ '-' }}
                        @else {!! $exam->score !!}
                        @endif
                    </td>
                    <td class="act">
                        @if($exam->status == 'start' || $exam->status == 'testing')
                            {{ 'Start' }}
                        @else {{ 'View' }}
                        @endif
                        </a>
                    </td>
                    <td class="nowrap">{{ $exam->id }}</td>
                    </tr>
                @endforeach
                @endif
            </tbody></table>
        </div>
    </div>
</div>
@endsection
@push('js')
    <script src="{{ asset('js/usr/home_exam.js') }}"></script>
@endpush
