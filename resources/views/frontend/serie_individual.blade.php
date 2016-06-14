@extends('template.mainfont')

@section('title', 'Serie ' . $serie->titulo_serie)

@section('content')
<style>

body{
   background-color: #FBE7CE;
}

.div_main_individual{
    background: none repeat scroll 0 0 #FBE7CE;
    padding: 5px;
    margin: 0 5px;
    display: block;   
}


.div_serie_individual {
    background: #ffffff;
    box-shadow: 7px 7px 4px rgba(0, 0, 0, 0.1);
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

.titulo_serie_individual{
	font-size: 25px;
	text-decoration: underline;
}

.titulo_pelicula_individual{
	font-size: 25px;
	text-decoration: underline;
}

#img-peli-indivi{
	margin-left: 30px;	
}

.left-margin{
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

.linea{
	border-left: 5px solid green;
	border-right: 1px solid green;
}

.linea2{
	border-left: 1px solid green;
	border-right: 1px solid green;
	border-top: 1px solid green;
	border-bottom: 1px solid green;
	box-shadow: 0px 7px 4px rgba(0, 0, 0, 0.1);
}

.foto_serie{
	margin-left: 25px;
	margin-top: 20px;
}

.series_datos{
	margin-left: 25px;
	margin-top: 20px;	
}

#sinopsis_serie{	
	padding: 0px 35px 0px 0px;	
}

.puntua{
	background-color: #000;
	color: #fff;
	width: 300px;
}

#search_seri{
	width: 96%;
	margin-left: 20px;
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
					<div style="border-top: 1px solid green;" class="bg-white linea">
					    <div style="margin-left:25px;font-size:18px;padding-top:5px;"><strong style="font-size:18px;"><i class="fa fa-table"></i> {{ $genero_view }}</strong>
									<span style="margin-left:25px;font-size:14px">
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

			<div class="div_main_individual">
					<div class="div_serie_individual">
						<div class="row">							
							<blockquote style="margin-left:20px;">
								<p><strong style="font-size:18px;">{{ $serie->titulo_serie }}</strong></p>
								<footer style="background-color:white;font-size:10px;line-height:5px;margin-top:0px;"><cite title="Source Title">{{ $serie->year_serie_inicio }} {{ $serie->year_serie_termino }} </cite></footer>
							</blockquote>
							<hr style="width:95%;">
							<ul class="nav nav-tabs" role="tablist" id="mytab_individual" style="margin-left:25px;width:95%;">
						        <li role="presentation" class="active"><a id="tab1" href="#Ficha" aria-controls="Ficha" role="tab" data-toggle="tab">Ficha</a></li>						        
						        <li role="presentation"><a id="tab1" href="#Comments" aria-controls="Comments" role="tab" data-toggle="tab">Comments</a></li>			
								@for($i = 1; $i <= $num_seasons; $i++)
						        	<li role="presentation"><a id="tab1" href="#Season{{ $i }}" aria-controls="Season{{ $i }}" role="tab" data-toggle="tab"> Season {{ $i }}</a></li>
						        @endfor						    
						    </ul>	

							<div class="tab-content"> 
								<div role="tabpanel" class="tab-pane active" id="Ficha">
									

									<div class="row">
										<div class="col-md-4">
											<div class="foto_serie">
												@foreach($serie->carteles as $image)
													<img src="{{ asset('img/series/carteles/' . $image->name ) }}" alt="" height="450" width="300"><br><br>
													 
												@endforeach 
											</div>
										</div>
										<div class="col-md-8">
											<div class="series_datos">
												<span><b>Titulo:</b> {{ $serie->titulo_serie }}</span><br>
												<span>
													<b>Director:</b>
													@foreach($serie->directores as $director)			
														{{ $director->nombre }},
													@endforeach	
												</span><br>
												<span><b>Fecha Inicio:</b> {{ $serie->year_serie_inicio }} </span><br>
												<span><b>Fecha Termino:</b> {{ $serie->year_serie_termino }}</span><br>
												<span><b>N° Temporadas:</b> {{ $serie->temporadas }}</span><br>
												<span><b>Genero:</b> 
													@foreach($serie->generos as $gene)			
														{{ $gene->genero }},
													@endforeach												
												</span><br>
												<span><b>Reparto:</b> 
													@foreach($serie->actores as $actor)			
														{{ $actor->nombre }},
													@endforeach												
												</span><br><br>
												<span> <div class="puntua">&nbsp;&nbsp;Rating this: <div class='starrr'></div>&nbsp;&nbsp;&nbsp; <i class="fa fa-star fa-2x" aria-hidden="true"></i>&nbsp;&nbsp;<span style="font-size:20px;" id="rati2">{{ $serie->rating }}</span>/ 5 &nbsp;&nbsp;&nbsp; Votos: <span id="votos">{{ $serie->total_votos }}</span></div></span><br><br>
												<span><b>Sinopsis: </b></span><br><br>
												<p id="sinopsis_serie">
													{{ $serie->sinopsis }}
												</p>
												<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_puntu">
												<input type="hidden" name="id_ser" value="{{ $serie->id }}" id="id_ser">
											</div>
										</div>
									</div>


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
								@for($w = 1; $w <= $num_seasons; $w++)
								<div role="tabpanel" class="tab-pane" id="Season{{ $w }}">
									<section style="margin-left:20px;width:95%;">
									<br><br><br>
									
										@foreach($capitulos as $capi)	
											@if($capi->temporada == $w)		
											<div style="margin-left:10px;border-left: 3px solid #{{ $capi->color_barra }};">
												<header style="margin-left:10px;margin-bottom:10px;"> <b><u> {{ $capi->nombre_capitulo }} </u>- <span style="font-size:11px;">({{ $capi->nombre_capitulo_castellano }})</span></b> &nbsp;&nbsp;&nbsp;<span style="color:gray;font-size:10px;">Fecha Estreno: {{ $capi->fecha_estreno }}</span> <a class="btn btn-danger btn-xs pull-right" href="{{ $capi->link_imdb }}" style="margin-right:35px;"><i class="fa fa-info-circle" aria-hidden="true"></i></a> </header>
												<section style="margin-left:10px;"> 
													<p>
														{{ $capi->sinopsis_capitulo }}
													</p>													
													<a class="btn btn-warning btn-xs" href="{{ route('frontend.capitulo_indiv', $capi->id) }}"><i class="fa fa-eye" aria-hidden="true"></i> See More</a>
													<br><br>
												</section>
												<div style="margin-left:10px;background-color:black;color:white;padding-left:5px;width:98%;font-size:14px;">
													Cap: {{ $capi->num_capi_temp }}. <span style="margin-left:10px;margin-right:5px;font-size:14px" class="pull-right"><i class="fa fa-star" aria-hidden="true"></i><b> <span id="rati">{{ $capi->rating }}</span></b><span style="font-size:9px;">/10</span></span> <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token_puntuacion">	
												</div>
											</div>	
											<br>							
											@endif
										@endforeach									
									</section>
								</div>								
								@endfor	
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
	  			var route = "http://localhost:8000/admin/serie_puntuacion";
			    var token = $("#token_puntu").val();
			    var id_seri = $("#id_ser").val();		    

			  $.ajax({
			      url:route,
			      headers: {'X-CSRF-TOKEN': token},
			      dataType:'json',      
			      type:'POST',     
			      data:{stars:value,id_serie:id_seri},
			      success:function(response){        	
					$("#rati2").text(response.rating); 
					$("#votos").text(response.total_votos);     	
			      },
			    });   
		 
	  }

	});

	 var height = $(".div_serie_individual").height();
	 $(".bg-aside").height(height+114);
});
</script>

@endsection