@extends('layouts.master')

@section('title')
<link rel="stylesheet" type="text/css" href="/assets/css/posts.css">
<title>Details</title>


@stop

@section('content')

<div class="container">
<hr>
	<div class="col-xs-12 well">
		<div class="col-xs-4">
			<img src="{{{$post->image}}}" alt="" width="300" height="300">
		</div>
	<hr>
	<h1 id="show">{{{$post->title}}}</h1>
		<div class="col-xs-12 well">
			<p>{{$post->htmlBody()}}</p>
		</div>
		<span class="meta">Posted by {{{$post->user->first_name . " " . $post->user->last_name}}}</span>
		<span class="meta">{{{$post->updated_at->diffForHumans()}}}</span>
	</div>
</div>

<div class="container">
<hr>
	<div class="row">
		<div class="col-md-6">
		@if (Auth::check()&& Auth::user()->isAdmin())
		{{ Form::model($post, array('action' => array('PostsController@destroy', $post->id), 'method' => 'DELETE')) }}  <button class="btn btn-primary btn-xs outline" type="submit">Delete this Post!</button>
		</div>
		<div class="col-med-6">
			<a href="{{{action('PostsController@edit', $post->id)}}}" class="btn btn-primary btn-xs outline" role="button" style="float:right;">Edit Post</a>
		</div>
		@endif
	</div>
</div>
@stop
	
@section('bottom-script')

@stop