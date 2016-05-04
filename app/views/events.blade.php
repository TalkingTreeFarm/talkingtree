@extends('layouts.calendarm')

@section('title')

  <link rel="stylesheet" type="text/css" href="/assets/css/pages/events.css">

@stop

@section('content')

<div class= "row">
	<div class= "col-sm-4">
		<object data="https://calendar.google.com/calendar/embed?showCalendars=0&amp;height=500&amp;wkst=2&amp;bgcolor=%23000000&amp;src=servingwater01%40googlemail.com&amp;color=%23FFFFFF&amp;ctz=America%2FChicago" style="border-width:0" width="750" height="500" ></object>
	</div>
	<div class= "col-sm-4">
	</div>
	<div class= "col-sm-4">
		<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTalkingtreefarmpermaculture%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
	</div>
</div>


	
@stop


@section('bottom-script')

@stop