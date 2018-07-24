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
			  <input type="checkbox" class="subcategory-checkbox-all">
			  <span>Todas</span>
			</label>
			@foreach($subcategories as $s)
			  <label class="material-checkbox">
			    <input type="checkbox" class="subcategory-checkbox">
			    <span>{{ $s->name }}</span>
			</label>
			@endforeach
		</ul>
	</section>
	<section class="lista-productos">
		@foreach($articles as $a)
		<a href="/product/view/{{ $a->slug }}">
			<article class="{{ strtolower(implode(" ", str_replace(" ", "-", $a->subcategories->pluck('name')->all()))) }} article-item">
			{{-- <article class="{{ strtolower($a->subcategories->pluck('name')->implode(' ')) }} article-item"> --}}				
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
		<script>

		$( ".subcategory-checkbox-all" ).click(function() { // Cuando click en Todas
  			$('.article-item').removeClass('hidden');		// Quita hidden de todos los artículos
  			$(".subcategory-checkbox").prop('checked', false); // Quita palomita de todos los checkboxes
		});

		$( ".subcategory-checkbox" ).click(function() { // Cuando click en checkbox subcategoria
			if (!$("input[class='subcategory-checkbox']:checked").length > 0) { // Si ninguna subcategoría esta activada
				$('.article-item').removeClass('hidden');	// Muestra todos los articulos
	  		} else {	// En otro caso
	  			$('.article-item').addClass('hidden');	// Agrega hidden a todos los artículos
	  			$(".subcategory-checkbox-all").prop('checked', false);	//Quita palomita a checkbox de 'Todas'
	  			$("input[class='subcategory-checkbox']:checked").each(function () {	// Por cada checkbox de subcategoría que tenga palomita
	  				var cssClass = $(this).siblings('span').html().toLowerCase().replace(/\W+/g, '-');	// Obtiene nombre de subcategoria y guarda en cssClass
					//console.log('Class= '.concat(cssClass));	
					$("article.".concat(cssClass)).each(function () {	//Por cada artículo con cssClass
						//console.log($(this));
						$(this).removeClass('hidden');	// Quita clase hidden
					});
				});	  			
	  		}
		});

		</script>
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