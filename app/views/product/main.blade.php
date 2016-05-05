@extends('layouts.master')

@section('title')
    <h1>Our Farm Fresh Products</h1>
@stop

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-5">
                <h3>This Week's Basket &amp; Free Range Eggs</h3>
            </div>
            <div class="col-lg-3 col-lg-offset-3">
                <h3>Order Summary</h3>
            </div>
        </div>

        <div class="row">
            <!-- Produce Icons -->
            <div class="col-lg-3">
                @for($i = 0; $i < 9; $i++)
                    <img src="http://fillmurray.com/80/80" alt="Produce Image" />
                @endfor

                <p>*Required</p>
            </div>
            <!-- Selection Dropdowns -->
            <div class="col-lg-3">
                <form id="basket-order" class="form-group" action="{{{ action('OrdersController@store') }}}" method="post">
                    {{ Form::token() }}

                    <label for="size">Size*</label>
                    <select id="size" name="size" class="form-control">
                        <option value="0" selected>Select Size</option>

                        @foreach($products as $product)
                            @if($product->visible)
                                <option id="{{{ strtolower(str_replace(" ", "-", $product->name)) }}}" value="{{{ $product->id }}}" data-amount="{{{ $product->amount }}}" data-price="{{{ $product->price }}}">{{{ $product->name }}} - {{{ $product->amount }}} left - ${{{ $product->price }}}</option>
                            @endif
                        @endforeach
                    </select>

                    @foreach($products as $product)
                        @if($product->name == "Eggs")
                            <!-- Hidden Attribute For Eggs -->
                            <input id="Eggs" type="hidden" data-amount="{{{ $product->amount }}}" data-price="{{{ $product->price }}}"></input>
                        @endif
                    @endforeach

                    <label for="quantity">Quantity*</label>
                    <div class="input-group form-group-options quantity-wrapper">
                        <span id="basket-sub" class="input-group-addon input-group-addon-remove quantity-remove btn">
                            <span class="glyphicon glyphicon-minus"></span>
                        </span>

                        <input id="quantity-baskets" type="text" name="quantity-baskets" class="form-control quantity-count" value="0">

                        <span id="basket-add" class="input-group-addon input-group-addon-remove quantity-add btn">
                            <span class="glyphicon glyphicon-plus"></span>
                        </span>
                    </div>

                    <label id="eggs-label" for="eggs">Eggs (By Dozen)</label>
                    <div class="input-group form-group-options quantity-wrapper">
                        <span id="egg-sub" class="input-group-addon input-group-addon-remove quantity-remove btn">
                            <span class="glyphicon glyphicon-minus"></span>
                        </span>

                        <input id="quantity-eggs" type="text" name="quantity-eggs" class="form-control quantity-count" value="0">

                        <span id="egg-add" class="input-group-addon input-group-addon-remove quantity-add btn">
                            <span class="glyphicon glyphicon-plus"></span>
                        </span>
                    </div>

                    <label for="delivery">Delivery Method*</label>
                    <select id="delivery" name="delivery" class="form-control">
                        <option value="0" selected>Select Method</option>

                        @foreach($deliveryMethod as $delivery)
                            <option id="delivery{{{ $delivery->id }}}" value="{{{ $delivery->id }}}">{{{ $delivery->method }}}</option>
                        @endforeach
                    </select>

                    <input id="total" type="hidden" name="total" value="">
                </form>
            </div>
            <!-- Order Summary -->
            <div class="col-lg-4 col-lg-offset-2">
                <div class="well">
                    <ul class="order-summary">
                        <li class="summary-item">
                            <span class="item-desc">Basket:</span>
                            <span id="basket-type" class="item-amount">Not Selected</span>
                        </li>
                        <li class="summary-item">
                            <span class="item-desc">Quantity:</span>
                            <span id="basket-sum" class="item-amount">0</span>
                        </li>
                        <li class="summary-item">
                            <span class="item-desc">Eggs:</span>
                            <span id="egg-sum" class="item-amount">0</span><br>
                            <span class="item-disclaimer">*By the dozen</span>
                        </li>
                        <li class="summary-item">
                            <span class="item-desc">Delivery Method:</span>
                            <span id="delivery-method" class="item-amount">Not Selected</span><br>
                            <span id="delivery-disclaimer" class="item-disclaimer text-hide">*This delivery method requires advanced payment</span>
                        </li>
                        <li class="summary-item">
                            <span class="item-desc">Order Total:</span>
                            <span id="order-sum" class="item-amount">0</span><br>
                            <!-- <span class="item-disclaimer">*Taxes may apply</span> -->
                        </li>
                    </ul>
                </div>
                <form action="" method="POST">
                  <script
                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                    data-key="pk_live_s1cUH3NSqNHOXBT2MP02y6Ll"
                    data-amount="2500"
                    data-name="Talking Tree Farm"
                    data-description="Large Basket"
                    data-image="/img/documentation/checkout/marketplace.png"
                    data-locale="auto">
                  </script>
                </form>
                <button type="submit" name="checkout" form="basket-order" class="btn btn-success col-lg-12">Proceed To Checkout</button>
            </div>
        </div>

    </div>
@stop

@section('bottom-script')
    <script type="text/javascript" src="/assets/js/products.js"></script>
@stop
