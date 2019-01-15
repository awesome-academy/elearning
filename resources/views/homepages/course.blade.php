@extends('homepages.master')
@section('title', 'Course')
@section('content')

<div class="container">
	<div id="content" class="row">
		<div class="col-md-6">
			<h4 class="js-result-msg hide-phone" aria-live="assertive" tabindex="-1">Viewing 2524 results matching</h4>
		</div>
		<div class="input-group col-md-6 pull-right ">
		
			<input type="text" class="form-control">
			<div class="input-group-append">
				<button class="btn btn-outline-secondary" type="button">
					<span class="fa fa-search"></span>
				</button>
			</div>
		</div>
	</div>	
	<hr>
	<div class="row">
	<div class="col-md-3 list-left">

		<h5><b>Refine your search</b></h5>
		<section class="sec-left">
			<h6>Availability</h6>
			<div class="r-left list"><a class="sp-name" href="#">Currrent</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Starting Soon</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Upcoming</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Self-Paced</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Archived	</a></div>
		</section>

		<section class="sec-left">
			<h6>Subjects</h6>
			<div class="r-left list"><a class="sp-name" href="#">Architecture</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Art & Culture</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Biology & Life Sciences</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Bussiness & Management</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Chemistry</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Communiation</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Computer Sciences</a></div>
		</section>

		<section class="sec-left">
			<h6>Courses & Programs</h6>
			<div class="r-left list"><a class="sp-name" href="#">All Courses</a></div>
			<div class="r-left list"><a class="sp-name" href="#">All Programs</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Credit-Eligible</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Master's Degress</a></div>
			<div class="r-left list"><a class="sp-name" href="#">MicroMaster&reg; Programs</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Professional Certificate</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Professional Education</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Verifield</a></div>
			<div class="r-left list"><a class="sp-name" href="#">XSeries</a></div>
		</section>
		
		<section class="sec-left">
			<h6>School</h6>
			<select>
				<option value="0">Filter by School</option>
				<option value="1">UNETI</option>
				<option value="2">BKA</option>
				<option value="3">FPT</option>
			</select>
			<button type="button" class="btn btn-outline-info">Submit</button>	    
		</section>


		<section class="sec-left">
			<h6>Level</h6>
			<div class="r-left list"><a class="sp-name" href="#">Introductory</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Intermediate</a></div>
			<div class="r-left list"><a class="sp-name" href="#">Advanced</a></div>
		</section>
		
	</div>
	<div class="col-md-9 right-course">
		<div class="header search-featured-courses"><h5>Featured Courses</h5></div>
		<div class="row course-content">

			@foreach (range(0, 8) as $number) 		
			<a href="#">
			<div class="course-child" id="{{ $number }}">
				<div class="img-wrapper">
					<img src="images/foundations_of_happiness_at_work-318210.jpg">
				</div>

				<div class="banner"><span>VERIFIED</span></div>
				<div class="verified-img"><img src="images/verified.png"></div>
				<div class="name-course">
					<div class="label">
	                	<span class="sr">BerkeleyX</span>
	            	</div>
	            	<h5>The Foundations of Happiness at Work</h5>
	            	<div class="course-start-info">
			            Current
       				</div>
	            </div>
			</div>
			</a>
			@endforeach
		</div>
	</div>
	</div>
</div>
			


@endsection
