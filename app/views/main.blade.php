@extends('layouts.master')


@section('content')

{{-- about us --}}    
        <div class="col-sm-12 well">
            {{-- <div class="col-xs-6"> --}}
            <div class="col-sm-5">
                <br><img class="img-responsive" src="/images/sarah_sylvain.jpg" alt="Sarah and Sylvain" width="auto" height="250">
            </div>
            <div class="col-sm-6">
                <br><p><b>Talking Tree Farm practices sustainable agriculture in Converse, Texas.</b></p> 
                <p>Following the natural farming methods of permaculture inspired by Masanobu Fukuoka, Bill Mollison, Geoff Lawton and so many others, we implement a well thought-out system so that an edible living ecosystem will sustain itself. There is a huge focus on building and feeding the soil. No 'cides (pesticide, herbicide, insecticide, or any other store-bought product). We use companion planting, worm farms, different composts, and compost teas. No till gardening. There are swells and multiple ponds. Donkeys, horses, and dogs. Pastured chickens, ducks, and turkeys. The farm runs on 100% solar energy. We do heirloom seed saving and sharing.</p>
                <p>Volunteers are always welcome to come learn by application. To feed our farm fresh families, we attend farmers markets and deliver weekly produce and eggs at pick-up locations for 6 or more orders. We thank you for showing interest in Talking Tree Farm, and we hope you sign up for a basket this week to nourish your body and help support the project.</p>
            </div>
        </div>
    <div>
        <div class="col-sm-12 well">
            <h2 class="text-center">Education</h2>
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-md-4">
                    <a href="{{{ action('PostsController@show', $post->id) }}}">
                        <img class=" img-circle center-block" src="{{{$post->image}}}" width="300" height="300">
                    </a>
                    <h3 class="text-center">{{{$post->title}}}</h3>
                    </div> 
                    @endforeach  
                </div>
                <hr> {{-- space between pics and button --}}
            <div class="text-center">
                <a href="{{{ action('PostsController@index') }}}" role="button" class="btn btn-lg btn-success">Tips & Tricks</a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 well">
        <h2 class="text-center">This Week’s Farm Fresh Basket</h2>
            <div class="row">
                <div class="col-xs-4">
                    <img class="img-responsive images" src="/images/samplebasket1.jpg" alt="Basket 2 at People's Nite Market">
                </div>
                <div class="col-xs-4">
                    <img class="img-responsive images" src="/images/sampleproduce1_reduced.jpg" alt="Vegetables">
                </div>
                <div class="col-xs-4">
                    <img class="img-responsive images" src="/images/samplebasket3_reduced.jpg" alt="Basket of Vegetables">
                </div>
            </div>
        <hr> {{-- space between pics and button --}}    
        <div class="text-center">
            <a href="{{{ action('ProductsController@index') }}}" role="button" class="btn btn-lg btn-success">Order your basket</a>
        </div>
    </div>
@stop