@extends('layouts.master')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ trans('question.question') }}
                        <small>{{ trans('question.question_list') }}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7">
                         <div class="form-group">
                            <h1>{{ trans('question.chosse_subject') }}</h1>
                            <label> {{ trans('question.subject') }} </label>
                            <select class="form-control" name="subject_id" id="subject_id">
                                @foreach ($subject as $sj)
                                    <option value="{{$sj -> id}}">
                                        {{$sj -> name_subject}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="ajax-group" id="ajax-group"></div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection

@section('script')
<script>
        $(document).ready(function(){
            $('#subject_id').change(function(){
                var idSubject = $(this).val();
                $.get("ajax/question/"+idSubject,function(data){
                    $("#ajax-group").html(data);
                });
            });
        });
</script>
@endsection