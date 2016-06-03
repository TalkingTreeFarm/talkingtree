<?php
// use Stripe;

class OrdersController extends \BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('auth', array('only' => ['store']));
    }

    /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::user()->isAdmin())
		{
			$orders = Order::orderBy('created_at', 'DESC')->get()->all();
		}
		else
		{
			$user_id = Auth::id();
			$orders = Order::where('user_id',$user_id)->orderBy('created_at', 'DESC')->get();
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
        $data = Input::all();

        if(Input::get('total') == 0)
        {
            Session::flash('errorMessage', "Your cart is empty!");
            Log::error('Created On: ' . date('m/d/Y h:i:s a'), ['order' => $data]);
            return Redirect::back();
        }

        if(Input::get('delivery') == 0)
        {
            Session::flash('errorMessage', "You must choose a delivery method!");
            Log::error('Created On: ' . date('m/d/Y h:i:s a'), ['order' => $data]);
            return Redirect::back();
        }

        $order = new Order;
        $order->user_id = Auth::id();
        $order->total = Input::get('total');
        $order->delivery_method_id = Input::get('delivery');
        $order->pending = true;
        $order->save();

        $eggsId = DB::table('products')->where('name', "Eggs")->pluck('id');

        if(Input::get('quantity-eggs') > 0 && Input::get('size') != 1)
        {
            $order->products()->attach([Input::get('size') => ['amount' => Input::get('quantity-baskets')], $eggsId => ['amount' => Input::get('quantity-eggs')]]);
        }
        else if(Input::get('size') != 1)
        {
            $order->products()->attach([Input::get('size') => ['amount' => Input::get('quantity-baskets')]]);
        }
        else if(Input::get('quantity-eggs') > 0)
        {
            $order->products()->attach([$eggsId => ['amount' => Input::get('quantity-eggs')]]);
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
        $requireAddress = false;

        if(!$order)
        {
            App::abort(404);
        }

        // Pass variable to prompt for address on Home Delivery if not exists
        if($order->delivery_method_id == 1)
        {
            $requireAddress = true;
        }

        return View::make('orders.confirm')->with(['order' => $order, 'address' => $requireAddress]);
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
		
	}


    public function findOrderId()
      {var_dump(Session::get('order_id'));
        $order = Order::find(Session::get('order_id'));dd($order);
        return $order;
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

        if($passed && isset($_POST['stripe-token']))
        {
            // Get the credit card details submitted by the form
    		$token = $_POST['stripe-token'];

            try
            {
                $order->prePay($token);
            }
            catch(Cartalyst\Stripe\Exception\CardErrorException $e)
            {
    		  // Get the status code
              $code = $e->getCode();

              // Get the error message from Stripe
              $message = $e->getMessage();

              // Get the error type from Stripe
              $type = $e->getErrorType();

              // Echo out the error and redirect
              Session::flash('errorMessage', "Error {$code}: {$message}");
              Redirect::back();
    		}
        }

        if($passed && $order->isVerified())
        {
            $order->pending = false;
            Product::updateInventory($order);
            $order->save();

            Session::flash('successMessage', "Order placed successfully!");
            
            //$order = $this->findOrderId();
            $data = [
                'email' => Auth::user()->email,
                'first' => Auth::user()->first_name,
                'last' => Auth::user()->last_name,
                'order' => $order,
            ];
            
            //$email = Auth::user()->email;

            Mail::send('emails.confirmation', $data, function($message) use ($data)
            {
                $message->from($data['email'], $data['first'], $data['last']);
                $message->to('talkingtreefarm@yahoo.com', 'Talking Tree Farm');
            });
            return Redirect::action('OrdersController@index');
        }
        else if(!$order->isVerified())
        {
            Session::flash('errorMessage', "This delivery method requires online payment");
            return Redirect::action('OrdersController@show', $order->id);
        }
        else if(!$passed)
        {
            Session::flash('errorMessage', "Your order cannot be processed. Please contact us directly");
            return Redirect::action('ProductsController@index');
        }

    }

}
