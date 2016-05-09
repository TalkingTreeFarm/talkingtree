@extends('layouts.master')

@section('title')
    <h1>{{{ Auth::user()->first_name }}}'s Order History</h1>
@stop

@section('content')
    <div class="container">

        <div class="row">
            <div class="well col-sm-12">
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
                            @if(!$order->pending)
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
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@stop

@section('bottom-script')
    <script type="text/javascript" src="/assets/js/order-index.js"></script>
@stop
