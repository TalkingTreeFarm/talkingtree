<?php
class UsersController extends \BaseController {

	public function loginpage()
	{
		return View::make('user.login');
	}

	public function doLogin()
	{
		$email = Input::get('email');
        $password = Input::get('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return Redirect::intended('/');
        } else {
            // login failed, go back to the login screen
            Session::flash('errorMessage', 'Login failed.');
            return Redirect::back();
        }
	}

	public function getLogout()
    {
        Auth::logout();
        return Redirect::action('HomeController@homePage');
    }

    // public function show($id)
    // {
    //     // $user = $this->userNotFound($id);

    //     // return an entry from the db of that page with the id
    //     return View::make('.user')->with('user', $user); 
    // }

    /*
    * Limit show view to the user_id's
    */

    public function userShow($id)
    {
        if (Auth::user()->id == $id)
        {
            $user = User::find($id);
            return View::make('user.profile')->with('user', $user);
        }
        
    }

    public function showLogin()
	{
		return View::make('main');	
	}

    public function edit()
    {
        return View::make('users.edit');  
    }


}