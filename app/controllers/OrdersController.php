<?php

class OrdersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{

		if(Auth::check())
		{
			$first_name = Auth::user()->first_name;
			$userId = Auth::user()->id;
			$orders = DB::table('orders');
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
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $validator = Validator::make(Input::all(), Order::$rules);

        if($validator->fails())
        {
            Session::flash('errorMessage', "Failed to submit order: Please check all required fields");
            Log::error('Created On: ' . date('m/d/Y h:i:s a'), ['order' => $data]);
            return Redirect::back()->withErrors($validator)->withInput();
        }

        // Session::flash('successMessage', "Order submitted successfully!");

        $order = new Order;
        $order->user_id = Auth::id();
        $order->total = Input::get('total');
        $order->delivery_method = Input::get('delivery');
        $order->pending = true;
        $order->save();

        if(Input::get('quantity-eggs') > 0)
        {
            $order->products()->attach([Input::get('size') => ['amount' => Input::get('quantity-baskets')], 3 => ['amount' => Input::get('quantity-eggs')]]);
        }
        else
        {
            $order->products->attach([Input::get('size') => ['amount' => Input::get('quantity-baskets')]]);
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


}
