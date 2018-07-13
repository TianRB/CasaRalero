@extends('layouts.front')

@section('content')

<!-- ****************  COMIENZA CABECERA PRODUCTOS  **************** -->
<div class="cabecera-productos">
	<figure><img src="../img/cabecera-productos.jpg" alt=""></figure>
</div>
<!-- ****************  TERMINA CABECERA PRODUCTOS   **************** -->



<!-- ****************  COMIENZA CONTENEDOR PRODUCTOS  **************** -->
<section class="contenedor-productos">
	<section class="check-subcategorias">
		<ul>
			<label class="material-checkbox">
			  <input type="checkbox">
			  <span>Ejecutivo</span>
			</label>
			<label class="material-checkbox">
			  <input type="checkbox">
			  <span>operativo y cajero</span>
			</label>
			<label class="material-checkbox">
			  <input type="checkbox">
			  <span>visita</span>
			</label>
			<label class="material-checkbox">
			  <input type="checkbox">
			  <span>industrial</span>
			</label>
			<label class="material-checkbox">
			  <input type="checkbox">
			  <span>multiusos</span>
			</label>
		</ul>
	</section>
	<section class="lista-productos">
		@foreach($articles as $a)
		<a href="/product/{{ $a->id }}">
			<article class="{{ strtolower($a->subcategories->pluck('name')->implode(' ')) }}">
				<div class="circulo-azul"></div>
				<figure>
					<img src="../{{ $a->one_pic->pluck('path')->pop() }}" alt="">
				</figure>
				<div class="texto-articulo">
					<h2>{{ $a->title }}</h2>
					<p>{!! $a->content !!}</p>
					<div class="btn-ficha-tecnica"><p>Ver más +</p></div>
				</div>
			</article>
		</a>
		@endforeach
	</section>
</section>
<!-- ****************  TERMINA CONTENEDOR PRODUCTOS  **************** -->

@endsection
{{-- @extends('layouts.front')

@section('content')

<!-- ****************  COMIENZA CABECERA PRODUCTOS  **************** -->
<div class="cabecera-productos">
	<figure><img src="../img/cabecera-productos.jpg" alt=""></figure>
</div>
<!-- ****************  TERMINA CABECERA PRODUCTOS   **************** -->



<!-- ****************  COMIENZA CONTENEDOR PRODUCTOS  **************** -->
<section class="contenedor-productos">
	<section class="check-subcategorias">
		<ul>
			<label class="material-checkbox">
			  <input type="checkbox">
			  <span>Ejecutivo</span>
			</label>
			<label class="material-checkbox">
			  <input type="checkbox">
			  <span>operativo y cajero</span>
			</label>
			<label class="material-checkbox">
			  <input type="checkbox">
			  <span>visita</span>
			</label>
			<label class="material-checkbox">
			  <input type="checkbox">
			  <span>industrial</span>
			</label>
			<label class="material-checkbox">
			  <input type="checkbox">
			  <span>multiusos</span>
			</label>
		</ul>
	</section>
	<section class="lista-productos">
		<a href="">
			<article>
				<div class="circulo-azul"></div>
				<figure>
					<img src="../img/productos/producto-uno.jpg" alt="">
				</figure>
				<div class="texto-articulo">
					<h2>Nombre del producto</h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut </p>
					<div class="btn-ficha-tecnica"><p>Ver más +</p></div>
				</div>
			</article>
		</a>
		<a href="">
			<article>
				<div class="circulo-azul"></div>
				<figure>
					<img src="../img/productos/producto-uno.jpg" alt="">
				</figure>
				<div class="texto-articulo">
					<h2>Nombre del producto</h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut </p>
					<div class="btn-ficha-tecnica"><p>Ver más +</p></div>
				</div>
			</article>
		</a>
		<a href="">
			<article>
				<div class="circulo-azul"></div>
				<figure>
					<img src="../img/productos/producto-uno.jpg" alt="">
				</figure>
				<div class="texto-articulo">
					<h2>Nombre del producto</h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut </p>
					<div class="btn-ficha-tecnica"><p>Ver más +</p></div>
				</div>
			</article>
		</a>
		<a href="">
			<article>
				<div class="circulo-azul"></div>
				<figure>
					<img src="../img/productos/producto-uno.jpg" alt="">
				</figure>
				<div class="texto-articulo">
					<h2>Nombre del producto</h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut </p>
					<div class="btn-ficha-tecnica"><p>Ver más +</p></div>
				</div>
			</article>
		</a>
		<a href="">
			<article>
				<div class="circulo-azul"></div>
				<figure>
					<img src="../img/productos/producto-uno.jpg" alt="">
				</figure>
				<div class="texto-articulo">
					<h2>Nombre del producto</h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut </p>
					<div class="btn-ficha-tecnica"><p>Ver más +</p></div>
				</div>
			</article>
		</a>
		<a href="">
			<article>
				<div class="circulo-azul"></div>
				<figure>
					<img src="../img/productos/producto-uno.jpg" alt="">
				</figure>
				<div class="texto-articulo">
					<h2>Nombre del producto</h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut </p>
					<div class="btn-ficha-tecnica"><p>Ver más +</p></div>
				</div>
			</article>
		</a>
	</section>
</section>
<!-- ****************  TERMINA CONTENEDOR PRODUCTOS  **************** -->

@endsection
 --}}