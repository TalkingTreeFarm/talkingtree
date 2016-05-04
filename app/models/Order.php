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

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function orderProducts()
    {
        return $this->hasMany('OrderProduct');
    }

    public function deliveryMethod()
    {
        return $this->belongsTo('DeliveryMethod');
    }

    public function queryProducts()
    {
        $orderProducts = OrderProduct::with('product')->where('order_id', $this->id)->get();

        return $orderProducts;
    }
}
