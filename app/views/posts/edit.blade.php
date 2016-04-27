@extends('layouts.master')

@section('title')
<h1>Edit</h1>
@stop

@section('top-script')
	<link rel="stylesheet" href="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@stop

@section('bottom-script')
	<script src="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

	<script>
		var simplemde = new SimpleMDE({
			element: document.getElementById("body")
		});
	</script>
@stop 

@section('content')
	{{ Form::model($post, array('action' => array('PostsController@update', $post->id), 'method' => 'PUT', 'files' => true)) }}

	{{ Form::label('title', 'Title') }}
	{{ Form::text('title', $post->title, ['placeholder'=>'Title']) }}
	{{ $errors->first('title', '<span class="help-block">:message</span>') }}
	<br>
	{{ Form::label('body', 'Body,') }}
	{{ Form::textarea('body', $post->body, ['placeholder'=>'Body']) }}
	{{ $errors->first('body', '<span class="help-block">:message</span>') }}

	@if($post->image)
    	<img src="{{{$post->image}}}">
    @endif 

   	<div class="form-group">
		{{ Form::label('image', 'Attach image') }}
		{{ Form::file('image') }}
	</div>

	@if ($errors->has('image'))
	<p> {{ $errors->first('image', '<span class="help-block">:message</span>') }}
	@endif

	{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
	{{ Form::close() }}

	<br>

	{{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'DELETE')) }}
    {{ Form::submit('Delete post', ['class' => 'btn btn-danger']) }}
	{{ Form::close() }}
@stop