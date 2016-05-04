<?php

class DeliveryMethod extends BaseModel
{
	protected $table = 'delivery_methods';

	public static $rules = array(

	);

    public function order()
    {
        return $this->hasMany('Order');
    }
}
