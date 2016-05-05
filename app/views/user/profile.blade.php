@extends('layouts.master')

@section('title')

@stop


@section('content')
 <h1>{{{$user->first_name}}}'s Profile Page</h1>

 <div class="container">
	        <div class="row well">
	            <div class="col-lg-4">
	            	<img class="img-responsive" src="/images/logo-profile.svg" alt="Sarah and Sylvain" width="200" height="100">
	            </div>
	            <div class="col-lg-8">
	            	<h4>First Name - {{{$user->first_name}}}</h4>
	            	<h4>Last Name - {{{$user->last_name}}}</h4>
	            	<h4>Phone Number - {{{$user->phone_number}}}</h4>
	            	<h4>Email - {{{$user->email}}}
	            	<br>
	            	<br>
	            	<br>
	            	<h4>Address - <address>{{{$user->address}}}<br>{{{$user->zip_code}}}<br>{{{$user->city}}}</address></h4>
				</div>
	            </div>
	        </div>





 <h1>{{{ Auth::user()->first_name }}}'s Order History</h1>
 <div class="container">

        <div class="row">
            <div class="well col-lg-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order Placed</th>
                            <th>Total</th>

                            {{-- <th>Payment Method</th> --}}
                            <th>Delivery Method</th>
                            <th>Order #</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{{ $order->created_at }}}</td>
                                <td>${{{ $order->total }}}</td>

                                <td>{{{ $order->delivery_method->method }}}</td>
                                <td>{{{ $order->id }}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@stop


@section('bottom-script')

@stop
