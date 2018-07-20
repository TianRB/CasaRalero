<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	   <link rel="shortcut icon" type="image/png" href="{{ url('img/casa-ralero-icon.png') }}"/>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	{!! Html::style('css/main.css') !!}
	<title>Casa Ralero</title>
</head>
<body>


<!-- ****************  COMIENZA HEADER  **************** -->
<header class="header-principal large">
	<div class="wrapt">
		<a href="{{ url('/') }}">
			<div class="logo">
				<figure>
					<img src="{{ asset('img/logo-casa-ralero.png') }}" alt="">
				</figure>
			</div>
		</a>
		<div class="icono-menu-movil">
			<div class="rayita rayita-uno"></div>
			<div class="rayita rayita-dos"></div>
			<div class="rayita rayita-tres"></div>
		</div>
		<nav class="navegacion-principal">
			<div class="circulo-negro"></div>
			<ul class="menu-principal">
				<li><a href="{{ url('/category/muebles/') }}">Muebles</a></li>
				<li><a href="{{ url('/category/silleria/') }}">Silleria</a></li>
				<li><a href="{{ url('/category/archivo/') }}">Archivo</a></li>
				<li><a href="{{ url('/category/cafeteria-y-hoteleria/') }}">Cafetería y Hotelería</a></li>
				<li><a href="{{ url('/category/sofas-y-espera/') }}">Sofas y Espera</a></li>
				<li><a href="{{ url('/category/recepciones/') }}">Recepciones</a></li>
				<li><a href="{{ url('/category/accesorios/') }}">Accesorios</a></li>
			</ul>
			<div class="menu-secundario">
				<nav>
					<ul>
						<li><p>Tel. 229 931 6993</p></li>
						<li class="btn-horario"><p>Horarios</p></li>
						<!--<li><a href="">Nosotros</a></li>-->
						<li><a href="#contacto" class="btn-contacto">Contacto</a></li>
					</ul>
				</nav>
				<div class="horario">
					<span class="triangulito"></span>
					<p><strong>Lunes a viernes:</strong> de 9:30  a 13:30 y de 16:00 a 19:00 hrs.</p>
					<p><strong>Sábados:</strong> de 9:30 a 13:30 hrs.</p>
				</div>
				<div class="btn-call">Llámanos</div>
			</div>
		</nav>
	</div>
	<div class="pleca-azul"></div>
</header>
<div class="pleca-header"></div>
<!-- ****************  TERMINA HEADER  **************** -->

<!-- ****************  ABRE CONTENIDO  **************** -->

@yield('content')

<!-- ****************  TERMINA CONTENIDO  **************** -->

<!-- ****************  ABRE FOOTER  **************** -->
<div class="contacto" id="contacto">
	<div class="fondo-contacto"></div>
		<h3>Mantente en Contacto</h3>
		<form action="{{route('send.message')}}" metohd="POST" class="formulario-contacto">
			{{ csrf_field() }}
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
			<div class=""><input type="submit" class="btn-enviar" value="Enviar"></div>
		</form>
</div>
<div class="mapa">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3768.137991021482!2d-96.13102218525266!3d19.18917438702312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85c346c7f5137829%3A0x76570dd6a13eaa96!2sCasa+Ralero!5e0!3m2!1ses-419!2smx!4v1530237541464" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<footer>
	<p>1° de mayo 1002, colonia ricardo flores magon,
 91900 Veracruz, Ver.</p>
 <p>Casa Ralero® 2018. Todos los derechos reservados</p>
</footer>
<!-- ****************  CIERRA FOOTER  **************** -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
{!! Html::script('js/script.js') !!}


</body>
</html>
