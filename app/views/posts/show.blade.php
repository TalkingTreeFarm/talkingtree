@extends('layouts.master')

@section('title')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Details</title>

@stop

@section('content')

<div class="container">
	<h1>{{{$post->title}}}</h1>
	<img src="{{{$post->image}}}" alt="" width="300" height="300">
	<hr>
	<div class="col-xs-12 well">
	<p>{{$post->htmlBody()}}</p>
	<div>
		
	</div>
	
	<span class="meta">Updated {{{$post->updated_at->diffForHumans()}}}</span>
</div>
</div>
<hr>
<div class="container">
<div class="row">
<div class="col-md-6">
@if (Auth::check()&& Auth::user()->isAdmin())
{{ Form::model($post, array('action' => array('PostsController@destroy', $post->id), 'method' => 'DELETE')) }}  <button class="btn-lg btn btn-success" type="submit">Delete this Post!</button>
</div>
<div class="col-med-6">
<a href="{{{action('PostsController@edit', $post->id)}}}" class="btn-lg btn btn-success" role="button" style="float:right;">Edit Post</a>
</div>
</div>
</div>
@endif
@stop
	
@section('bottom-script')

@stop