@extends('layouts.master')

@section('title')
<h2>Reset Password</h1>
@stop

@section('content')

<div class="row">
 <div class="col-md-2 col-md-offset-8">
   {{ Form::open(array('action' => 'RemindersController@postReset')) }}                       
   
   {{ Form::hidden('token', $token)}}

   {{ $errors->first('email', '<span class="help-block">:message</span>') }}
   {{ Form::label('email', 'Email') }}
   {{ Form::text('email', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) }}
   

   {{ $errors->first('password', '<span class="help-block">:message</span>') }}    
   {{ Form::label('password', 'Password') }}
   {{ Form::password('password', ['class' => 'form-control']) }}

   {{ $errors->first('password_confirmation', '<span class="help-block">:message</span>') }}
   {{ Form::label('password_confirmation', 'Password Confirm') }}
   {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
   <button class="btn btn-default" type="submit">Submit</button>
   {{ Form::close() }}
  </div>
</div>

@stop