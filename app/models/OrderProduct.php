<?php

class OrderProduct extends BaseModel
{
	protected $table = 'order_product';

	public static $rules = array(

	);

    public function product()
    {
        return $this->belongsTo('Product');
    }

    public function order()
    {
        return $this->belongsTo('Order');
    }
}
