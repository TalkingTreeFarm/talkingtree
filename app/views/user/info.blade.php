{{-- @extends('layouts.master')

@section('title')
    <h1>{{{$user->first_name}}}'s Profile Page</h1>
@stop


@section('content')

<div class="container">
    <div class="row well">
        <div class="col-md-4">
        	<img class="img-responsive" src="/images/logo-profile.svg" alt="Sarah and Sylvain" width="200" height="100">
        </div>

        <div class="col-md-8">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Name: </td>
                        <td class="text-right">{{{ $user->fullName() }}}</td>
                    </tr>
                    <tr>
                        <td>Phone: </td>
                        <td class="text-right">{{{ $user->phone_number }}}</td>
                    </tr>
                    <tr>
                        <td>Email: </td>
                        <td class="text-right">{{{ $user->email }}}</td>
                    </tr>
                    <tr>
                        <td>Address: </td>
                        <td class="text-right">{{{ $user->address }}}</td>
                    </tr>
                    <tr>
                        <td>City: </td>
                        <td class="text-right">{{{ $user->city }}}</td>
                    </tr>
                    <tr>
                        <td>Zip Code: </td>
                        <td class="text-right">{{{ $user->zip_code }}}</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<div class="container">
<h1>{{{ $user->first_name }}}'s Order Summary</h1>

    <div class="row">
        <div class="well col-lg-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Order Placed</th>

                        @if(Auth::user()->isAdmin())
                            <th>Ordered By</th>
                        @endif

                        <th>Description</th>
                        <th>Total</th>
                        <th>Delivery Method</th>
                        <th>Prepaid</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{{ $order->id }}}</td>
                            <td>{{{ $order->created_at }}}</td>

                            @if(Auth::user()->isAdmin())
                                <td><a href="{{{ action('UsersController@userProfile', $order->user->id) }}}">{{{ $order->user->fullName() }}}
                            @endif

                            <td>{{{ $order->makeDescription() }}}</td>
                            <td>${{{ $order->total }}}</td>
                            <td>{{{ $order->delivery_method->method }}}</td>

                            @if($order->prepaid)
                                <td>Yes</td>
                            @else
                                <td>No</td>
                            @endif
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
 --}}