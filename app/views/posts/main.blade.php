@extends('layouts.master')

@section('title')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Education and Training!</title>
<!-- <link rel="stylesheet" type="text/css" href="/assets/css/postslabels.css"> -->
<style type="text/css" media="screen">

.grid-block-container {
	float: left;
	width: 300px;
	height: 300px;
	margin: 20px 0 0 30px;
}
.grid-block {
	position: relative;
	float: left;
	width: 300px;
	height: 300px;
	margin: 0 0 30px 30px;
}
.grid-block h4 {
	font-size: .9em;
	color: #333;
	background: #f5f5f5;
	margin: 0;
	padding: 10px;
	border: 1px solid #ddd;
}
 
.caption {
	display: none;
	position: absolute;
	top: 0;
	left: 0;
	background: url("/images/trans-black-50.png");
	width: 300px;
	height: 300px;
}
.caption h3, .caption p {
	color: #fff;
	margin: 20px;

}
.caption h3 {
	margin: 20px 20px 10px;
}
.caption p {
	font-size: .75em;
	line-height: 1.5em;
	margin: 0 20px 15px;
}
.caption a.learn-more {
	padding: 5px 10px;
	background: #88CC00;
	color: #fff;
	border-radius: 2px;
	-moz-border-radius: 2px;
	font-weight: bold;
	text-decoration: none;

}
.caption a.learn-more:hover {
	background: #fff;
	color: #88CC00
}
	
</style>

@stop

@section('content')
<div class="container">
@if (Auth::check()&& Auth::user()->isAdmin())
<a href="{{{action('PostsController@create')}}}" class="btn btn-info" role="button">Create New Posts</a>
@endif
<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Categories
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="{{{ action('PostsController@index') }}}?category_id=1">Composting</a></li>
    <li><a href="{{{ action('PostsController@index') }}}?category_id=2">General Farming</a></li>
    <li><a href="{{{ action('PostsController@index') }}}?category_id=3">Experiments</a></li>
    <li><a href="{{{ action('PostsController@index') }}}">All</a></li>
  </ul>
</div>
<hr>
<div align="center">
@foreach ($posts as $post)
<div class="grid-block-container">
 <div class="grid-block slide">
  <div class="caption">
   <h3>{{{$post->title}}}</h3>
   <p><a href="{{{ action('PostsController@show', $post->id) }}}" class="learn-more">Learn more</a></p>
  </div>
 <a href="{{{ action('PostsController@show', $post->id) }}}"><img src="{{{$post->image}}}" alt="" width="300" height="300"></a>
  </div>
 </div> 
@endforeach
</div>
</div>

@stop


@section('bottom-script')
<!-- <script type="text/javascript" src="/assets/js/postslabels.js"></script> -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.standard').hover(
		function(){
			$(this).find('.caption').show();
		},
		function(){
			$(this).find('.caption').hide();
		}
	);
	$('.fade').hover(
		function(){
			$(this).find('.caption').fadeIn(250);
		},
		function(){
			$(this).find('.caption').fadeOut(250);
		}
	);
	$('.slide').hover(
		function(){
			$(this).find('.caption').slideDown(250);
		},
		function(){
			$(this).find('.caption').slideUp(250);
		}
	);
});
</script>

@stop
