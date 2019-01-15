@extends('homepages.master')
@section('title', 'Home')
@section('content')



	<div class="row discussion">

	<div class="col-md-2 left-dis">
		<div class="forum-nav-refine-bar">
            <label class="forum-nav-filter-main">
                <select class="forum-nav-filter-main-control">
                    <option value="all">Show all posts</option>
                    <option value="unread">Unread posts</option>
                    <option value="unanswered">Unanswered posts</option>
                </select>
            </label><label class="forum-nav-sort">
                <select class="forum-nav-sort-control">
                    <option value="activity">by recent activity</option>
                    <option value="comments">by most activity</option>
                    <option value="votes">by most votes</option>
                </select>
            </label>
        </div>
		<div class="left-scroll">

			@foreach (range(0, 5) as $number) 	
			<a href="#">	
			<div class="row" id="{{ $number }}">
			<div class="col-md-2">
				<span class="icon fa fa-comments" aria-hidden="true"></span>
			</div>
			<div class="col-md-8">
				Responsive cities as a tool for empowerment and co-creation.
			</div>
			<div class="col-md-2">
				<span class="badge badge-info">1</span>
			</div>
			</div>
			</a>
			@endforeach
		</div>
	</div>

	<div class="col-md-9 right-dis">
		<div class="ic-action">
			<a href="" class="a-ic"><span class="icon fa fa-plus" aria-hidden="true"></span></a>
			<a href="" class="a-ic"><span class="icon fa fa-star" aria-hidden="true"></span></a>
			<a href="" class="a-ic"><span class="icon fa fa-ellipsis-h" aria-hidden="true"></span></a>
		</div>
		<h5 class="post-title">Responsive cities as a tool for empowerment and co-creation.</h5>
		<p class="posted-details">discussion posted <span class="timeago" title="2019-01-08T15:10:57Z">6 days ago</span>by 
		<a href="#" class="username">juancho5f8a</a></p>
		<div class="post-body"><p>Hello everyone. My name is Juan Sebastian from Colombia and I'm soon graduating from a Master in Integrated Urbanism and Sustainable Design. The Responsive City is a pretty new concept for me but I find it very relevant for the reality of our cities and citizens. It shouldn't be anymore about cities collecting information from their citizens, it should also be about promoting a broader citizen-engagement strategy so we all build our cities, not just developers or politicians. Opening the appropriate platforms for promoting participation and co-creation could be the stepping stone to create real sustainable and resilient cities and to empower all citizens in the creation of their own future. </p></div>

		<div class="post-context">      
            Related to: <a href="#">Week 1 / Week 1 - First Discussion</a>
        <div class="group-visibility-label">
                This post is visible to everyone.
        </div>
    </div>

		



	


	</div>

	</div>


@endsection
