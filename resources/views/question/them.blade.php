@extends('layouts.master')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{trans('question.question')}}
                        <small>{{trans('question.add')}}</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7">
                    {!! Form::open(['method' => 'POST', 'url' => 'admin/question/add']) !!}
                         <div class="form-group">
                            <label> {{trans('question.subject')}} </label>
                            <select class="form-control" name="subject_id" id="subject_id">
                                @foreach ($subject as $sj)
                                    <option value="{{$sj -> id}}">
                                        {{$sj -> name_subject}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label> {{trans('question.question')}} </label>
                            <input type="text" class="form-control" name="content_question"
                            placeholder="Please Enter Your Question"/>
                            <input type="button" name="" value="add" onclick="add()">
                        </div>
                        <div class="answer">
                        </div>
                    {!! Form::close() !!}
                        <button type="submit" class="btn btn-default" id="btSave">
                            {{trans('question.save')}}
                        </button>
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

    var i=1;
    function add() {
        var txt1 = "<div class='answer-group' id='answer-group"+i+"'><input type='checkbox' name='answer-checked' value='1' class='btn-check'> <input type='text' name='content_answer' placeholder='Please Enter Your Answer'/> <button type='button' id='answer-group"+i+"' class='btn-remove'> <span class='glyphicon glyphicon-trash'></span></button></div>";
        i++;
      $(".answer").append(txt1);
    }
    
    $(document).on('click','.btn-remove', function()
    {
        var button = $(this).attr("id");
        $('#'+button).remove();
    });


    function getAnswer(){
        let answer = [];
        var qs_content = $('.form-group').find('input[type="text"]').val();
        var subject_id = $('#subject_id').val();
        
        $('.answer-group').each(function(index, value){
            
            ans_content = $(this).find('input[type="text"]').val();
            correct = $(this).find('input[type="checkbox"]:checked').val()?1:0;
            answer.push({'subject_id': subject_id, 'qs_content': qs_content, 'ans_content': ans_content, 'correct': correct});
        });
        
        return answer;
    }

    $('#btSave').click(function(event){
        $.ajax({
          url: 'admin/question/add',
          type: 'POST',
          dataType: 'json',
          data: {'data':getAnswer(), '_token': "{{ csrf_token() }}" }
        })
        .done(function() {
            window.location.href = 'admin/question/add';
        })
        alert('Question successfully added!')
    });

</script>
@endsection
