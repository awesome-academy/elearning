@extends('layouts.master')

@section('content')

   
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">{{ trans('question.question_editing') }}</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7">
                        {!! Form::open(['method' => 'POST', 'url' => 'admin/question/
                        edit/{{$question[
                        0] -> id}}']) !!}
                        <div class="form-group">
                            <label> {{ trans('question.question') }} </label>
                            <input type="text" class="form-control" name="content_question"
                            value="{{$question[0]->content_question}}" />
                            <input type="button" name="" value="add" onclick="add()">
                        </div>
                            <div class="answer" id="answer-group">
                                @foreach ($question[0]->answer as $key => $as)
                                    <div class="answer-group" id='answer-group{{ ++$key }}'>
                                        <input type='checkbox' name='answer-checked' value='1'
                                        class='btn-check'>
                                        <input type="text" name="content_answer" value="{{$as
                                        -> content_answer}}">
                                        <button type='button' id='answer-group{{ $key }}' class
                                        ='btn-remove'>
                                            <span class='glyphicon glyphicon-trash'></span>
                                        </button><br/>
                                    </div>
                                    @endforeach
                                <input id="number_ans" type="hidden" value="{{ count($question[
                                0]->answer) }}">
                            </div> 
                        {!! Form::close() !!}
                            <button type="button" id="btSave">
                                {{ trans('question.save') }}
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
    var i= $('#number_ans').val();
    function add() {
        i++;
        var txt1 = "<div class='answer-group' id='answer-group"+i+"'><input type='checkbox' name='answer-checked' value='1' class='btn-check'> <input type='text' name='content_answer' placeholder='Please Enter Your Answer'/> <button type='button' id='answer-group"+i+"' class='btn-remove'> <span class='glyphicon glyphicon-trash'></span></button></div>";
        
      $(".answer").append(txt1);
    }
    
    $(document).on('click','.btRemove', function()
    {
        var button = $(this).attr("id");
        $('#'+button).remove();
    });

    $(document).on('click','.btn-remove', function()
    {
        var button = $(this).attr("id");
        $('#'+button).remove();
    });
    
    function getAnswer(){
        let answer = [];
        var qs_content = $('.form-group').find('input[type="text"]').val();
        $('.answer-group').each(function(index, value){
            
            ans_content = $(this).find('input[type="text"]').val();
            correct = $(this).find('input[type="checkbox"]:checked').val()?1:0;
            answer.push({'qs_content': qs_content, 'ans_content': ans_content, 'correct': correct});
        });

        return answer;
    }

    $('#btSave').click(function(event){
        $.ajax({
          url: 'admin/question/edit/{{$question[0]->id}}',
          type: 'POST',
          dataType: 'json',
          data: {'data':getAnswer(), '_token': "{{ csrf_token() }}" }
        })

        .done(function() {
            window.location.href = 'admin/question/edit/{{$question[0]->id}}';
        })
        alert('Question successfully edited!')
    });
</script>
@endsection