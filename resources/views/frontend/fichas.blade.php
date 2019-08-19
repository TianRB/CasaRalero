@extends('layouts.front')

@section('content')
<div class="contenedor-fichas">
	<header class="titulo-fichas">
		<h1>Catálogos</h1>
	</header>
	@foreach ($fichas as $f)

		<div class="container row fichas">
			<span class="icon-link"></span><a href="{{ asset($f->file) }}" target="_blank">{{$f->name}}</a>
		</div>
	@endforeach
</div>


@endsection
