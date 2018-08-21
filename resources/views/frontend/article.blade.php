@extends('layouts.front')

@section('content')

<!-- ****************  COMIENZA CONTENEDOR PRODUCTO  **************** -->
<section class="producto-elegido">
	<article>
		<div class="imagenes-ficha-tecnica imagenes-ficha-tecnica-movil">
			<figure class="imagen-principal">
				<img src="../{{ $main->one_pic->pluck('path')->pop() }}" alt="{{ $main->title }}">
			</figure>
			<div class="miniaturas">
				<figure><img src="img/productos/min-uno.jpg" alt=""></figure>
				<figure><img src="img/productos/min-dos.jpg" alt=""></figure>
				<figure><img src="img/productos/min-tres.jpg" alt=""></figure>
				<figure class="img-seleccionada"><img src="img/productos/min-cuatro.jpg" alt=""></figure>
			</div>
		</div>
		<div class="texto-ficha-tecnica">
			<div class="caja-descripcion-articulo">
				<h1>{{ $main->title}}</h1>
				<p>{!! $main->content !!}</p>
				<div class="btn-ficha-tecnica btn-uno">Solicitar cotización</div>
				<a href=""><div class="btn-ficha-tecnica btn-dos">Ver más</div></a>
			</div>
			<div class="contizacion">
				<h3>Datos del cliente</h3>
				<form action="" class="formulario-cotizacion">
					<ul>
						<li><input type="text" placeholder="Nombre"></li>
						<li><input type="text" placeholder="Apellido"></li>
						<li><input type="text" placeholder="Ciudad"></li>
						<li><input type="text" placeholder="Correo Electrónico"></li>
						<li><input type="text" placeholder="Teléfono"></li>
						<li><textarea name="" id="" placeholder="¿Cómo podemos ayudarle?"></textarea></li>
					</ul>
					<div class="btn-enviar">enviar</div>
					<div class="btn-regresar">regresar</div>
				</form>
			</div>
		</div>
		<div class="imagenes-ficha-tecnica imagenes-ficha-tecnica-desktop">
			<figure class="imagen-principal">
				<img src="../{{ $main->one_pic->pluck('path')->pop() }}" alt="{{ $main->title }}">
			</figure>
			<div class="miniaturas">
				@foreach($main->pics as $pic)
					<figure><img src="../{{ $pic->path }}" alt="{{ $main->title }}"></figure>
				@endforeach
			</div>
		</div>
	</article>
</section>
<!-- ****************  TERMINA CONTENEDOR PRODUCTO  **************** -->





<!-- ****************  COMIENZA OTROS PRODUCTOS  **************** -->

	<section class="otros-productos">
		<h2>Productos similares</h2>
		@foreach($related->take(4) as $a)
		<a href="/product/{{ $a->id }}">
			<article>
				<div class="circulo-azul"></div>
				<figure>
					<img src="../{{ $a->one_pic->pluck('path')->pop() }}" alt="{{ $a->title }}">
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

<!-- ****************  TERMINA OTROS PRODUCTOS  **************** -->

@endsection
