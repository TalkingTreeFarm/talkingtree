<?php

class RemindersController extends Controller {

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return View::make('password.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
		switch ($response = Password::remind(Input::only('email'), function($message)
		{
			$message->subject('Talking Tree Farm Password Reminder');
		}))

		
		{
			case Password::INVALID_USER:
				Session::flash('errorMessage', 'This email is not associated to a registered User!');
				return Redirect::back()->with('error', Lang::get($response));

			case Password::REMINDER_SENT:
			Session::flash('successMessage', 'A link was send to your email with instructions to change your password');
				return Redirect::back()->with('status', Lang::get($response));
		}

	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		return View::make('password.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = $password;

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			Session::flash('errorMessage', 'Password Combination is invalid!');
			 	return Redirect::back()->with('error', Lang::get($response));
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
			Session::flash('errorMessage', 'This email is not associated to the registered User!');
				return Redirect::back()->with('error', Lang::get($response));

			case Password::PASSWORD_RESET:
				return Redirect::to('/');
		}
	}

}
