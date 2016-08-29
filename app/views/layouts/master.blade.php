<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

	{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" integrity="sha384-y3tfxAZXuh4HwSYylfB+J125MxIs6mR5FOHamPBG064zB+AFeWH94NdvaCBm8qnd" crossorigin="anonymous"> --}}
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/sandstone/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/bootstrap-table/src/bootstrap-table.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/main.css">
	<link rel="stylesheet" type="text/css" href="/assets/css/navbar.css">
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
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/js/bootstrap.min.js" integrity="sha384-vZ2WRJMwsjRMW/8U7i6PWi6AlO1L79snBrmgiDpgIWJ82z8eA5lenwvxbMV1PAh7" crossorigin="anonymous"></script>
	    <script src="../assets/bootstrap-table/src/bootstrap-table.js"></script>

	    @yield('bottom-script')
	    @extends('partials.footer')
	</div>
</body>
