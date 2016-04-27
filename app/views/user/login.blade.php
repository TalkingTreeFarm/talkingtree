@extends('layouts.master')

@section('title')
<h1>Login</h1>
@stop

@section('content')

    <div class="row">
        <div class="col-md-2 col-md-offset-8">
            
            {{ Form::open(array('action' => 'UserController@postLogin')) }}
                <div class="row">
                    <div class="col-xs-12">
                        {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                        
                        {{ Form::label('email', 'Email') }}
                        {{ Form::text('email', null, ['class' => 'form-control', 'autofocus' => 'autofocus']) }}
                                  
                        {{ $errors->first('password', '<span class="help-block">:message</span>') }}    

                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password', ['class' => 'form-control']) }}
                    </div>
                </div>
                
                
                <button class="btn btn-default" type="submit">Log In</button>
            {{ Form::close() }}

        </div> <!-- end col-md-2 -->
    </div> <!-- end row -->
@stop