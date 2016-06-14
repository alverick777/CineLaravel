
@extends('template.mainfont')

@section('title', 'All News')

@section('content')


<br><br>
<div class="container bg_main">		
	<div class="row topp">

		<div class="col-md-2 margin_left">
				<aside>
					@include('template.partials.aside_menu')
				</aside>							
		</div>

		<div class="col-md-9 col-md-offset-1">	
			<header id="titulo_pagina"> <i class="fa fa-bookmark fa-1x" aria-hidden="true"> </i> Noticias y actualidad de Cine</header>
			<hr>
			@foreach($noticias as $noti)	
			<div class="noticia_container">
				<img id="imagen" src="{{ asset('img/noticias_peliculas/' . $noti->foto) }}" height="256" width="640" alt=""><br>
				<div class="titulo_news">
				<div class="div_titulo_noticia"> <span><a class="titulo_noticia" href="{{ route('frontend.noticia_pelicula_individual', $noti->id) }}">{{ $noti->titulo }}</a> </span></div>
					<span id="fecha_noticia">{{ $noti->created_at->format('l jS \\of F Y h:i:s A') }} | <span><a href="{{ route('frontend.pelicula_individual', $noti->pelicula_id) }}">{{ $noti->pelicula->titulo_original }}</a></span> | Cine </span><br><br>
					<p class="descripcion_noticia">
						{{ $noti->descripcion }}
					</p>
				</div>
			</div>
			<hr>
			@endforeach
		</div>
			<div class="text-center">
				{!! $noticias->render() !!}
			</div>	

		


	</div>			
</div>





@endsection
@section('js')

<script>



</script>
@endsection