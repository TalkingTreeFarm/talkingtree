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
        <div class="col-xs-12 well">
            <h2 class="text-center">Education</h2>
                <div class="row">
                    @foreach ($posts as $post)
                    <div class="col-sm-4">
                    <a href="{{{ action('PostsController@show', $post->id) }}}">
                        <img class="img-responsive" src="{{{$post->image}}}" alt="" width="auto" height="250">
                    </a>
                    <!-- <p>{{{ substr($post->body, 0, 60) }}}</p> -->
                    </div> 
                    @endforeach  
                </div>
                <hr> {{-- adds space between the pics and the button --}}
            <div class="text-center">
                <a href="{{{ action('PostsController@index') }}}" role="button" class="btn-lg btn btn-success .active">Tips & Tricks</a>
            </div>
        </div>
    </div>
    <div class="col-xs-12 well">
        <h2 class="text-center">This Week’s Farm Fresh Basket</h2>
        <div class="col-sm-5">
            <div class="row">
                <div class="col-xs-6">
                    <img class="img-responsive" src="/images/sarahNiteMarket.jpg" alt="Sarah Clavieres at People's Nite Market" width="auto" height="250">
                </div>
                <div class="col-xs-6">
                    <img class="img-responsive" src="/images/samplebasket2.jpg" alt="Basket 1 at People's Nite Market" width="auto" height="250">
                </div>
            </div>
            &nbsp;&nbsp;&nbsp;
        </div>
            {{-- <div class="text-right text-no-wrap"> --}}
                {{-- @foreach ($products as $product) --}}
                {{-- <p>{{{$product->name}}}</p> --}}
                {{-- <p>{{{$product->description}}}</p> --}}
                {{-- @endforeach --}}
            {{-- </div> --}}
        <div class="col-sm-3 text-center">
            <a href="{{{ action('ProductsController@index') }}}" role="button" class="btn btn-success">Order your basket</a>
        </div>
        <div class="col-sm-4">
            <img class="img-responsive" src="/images/samplebasket1.jpg" alt="Basket 2 at People's Nite Market" width="auto" height="250">
        </div>
    </div> 
@stop

