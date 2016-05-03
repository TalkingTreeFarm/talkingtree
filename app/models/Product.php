<?php

class Product extends BaseModel
{
	protected $table = 'products';

	public static $rules = array(

	);

	public function orders()
	{
		return $this->belongsToMany('Order');
	}

    public function orderProducts()
    {
        return $this->hasMany('OrderProduct');
    }

    public static function checkInventory($product)
    {
        return DB::table('products')->where('name', $product->name)->pluck('amount');
    }
}
