@extends('layouts.master')


@section('title')

@stop

@section('content')

<h1>Account Information</h1>
<div class="container">
            <div class="row well">
                <div class="col-md-3">
                    {{ Form::open(array('action' => ['UsersController@changePassword', $user->id])) }}  
                    {{ $errors->first('current_password', '<span class="help-block">:message</span>') }}    
                    {{ Form::label('current_password', 'Current Password') }}
                    {{ Form::password('current_password', ['class' => 'form-control']) }} 
                    
                </div>
                <div class="col-md-3">
                    
                    {{ $errors->first('new_password', '<span class="help-block">:message</span>') }}    
                    {{ Form::label('new_password', 'New Password') }}
                    {{ Form::password('new_password', ['class' => 'form-control']) }}

                </div>

                <div class="col-md-3">
                    
                    {{ $errors->first('password_confirmation', '<span class="help-block">:message</span>') }}    
                    {{ Form::label('new_password_confirmation', 'Confirm Password') }}
                    {{ Form::password('new_password_confirmation', ['class' => 'form-control']) }}

                </div>

                <div class="col-md-3">

                <button class="btn btn-default" type="submit">Update Password</button>

                </div>    
                {{ Form::close() }}
                <!-- <a href="{{{action('RemindersController@getRemind')}}}" class="btn btn-info" role="button">Forgot Password</a>
                </div> -->
            </div>
  
@stop            