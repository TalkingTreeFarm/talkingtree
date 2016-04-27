<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/simplex/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	@yield('top-script')
	
</head>

<body>
	@include('partials.navbar')
	<div class="container">
	@yield('title')
	
	
	@if (Session::has('successMessage'))
    <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
	@endif
	
	@if (Session::has('errorMessage'))
	    <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
	@endif

    @yield('content')

	</div>
    {{-- <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

{{--     setTimeout(function() {
    ."alert".slideup
    } --}}
    @yield('bottom-script')
    @extends('partials.footer')

</body>