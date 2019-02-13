@extends('homepages.master')
@section('title', 'Home')
@section('content')
  <div>
 <h2> <b>Search Result : </b>   </h2>
    <div id="list">
        @if(count($key)==0)
       <h1> <?php echo "";?> </h1>
        @endif
        @foreach($key as $new)
        <li><h4>programs :</h4>
        <h1><a href="programs/{{$new->name}}">{{$new->name}}</a>
        <br></h1> </li>
        <h2> slug : {{$new->slug}}</h2>
       <br>
         {{-- {{$new->links()}} --}}
        @endforeach
    
       </div>
@endsection
