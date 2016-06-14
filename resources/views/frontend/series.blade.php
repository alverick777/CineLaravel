@extends('template.mainfont')

@section('title', 'Series')

@section('content')
<style>

body{
   background-color: #FBE7CE;
}

#search_seri{
	width: 97%;
	margin-left: 12px;
}

.linea{
	border-left: 3px solid green;
	border-right: 1px solid green;
}

.div_peli{
	border-left: 3px solid green;
	border-right: 1px solid green;
	border-top: 1px solid green;
	border-bottom: 1px solid green;
}

.linea2{
	border-left: 1px solid green;
	border-right: 1px solid green;
	border-top: 1px solid green;
	border-bottom: 1px solid green;
	box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);
}

.total-series{
	background-color: white;
	font-size: 14px;
	color: black;
	margin-left: 10px;
	border-left: 3px solid green;
	border-right: 1px solid green;
	border-top: 1px solid green;
	border-bottom: 1px solid green;
	padding: 5px;
	width: 97.2%;
	box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);
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
					    <div style="border-top: 1px solid green;box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);" class="bg-white linea">
					    	<div style="margin-left:25px;font-size:18px;padding-top:5px;"><strong><i class="fa fa-table"></i> {{ $genero_view }}</strong>
					    			<span style="margin-left:90px;font-size:14px">
					    				<a href="{{ route('frontend.series') }}">All</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'num') }}">#</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'A') }}">A</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'B') }}">B</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'C') }}">C</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'D') }}">D</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'E') }}">E</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'F') }}">F</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'G') }}">G</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'H') }}">H</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'I') }}">I</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'J') }}">J</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'K') }}">K</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'L') }}">L</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'M') }}">M</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'N') }}">N</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'O') }}">O</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'P') }}">P</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'Q') }}">Q</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'R') }}">R</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'S') }}">S</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'T') }}">T</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'U') }}">U</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'V') }}">V</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'W') }}">W</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'X') }}">X</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'Y') }}">Y</a>&nbsp;
					    				<a href="{{ route('principal.filterseriesporletra', 'Z') }}">Z</a>&nbsp;
					    			</span>					
					    	</div>	
					    </div>					    
					    <div style="border-bottom: 1px solid green;box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);" class="bg-white linea">
					    	<span>	
							    {!! Form::open(['route' => 'frontend.series', 'method' => 'GET']) !!}	

							    {!! Form::text('word', null, ['id' => 'search_seri', 'placeholder' => 'Search...']) !!}

							    {!! Form::close() !!}
							</span>		
					    </div>					    	
					</div>
				</div>

				<div class="div_main">
				@foreach($series as $serie)
				<div class="div_peli">
					<div class="row">						
						<h5 class="text-center titulo_pelicula">						
							<a href="#"><strong>{{ $serie->titulo_serie }}</strong></a>
						</h5>
						@if($serie->created_at->diffInDays($fecha_hoy) < 3 )
							<span class="label label-danger center">NEW</span>
						@endif<br>
						<div class="col-md-4">
							@foreach($serie->carteles as $image)
								<a href="#"><img class="imagen666" src="{{ asset('img/series/carteles/' . $image->name) }}" height="180" width="130" alt=""></a>
							@endforeach
						</div>
						<div class="col-md-8">
							<strong>Año Inicio:</strong> {{ $serie->year_serie_inicio }} </br>
							<strong>Año Termino:</strong> {{ $serie->year_serie_termino }} </br>
							<strong>Director:</strong> 
							@foreach($serie->directores as $dires)
							{{ $dires->nombre }} 
							@endforeach
						</br>
							<strong>Reparto:</strong> 							
							@foreach($serie->actores as $acto)								
									{{ $acto->nombre }} 								
							@endforeach							
						</br>
							<strong>Sinopsis:</strong> <p>
								{{ $serie->sinopsis }}
							</p><br><br>	
							<a class="btn btn-success btn-xs" href="{{ route('frontend.serie_individual', $serie->id) }}">Read more</a>
							<div id="ratin" class="label label-info"><span>{{ $serie->rating }}/5</span></div>
							<span id="fecha_created" class="pull-right">added {{ $serie->created_at->diffForHumans() }}</span>	
						</div>	
					</div>
				</div>	
				@endforeach					
				<br>
				<div class="total-series">
					Total TV. Series: <strong>{{ $total_series}}</strong><br>					
				</div>			
			</div>
		</div>


		

			<div class="text-center">
				{!! $series->render() !!}
			</div>

		</div>	
	</div>
</div>
<br><br>
@endsection

@section('js')

<script>
$( document ).ready(function() {

 	var height = $(".div_peli").height();
	$(".bg-aside").height(height+310);
});
</script>

@endsection

