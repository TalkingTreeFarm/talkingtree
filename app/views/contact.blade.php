@extends ('layouts.master')

@section('top-script')
  <link rel="stylesheet" type="text/css" href="/assets/css/pages/contact.css">
  
@stop

@section ('content')

    <div class="container">  
        <div class="row">
            <div class="col-md-6 col-md-offset-4">                         
                <h2>Have a question? Let us know</h2>
                  {{ Form::open(array('action' => 'UsersController@getContact')) }}
                <div class="form-group">
                   {{ $errors->first('from', '<span class="help-block">:message</span>') }} 
                   {{Form::label('from', 'Your name')}}
                   {{Form::text('from', null, array('class' => 'name', 'placeholder' => 'Name', 'class'=>'form-control'))}}
                </div>
                <div class="form-group">
                   {{ $errors->first('email', '<span class="help-block">:message</span>') }}
                   {{Form::label('email', 'Your email')}}
                   {{Form::text('email', null, array('class' => 'name', 'placeholder' => 'Email', 'class'=>'form-control'))}}
                </div>
            
                <div class="form-group">
                   {{ $errors->first('subject', '<span class="help-block">:message</span>') }}
                   {{Form::label('subject', 'Subject')}}
                   {{Form::text('subject', null, array('class' => 'name', 'placeholder' => 'Subject', 'class'=>'form-control'))}}
                </div>
                <div class="form-group">
                   {{ $errors->first('body', '<span class="help-block">:message</span>') }}
                   {{Form::label('body', 'Body')}}
                   {{Form::textarea('body', null, array('class' => 'name', 'rows' => '4', 'placeholder' => 'Message', 'class'=>'form-control'))}}
                </div>                
                <div id="success align-right">
                    {{Form::submit('Send email', array('class'=> 'btn btn-email'))}}
                    
                </div>
            {{Form::close()}}

            </div> <!--for column-->
        </div> <!-- for row-->
</div><!-- container -->
<br>
@stop