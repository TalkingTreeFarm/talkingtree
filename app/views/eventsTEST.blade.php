@extends('layouts.calendarm')

@section('title')

  <link rel="stylesheet" type="text/css" href="/assets/css/pages/events.css">

@stop

@section('content')

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="fb-page" 
data-href="https://www.facebook.com/Talkingtreefarmpermaculture" 
data-tabs="timeline, events"
data-width="1000"
data-height="600" 
data-small-header="false" 
data-adapt-container-width="true" 
data-hide-cover="false" 
data-show-facepile="true">

<div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/Talkingtreefarmpermaculture"><a href="https://www.facebook.com/Talkingtreefarmpermaculture">Talking Tree Farm</a></blockquote></div></div>


	
@stop


@section('bottom-script')

@stop