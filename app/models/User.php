<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	const ADMIN = 1;
	const STANDARD = 2;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public function setPasswordAttribute($value)
	{
    $this->attributes['password'] = Hash::make($value);
	}

	public static $rules = array(
        'first_name' => 'required|alpha_num|min:3|max:32',
        'last_name' => 'required|alpha_num|min:3|max:32',
        'email' => 'required|email',
        'password' => 'required|min:3|confirmed',
        'password_confirmation' => 'required|min:3'
    );

}
