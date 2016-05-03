@extends('layouts.master')


@section('content')

{{-- about us --}}
        <div class="col-md-12 well">
            <h2 class="text-center">Our Story</h2>
            <div class="col-md-4">
                <a href="#">
                    <img class="img-responsive" src="/images/sarah_sylvain.jpg" alt="Sarah and Sylvain" width="300" height="200">
                </a>
            </div>
            <div class="col-md-6">
                {{-- <h4>Subheading</h4> --}}
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde.</p>
                <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium veniam exercitationem expedita laborum at voluptate. Labore, voluptates totam at aut nemo deserunt rem magni pariatur quos perspiciatis atque eveniet unde. </p>
            </div>
        </div>
    <div>
        <div class="col-md-12 well">
            <h2 class="text-center">Education</h2>
                <div class="carousel slide">
                    <div class="col-md-4">
                        <a href="#">
                            <img class="img" src="http://placehold.it/300x200" alt="">
                        </a>
                    </div>
                </div>
                <div class="text-right text-no-wrap">
                    
                    @foreach ($posts as $post)
                    <p>{{{$post->title}}}</p>
                    @endforeach
                </div>
                <button type="button" color="purple" class="btn-lg btn btn-success .active">Tips & Tricks</button>
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
                <button type="button" color="purple" class="btn-lg btn btn-success .active">Order Your Basket</button>
        </div>
    </div>
        {{-- close container --}}
    </div>  
    
@stop