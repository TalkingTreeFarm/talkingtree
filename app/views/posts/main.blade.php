@extends('layouts.master')

@section('title')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Education and Training!</title>
<link rel="stylesheet" type="text/css" href="/assets/css/postslabels.css">
<link rel="stylesheet" type="text/css" href="/assets/css/posts.css">



@stop

@section('content')
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="dropdown">
  <button class="btn btn-primary btn-xs outline dropdown-toggle" color="purple" type="button" data-toggle="dropdown">Categories
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="{{{ action('PostsController@index') }}}?category_id=1">Composting</a></li>
    <li><a href="{{{ action('PostsController@index') }}}?category_id=2">General Farming</a></li>
    <li><a href="{{{ action('PostsController@index') }}}?category_id=3">Experiments</a></li>
    <li><a href="{{{ action('PostsController@index') }}}">All</a></li>
  </ul>
</div>
</div>
<div class="col-md-6">
@if (Auth::check()&& Auth::user()->isAdmin())
<a href="{{{action('PostsController@create')}}}" class="btn btn-primary btn-xs outline" style="float:right;"role="button">Create New Posts</a>
@endif
</div>
</div>
<hr>
<div align="center">
@foreach ($posts as $post)
<div align="center" class="grid-block-container">
 <div align="center" class="grid-block slide">
  <div class="caption">
   
   		<a class="caption-link" href="{{{ action('PostsController@show', $post->id) }}}">
   			{{{$post->title}}}
   		</a>
	
  </div>
  <img src="{{{$post->image}}}" class="img-rounded" alt="" width="300" height="300">
  </div>
 </div>
@endforeach
<div align="center">
<nav id="Page">
<ul class="paginate">
{{$posts->links()}}
</ul>
</nav>
</div>
</div>
</div>

@stop


@section('bottom-script')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/postslabels.js"></script>


@stop
