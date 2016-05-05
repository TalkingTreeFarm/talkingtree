@extends('layouts.calendarm')

@section('title')

  <link rel="stylesheet" type="text/css" href="/assets/css/pages/events.css">

@stop

@section('content')

<div class= "row">
	<div class= "col-sm-4">
		{{-- <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTalkingtreefarmpermaculture%2F&tabs=events&width=500&height=244&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="500" height="244" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe> --}}
	</div>
	<div class= "col-sm-4">
		<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTalkingtreefarmpermaculture%2F&tabs=events%2C%20timeline&width=500&height=700&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="500" height="700" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
	</div>
	<div class= "col-sm-4">
		{{-- <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTalkingtreefarmpermaculture%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe> --}}
	</div>
</div>


	
@stop


@section('bottom-script')

@stop