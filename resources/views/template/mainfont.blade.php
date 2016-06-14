<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>@yield('title','Home') | Scorpion's Megazine</title>
	<link rel="stylesheet" href=" {{ asset('plugins/bootstrap/css/bootstrap.css') }} ">	   
	<link rel="stylesheet" href=" {{ asset('css/nav.css') }} ">
	<link rel="stylesheet" href=" {{ asset('css/footer.css') }} ">
	<link rel="stylesheet" href=" {{ asset('css/login.css') }} ">
	<link rel="stylesheet" href=" {{ asset('css/principal.css') }} ">
	<link rel="stylesheet" href=" {{ asset('css/create_actor.css') }} ">	
	<link rel="stylesheet" href=" {{ asset('css/side_nav.css') }}" >
	<link rel="stylesheet" href=" {{ asset('css/perfil.css') }}" >	
	<link rel="stylesheet" href=" {{ asset('css/slide_pelis_main.css') }}" >
	<link rel="stylesheet" href=" {{ asset('css/aside_menu.css') }}" >
	<link rel="stylesheet" href=" {{ asset('css/todaslasnoticias.css') }}" >
	<link rel="stylesheet" href=" {{ asset('css/noticia_individual.css') }}" >
	<link rel="stylesheet" href=" {{ asset('css/principal_peliculas.css') }}" >
	<link rel="stylesheet" href=" {{ asset('plugins/bootstrap/css/font-awesome.min.css') }}">
	<link rel="stylesheet" href=" {{ asset('plugins/choosen/chosen.css') }}">
	<link rel="stylesheet" href=" {{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">
	<link rel="stylesheet" href=" {{ asset('css/starrr.css') }}">

</head>
<body>
	@include('template.partials.nav')
	
	<div class="container">
		<div class="row">
			<div class="col-md-11 col-md-offset-1">
				<br>
				@include('flash::message')								
			</div>
		</div>
	</div>
	@yield('content')	
	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokengeneral">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokenmensajes">
	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokenleido">
	@include('template.partials.footer')	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}"></script>
	<script src="{{ asset('plugins/Choosen/chosen.jquery.js') }}"></script>
	<script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>	
	<script src="{{ asset('js/enviar_mensaje.js') }}"></script>
	<script src="{{ asset('js/revisa_mensaje.js') }}"></script>
	<script src="{{ asset('js/directores.js') }}"></script>
	<script src="{{ asset('js/cargar_awards.js') }}"></script>
	<script src="{{ asset('js/series.js') }}"></script>
	<script src="{{ asset('js/peliculas.js') }}"></script>
	<script src="{{ asset('js/cargar_filmografia_actor.js') }}"></script>
	<script src="{{ asset('js/actores.js') }}"></script>
	<script src="{{ asset('js/slide_pelis_main.js') }}"></script>
	<script src="{{ asset('js/aside_menu.js') }}"></script>
	<script src="{{ asset('js/starrr.js') }}"></script>
	
	@yield('js')
</body>
</html>