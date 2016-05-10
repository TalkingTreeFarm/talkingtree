<?php

class ProductsController extends \BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->beforeFilter('auth', array('only' => ['index']));
        $this->beforeFilter('admin', array('except' => ['index']));
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $products = Product::all();
        $deliveryMethod = DeliveryMethod::all();

		return View::make('product.main', compact('products', 'deliveryMethod'));
	}

    public function inventory()
    {
        $products = Product::all();

		return View::make('product.inventory')->with('products', $products);
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
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$product = Product::find($id);
		if(!$product)
        {
			App::abort(404);
		}

		return View::make('product.show')->with('product', $product);
	}

    public function getProducts()
    {
        return Product::all();
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

    public function updateAll()
    {
        $products = Product::all();

        foreach($products as $product)
        {
            if (Input::get(strtolower(str_replace(" ", "-", $product->name)) . '-amount') != '') {
                $product->amount = Input::get(strtolower(str_replace(" ", "-", $product->name)) . '-amount');
            }
            if (Input::get(strtolower(str_replace(" ", "-", $product->name)) . '-price') != '') {
                $product->price = Input::get(strtolower(str_replace(" ", "-", $product->name)) . '-price');
            }

            $product->save();
        }

        return Redirect::action('ProductsController@inventory');
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
