@extends('layouts.master')

@section('title')
    <h1>{{{ Auth::user()->first_name }}}'s Order History</h1>
@stop

@section('content')
    <div class="container">

        <div class="row">
            <div class="well col-lg-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Order Placed</th>
                            <th>Total</th>

                            @if(Auth::user()->isAdmin())
                                <th>Ordered By</th>
                            @endif

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

                                @if(Auth::user()->isAdmin())
                                    <td><a href="{{{ action('UsersController@userShow', $order->user->id) }}}">{{{ $order->user->fullName() }}}
                                @endif

                                {{-- <td>{{{ $order->payment_method }}}</td> --}}
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
    <script type="text/javascript" src="/assets/js/order-index.js"></script>
@stop
