@extends('layouts.front')

@section('content')

<!-- ****************  COMIENZA CABECERA PRODUCTOS  **************** -->
<div class="cabecera-productos {{ $image }}">

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
				<article class="{{ strtolower(implode(" ", str_replace(" ", "-", $a->subcategories->pluck('name')->all()))) }} article-item" style="display: inline-block;">
					{{-- <article class="{{ strtolower($a->subcategories->pluck('name')->implode(' ')) }} article-item"> --}}
					<div class="circulo-azul"></div>
					<figure>
						<img src="{{ asset($a->one_pic->pluck('path')->pop()) }}" alt="">
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
		$( document ).ready(function() {

			$( ".subcategory-checkbox-all" ).click(function() { // Cuando click en checkbox Todas
				$('.article-item').removeClass('hidden');		// Quita hidden de todos los artículos
				$('.subcategory-checkbox').prop('checked', false); // Quita palomita de todos los checkboxes
				// Las siguientes líneas son para visibilidad de articulos resultantes
				$('.article-item').fadeTo(0,0); // Hace articulos transparentes
				$('.article-item').fadeTo("fast",1); // Hace visibles los artículos gradualmente
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
				// Las siguientes líneas son para visibilidad de articulos resultantes
				$('.article-item').fadeTo(0,0); // Hace articulos transparentes
				$('.article-item').fadeTo("fast",1); // Hace visibles los artículos gradualmente

			});



		});
		</script>
	</section>
</section>
<!-- ****************  TERMINA CONTENEDOR PRODUCTOS  **************** -->

@endsection
