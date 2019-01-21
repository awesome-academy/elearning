@extends('homepages.master')
@section('title', 'Home')
@section('content')

<div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" height="410px" src="{!! Config::get('social.img.url') !!}/online-courses.png" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" height="410px" src="{!! Config::get('social.img.url') !!}/online-course-development-process-must-know-outsource.jpeg" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" height="410px" src="{!! Config::get('social.img.url') !!}/Online-Course.jpg" alt="Third slide">
        </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <br>
    <div class="bd-example">
        <h4 class="search-title">{{ Lang::get('label.what_do_you_want_to_learn_?') }}</h2>
        <div class="input-group mb-3">
            {!! Form::text('', '' , ['class' => 'form-control col-md-6']) !!}
            <div class="input-group-append">
            {!! Form::button('<span class="fa fa-search"></span>', ['class' => 'btn btn-outline-secondary']) !!} 
            </div>
        </div>
    </div>

    <div class="home-content popular-subjects">
        <h4 class="title">{{ Lang::get('label.popular_subjects') }}</h2>
        <div class="row subject-container">
            <div class="col-md-4 subject-block">
                <a href="" class="subject-link"><span class="subject-icon fa fa-keyboard-o fa-2x" aria-hidden="true"></span>
                &nbsp; {{ Lang::get('label.computer_science') }}</a>
            </div>
            <div class="col-md-4 subject-block">
                <a href="/course/subject/language" class="subject-link"><span class="subject-icon fa fa-language fa-2x" aria-hidden="true"></span> &nbsp; {{ Lang::get('label.computer_science') }}</a>
            </div>
            <div class="col-md-4 subject-block">
                <a href="/course/subject/data-science" class="subject-link"><span class="subject-icon fa fa-line-chart fa-2x" aria-hidden="true"></span>&nbsp; {{ Lang::get('label.computer_science') }}</a>
            </div>      
            <div class="col-md-4 subject-block">
                <a href="" class="subject-link"><span class="subject-icon fa fa-briefcase fa-2x" aria-hidden="true"></span>
                &nbsp;{{ Lang::get('label.business') }} &amp; {{ Lang::get('label.management') }}</a>
            </div>
            <div class="col-md-4 subject-block">
                <a href="" class="subject-link"><span class="subject-icon fa fa-cogs fa-2x" aria-hidden="true"></span>
                &nbsp;{{ Lang::get('label.engineering') }}</a>
            </div>
            <div class="col-md-4 subject-block">
                <a href="" class="subject-link"><span class="subject-icon fa fa-users fa-2x" aria-hidden="true"></span>
                &nbsp;{{ Lang::get('label.humanities') }}</a>
            </div>
            <button type="button" class="btn btn-outline-info">{{ Lang::get('label.browse_courses_and_programs') }}</button>     
        </div>
    </div>
</div>
<br><br>
@endsection
