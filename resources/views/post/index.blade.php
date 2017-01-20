@extends('templete')

@section(`title`)
	Bem vindo ao Blog Code-Laravel
@stop

@section('content')

	@foreach($post as $posts)
		
		<div class='panel panel-primary'>
			<div class="panel-heading">
				<h5>{{ $posts->title }}</h5>
			</div>
			<div class="panel-body">
				<h6>{{ $posts->content }}</h6>
				<p><b>Tags:</b>
					@foreach($posts->tags as $tag)
						{{ $tag->name }}
					@endforeach
				</p>
				<hr>
				<h5>Comments</h5>
				@foreach($posts->comments as $comment)
					<b>Name: </b>{{ $comment->nome }}<br/>
					<b>Comment: </b>{{ $comment->comment }}<br/>
					<br/>
				@endforeach
			</div>
			
		</div>
		<br/>
	
	@endforeach

@stop