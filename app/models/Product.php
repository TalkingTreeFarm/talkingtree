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

    public function checkInventory($order_product)
    {
        return ($this->amount < $order_product->amount);
    }

    public static function updateInventory($order)
    {
        foreach($order->order_products as $order_product)
        {
            $product = $order_product->product;
            $product->amount = $product->amount - $order_product->amount;
            $product->save();
        }
    }
}
