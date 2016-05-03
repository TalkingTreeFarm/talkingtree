<?php

class Order extends BaseModel
{
	protected $table = 'orders';

	public static $rules = array(

	);

    public function products()
    {
        return $this->belongsToMany('Product');
    }

    public function orderProducts()
    {
        return $this->hasMany('OrderProduct');
    }

    public function getBasketType()
    {
        // $this->products()->where('')
    }

    public function queryProducts()
    {
        $id = $this->id;

        $orderProducts = OrderProduct::with('product')->where('order_id', $id)->get();

        return $orderProducts;
    }
}
