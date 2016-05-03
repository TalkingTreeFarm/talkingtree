@extends('layouts.master')

@section('title')

<head><meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>Google Calendar</title>
<script>gcal$perf$serverTime=8;gcal$perf$headStartTime=new Date().getTime()</script>
<style type="text/css">body{margin:0;padding:0;overflow-y:hidden;}
        html{overflow-y:hidden;}</style>
<link type="text/css" rel="stylesheet" href="https://www.google.com/calendar/static/6bf96ebea811c55ac1e69f46cd86b581embedcompiled_fastui.css">


<script type="text/javascript" src="https://www.google.com/calendar//static/6bf96ebea811c55ac1e69f46cd86b581embedcompiled__en.js"></script>
<script>function _onload() {window._init({"features":[1,1,1,1,1,1,0,1,1,0,0,0,1,0,1,1,0,1,1,0,1,1,0,1,0,0,1,0,0,0,1,0,0,1,1,1,1,0,1,1,0,1,1,0,1,1,0,1,1,0,0,1,1,0,0,1,1,0,0,1,0,1,0,1,1,1,1,1,1,1,0,0,0,0,0,0],"loggedin":true,"cids":{},"view":"month","weekstart":0,"format24hour":false,"dateFieldOrder":0,"preloadStart":"20160430","preloadEnd":"20160607","container":"container","baseUrl":"/","imagePath":"images/","showNavigation":true,"showDateMarker":true,"showTabs":true,"showCalendarMenu":false,"showCurrentTime":false,"showTz":false,"showPrintButton":true,"showElementsLogo":false,"collapseAllday":false,"showSubscribeButton":true,"embedStyle":"","proxyUrl":"https://clients6.google.com","calendarApiVersion":"v3","developerKey":"AIzaSyBNlYH01_9Hc5S1J9vuFmu2nUqBZJNAXxs"});}</script>
<script type="text/javascript">
      var pageLoaded_ = false;
      var clientLibraryLoaded_ = false;

      function clientLibraryLoaded() {
        clientLibraryLoaded_ = true;
        if (pageLoaded_) _onload();
      }

      function pageLoaded() {
        pageLoaded_ = true;
        if (clientLibraryLoaded_) _onload();
      }
    </script>
<script type="text/javascript" src="https://apis.google.com/js/client.js?onload=clientLibraryLoaded"></script>
<style type="text/css">
   
  </style>
    
@stop

@section('content')



<body onload="pageLoaded()" style="background-color:#fff">
<span id="calendarTitle">Google Calendar</span>



<noscript><p></p>
Your browser does not appear to support JavaScript, but this page needs to use JavaScript to display correctly.
You can visit the HTML-only version of this page at:
<a href="https://calendar.google.com/calendar/htmlembed?showCalendars=0&amp;amp;height=600&amp;amp;wkst=2&amp;amp;bgcolor=%23FFFFFF&amp;amp;src=servingwater01%40googlemail.com&amp;amp;color=%2329527A&amp;amp;ctz=America%2FChicago">https://calendar.google.com/calendar/htmlembed?showCalendars=0&amp;amp;height=600&amp;amp;wkst=2&amp;amp;bgcolor=%23FFFFFF&amp;amp;src=servingwater01%40googlemail.com&amp;amp;color=%2329527A&amp;amp;ctz=America%2FChicago</a></noscript>
<div id="container" style="width:100%" class="locale-en "></div></body>
	
@stop


@section('bottom-script')

@stop