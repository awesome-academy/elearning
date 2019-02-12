@extends('homepages.master')
@section('title', 'Course')
@section('content')

<div class="container">
    <div id="content" class="row">
        <div class="col-md-6">
            <h4 class="js-result-msg hide-phone" aria-live="assertive" tabindex="-1">Viewing 2524 results matching</h4>
        </div>
        <div class="input-group col-md-6 pull-right ">
            {!! Form::text('', '' , ['class' => 'form-control']) !!}
            <div class="input-group-append">
            {!! Form::button('<span class="fa fa-search"></span>', ['class' => 'btn btn-outline-secondary']) !!} 
            </div>
        </div>
    </div>  
    <hr>

    <div class="row">
    <div class="col-md-3 list-left">
        <h5><b>{{ Lang::get('label.refine_your_search') }}</b></h5>
        <section class="sec-left">
            <h6>{{ Lang::get('label.availability') }}</h6>
            <div class="r-left list"><a class="sp-name" href="#">{{ Lang::get('label.current') }}</a></div>
            <div class="r-left list"><a class="sp-name" href="#">{{ Lang::get('label.starting_soon') }}</a></div>
            <div class="r-left list"><a class="sp-name" href="#">{{ Lang::get('label.upcoming') }}</a></div>
        </section>

        <section class="sec-left">
            <h6>{{ Lang::get('label.subjects') }}</h6>
            <div class="r-left list"><a class="sp-name" href="#">{{ Lang::get('label.architecture') }}</a></div>
            <div class="r-left list"><a class="sp-name" href="#">
            {{ Lang::get('label.art') }} &amp; {{ Lang::get('label.culture') }}</a></div>
            <div class="r-left list"><a class="sp-name" href="#">
            {{ Lang::get('label.biology') }} &amp; {{ Lang::get('label.life_sciences') }}</a></div>
            <div class="r-left list"><a class="sp-name" href="#">
            {{ Lang::get('label.business') }} &amp; {{ Lang::get('label.management') }}</a></div>
            <div class="r-left list"><a class="sp-name" href="#">{{ Lang::get('label.chemistry') }}</a></div>
            <div class="r-left list"><a class="sp-name" href="#">{{ Lang::get('label.communiation') }}</a></div>
            <div class="r-left list"><a class="sp-name" href="#">{{ Lang::get('label.computer_science') }}</a></div>
        </section>

        <section class="sec-left">
            <h6>{{ Lang::get('label.course') }} &amp; {{ Lang::get('label.program') }}</h6>
            <div class="r-left list"><a class="sp-name" href="#">
            {{ Lang::get('label.all') }} {{ Lang::get('label.course') }}</a></div>
            <div class="r-left list"><a class="sp-name" href="#">
            {{ Lang::get('label.all') }} {{ Lang::get('label.program') }}</a></div>
            <div class="r-left list"><a class="sp-name" href="#">
            {{ Lang::get('label.professional') }} {{ Lang::get('label.certificate') }}</a></div>
            <div class="r-left list"><a class="sp-name" href="#">
            {{ Lang::get('label.professional') }} {{ Lang::get('label.education') }}</a></div>
            <div class="r-left list"><a class="sp-name" href="#">{{ Lang::get('label.verified') }}</a></div>
            <div class="r-left list"><a class="sp-name" href="#">{{ Lang::get('label.xseries') }}</a></div>
        </section>

        <section class="sec-left">
            <h6>{{ Lang::get('label.school') }}</h6>
            {!! Form::select('', ['Filter by School', 'UNETI', 'BKA', 'FPT']) !!}
            {!! Form::button('Submit', ['class' => 'btn btn-outline-info']) !!}     
        </section>

        <section class="sec-left">
            <h6>{{ Lang::get('label.level') }}</h6>
            <div class="r-left list"><a class="sp-name" href="#">{{ Lang::get('label.introductory') }}</a></div>
            <div class="r-left list"><a class="sp-name" href="#">{{ Lang::get('label.intermediate') }}</a></div>
            <div class="r-left list"><a class="sp-name" href="#">{{ Lang::get('label.advanced') }}</a></div>
        </section>

    </div>
    <div class="col-md-9 right-course">
        <div class="header search-featured-courses"><h5>{{ Lang::get('label.featured') }} {{ Lang::get('label.course') }}</h5></div>
        <div class="row course-content">
            @foreach (range(0, 8) as $number)       
            <a href="/detail">
            <div class="course-child" id="{{ $number }}">
                <div class="img-wrapper"><img src="{!! Config::get('social.img.url') !!}/foundations_of_happiness_at_work-318210.jpg"></div>
                <div class="banner"><span>VERIFIED</span></div>
                <div class="verified-img"><img src="{!! Config::get('social.img.url') !!}/verified.png"></div>
                <div class="name-course"> 
                    <div class="label"><span class="sr">BerkeleyX</span></div>
                    <h5>The Foundations of Happiness at Work</h5>
                    <div class="course-start-info">Current</div>
                </div>
            </div>
            </a>
            @endforeach
        </div>
    </div>
    </div>
</div>          
@endsection
