@extends('template.mainfont')

@section('title', 'Peliculas')

@section('content')
<style>

#search_peli{
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

.total-pelis{
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

			<div class="div_main">
				@foreach($peliculas as $pelis)
				<div class="div_peli">
					<div class="row">						
						<h5 class="text-center titulo_pelicula">						
							<a href="{{ route('frontend.pelicula_individual', $pelis->id) }}"><strong>{{ $pelis->titulo_original }}</strong></a>
						</h5>
						@if($pelis->created_at->diffInDays($fecha_hoy) < 3 )
							<span class="label label-danger center">NEW</span>
						@endif<br>
						<div class="col-md-4">
							@foreach($pelis->carteles as $image)
								<a href="{{ route('frontend.pelicula_individual', $pelis->id) }}"><img class="imagen666" src="{{ asset('img/peliculas/carteles/' . $image->name) }}" height="180" width="130" alt=""></a>
							@endforeach
						</div>
						<div class="col-md-8">
							<strong>Año:</strong> {{ $pelis->year }} </br>
							<strong>Director:</strong> 
							@foreach($pelis->directores as $dires)
							{{ $dires->nombre }} 
							@endforeach
						</br>
							<strong>Reparto:</strong> 							
							{{ $pelis->cast }}
							
						</br>
							<strong>Sinopsis:</strong> <p>
								{{ $pelis->sinopsis }}
							</p><br><br><br>	
							<a class="btn btn-success btn-xs" href="{{ route('frontend.pelicula_individual', $pelis->id) }}">Read more</a>
							<div id="ratin" class="label label-info"><span>{{ $pelis->rating }}/5</span></div>
							<span id="fecha_created" class="pull-right">added {{ $pelis->created_at->diffForHumans() }}</span>	
						</div>	
					</div>
				</div>	
				@endforeach	
				<br>
				<div class="total-pelis">
					Total Movies: <strong>{{ $total_peliculas }}</strong><br>					
				</div>				

			</div>
			<div class="text-center">
				{!! $peliculas->render() !!}
			</div>	
			
		</div>	


	</div>
</div>


@endsection

@section('js')

<script>
$( document ).ready(function() {
    var height = $(".div_peli").height();
	$(".bg-aside").height(height+114);
});

</script>

@endsection

