@extends('layouts.master')

@section('title')
    <h1>Order Summary</h1>
@stop

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-sm-5">
                <div class="well">
                    <ul class="order-summary">
                        @foreach($order->queryProducts() as $order_product)
                            @if($order_product->product->name == "Eggs")
                                <li class="summary-item">
                                    <span id="eggs-desc" class="item-desc" data-desc="{{{ $order_product->product->name }}}" data-image="{{{ $order_product->product->image }}}">{{{ $order_product->product->name }}}:</span>
                                    <span id="eggs-amount" class="item-amount">{{{ $order_product->amount }}} Dozen</span>
                                </li>
                            @else
                                <li class="summary-item">
                                    <span id="item-desc" class="item-desc" data-desc="{{{ $order_product->product->name }}}" data-image="{{{ $order_product->product->image }}}">{{{ $order_product->product->name }}}:</span>
                                    <span id="item-amount" class="item-amount">{{{ $order_product->amount }}}</span>
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
                            <span id="order-sum" class="item-amount" data-total="{{{ $order->total }}}">${{{ $order->total }}}</span><br>
                            <!-- <span class="item-disclaimer">*Taxes may apply</span> -->
                        </li>
                    </ul>
                </div>
            </div>

            <div class="btn-group-vertical confirm-buttons col-sm-4">
                <a id="reserve-button" name="reserve-button" href="{{{ action('OrdersController@confirm', $order->id) }}}" class="btn btn-success checkout-button">Reserve For Pickup</a>
                <button id="stripeButton" type="button" name="purchase" class="btn btn-warning checkout-button">Pay With Card</button>
            </div>
        </div>

        <!-- Submit Stripe Token To Server -->
        <form id="stripe-payment" class="" action="{{{ action('OrdersController@confirm', $order->id) }}}" method="post">
            <input id="stripe-token" type="hidden" name="stripe-token" value="">
        </form>

    </div>
@stop

@section('bottom-script')
    <script type="text/javascript" src="/assets/js/confirm.js"></script>
    <script type="text/javascript" src="https://checkout.stripe.com/checkout.js"></script>
    <script>
        var handler = StripeCheckout.configure({
            key: "pk_test_LXzhKUj7LLAuNzcCttabDVxt",
            image: '/images/logo-profile.svg',
            locale: 'auto',
            token: function(token) {
                // Access token ID with `token.id`
                // Get token ID to server-side code for use
                $('#stripe-token').val(token.id);
                $('#stripe-payment').submit();
            }
        });

        $('#stripeButton').on('click', function(e) {
            // More options for Checkout
            handler.open({
                name: "Talking Tree Farm",
                description: "Local, farm fresh, organic produce!",
                amount: ($('#order-sum').data('total') * 100),
                currency: "USD"
            });

            e.preventDefault();
        });

        // Close Checkout on page navigation
        $(window).on('popstate', function() {
            handler.close();
        });
    </script>
@stop
