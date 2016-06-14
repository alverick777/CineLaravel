@extends('template.mainfont')

@section('title', 'Capitulo ')

@section('content')
<style>

body{
   background-color: #FBE7CE;
   margin:0;
   padding:0;
}

.main_capi_indiv{
    background: none repeat scroll 0 0 #FBE7CE;
    padding: 5px;
    margin: 0 5px;
    display: block;   
}

.div_capitulo_individual {
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

#cabecera{
	background-color: #333;
	display: inline-block;
	height: 9%;
	width: 100%;
	color: #ffffff;
}

#titulo_serie{
	font-size: 12px;
	margin-left: 10px;			
}

#titulo_capitulo{
	margin-left: 10px;
	font-size: 25px;
	padding-top: 0px;
}

.con{
	margin-left:15px;
	margin-top: 0px;
}

#poster_capitulo{
	margin-top: -4px;
}

.fotos{
	margin-left: 35px;
}

#search_seri{
	width: 96%;
	margin-left: 20px;
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
	box-shadow: 0px 5px 4px rgba(0, 0, 0, 0.1);
}


/* carousel */
.media-carousel 
{
  margin-bottom: 0;
  padding: 0 40px 30px 40px;
  margin-top: 30px;
}
/* Previous button  */
.media-carousel .carousel-control.left 
{
  left: -7px;
  background-image: none;
  background: none repeat scroll 0 0 #222222;
  border: 4px solid #FFFFFF;
  border-radius: 23px 23px 23px 23px;
  height: 40px;
  width : 40px;
  margin-top: 50px
}
/* Next button  */
.media-carousel .carousel-control.right 
{
  right: -9px !important;
  background-image: none;
  background: none repeat scroll 0 0 #222222;
  border: 4px solid #FFFFFF;
  border-radius: 23px 23px 23px 23px;
  height: 40px;
  width : 40px;
  margin-top: 50px
}
/* Changes the position of the indicators */
.media-carousel .carousel-indicators 
{
  right: 50%;
  top: auto;
  bottom: 0px;
  margin-right: -15px;
}
/* Changes the colour of the indicators */
.media-carousel .carousel-indicators li 
{
  background: #c0c0c0;
}
.media-carousel .carousel-indicators .active 
{
  background: #333333;
}
.media-carousel img
{
  width: 250px;
  height: 150px
}
/* End carousel */



</style>
<br><br><br>
<div class="container bg_main">		
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
						<div style="border-top: 1px solid green;" class="bg-white linea">
						    <div style="margin-left:25px;font-size:18px;padding-top:5px;"><strong style="font-size:18px;"><i class="fa fa-table"></i> {{ $genero_view }}</strong>
								<span style="margin-left:90px;font-size:14px">
						    		<a href="{{ route('frontend.series') }}">All</a>&nbsp;
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
					    <div style="border-bottom: 1px solid green;" class="bg-white linea">
					    	<span>	
							    {!! Form::open(['route' => 'frontend.series', 'method' => 'GET']) !!}	

							    {!! Form::text('word', null, ['id' => 'search_seri', 'placeholder' => 'Search...']) !!}

							    {!! Form::close() !!}
							</span>		
					    </div>					    	
					</div>
				</div>
			
			<div class="main_capi_indiv">
				<div class="div_capitulo_individual">
					<header id="cabecera">
					<div class="row">
						<div class="col-md-7">
						<div class="con">
								<span id="titulo_serie">{{ $nombre_serie }} <span style="font-size:9px;">({{ $fecha_inicio }} - {{ $fecha_termino }})</span> </span>
								<br>
								<span id="titulo_capitulo"><i class="fa fa-tags" aria-hidden="true"></i> {{ $capitulo->nombre_capitulo }} </span><br>
								<span style="font-size:12px;margin-left: 40px;">({{ $capitulo->nombre_capitulo_castellano }})</span>
						</div>
						</div>
						<div class="col-md-5">							
							<div style="margin-top:20px;margin-left:80px;font-size:12px;">	
								<span style="margin-right:5px;"><i class="fa fa-star fa-2x" aria-hidden="true"></i><span id="rati" style="font-size:20px;"> {{ $capitulo->rating }}</span>/5</span>
								 Rating this: <div class='starrr'></div>
							</div>
							<div style="font-size:10px;margin-left:80px;"> Votes: <span id="total_votos">{{ $capitulo->total_votos }}</span></div>	
							<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_puntuacion">
							<input type="hidden" name="id_capitulo" value="{{ $capitulo->id }}" id="id_capitulo">
						</div>	
					</div>
					</header>

					<div class="row">
						<div class="col-md-3">
							<div id="poster_capitulo">
								@foreach($capitulo->fotos as $image)
									@if($image->portadaYesNo === 'si')
										<img src="{{ asset('img/capitulos/img/' . $image->nombrefoto) }}" alt="" height="268" width="195">
									@endif
								@endforeach   
							</div>						
						</div>

						<div class="col-md-9">
							<section style="margin-top:20px;">
								<span><b>Director:</b> {{ $capitulo->director }}</span><br><br>
								<span><b>Guionista(s):</b> {{ $capitulo->guionista }}</span><br><br>
								<span><b>Duracion:</b> {{ $capitulo->duracion }} </span><br><br>
								<span><b>Fecha Estreno:</b> {{ $capitulo->fecha_estreno }}</span><br><br>
								<span><b>Temporada:</b> {{ $capitulo->temporada }}</span><br><br>
								<span><b>N° Capitulo (Temporada):</b> {{ $capitulo->num_capi_temp }}</span><br><br>
								<span><b>N° Capitulo (General):</b> {{ $capitulo->num_capi_general }}</span><br><br>
							</section>
						</div>
					</div>
					<hr>

					<div class="descripcion">
						<header style="margin-left:30px;"><b>Descripcion: </b></header><br>
						<p style="padding: 0px 30px;">
							{{ $capitulo->descripcion_capitulo }}
						</p>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="fotos">
								<span><b>Fotos</b></span><br>

								
							</div>

							<div class="carousel slide media-carousel" id="media">
							        <div class="carousel-inner">
							          <div class="item  active">
							            <div class="row">
							            	@foreach($tresprimeros as $image)
							              		<div class="col-md-4">										
							        	        	<a class="thumbnail" href="#"><img alt="" src="{{ asset('img/capitulos/img/' . $image->nombrefoto) }}"></a>						
							              		</div>  
											@endforeach
							            </div>
							          </div>

							          <div class="item">
							            <div class="row">
											@foreach($tresultimos as $image)
							              <div class="col-md-4">
							                <a class="thumbnail" href="#"><img alt="" src="{{ asset('img/capitulos/img/' . $image->nombrefoto) }}"></a>
							              </div>  
											@endforeach
							            </div>
							          </div>
							          
							        </div>
							        <a data-slide="prev" href="#media" class="left carousel-control">‹</a>
							        <a data-slide="next" href="#media" class="right carousel-control">›</a>
							    </div>  

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
  			var route = "http://localhost:8000/admin/puntuacion";
		    var token = $("#token_puntuacion").val();
		    var id_capi = $("#id_capitulo").val();		    

		  $.ajax({
		      url:route,
		      headers: {'X-CSRF-TOKEN': token},
		      dataType:'json',      
		      type:'POST',     
		      data:{stars:value,id_capitulo:id_capi},
		      success:function(response){        	
				$("#rati").text(response.rating); 
				$("#total_votos").text(response.total_votos);     	
		      },
		    });   
	 
  }
});

  $('#media').carousel({
    pause: true,
    interval: false,
  });

  var height = $(".div_capitulo_individual").height();
  $(".bg-aside").height(height+422);

});
</script>

@endsection

