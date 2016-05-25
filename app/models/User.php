<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Laravel\Cashier\BillableTrait;
use Laravel\Cashier\BillableInterface;



class User extends Eloquent implements UserInterface, RemindableInterface, BillableInterface {

	use UserTrait, RemindableTrait, BillableTrait;

    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

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
        'first_name' => 'required|regex:/^[(a-zA-Z\s)]+$/u|min:3|max:32',
        'last_name' => 'required|regex:/^[(a-zA-Z\s)]+$/u|min:3|max:32',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required|min:6'
    );

    public static $passwordchange = array(


        'current_password' => 'required|min:6',
        'new_password' => 'required|min:6|confirmed',
        'new_password_confirmation' => 'required|min:6'

        );


    public static $updaterules = array(

        'first_name' => 'required|regex:/^[(a-zA-Z\s)]+$/u|min:3|max:32',
        'last_name' => 'required|regex:/^[(a-zA-Z\s)]+$/u|min:3|max:32',
        'email' => 'required|email|'
        // 'password' => 'required|min:3|confirmed',
        // 'password_confirmation' => 'required|min:3',
    );

    public static $addressRules = array(
        'address' => 'required|min:3|max:32',
        'city'    => 'required|min:3|max:32',
        'zip'     => 'required|numeric|min:5|max:5' 
    );

    public function isAdmin()
    {
    	// constants are treated like they're static properties
		return $this->role_id == self::ADMIN;
    }

    public function fullName()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function posts()
	{
    	return $this->hasMany('Post');
	}

    public function orders()
    {
        return $this->hasMany('Order');
    }
}
