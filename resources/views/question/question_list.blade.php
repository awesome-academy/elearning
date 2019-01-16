@extends('layouts.master')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Question
                        <small>Question List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="admin/question/add" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}" />
                         <div class="form-group">
                            <h1>Mời chọn môn học</h1>
                            <label> Subject </label>
                            <select class="form-control" name="subject_id" id="subject_id">
                            @foreach ($subject as $sj)
                                    <option value="{{$sj -> id}}">{{$sj -> name_subject}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="ajax-group" id="ajax-group">
                        </div>
                    </form>
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