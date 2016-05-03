@extends('layouts.master')

@section('title')
    <h1>Order Summary</h1>
@stop

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-5">
                <div class="well">
                    <ul class="order-summary">
                        @foreach($order->queryProducts() as $order_product)
                            @if($order_product->product->name == "Eggs")
                                <li class="summary-item">
                                    <span class="item-desc">{{{ $order_product->product->name }}}:</span>
                                    <span class="item-amount">{{{ $order_product->amount }}} Dozen</span>
                                </li>
                            @else
                                <li class="summary-item">
                                    <span class="item-desc">{{{ $order_product->product->name }}}:</span>
                                    <span class="item-amount">{{{ $order_product->amount }}}</span>
                                </li>
                            @endif
                        @endforeach
                        <li class="summary-item">
                            <span class="item-desc">Delivery Method:</span>
                            <span id="delivery-method" class="item-amount">{{{ $order->delivery_method }}}</span><br>
                            <span id="delivery-disclaimer" class="item-disclaimer text-hide">*This delivery method requires Paypal</span>
                        </li>
                        <li class="summary-item">
                            <span class="item-desc">Order Total:</span>
                            <span id="order-sum" class="item-amount">${{{ $order->total }}}</span><br>
                            <!-- <span class="item-disclaimer">*Taxes may apply</span> -->
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@stop
