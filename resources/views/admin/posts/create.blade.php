@extends('templete')

@section(`title`)
	Blog Code-Laravel New Post
@stop

@section('content')
	<h3>Create new Post!</h3>
	
	@if($errors->any())
		<ul class='alert'>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	@endif

	{!! Form::open(['route'=>'admin.posts.store','method'=>'post']) !!}
	
	@include('admin.posts._form')
	
	<div class='form-group'>
		{!! Form::label('tags', 'Tags', ['class' => 'form-label']) !!}
		{!! Form::textarea('tags', null, ['class' => 'form-control']) !!}
	</div>	
	
	
	<div class='form-group'>
		{!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
	</div>
	
	{!! Form::close() !!}

@stop