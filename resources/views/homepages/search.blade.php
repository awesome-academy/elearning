@extends('homepages.master')
@section('title', 'search')
@section('content')

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
            <form action="searchc" method="post" role="search">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="input-group mb-4">
        <input type="text" class="form-control col-md-6" name="key" id="key" placeholder="search for course">
        <div class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">
            <span class="fa fa-search"></span>
        </button>
        {{ csrf_field() }}
    </div>
</div>
</form>
    </div>
    <h2>Search Result : {{$key}}    </h2>
    <div id="list">
        @foreach($key as $new)
        <li>{{$new->name}}
        </li>
        <li>{{$new->id}}</li>
        @endforeach













    </div>








@endsection