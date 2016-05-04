<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		
		return View::make('hello');
	}

	public function homePage()
	{
		$posts = Post::orderBy('id', 'DESC')->limit(3)->get();
		return View::make('main')->with('posts', $posts);;
	}


	public function ourStory()
	{
		return View::make('our_story');
	}

	public function events()
	{
		return View::make('events');

	public function contact()
	{
		return View::make('contact');

	}

}
