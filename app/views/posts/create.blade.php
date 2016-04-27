@extends('layouts.master')

@section('title')
<h1>Create</h1>
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


@stop