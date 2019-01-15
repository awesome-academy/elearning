@extends('homepages.master')
@section('title', 'Home')
@section('content')


<div class="container">
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" height="410px" src="images/online-courses.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" height="410px" src="images/online-course-development-process-must-know-outsource.jpeg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" height="410px" src="images/Online-Course.jpg" alt="Third slide">
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
	<h4 class="search-title">What do you want to learn?</h2>
	<div class="input-group mb-3">
		<input type="text" class="form-control col-md-6">
		<div class="input-group-append">
		<button class="btn btn-outline-secondary" type="button">
			<span class="fa fa-search"></span>
		</button>
		</div>
	</div>

</div>

<div class="home-content popular-subjects">
	<h4 class="title">Popular Subjects</h2>
	<div class="row subject-container">
	    <div class="col-md-4 subject-block">
	      <a href="" class="subject-link"><span class="subject-icon fa fa-keyboard-o fa-2x" aria-hidden="true"></span>&nbsp; Computer Science</a>
	    </div>
	    <div class="col-md-4 subject-block">
	      <a href="/course/subject/language" class="subject-link"><span class="subject-icon fa fa-language fa-2x" aria-hidden="true"></span> &nbsp; Language</a>
	    </div>
	    <div class="col-md-4 subject-block">
	      <a href="/course/subject/data-science" class="subject-link"><span class="subject-icon fa fa-line-chart fa-2x" aria-hidden="true"></span>&nbsp; Data Science</a>
	    </div>	    

	    <div class="col-md-4 subject-block">
	      <a href="" class="subject-link"><span class="subject-icon fa fa-briefcase fa-2x" aria-hidden="true"></span>&nbsp;Business &amp; Management</a>
	    </div>
	    <div class="col-md-4 subject-block">
	      <a href="" class="subject-link"><span class="subject-icon fa fa-cogs fa-2x" aria-hidden="true"></span>&nbsp;Engineering</a>
	    </div>
	    <div class="col-md-4 subject-block">
	      <a href="" class="subject-link"><span class="subject-icon fa fa-users fa-2x" aria-hidden="true"></span>&nbsp;Humanities</a>
	    </div>
	    <button type="button" class="btn btn-outline-info">Browse courses and programs</button>	    
    </div>


	</div>
</div>
<br><br>

@endsection
