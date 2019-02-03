@extends('layouts.front')

@section('content')

	@foreach ($fichas as $f)
		<div class="container row">
			<a href="{{ asset($f->file) }}">{{$f->name}}</a>
		</div>
	@endforeach


@endsection
