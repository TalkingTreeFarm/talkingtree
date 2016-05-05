<?php

class OrdersController extends \BaseController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::user()->isAdmin())
		{
			$orders = Order::all();
		}
		else
		{
			$user_id = Auth::id();
			$orders = Order::where('user_id',$user_id)->get();
		}
		return View::make('orders.index', compact('first_name', 'orders', 'timestamp'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created order in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        // dd(Input::all());
        $validator = Validator::make(Input::all(), Order::$rules);

        if($validator->fails())
        {
            Session::flash('errorMessage', "Failed to submit order: Please check all required fields");
            Log::error('Created On: ' . date('m/d/Y h:i:s a'), ['order' => $data]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        $order = new Order;
        $order->user_id = Auth::id();
        $order->total = Input::get('total');
        $order->delivery_method_id = Input::get('delivery');
        $order->pending = true;
        $order->save();

        if(Input::get('quantity-eggs') > 0)
        {
            $order->products()->attach([Input::get('size') => ['amount' => Input::get('quantity-baskets')], 3 => ['amount' => Input::get('quantity-eggs')]]);
        }
        else
        {
            $order->products()->attach([Input::get('size') => ['amount' => Input::get('quantity-baskets')]]);
        }

        Log::info('Created On: ' . date('m/d/Y h:i:s a'), ['order' => $order]);
        return Redirect::action('OrdersController@show', $order->id);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
        $order = Order::find($id);

        if(!$order)
        {
            App::abort(404);
        }

        return View::make('orders.confirm')->with('order', $order);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function test()
	{
		dd(Input::all());
	}
    
    /**
	 * Confirms the order against inventory
	 * Confirms the payment method against delivery method
	 *
	 * @param  int  $id
	 * @return Response
	 */
    public function confirm($id)
    {
        $passed = true;
        $order = Order::find($id);

        // Check Order Against Inventory
        foreach($order->order_products as $order_product)
        {
            $product = $order_product->product;

            if($product->checkInventory($order_product))
            {
                $passed = false;
            }
        }

        if($passed && $order->isVerified())
        {
            $order->pending = false;
            Product::updateInventory($order);

            Session::flash('successMessage', "Order reserved successfully!");
            return Redirect::action('OrdersController@index');
        }
        else if(!$order->isVerified())
        {
            Session::Flash('errorMessage', "This delivery method requires online payment");
            return Redirect::action('OrdersController@show', $order->id);
        }
        else if(!$passed)
        {
            Session::flash('errorMessage', "Not enough inventory to fill your order");
            return Redirect::action('ProductsController@index');
        }
    }
}
