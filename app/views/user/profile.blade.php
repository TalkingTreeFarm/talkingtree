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






            <div class="container">
            <h1>{{{ $user->first_name }}}'s Order Summary</h1>

                <div class="row">
                    <div class="well col-lg-12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Order #</th>
                                    <th>Order Placed</th>

                                    @if(Auth::user()->isAdmin())
                                        <th>Ordered By</th>
                                    @endif

                                    <th>Description</th>
                                    <th>Total</th>
                                    <th>Delivery Method</th>
                                    <th>Prepaid</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{{ $order->id }}}</td>
                                        <td>{{{ $order->created_at }}}</td>

                                        @if(Auth::user()->isAdmin())
                                            <td><a href="{{{ action('UsersController@userProfile', $order->user->id) }}}">{{{ $order->user->fullName() }}}
                                        @endif

                                        <td>{{{ $order->makeDescription() }}}</td>
                                        <td>${{{ $order->total }}}</td>
                                        <td>{{{ $order->delivery_method->method }}}</td>

                                        @if($order->prepaid)
                                            <td>Yes</td>
                                        @else
                                            <td>No</td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

@stop


@section('bottom-script')



@stop
