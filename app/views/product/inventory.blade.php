@extends('layouts.master')

@section('title')
    <h1>Talking Tree Farm Inventory</h1>
@stop

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-lg-4">
                <h3>Inventory Overview</h3>
            </div>
            <div class="col-lg-4">
                <h3>Change Current Inventory</h3>
            </div>
            <div class="col-lg-4">
                <h3>Set Prices</h3>
            </div>
        </div>

        <div class="row">
            <!-- Inventory Overview -->
            <div class="col-md-3">
                <div class="well">
                    <ul>
                        @foreach($products as $product)
                            <li class="summary-item">
                                <span class="item-desc">{{{ $product->name }}}:</span>

                                @if($product->name == "Eggs")
                                    <span class="item-amount">{{{ $product->amount }}} dozen</span>
                                @else
                                    <span class="item-amount">{{{ $product->amount }}}</span>
                                @endif

                            </li>
                            <li class="item-price"> ${{{ $product->price }}} ea.</li>
                        @endforeach
                    </ul>
                </div>

                <button type="submit" name="update" form="update-inventory" class="col-md-12 btn btn-success">Update Inventory</button>
            </div>

            <!-- Add New Inventory -->
            <form id="update-inventory" class="form-group" action="" method="post">
                <div class="col-lg-3 col-lg-offset-1">
                    @foreach ($products as $product)
                        @if($product->name == "Eggs")
                            <label for="{{{ strtolower($product->name) }}}">{{{ $product->name }}} (By Dozen)</label>
                        @else
                            <label for="{{{ strtolower($product->name) }}}">{{{ $product->name }}}</label>
                        @endif

                        <div class="input-group form-group-options quantity-wrapper">
                            <span id="" class="input-group-addon input-group-addon-remove quantity-remove btn">
                                <span class="glyphicon glyphicon-minus"></span>
                            </span>

                            <input id="" type="number" min="0" step="1" name="" class="form-control quantity-count" value="0">

                            <span id="" class="input-group-addon input-group-addon-remove quantity-add btn">
                                <span class="glyphicon glyphicon-plus"></span>
                            </span>
                        </div>
                    @endforeach
                </div>

            <!-- Set Prices -->
                <div class="col-lg-3 col-lg-offset-1">
                    <form class="form-group" action="" method="post">
                        @foreach ($products as $product)
                            @if($product->name == "Eggs")
                                <label for="{{{ strtolower($product->name) }}}">{{{ $product->name }}} (By Dozen)</label>
                            @else
                                <label for="{{{ strtolower($product->name) }}}">{{{ $product->name }}}</label>
                            @endif

                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input type="number" min="0.00" step="1" class="form-control" aria-label="Amount (to the nearest dollar)">
                                <span class="input-group-addon">.00</span>
                            </div>
                        @endforeach
                    </form>
                </div>
            </form>
        </div>

    </div>
@stop

@section('bottom-script')
    {{-- <script type="text/javascript" src="/assets/js/products.js"></script> --}}
@stop
