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
<hr>
@stop


@section('bottom-script')

@stop