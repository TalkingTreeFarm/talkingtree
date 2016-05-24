@extends('layouts.master')

@section('title')
    <h1>Order Summary</h1>
@stop

@section('content')
    <div class="container">

        <!-- Hidden input for requiring address -->
        <input type="hidden" name="requireAddress" value="{{{ $address }}}">

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
                            @if($address == 1 && $order->user->address == null)
                                <br><span id="address-disclaimer" class="item-disclaimer" data-required="true">*This delivery method requires an address on file</span>
                            @endif
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
                <button id="address-button" type="button" name="address-button" class="btn btn-warning checkout-button hidden">Add Address</button>
            </div>
        </div>

        <!-- Address Modal -->
        <div id="address-modal" class="modal fade" role="dialog">
            <div class="modal-dialog" style="background: #F2F2F4; color: black; border-radius: 10px;">
                <div class="modal-content" style="background: #F1F1F3; box-shadow: none; border-bottom: solid 1px black">
                    <div class="modal-header">
                        <h3 style="color: black; text-align: center">Address Details</h3>
                    </div>
                </div>

                <div class="modal-body">
                    <form id="address-form" class="form-horizontal" action="{{{ action('UsersController@updateAddress', $order->user_id) }}}" method="post" role="form">

                        <!-- Line 1 -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="address">Address</label>
                            <div class="col-sm-10">
                                <input type="text" name="address" placeholder="Address Line 1" class="form-control">
                            </div>
                        </div>

                        <!-- City -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="city">City</label>
                            <div class="col-sm-10">
                                <input type="text" name="city" placeholder="City" class="form-control">
                            </div>
                        </div>

                        <!-- Zip Code -->
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="zip">Zip Code</label>
                            <div class="col-sm-4">
                                <input type="text" name="zip" placeholder="Zip Code" class="form-control">
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="modal-footer">
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>

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
