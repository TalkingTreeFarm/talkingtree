<?php

class Post extends BaseModel
{
	protected $table = 'posts';

	public static $rules = array(
    'title'      => 'required|max:100|',
    'body'       => 'required|max:10000|',
    'image'		 => 'max:300000|mimes:jpeg,png,gif'	
	);


	public function categories()
	{
		return $this->belongstoMany('Category');
	}
} 