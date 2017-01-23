@extends('templete')

@section(`title`)
	Bem vindo ao Blog Code-Laravel
@stop

@section('content')

	<h2>Admin Blog</h2>

	<a href="{{ route('admin.posts.create') }}" class="btn btn-success">Create new post</a>
	
	<br/><br/>

	<table class="table">
	  <tr>
	    <th>Id</th>
	    <th>Title</th>
	    <th>Action</th>
	  </tr>

	@foreach($posts as $post)
	  <tr>
	    <th>{{ $post->id }}</th>
	    <th>{{ $post->title }}</th>
	    <th>
	    	<a href="{{ route('admin.posts.edit', ['id'=> $post->id]) }}" class="btn btn-default">Edit</a>
	    	<a href="{{ route('admin.posts.destroy', ['id'=> $post->id]) }}" class="btn btn-danger">Delete</a>
	    </th>
	  </tr>		
	@endforeach
	
	</table>
	
	{!! $posts->render() !!}

@stop