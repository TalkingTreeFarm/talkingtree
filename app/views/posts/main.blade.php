@extends('layouts.master')

@section('top-script')
<link rel="stylesheet" type="text/css" href="/assets/css/postslabels.css">
<link rel="stylesheet" type="text/css" href="/assets/css/posts.css">

@stop

@section('content')

  <div class="container">
      <div class="col-xs-6 col-sm-4">
        <div class="dropdown">
          <button class="btn btn-primary btn-xs outline dropdown-toggle" color="purple" type="button" data-toggle="dropdown">Categories
          <span class="caret"></span></button>
            <ul class="dropdown-menu dropdown-menu-left">
              <li><a href="{{{ action('PostsController@index') }}}?category_id=1">Composting</a></li>
              <li><a href="{{{ action('PostsController@index') }}}?category_id=2">General Farming</a></li>
              <li><a href="{{{ action('PostsController@index') }}}?category_id=3">Experiments</a></li>
              <li><a href="{{{ action('PostsController@index') }}}">All</a></li>
            </ul>
        </div>
      </div>
      <div class="col-xs-6 col-sm-4 text-center">
        <h3>Tips & Tricks</h3>
      </div>
      <div class="col-xs-6 col-sm-4">
        @if (Auth::check()&& Auth::user()->isAdmin())
        <a href="{{{action('PostsController@create')}}}" class="btn btn-primary btn-xs outline" role="button">Add Posts</a>
        @endif
      </div>
  </div>
  <hr>
  {{-- <div class="row text-center"> --}}
    <div class="col-sm-12 well"> 
      <div class="row">  
        @foreach ($posts as $post)
          {{-- <div class="col-xs-6 col-sm-4"> --}}
        <div class="col-md-4">  
          <div class="grid-block-container">
            <div class="grid-block slide">
                <div align="center" class="caption">
                  <a class="caption-link" href="{{{ action('PostsController@show', $post->id) }}}">
                  {{{$post->title}}}</a>
                </div>
                <img src="{{{$post->image}}}" class="img-rounded center-block images"> 
            </div>
          </div>
        </div>
           {{-- </div>  --}}
          @endforeach
        </div> 
    </div>        
  {{-- </div> --}}
  <hr>
  <div align="center" class"container">
    <nav id="Page">
      <ul class="paginate">{{$posts->links()}}</ul>
    </nav>
  </div>


@stop


@section('bottom-script')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="/assets/js/postslabels.js"></script>

@stop
