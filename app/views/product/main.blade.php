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
            </div>
            <!-- Selection Dropdowns -->
            <div class="col-lg-3">
                <div class="form-group">
                    <label for="size">Size*</label>
                    <select class="form-control">
                        <option value="0" selected>Select Size</option>
                        <option value="1">Small - $12</option> <!-- Replace price with $price -->
                        <option value="2">Large - $20</option> <!-- Replace price with $price -->
                    </select>

                    <label for="quantity">Quantity*</label>
                    <div class="input-group form-group-options quantity-wrapper">
                        <span  class="input-group-addon input-group-addon-remove quantity-remove btn">
                            <span class="glyphicon glyphicon-minus"></span>
                        </span>

                        <input type="text" name="quantity" class="form-control quantity-count" placeholder="1">

                        <span class="input-group-addon input-group-addon-remove quantity-add btn">
                            <span class="glyphicon glyphicon-plus"></span>
                        </span>
                    </div>

                    <label for="eggs">Eggs (By Dozen)</label>
                    <div class="input-group form-group-options quantity-wrapper">
                        <span  class="input-group-addon input-group-addon-remove quantity-remove btn">
                            <span class="glyphicon glyphicon-minus"></span>
                        </span>

                        <input type="text" name="quantity" class="form-control quantity-count" placeholder="1">

                        <span class="input-group-addon input-group-addon-remove quantity-add btn">
                            <span class="glyphicon glyphicon-plus"></span>
                        </span>
                    </div>

                    <label for="delivery">Delivery Method*</label>
                    <select class="form-control">
                        <option value="0" selected>Select Method</option>
                        <option value="1">Pickup</option>
                        <option value="2">Home Delivery</option> <!-- Add note to summary with Paypal disclaimer -->
                    </select>
                </div>
            </div>
        </div>

    </div>
@stop
