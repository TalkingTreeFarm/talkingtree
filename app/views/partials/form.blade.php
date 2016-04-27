
<div class="form-group">
	{{Form::label('title')}}
	{{Form::text('title', null, ['claim'=>'form-control'])}}
</div>

@if ($errors->has('title'))
<p>{{$errors->first(
	'title',
	'<span class="text-danger">:message</span>',
	)}}</p>
@endif


<div class="form-group">
	{{Form::label('body', 'Body')}}
	{{Form::textarea('body', null, ['class' => 'form-control'])}}
</div>

@if ($errors->has('body'))
	<p> {{$errors->first(
		'body',
		'<span class="text-danger">:message</span>',
		)}}
	</p>
@endif

<div class="form-group">
	{{Form::label('image', 'Image')}}
	{{Form::file('image')}}
</div>

@if ($errors->has('image'))
	<p>{{$errors->first(
		'image',
		'<span class="text-danger">:message</span>',
		)}}</p>
@endif		