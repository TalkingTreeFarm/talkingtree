<?php

class Product extends BaseModel
{
	protected $table = 'products';
	// public $timestamps = false;

	public static $rules = array(
    	
	);

	public function orders()
	{
		return $this->belongstoMany('Order');
	}
} 