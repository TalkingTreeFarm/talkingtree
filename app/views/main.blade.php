@extends('layouts.master')


@section('content')

{{-- about us --}}    

        <div class="col-md-12 well">
            <h2 class="text-center">Our Story</h2>
            <div class="col-sm-4">
                <a href="#">
                    <img class="img-responsive" src="/images/sarah_sylvain.jpg" alt="Sarah and Sylvain" width="300" height="200">
                </a>
            </div>
            <div class="col-sm-6">
                {{-- <h4>Subheading</h4> --}}
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde. </p>
            </div>
        </div>
    <div>
        <div class="col-md-12 well">
            <h2 class="text-center">Education</h2>
                <div class="container">
                    <div class="row">
                         @foreach ($posts as $post)
                        <div class="col-xs-4">
                        <a href="{{{ action('PostsController@show', $post->id) }}}">
                            <img src="{{{$post->image}}}" alt="" width="300" height="300">
                        </a>
                        <!-- <p>{{{ substr($post->body, 0, 60) }}}</p> -->
                        </div> 
                        @endforeach
                        
                    </div>
                </div>
                <hr>
                <div class="text-center">
                <a href="{{{ action('PostsController@index') }}}" role="button" color="purple" class="btn-lg btn btn-success .active">Tips & Tricks</a>
                </div>
        </div>
    </div>


<div>
        <div class="col-md-12 well">
            <h2 class="text-center">This Week’s Farm Fresh Basket</h2>
                <div class="carousel slide">
                    <div class="col-md-4">
                        <a href="#">
                            <img class="img" src="/images/sample basket.jpg" alt="" width="300" height="200">
                        </a>
                    </div>
                </div>
                <div class="text-right text-no-wrap">
                    {{-- @foreach ($products as $product) --}}
                    {{-- <p>{{{$product->name}}}</p> --}}
                    {{-- <p>{{{$product->description}}}</p> --}}
                    {{-- @endforeach --}}
                </div>
                <a href="{{{ action('ProductsController@index') }}}" role="button" color="purple" class="btn-lg btn btn-success .active">Order your basket</a>
        </div>
    </div>
        {{-- close container --}}
    </div>  
    
@stop

