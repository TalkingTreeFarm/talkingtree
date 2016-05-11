<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/sandstone/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/fonts.css">
	<link rel="shortcut icon" type="favicon" href="/Talking_Tree.ico">
	<title>Talking Tree Farm</title>
	@yield('top-script')

</head>

<body>
	@if (Session::has('successMessage'))
	    	<div class="alert alert-success alert-dismissible col-md-12" role="alert">
	    	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	    	{{{ Session::get('successMessage') }}}</div>
		@endif

		@if (Session::has('errorMessage'))
		    <div class="alert alert-danger alert-dismissible col-md-12" role="alert">
		    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		    {{{ Session::get('errorMessage') }}}</div>
		    <div class="col-md-1"></div>
		@endif

	@include('partials.navbar')
	

	<div class="container">
		@yield('title')

	    @yield('content')

		</div>
	    <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
	    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	    @yield('bottom-script')
	    @extends('partials.footer')
	</div>
</body>
