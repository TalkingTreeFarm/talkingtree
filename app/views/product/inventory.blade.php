@extends('layouts.master')

@section('title')
    <h1>Talking Tree Farm Inventory</h1>
@stop

@section('content')
    <div class="container">

        {{-- <div class="row">
            
        </div>
 --}}
        <div class="row">
            <!-- Inventory Overview -->
            <div class="col-sm-4">
                <h3>Inventory Overview</h3>
                <div id="inventory-overview" class="col-md-3">
                    <div class="well">
                        <ul class="order-summary">
                            @foreach($products as $product)
                                @if($product->name != "No Basket")
                                    <li class="summary-item">
                                        <span class="item-desc">{{{ $product->name }}}:</span>

                                        @if($product->name == "Eggs")
                                            <span class="item-amount">{{{ $product->amount }}} dozen</span>
                                        @else
                                            <span class="item-amount">{{{ $product->amount }}}</span>
                                        @endif

                                    </li>
                                    <li class="item-price"> ${{{ $product->price }}} ea.</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                    <button type="submit" name="update" form="update-inventory" class="col-md-12 btn btn-success">Update Inventory</button>
                </div>
            </div>

            <!-- Change Current Inventory -->
            <div class="col-sm-4">
                <h3>Change Current Inventory</h3>
            
            <form id="update-inventory" class="form-group" action="{{{ action('ProductsController@updateAll') }}}" method="post">
                {{ Form::token() }}

                <div class="col-sm-3 col-sm-offset-1 product-form">
                    @foreach ($products as $product)
                        @if($product->name != "No Basket")
                            @if($product->name == "Eggs")
                                <label for="{{{ strtolower(str_replace(" ", "-", $product->name)) }}}">{{{ $product->name }}} (By Dozen)</label>
                            @else
                                <label for="{{{ strtolower(str_replace(" ", "-", $product->name)) }}}">{{{ $product->name }}}</label>
                            @endif

                            <div class="input-group form-group-options quantity-wrapper">
                                <span id="{{{ strtolower(str_replace(" ", "-", $product->name)) }}}-remove" class="input-group-addon input-group-addon-remove quantity-remove btn">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </span>

                                <input id="{{{ strtolower(str_replace(" ", "-", $product->name)) }}}-amount" type="number" min="0" step="1" name="{{{ strtolower(str_replace(" ", "-", $product->name)) }}}-amount" class="form-control quantity-count text-center" placeholder="{{{ $product->amount }}}">
                                <input type="hidden" name="{{{ strtolower(str_replace(" ", "-", $product->name)) }}}-id" value="{{{ $product->id }}}">

                                <span id="{{{ strtolower(str_replace(" ", "-", $product->name)) }}}-add" class="input-group-addon input-group-addon-remove quantity-add btn">
                                    <span class="glyphicon glyphicon-plus"></span>
                                </span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            <!-- Set Prices -->
            <div class="col-sm-4">
                <h3>Set Prices</h3>
                <div class="col-sm-3 col-sm-offset-1 product-form">
                    @foreach ($products as $product)
                        @if($product->name != "No Basket")
                            @if($product->name == "Eggs")
                                <label for="{{{ strtolower(str_replace(" ", "-", $product->name)) }}}">{{{ $product->name }}} (By Dozen)</label>
                            @else
                                <label for="{{{ strtolower(str_replace(" ", "-", $product->name)) }}}">{{{ $product->name }}}</label>
                            @endif

                            <div class="input-group">
                                <span class="input-group-addon">$</span>
                                <input type="number" min="0.00" step="1" name="{{{ strtolower(str_replace(" ", "-", $product->name)) }}}-price" class="form-control text-center" aria-label="Amount (to the nearest dollar)" placeholder="{{{ $product->price }}}">
                                <span class="input-group-addon">.00</span>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
            </form>
        </div>

    </div>
@stop

@section('bottom-script')
    <script type="text/javascript" src="/assets/js/inventory.js"></script>
@stop
