@extends('layouts.master')

@section('title')
<h2>Sign Up</h2>
@stop

@section('content')

     <div class="container">
		{{ Form::open(array('action' => 'UsersController@userStore')) }}
			<div class="row">
			 <div class="col-md-4 col-md-offset-2">
			 	{{ $errors->first('first_name', '<span class="help-block">:message</span>') }}
			 	{{ Form::label('first_name', 'First Name') }}
                {{ Form::text('first_name', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) }}
                                  
                {{ $errors->first('last_name', '<span class="help-block">:message</span>') }}    
                {{ Form::label('last_name', 'Last Name') }}
                {{ Form::text('last_name', null, ['class' => 'form-control']) }}

                {{ $errors->first('phone_number', '<span class="help-block">:message</span>') }}    
                {{ Form::label('phone_number', 'Phone Number') }}
                {{ Form::text('phone_number', null, ['class' => 'form-control']) }}

                {{ $errors->first('password', '<span class="help-block">:message</span>') }}    
                {{ Form::label('password', 'Password') }}
                {{ Form::password('password', ['class' => 'form-control']) }}

                {{ $errors->first('password_confirmation', '<span class="help-block">:message</span>') }}{{ Form::label('password_confirmation', 'Password Confirm') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}

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
                {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) }}

                <button class="btn btn-default" type="submit">Submit</button>
                </div>
              
              </div> 
              </div>
              


            


@stop



@section('bottom-script')

@stop