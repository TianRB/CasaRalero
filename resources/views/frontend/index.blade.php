@extends('layouts.front')

@section('content')
<!-- ****************  COMIENZA SLIDE  **************** -->
<section class="contenedor-slide slider">
	@foreach($slides as $s)
	<article id="ele1" class="s_element @if($loop->first) s_visible @endif">
		<div class="texto-slide">
			<h2>{{ $s->title }}</h2>
			<p>{{ $s->description }}</p>
			<a href="{{ $s->url }}"><div class="btn-slide">ver más</div></a>
		</div>
		<figure><img src="{{ $s->path }}" alt="{{ $s->title }}"></figure>
	</article>
	@endforeach
	<nav class="nav-slide">
		<ul>
			<li id="btnAnt"><span class="icon-arrow-left2"></span></li>
			<li id="btnSig"><span class="icon-arrow-right2"></span></li>
		</ul>
	</nav>
</section>
<!-- ****************  TERMINA SLIDE  **************** -->

<!-- ****************  COMIENZA MOSAICOS INDEX  **************** -->
<div class="mosaicos-index">
	<a href="{{ url('/category/muebles/') }}">
		<article style="background:url('img/img-categorias/categoria-silleria.jpg')"> 
			<div class="circulo-rojo"></div>
			<h2>Muebles</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut</p>
		</article>
	</a>
	<a href="{{ url('/category/silleria/') }}">
		<article style="background:url('img/img-categorias/categoria-escritorios.jpg')">
			<div class="circulo-rojo"></div>
			<h2>Silleria</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut</p>
		</article>
	</a>
	<a href="{{ url('/category/archivo/') }}">
		<article style="background:url('img/img-categorias/categoria-mesas.jpg')">
			<div class="circulo-rojo"></div>
			<h2>Archivo</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut</p>
		</article>
	</a>
	<a href="{{ url('/category/cafeteria-y-hoteleria/') }}">
		<article style="background:url('img/img-categorias/categoria-archiveros.jpg')">
			<div class="circulo-rojo"></div>
			<h2>Cafetería y Hotelería</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut</p>
		</article>
	</a>
	<a href="{{ url('/category/sofas-y-espera/') }}">
		<article style="background:url('img/img-categorias/categoria-modulos.jpg')">
			<div class="circulo-rojo"></div>
			<h2>Sofas y Espera</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut</p>
		</article>
	</a>
	<a href="{{ url('/category/recepciones/') }}">
		<article style="background:url('img/img-categorias/categoria-recepciones.jpg')">
			<div class="circulo-rojo"></div>
			<h2>Recepciones</h2>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut</p>
		</article>
	</a>
</div>
<!-- ****************  TERMINA MOSAICOS INDEX  **************** -->

<!-- ****************  COMIENZA VIDEO INDEX  **************** -->
<div class="contenedor-video">
	<h3>Tres generaciones con pasión</h3>
	<div class="video-index">
		<iframe src="https://www.youtube.com/embed/oAEDnDzKb9o" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	</div>
</div>
<!-- ****************  TERMINA VIDEO INDEX  **************** -->
@endsection