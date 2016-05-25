@extends('layouts.master')

@section('title')



@stop


@section('content')

<h1>{{{ $user->first_name }}}'s Profile</h1>

 <div class="container">
	        <div class="row well">
	            <div class="col-md-4">
	            	<img class="img-responsive" src="/images/logo-profile.svg" alt="Sarah and Sylvain" width="200" height="100">
	            </div>
	            <div class="col-md-4">
                    {{ Form::model($user, array('action' => ['UsersController@userUpdate', $user->id])) }}
	            	{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
                    {{ Form::label('first_name', 'First Name', ['style' => 'float: left']) }}
                    {{ Form::text('first_name', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) }}
	            	{{ $errors->first('last_name', '<span class="help-block">:message</span>') }}
                    {{ Form::label('last_name', 'Last Name') }}
                    {{ Form::text('last_name', null, ['class' => 'form-control']) }}
	            	{{ $errors->first('phone_number', '<span class="help-block">:message</span>') }}
                    {{ Form::label('phone_number', 'Phone Number') }}
                    {{ Form::text('phone_number', null, ['class' => 'form-control']) }}
	            	{{ Form::label('email', 'Email') }}
                    {{ Form::email('email', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) }}
	            	<br>
	            	<br>
	            	<br>

				</div>
                <div class="col-md-4">
                    {{ $errors->first('address', '<span class="help-block">:message</span>') }}
                    {{ Form::label('address', 'Address') }}
                    {{ Form::text('address', null, ['class' => 'form-control']) }}
                    {{ $errors->first('city', '<span class="help-block">:message</span>') }}
                    {{ Form::label('city', 'City') }}
                    {{ Form::text('city', null, ['class' => 'form-control']) }}
                    {{ $errors->first('zip_code', '<span class="help-block">:message</span>') }}
                    {{ Form::label('zip_code', 'Zip Code') }}
                    {{ Form::number('zip_code', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) }}

                    <button class="btn btn-default" type="submit">Update Profile</button><a href="{{{action('UsersController@account', $user->id)}}}" class="btn btn-default" role="button">Update Password</a>

                    {{ Form::close() }}

                </div>
	            </div>
	        </div>

@stop


@section('bottom-script')



@stop
