@extends('templete')

@section(`title`)
	Bem vindo ao Blog Code-Laravel
@stop

@section('content')

	@foreach($titles as $titles)
		
		<div class='panel panel-primary'>
			<div class="panel-heading">
				<h5>{{ $titles }}</h5>
			</div>
			<div class="panel-body">
				<h6>Conteudo do {{ $titles }} para o Blog Code-Laravel </h6>
			</div>
		</div>
		<br/>
	
	@endforeach

@stop