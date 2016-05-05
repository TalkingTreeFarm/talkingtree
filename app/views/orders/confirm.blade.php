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
                            <span id="delivery-method" class="item-amount">{{{ $order->delivery_method->method }}}</span><br>
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

            <div class="btn-group-vertical col-lg-4">
                <a id="reserve-button" name="reserve-button" href="{{{ action('OrdersController@confirm', $order->id) }}}" class="btn btn-success checkout-button">Reserve For Pickup</a>
                <form action="{{action('OrdersController@test')}}" method="POST">

              <script
                src="https://checkout.stripe.com/checkout.js" class="stripe-button col-md-12"
                data-key="pk_test_P7veIbiSGJu3ivKPbWivMYcn"
                data-amount="2500"
                data-name="Talking Tree Farm"
                data-description="Large Basket"
                data-image="/images/logo.svg"
                data-locale="auto">
              </script>
                </form>

            </div>
        </div>

    </div>
@stop

@section('bottom-script')
    <script type="text/javascript" src="/assets/js/confirm.js"></script>
@stop
