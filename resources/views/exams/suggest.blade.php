@extends('homepages.master')
@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row exam">
        <div class="col-md-12">
            <div class="form-exam">
                {!! Form::open(['class' => 'new_exam', 'url' => '']) !!}
                {!! Form::close() !!}
            </div>
        <hr>
        <h2><b>{{ Lang::get('label.suggested_question') }}</b>
        <a class="pull-right link-text-question" href="suggest/new" style="font-size: 14px">
            <span class="glyphicon glyphicon-plus"></span>{{ Lang::get('label.new_question') }}</a></h2>
            <table class="table">
                <thead>
                    <tr><th class="number_id">{{ Lang::get('label.stt') }}</th>
                    <th class="content">{{ Lang::get('label.question') }}</th>
                    <th class="subject">{{ Lang::get('label.subjects') }}</th>
                    <th class="type">{{ Lang::get('label.type') }}</th>
                    <th class="state">{{ Lang::get('label.state') }}</th>
                    <th class="action"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($suggests as $sug)
                    <tr>
                        <td id="{{ $sug->id }}">{{ $sug->id }}</td>
                        <td><a href="/">{{ $sug->content_question }}</a></td>
                        <td>{{ $sug->components->component_type }}</td>
                        <td>{{ Lang::get('label.single_choice') }}</td>
                        <td><div class="label label-warning">{{ Lang::get('label.waiting') }}</div></td>
                        <td>
                        <a class="glyphicon glyphicon-edit icon-padding link-underline" href=""></a>
                        <a data-confirm="Are you sure?" class="glyphicon glyphicon-trash icon-padding link-underline" rel="nofollow" href="/suggest/remove/{{ $sug->id }}"></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
    </div></div>
</div>
@endsection
@push('js')
    <script type="text/javascript"></script> 
@endpush