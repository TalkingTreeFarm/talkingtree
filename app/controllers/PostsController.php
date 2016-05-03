<?php

class PostsController extends \BaseController {

	public function __construct()
	{
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
			$posts=Post::where('category_id', '=', Input::get('category_id'))->get();
		} else {

			$posts = Post::all();
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
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
