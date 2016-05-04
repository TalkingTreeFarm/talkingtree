<?php

class Category extends BaseModel
{
	protected $table = 'categories';

	public static $rules = array(

	);

	public function categories()
	{
		return $this->belongstoMany('Post');
	}
}
