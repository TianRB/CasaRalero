@extends('layouts.front')

@section('content')
  <div>
    <header>
      <h1>Promociones</h1>
    </header>
    @foreach ($promociones as $p) {{-- Por cada Promoción --}}
      <div>
        <img src="{{ asset($p->imagen) }}" alt="{{$p->name}}"/>
        <p>{{$p->name}}</p>
      </div>
    @endforeach {{-- Termina por cada Promoción --}}
  </div>
@endsection
