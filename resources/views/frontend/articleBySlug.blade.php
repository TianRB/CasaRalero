@extends('layouts.front')

@section('content')

<!-- ****************  COMIENZA CONTENEDOR PRODUCTO  **************** -->
<section class="producto-elegido">
	<article>
		<div class="imagenes-ficha-tecnica imagenes-ficha-tecnica-movil">
			<figure class="imagen-principal">
				<img src="{{ asset($main->one_pic->pluck('path')->pop()) }}" alt="{{ $main->title }}" id="img-main2">
			</figure>
			<div class="miniaturas">
				@foreach($main->pics as $pic)
					<figure><img src="{{ asset($pic->path) }}" alt="{{ $main->title }}" class="img-mini"></figure>
				@endforeach
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
				<form action="{{route('send.message')}}" metohd="POST" class="formulario-cotizacion">
					{{ csrf_field() }}
					<input type="hidden" name="article" value="{{$main->title}}">
					<ul>
						<li>
							<input type="text" placeholder="Nombre y Apellido" name="name">
							<br>
							@if ($errors->has('name'))
								<small style="color:red;">
									<strong>{{ $errors->first('name') }}</strong>
								</small>
							@endif
						</li>
						<li>
							<input type="text" placeholder="Correo Electrónico" name="email">
							<br>
							@if ($errors->has('email'))
								<small style="color:red;">
									<strong>{{ $errors->first('email') }}</strong>
								</small>
							@endif
						</li>
						<li>
							<input type="text" placeholder="Teléfono" name="phone">
							<br>
							@if ($errors->has('phone'))
								<small style="color:red;">
									<strong>{{ $errors->first('phone') }}</strong>
								</small>
							@endif
						</li>
						<li>
							<textarea id="" placeholder="¿Cómo podemos ayudarle?" name="message"></textarea>
						</li>
					</ul>
					<div class=""><input type="submit" class="btn-enviar" value="Enviar"><div class="btn-regresar">regresar</div></div>

				</form>
			</div>
		</div>
		<div class="imagenes-ficha-tecnica imagenes-ficha-tecnica-desktop">
			<figure class="imagen-principal">
				<img src="{{ asset($main->one_pic->pluck('path')->pop()) }}" alt="{{ $main->title }}" id="img-main">
			</figure>
			<div class="miniaturas">
				@foreach($main->pics as $pic)
					<figure><img src="{{ asset($pic->path) }}" alt="{{ $main->title }}" class="img-mini"></figure>
				@endforeach
			</div>
		</div>
	</article>
	<script>
	$('.img-mini').on('click', function() {
		var newSource = $(this).attr('src');
		$("#img-main").attr("src",newSource);
		$("#img-main2").attr("src",newSource);
	});
	</script>
</section>
<!-- ****************  TERMINA CONTENEDOR PRODUCTO  **************** -->





<!-- ****************  COMIENZA OTROS PRODUCTOS  **************** -->

<section class="otros-productos">
	<h2>Productos similares</h2>
	@foreach($related->take(4) as $a)
		<a href="/product/view/{{ $a->slug }}">
			<article>
				<div class="circulo-azul"></div>
				<figure>
					<img src="{{ asset($a->one_pic->pluck('path')->pop()) }}" alt="{{ $a->title }}">
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
