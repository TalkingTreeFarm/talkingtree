@extends('layouts.master')

@section('title')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Details</title>

@stop

@section('content')
<div class="text-center">
	<h1>{{{$post->title}}}</h1>
	<img src="{{{$post->image}}}" alt="" width="300" height="300">
	<p>{{{$post->body}}}</p>
	
	<span class="meta">Updated {{{$post->updated_at->diffForHumans()}}}</span>
</div>
<hr>
@if (Auth::check()&& Auth::user()->isAdmin())
{{ Form::model($post, array('action' => array('PostsController@destroy', $post->id), 'method' => 'DELETE')) }}  <button class="btn btn-info" type="submit">Delete this Post!</button>
<a href="{{{action('PostsController@edit')}}}" class="btn btn-info" role="button">Edit Post</a>
@endif
<hr>
@stop


@section('bottom-script')

@stop