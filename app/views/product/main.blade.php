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
            <div class="col-md-4">
                <img src="images/basket.jpg" alt="Basket Image" width="100%" height="100%"/>

                <p>*Required</p>
            </div>
            <!-- Selection Dropdowns -->
            <div class="col-lg-3">
                <form id="basket-order" class="form-group" action="{{{ action('OrdersController@store') }}}" method="post">
                    {{ Form::token() }}

                    <label for="size">Basket Size</label>
                    <select id="size" name="size" class="form-control">
                        @foreach($products as $product)
                            @if($product->visible && $product->name != "No Basket")
                                <option id="{{{ strtolower(str_replace(" ", "-", $product->name)) }}}" value="{{{ $product->id }}}" data-amount="{{{ $product->amount }}}" data-price="{{{ $product->price }}}">{{{ $product->name }}} - {{{ $product->amount }}} left - ${{{ $product->price }}}</option>
                            @elseif($product->visible && $product->name == "No Basket")
                                <option id="{{{ strtolower(str_replace(" ", "-", $product->name)) }}}" value="{{{ $product->id }}}" data-amount="{{{ $product->amount }}}" data-price="{{{ $product->price }}}">{{{ $product->name }}}</option>
                            @endif
                        @endforeach
                    </select>

                    @foreach($products as $product)
                        @if($product->name == "Eggs")
                            <!-- Hidden Attribute For Eggs -->
                            <input id="eggs" type="hidden" data-amount="{{{ $product->amount }}}" data-price="{{{ $product->price }}}"></input>
                        @endif
                    @endforeach

                    <label for="quantity">Quantity of Baskets</label>
                    <div class="input-group form-group-options quantity-wrapper">
                        <span id="basket-sub" class="input-group-addon input-group-addon-remove quantity-remove btn">
                            <span class="glyphicon glyphicon-minus"></span>
                        </span>

                        <input id="quantity-baskets" type="text" name="quantity-baskets" class="form-control quantity-count text-center" value="0">

                        <span id="basket-add" class="input-group-addon input-group-addon-remove quantity-add btn">
                            <span class="glyphicon glyphicon-plus"></span>
                        </span>
                    </div>

                    <label id="eggs-label" for="eggs">Eggs (By Dozen)</label>
                    <div class="input-group form-group-options quantity-wrapper">
                        <span id="egg-sub" class="input-group-addon input-group-addon-remove quantity-remove btn">
                            <span class="glyphicon glyphicon-minus"></span>
                        </span>

                        <input id="quantity-eggs" type="text" name="quantity-eggs" class="form-control quantity-count text-center" value="0">

                        <span id="egg-add" class="input-group-addon input-group-addon-remove quantity-add btn">
                            <span class="glyphicon glyphicon-plus"></span>
                        </span>
                    </div>

                    <label for="delivery">Delivery Type*</label>
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
            <div class="col-lg-4 col-md-offset-1">
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
                            <span class="item-desc">Delivery Type:</span>
                            <span id="delivery-method" class="item-amount">Not Selected</span><br>
                            <span id="delivery-disclaimer" class="item-disclaimer text-hide">*This delivery type requires advanced payment</span>
                        </li>
                        <li class="summary-item">
                            <span class="item-desc">Order Total:</span>
                            <span id="order-sum" class="item-amount">0</span><br>
                            <!-- <span class="item-disclaimer">*Taxes may apply</span> -->
                        </li>
                    </ul>
                </div>
                <button type="submit" name="checkout" form="basket-order" class="btn btn-success col-lg-12">Proceed To Checkout</button>
            </div>
        </div>

    </div>
@stop

@section('bottom-script')
    <script type="text/javascript" src="/assets/js/products.js"></script>
@stop
