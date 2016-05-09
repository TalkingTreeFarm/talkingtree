@extends('layouts.master')

@section('title')
<h1>Reminder Password</h1>
@stop

@section('content')

<form action="{{ action('RemindersController@postRemind') }}" method="POST">
    <input type="email" name="email">
    <input type="submit" value="Send Reminder">
</form>

@stop