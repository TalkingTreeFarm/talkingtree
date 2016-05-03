@extends('layouts.master')

@section('title')
<h1>Create</h1>
@stop

@section('top-script')
	<link rel="stylesheet" href="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
@stop

@section('content')


	{{ Form::open(array('action' => 'PostsController@store', 'files' => true)) }}


	{{ Form::label('title', 'Title') }}
	{{ Form::text('title', null, ['placeholder'=>'Title']) }}
	{{ $errors->first('title', '<span class="help-block">:message</span>') }}
	<br>
	{{ Form::label('body', 'Body') }}
	{{ Form::textarea('body', null, ['placeholder'=>'Body', 'class'=>'hide', 'id' => 'body']) }}
	{{ $errors->first('body', '<span class="help-block">:message</span>') }}
	<select name="category_id">
		<option disabled selected value="">Select Category</option>}
		option
		@foreach($categories as $category)
		<option value="{{{$category->id}}}">{{{$category->name}}}</option>
		@endforeach	
	</select>
	<hr>
	<div class="form-group">
		{{ Form::label('image', 'Image') }}
		{{ Form::file('image') }}
	</div>
	@if ($errors->has('image'))
	<p> {{ $errors->first('image', '<span class="help-block">:message</span>') }}
	@endif

	{{-- <input type="submit"> --}}
	{{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
	{{ Form::close() }}


	

@stop

@section('bottom-script')
	<script src="//cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script>
		var simplemde = new SimpleMDE({
			element: document.getElementById("body")
		});
	</script>
@stop 

@section('content')


@stop