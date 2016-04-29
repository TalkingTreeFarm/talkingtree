@extends('layouts.master')


@section('content')
    <div class="container">
{{-- header --}}
        <div class="row">
            <div class="col-lg-12">
{{--                 <h1 class="page-header">Page Heading
                    <small>Secondary Text</small> --}}
                </h1>
            </div>
        </div>

{{-- about us --}}
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                   
                </a>
            </div>
            <div class="col-md-5">
                <h3>Our Story</h3>
                {{-- <h4>Subheading</h4> --}}
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde. </p>
                @foreach ($posts as $post)
                <p>{{{$post->title}}}</p>
                <p>{{{$post->body}}}</p>
                @endforeach
            </div>
        </div>

        {{-- close container --}}
	</div>  
@stop