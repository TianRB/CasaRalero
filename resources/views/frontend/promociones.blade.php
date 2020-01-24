@extends('layouts.front')

@section('content')
  <div>
    <header>
      <h1>Promociones</h1>
    </header>
    <div class="contenedor-promociones">
    @foreach ($promociones as $p) {{-- Por cada Promoción --}}
    
      <div class="promociones">
        <figure>
          <img src="{{ asset($p->imagen) }}" alt="{{$p->name}}"/>
        </figure>
        <h2>{{$p->name}}</h2>
        <div>{{ $p->precio }}</div>
      </div>
   
    @endforeach {{-- Termina por cada Promoción --}}
     </div>
  </div>
@endsection
