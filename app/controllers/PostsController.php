<?php

class PostsController extends \BaseController {

	public function __construct()
	{
        parent::__construct();
		$this->beforeFilter('admin', array('except' => array('index', 'show')));
	}

	/*
	* Limit post view to the user_id's
	*/

	public function userPosts($id)
	{
		$posts = Post::where('user_id', $id)->get();
		return View::make('posts.main')->with('posts', $posts);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if(Input::has('category_id'))
		{
			// $posts=Post::where('category_id', '=', Input::get('category_id'))->get();
			$posts = Post::orderBy('id', 'DESC')->where('category_id', '=', Input::get('category_id'))->paginate(9);
		} else {

			$posts = Post::orderBy('id', 'DESC')->paginate(9);
		}
		return View::make('posts.main')->with('posts', $posts);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$categories = Category::all();
		return View::make('posts.create')->with('categories', $categories);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make(Input::all(), Post::$rules);


	    if ($validator->fails()) {
	        Session::flash('errorMessage', 'This post was not created successfully!!');
	        return Redirect::back()->withInput()->withErrors($validator);
	    } else {

	    $post = new Post;
		    if (Input::hasFile('image')) {
		    	$image = Input::file('image');
		    	$image->move(
		    		public_path('/images'),
		    		$image->getClientOriginalName()
		    	);
		    	$post->image = "/images/{$image->getClientOriginalName()}";
		    	} else {
		    		$post->image = "/images/samplebasket1.jpg";
				 }

		$post->title=Input::get('title');
		$post->body=Input::get('body');
		$post->category_id=Input::get('category_id');
		$post->user_id = Auth::id();
		$post->save();
		Log::info($post);
		Session::flash('successMessage', 'This post was created successfully!!');
		return Redirect::action('PostsController@index');
	    }
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$post = Post::find($id);
		if(!$post) {
			App::abort(404);
		}

		return View::make('posts.show')->with('post', $post);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = Post::find($id);
		// return View::make('posts.edit')->with('post', $post);

		$categories = Category::all();
		return View::make('posts.edit')->with('post', $post)->with('categories', $categories);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$validator = Validator::make(Input::all(), Post::$rules);
		if ($validator->fails()) {

			Session::flash('errorMessage', 'This post was not edited successfully!!');
	        return Redirect::back()->withInput()->withErrors($validator);
		} else {
		
		$post = Post::find($id);	
		if (Input::hasFile('image')) {
		    	$image = Input::file('image');
		    	$image->move(
		    		public_path('/images'),
		    		$image->getClientOriginalName()
		    	);
		    	$post->image = "/images/{$image->getClientOriginalName()}";
		    } 

		
	    $post->title=Input::get('title');
		$post->body=Input::get('body');
		$post->category_id=Input::get('category_id');
		$post->save();
		Session::flash('successMessage', 'This post was updated successfully!!');
		return Redirect::action('PostsController@index');
		}
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{

		$post = Post::find($id);

		if(!$post) {
			return Redirect::action('PostsController@index');
		}

		$post->delete();
		Session::flash('successMessage', 'This post was deleted successfully!!');
		return Redirect::action('PostsController@index');
	}


}
