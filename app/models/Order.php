<?php

class Order extends BaseModel
{
	protected $table = 'orders';
	// public $timestamps = false;

	public static $rules = array(
    	
	);

	public function orders()
	{
		return $this->belongstoMany('Product');
	}
} 