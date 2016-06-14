
@extends('template.mainfont')

@section('title', 'Pelicula'.$pelicula->titulo_original)

@section('content')
<style>

body{
   background-color: #FBE7CE;
}

.div_main_individual{    
    padding: 5px;
    margin: 0 5px;
    display: block;
}

.div_peli_individual {
    background: #ffffff;
    box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);
    display: inline-block;
    width: 97.5%;
    padding: 10px 10px;
    margin: 10px 11px;
    vertical-align: top;
    height: 100%;  
    border-left: 5px solid green; 
    border-right: 1px solid green; 
    border-top: 1px solid green; 
    border-bottom: 1px solid green; 
}

.bg-aside{
	height: 100%;
	box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);
}

.linea{
	border-left: 5px solid green; 
	border-right: 1px solid green; 
}

.linea2{
	border-left: 1px solid green;
	border-right: 1px solid green;
	border-top: 1px solid green;
	border-bottom: 1px solid green;
}

.titulo_pelicula_individual{
	font-size: 25px;
	text-decoration: underline;
}

#img-peli-indivi{
	margin-left: 30px;	
}

#img-peli-indivi:hover{
	opacity: 0.9;
  	cursor: pointer;
}

.padding_in{
	line-height: 25px;
}

#Ficha span, strong{
	font-size: 12px;
}

#search_peli{
	width: 97%;
	margin-left: 12px;
}

.puntua{
	background-color: #000;
	color: #fff;
	width: 320px;
}

</style>
<br><br><br>
<div class="container">		
	<div class="row">
		<div class="col-md-2 margin_left">
			<div class="bg-aside linea2">
				<aside>
					@include('template.partials.aside_menu')
				</aside>
			</div>	
		</div>

		<div class="col-md-10">	
			    <div class="row">	
				    <div class="col-md-12">
					    <div style="border-top: 1px solid green;" class="bg-white linea ">
					    	<div style="margin-left:25px;font-size:18px;padding-top:5px;"><strong style="font-size:18px;"><i class="fa fa-table"></i> {{ $genero_view }}</strong>
					    			<span style="margin-left:90px;font-size:14px">
					    				<a href="{{ route('frontend.peliculas') }}">All</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'num') }}">#</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'A') }}">A</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'B') }}">B</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'C') }}">C</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'D') }}">D</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'E') }}">E</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'F') }}">F</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'G') }}">G</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'H') }}">H</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'I') }}">I</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'J') }}">J</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'K') }}">K</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'L') }}">L</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'M') }}">M</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'N') }}">N</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'O') }}">O</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'P') }}">P</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'Q') }}">Q</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'R') }}">R</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'S') }}">S</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'T') }}">T</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'U') }}">U</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'V') }}">V</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'W') }}">W</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'X') }}">X</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'Y') }}">Y</a>&nbsp;
					    				<a href="{{ route('principal.filterporletra', 'Z') }}">Z</a>&nbsp;
					    			</span>		
								</div>	
					    	</div>	
					    	<div style="border-bottom: 1px solid green;box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);" class="bg-white linea">							    	
							    		{!! Form::open(['route' => 'frontend.peliculas', 'method' => 'GET']) !!}	

							    		{!! Form::text('word', null, ['id' => 'search_peli', 'placeholder' => 'Search...']) !!}

							    		{!! Form::close() !!}							    			
							</div>
						</div>
					</div>		


				<div class="div_main_individual">
					<div class="div_peli_individual">
						<div class="row">	
								<blockquote style="margin-left:20px;">
								  <p><strong style="font-size:18px;">{{ $pelicula->titulo_original }}</strong></p>
								  <div style="background-color:white;font-size:12px;line-height:5px;margin-top:0px;"><cite title="Source Title">{{ $pelicula->titulo_castellano }}</cite></div>
								</blockquote>
								<hr style="width:95%;">

								 <ul class="nav nav-tabs" role="tablist" id="mytab_individual" style="margin-left:25px;width:95%;">
						          <li role="presentation" class="active"><a id="tab1" href="#Ficha" aria-controls="Ficha" role="tab" data-toggle="tab">Ficha</a></li>
						          <li role="presentation"><a id="tab1" href="#Trailers" aria-controls="Trailers" role="tab" data-toggle="tab">Trailers</a></li>
						          <li role="presentation"><a id="tab1" href="#Comments" aria-controls="Comments" role="tab" data-toggle="tab">Comments</a></li>	
						        </ul>

						        <div class="tab-content"> 
									<div role="tabpanel" class="tab-pane active" id="Ficha">
										<br><br>
										<div class="col-md-6">
											@foreach($pelicula->carteles as $image)
												<img id="img-peli-indivi" height="570" width="400" src="{{ asset('img/peliculas/carteles/' . $image->name) }}">
											@endforeach									
										</div>	
										<div class="col-md-6">
											<br>			
											<strong class="padding_in">Director: </strong>						
											@foreach($pelicula->directores as $dires)
												<span class="padding_in">{{ $dires->nombre }} </span>
											@endforeach
											<br>
											<strong class="padding_in">Reparto: </strong>
											@foreach($pelicula->actores as $actores)
												<span class="padding_in">{{ $actores->nombre }} </span>
											@endforeach
											<br>
											<strong class="padding_in">Genero: </strong>
											@foreach($pelicula->generos as $generos)
												{{ $generos->genero }} 
											@endforeach
											<br>
											<strong class="padding_in">Año: </strong> <span class="padding_in">{{ $pelicula->year }}</span>
											<br>
											<strong class="padding_in">Duracion: </strong> <span class="padding_in">{{ $pelicula->duracion }}</span>
											<br>
											<strong class="padding_in">Guion: </strong> <span class="padding_in">{{ $pelicula->guion }}</span>
											<br>
											<strong class="padding_in">Duracion: </strong> <span class="padding_in">{{ $pelicula->duracion }}</span>
											<br>
											<strong class="padding_in">Musica: </strong> <span class="padding_in">{{ $pelicula->musica }}</span>
											<br>
											<strong class="padding_in">Produccion: </strong> <span class="padding_in">{{ $pelicula->produccion }}</span>
											<br>
											<strong class="padding_in">Distribuidora: </strong> <span class="padding_in">{{ $pelicula->distribuidora }}</span>
											<br><br>
											<span> <div class="puntua">&nbsp;&nbsp;<b>Rating this: </b><div class='starrr'></div>&nbsp;&nbsp;&nbsp; <i class="fa fa-star fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;<span style="font-size:20px;" id="rati2">{{ $pelicula->rating }}</span>/ 5 &nbsp;&nbsp;&nbsp; Votos: <span id="votos">{{ $pelicula->total_votos }}</span></div></span>
											<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_puntuacion_pelis">
											<input type="hidden" name="id_pel" value="{{ $pelicula->id }}" id="id_pel">
											<hr>
											@if($pelicula->rating < 3)
												<i id="thumb" class="fa fa-thumbs-o-down fa-4x fa-border"></i>	
											@else
												<i id="thumb" class="fa fa-thumbs-o-up fa-4x fa-border"></i>
											@endif	
											<br><br><br>	
											@if($pelicula->oscar === 'si')
												<img src="{{ asset('img/movie-award-oscars_318-41295.jpg') }}" alt="" height="60" width="50">
												<span class="label label-primary"><span>Ganadora del oscar mejor pelicula </span></span>
											@else
											
											@endif										
										</div>

											<div class="col-md-12">
												<br><br>
												<strong style="padding: 10px;font-size:18px;">Sinopsis</strong>
												<hr style="margin-top: 3px;">
												<p style="padding: 10px;margin-top:-10px;">{{ $pelicula->sinopsis }}</p>
											</div>

									</div>
									<div role="tabpanel" class="tab-pane" id="Trailers">
										<br><br>
										@foreach($pelicula->trailers as $trailer)
										@if($trailer->name_trailer == "novideo.png")
											<img src="{{ asset('trailers/' . $trailer->name_trailer) }}" alt="">
											<br>
										@else
											<video style="margin-left:55px;" width="800" height="480" controls>
											  <source src="{{ asset('trailers/' . $trailer->name_trailer) }}" type="video/mp4">	
											</video><br><br>							
											<span style="margin-left:55px;"><strong>Idioma: </strong>{{ $trailer->idioma }}</span>	
											<a href="{{ route('admin.trailer.download',$trailer->id) }}" class="btn btn-success btn-xs pull-right" style="margin-right:55px;"> <i class="fa fa-download"></i> Download</a><br>
										@endif
										<hr style="width:95%;">
										@endforeach
									</div>
									<div role="tabpanel" class="tab-pane" id="Comments">
										<br><br>
										<div id="disqus_thread" style="margin-left:15px;width:95%;"></div>
											<script>
											/**
											* RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
											* LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables
											*/
											/*
											var disqus_config = function () {
											this.page.url = PAGE_URL; // Replace PAGE_URL with your page's canonical URL variable
											this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
											};
											*/
											(function() { // DON'T EDIT BELOW THIS LINE
											var d = document, s = d.createElement('script');

											s.src = '//sergiomoraga.disqus.com/embed.js';

											s.setAttribute('data-timestamp', +new Date());
											(d.head || d.body).appendChild(s);
											})();
											</script>
											<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
									</div>
						        </div>	


								<br><br>																
	
						</div>
					</div>
				</div>

		</div>	


</div>

</div>

@endsection


@section('js')

<script>  

$( document ).ready(function() {	

	$('.starrr').starrr({
		max: 5,
	  change: function(e, value){  	
	  			var route = "http://localhost:8000/admin/pelis_puntuacion";
			    var token = $("#token_puntuacion_pelis").val();
			    var id_pel = $("#id_pel").val();		    

			  $.ajax({
			      url:route,
			      headers: {'X-CSRF-TOKEN': token},
			      dataType:'json',      
			      type:'POST',     
			      data:{stars:value,id_pelicula:id_pel},
			      success:function(response){        	
					$("#rati2").text(response.rating); 
					$("#votos").text(response.total_votos);
					var className = $('#thumb').attr('class');  
					if(response.rating < 3 && className == 'fa fa-thumbs-o-up fa-4x fa-border'){	
						$("#thumb").removeClass("fa fa-thumbs-o-up fa-4x fa-border");					
						$("#thumb").addClass("fa fa-thumbs-o-down fa-4x fa-border");
					}
					if(response.rating >= 3 && className == 'fa fa-thumbs-o-down fa-4x fa-border'){	
						$("#thumb").removeClass("fa fa-thumbs-o-down fa-4x fa-border");					
						$("#thumb").addClass("fa fa-thumbs-o-up fa-4x fa-border");
					}					
			      },
			    });   		 
	  }
	});

	var height = $(".div_peli_individual").height();
	$(".bg-aside").height(height+114);


	
});

</script>

@endsection