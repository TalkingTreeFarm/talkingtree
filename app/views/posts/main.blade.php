@extends('layouts.master')

@section('title')
<h1>Main</h1>
@stop

    @section('content')

    @foreach($posts as $post)
        <h2><a href="{{{ action('PostsController@show', $post->id)}}}">{{{$post->title}}}</a></h2>
        {{$post->body}}
        <p>Created on {{{$post->created_at->setTimezone('America/Chicago')->format('m/j/y')}}}</p>
        <p>Written by {{{$post->user->first_name . " " . $post->user->last_name}}}</p>
    @endforeach

	{{ $posts->links() }}
    
    @stop