@extends('layouts.master')

@section('title')
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Education and Training!</title>

@stop

@section('content')
<div class="container">
    <div class="col-lg-10 col-lg-offset-1">
        @foreach ($posts as $post)
            <a href="{{{ action('PostsController@show', $post->id) }}}"><img src="http://www.fillmurray.com/300/300" alt=""></a>
        @endforeach
    </div>
</div>
@stop


@section('bottom-script')

@stop
