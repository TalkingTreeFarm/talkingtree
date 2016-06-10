@extends('layouts.master')

@section('title')
  <link rel="stylesheet" type="text/css" href="/assets/css/pages/events.css">
  <h2 class="text-center">Events</h2>
@stop

@section('content')
<div class= "col-xs-12">
	<div id="map-canvas"></div>
</div>

{{-- <div class= "col-xs-12">
	<div id="map-canvas"><iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FTalkingtreefarmpermaculture%2F&tabs=timeline%2C%20timeline&width=500&height=500&small_header=false&adapt_container_width=true&hide_cover=false&hide_cta=true&show_facepile=false&appId" width="500" height="700" style="border:none" scrolling="no" frameborder="0" allowTransparency="true"></iframe></div>
</div>
 --}}
@stop

@section('bottom-script')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRbQFZw1KmV6RQmeMTDQi40tAjMKuP84E"></script>
    <script type="text/javascript" src="/assets/js/events.js"></script>
@stop