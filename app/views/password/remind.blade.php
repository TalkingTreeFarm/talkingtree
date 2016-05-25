@extends('layouts.master')

@section('title')
<h2>Reminder Password</h1>
@stop

@section('content')



<div class="row">
 <div class="col-md-2 col-md-offset-8">
   {{ Form::open(array('action' => 'RemindersController@postRemind')) }}                       
   {{ Form::label('email', 'Email') }}
   {{ Form::text('email', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) }}
   {{ $errors->first('email', '<span class="help-block">:message</span>') }}
   <button class="btn btn-default" type="submit">Submit</button>
   {{ Form::close() }}
  </div>
</div>


@stop