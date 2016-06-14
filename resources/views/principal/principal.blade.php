@extends('template.mainfont')

@section('title', 'Pagina Principal')

@section('content')
<style>

body{
   background-color: #FBE7CE;
}

.bg_main{
    background-color: #FCF3E8;
    height: 100%;
  }

  #fecha{
  	font-size: 10px;  	
  }

</style>

<div class="container bg_main">
		<br><br><br>
		<div class="row">
			<div class="col-md-2">
				@include('template.partials.aside_menu')
			</div>

			<div class="col-md-10">			
				<div class="category_principal">
					<div class="div_category">
							<div class="movie_news"><strong><i class="fa fa-film fa-2x"></i> MOVIE NEWS</strong></div>
							<hr>
								@foreach($noticias as $key => $value)																			
								<div class="row">
									@if($key === 0 || $key === 2)
										<div class="col-md-5">																
											<a href="{{ route('frontend.pelicula_individual', $value->pelicula_id) }}"><img src="{{ asset('img/noticias_peliculas/' . $value->foto) }}" class="imagen666" alt="" width="350" height="235"></a>
										</div>	
									@else
										<div class="col-md-7">				
											<a href="{{ route('frontend.pelicula_individual', $value->pelicula_id) }}" class="titulo_noticia"><strong>{{ $value->titulo }} </strong></a>
											<p class="descripcion">{{ $value->descripcion }}</p>
											<a class="btn btn-danger btn-xs" href="{{ route('frontend.noticia_pelicula_individual', $value->id) }}"><i class="fa fa-eye"></i> See More</a>
											<a class="btn btn-primary btn-xs" href="{{ route('frontend.pelicula_individual', $value->pelicula_id) }}"><i class="fa fa-newspaper-o"></i> Ficha</a> </br></br>
											<span id="fecha_publicacion_noticia"><strong>the news has been published: <span id="fecha">({{ $value->created_at->format('l jS \\of F Y h:i:s A') }})</span></strong></span>
										</div>										
									@endif
									@if($key === 1 || $key === 3)	
										<div class="col-md-5">				
											<a href="{{ route('frontend.pelicula_individual', $value->pelicula_id) }}"><img src="{{ asset('img/noticias_peliculas/' . $value->foto) }}" class="imagen666" alt="" width="350" height="235"></a>
									</div>
									@else
										<div class="col-md-7">	
										<a href="{{ route('frontend.pelicula_individual', $value->pelicula_id) }}" class="titulo_noticia"><strong>{{ $value->titulo }}</strong></a>
											<p class="descripcion">{{ $value->descripcion }}</p>
											<a class="btn btn-danger btn-xs" href="{{ route('frontend.noticia_pelicula_individual', $value->id) }}"><i class="fa fa-eye"></i> See More</a>
											<a class="btn btn-primary btn-xs" href="{{ route('frontend.pelicula_individual', $value->pelicula_id) }}"><i class="fa fa-newspaper-o"></i> Ficha</a> </br></br>
											<span id="fecha_publicacion_noticia"><strong>the news has been published: <span id="fecha">({{ $value->created_at->format('l jS \\of F Y h:i:s A') }})</span></strong></span>	
										</div>	
									@endif							
																	
								</div>
								<hr>
								@endforeach
								<a href="{{ route('frontend.noticias_peliculas') }}" id="allnews">All News</a>
					</div>


					<div class="div_category">
							<div class="movie_news"><strong><i class="fa fa-television fa-2x"></i> TV. SERIE NEWS</strong></div>
							<hr>
							@foreach($noticias_serie as $key => $value)																			
								<div class="row">
									@if($key === 0 || $key === 2)
										<div class="col-md-5">																
											<a href="{{ route('frontend.noticia_serie_individual', $value->id) }}"><img src="{{ asset('img/noticias_series/' . $value->foto) }}" class="imagen666" alt="" width="350" height="235"></a>
										</div>	
									@else
										<div class="col-md-7">				
											<a href="{{ route('frontend.noticia_serie_individual', $value->id) }}" class="titulo_noticia"><strong>{{ $value->titulo }}</strong></a>
											<p class="descripcion">{{ $value->descripcion }}</p>
											<a class="btn btn-danger btn-xs" href="{{ route('frontend.noticia_serie_individual', $value->id) }}"><i class="fa fa-eye"></i> See More</a>
											<a class="btn btn-primary btn-xs" href="{{ route('frontend.serie_individual', $value->serie_id) }}"><i class="fa fa-newspaper-o"></i> Ficha</a> </br></br>
											<span id="fecha_publicacion_noticia"><strong>the news has been published: <span id="fecha">({{ $value->created_at->format('l jS \\of F Y h:i:s A') }})</span></strong></span>
										</div>										
									@endif
									@if($key === 1 || $key === 3)	
										<div class="col-md-5">				
											<a href="{{ route('frontend.noticia_serie_individual', $value->id) }}"><img src="{{ asset('img/noticias_series/' . $value->foto) }}" class="imagen666" alt="" width="350" height="235"></a>
									</div>
									@else
										<div class="col-md-7">	
										<a href="{{ route('frontend.noticia_serie_individual', $value->id) }}" class="titulo_noticia"><strong>{{ $value->titulo }}</strong></a>
											<p class="descripcion">{{ $value->descripcion }}</p>
											<a class="btn btn-danger btn-xs" href="{{ route('frontend.noticia_serie_individual', $value->id) }}"><i class="fa fa-eye"></i> See More</a>
											<a class="btn btn-primary btn-xs" href="{{ route('frontend.serie_individual', $value->serie_id) }}"><i class="fa fa-newspaper-o"></i> Ficha</a> </br></br>
											<span id="fecha_publicacion_noticia"><strong>the news has been published: <span id="fecha">({{ $value->created_at->format('l jS \\of F Y h:i:s A') }})</span></strong></span>	
										</div>	
									@endif							
																	
								</div>
								<hr>
								@endforeach
							<a href="{{ route('frontend.noticias_series') }}" id="allnews">All News</a>
					</div>

					<div class="div_category">
							<div class="movie_news"><strong><i class="fa fa-user fa-2x" aria-hidden="true"></i> ACTORS NEWS</strong></div>
							<hr>							
							@foreach($noticias_actor as $key => $value)																			
								<div class="row">
									@if($key === 0 || $key === 2)
										<div class="col-md-5">																
											<a href="{{ route('frontend.noticia_actor_individual', $value->id) }}"><img src="{{ asset('img/noticias_actores/' . $value->foto) }}" class="imagen666" alt="" width="350" height="235"></a>
										</div>	
									@else
										<div class="col-md-7">				
											<a href="{{ route('frontend.noticia_actor_individual', $value->id) }}" class="titulo_noticia"><strong>{{ $value->titulo }}</strong></a>
											<p class="descripcion">{{ $value->descripcion }}</p>
											<a class="btn btn-danger btn-xs" href="{{ route('frontend.noticia_actor_individual', $value->id) }}"><i class="fa fa-eye"></i> See More</a>
											<span style="margin-left:10px;" id="fecha_publicacion_noticia"><strong>the news has been published: <span id="fecha">({{ $value->created_at->format('l jS \\of F Y h:i:s A') }})</span></strong></span>
										</div>										
									@endif
									@if($key === 1 || $key === 3)	
										<div class="col-md-5">				
											<a href="{{ route('frontend.noticia_actor_individual', $value->id) }}"><img src="{{ asset('img/noticias_actores/' . $value->foto) }}" class="imagen666" alt="" width="350" height="235"></a>
									</div>
									@else
										<div class="col-md-7">	
										<a href="{{ route('frontend.noticia_actor_individual', $value->id) }}" class="titulo_noticia"><strong>{{ $value->titulo }}</strong></a>
											<p class="descripcion">{{ $value->descripcion }}</p>
											<a class="btn btn-danger btn-xs" href="{{ route('frontend.noticia_actor_individual', $value->id) }}"><i class="fa fa-eye"></i> See More</a>											
											<span style="margin-left:10px;" id="fecha_publicacion_noticia"><strong>the news has been published: <span id="fecha">({{ $value->created_at->format('l jS \\of F Y h:i:s A') }})</span></strong></span>	
										</div>	
									@endif							
																	
								</div>
								<hr>
								@endforeach

							<br><br>
							<a href="{{ route('frontend.noticias_actores') }}" id="allnews">All News</a>
					</div>

					<div class="div_category">
							<div class="movie_news"><strong><i class="fa fa-gamepad fa-2x"></i> VIDEOGAMES NEWS</strong></div>
							<hr>
							<br><br>
							<a href="#" id="allnews">All News</a>
					</div>

					<div class="div_category">
							<div class="movie_news"><strong><i class="fa fa-html5 fa-2x"></i> SOFTWARE NEWS</strong></div>
							<hr>
							<br><br>
							<a href="#" id="allnews">All News</a>
					</div>

					<div class="div_category">
							<div class="movie_news"><strong><i class="fa fa-book fa-2x"></i> BOOKS NEWS</strong></div>
							<hr>
							<br><br>
							<a href="#" id="allnews">All News</a>
					</div>

					


				</div>		
			</div>
			
		</div>
</div>	


@endsection
@section('js')

<script>



</script>
@endsection