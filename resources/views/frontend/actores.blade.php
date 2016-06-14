@extends('template.mainfont')

@section('title', 'Actores')

@section('content')

<style>

body{
   background-color: #FBE7CE;
}

.div_main{
    background: none repeat scroll 0 0 #FBE7CE;
    padding: 5px;
    margin: 0 5px;
    display: block;    
}

.div_acto {
    background: #ffffff;
    box-shadow: 0 7px 4px rgba(0, 0, 0, 0.1);
    display: inline-block;
    width: 37%;
    padding: 10px 10px;
    margin: 10px 11px;
    vertical-align: top;
    height: 205px;   
    border-left: 3px solid green;
	border-right: 1px solid green;
	border-top: 1px solid green;
	border-bottom: 1px solid green;
}

#search_actor{
	width: 97%;
	margin-left: 12px;
}

.linea{
	border-left: 3px solid green;
	border-right: 1px solid green;
}

.nom_actor{
	width: 180px;	
}

.nom_actor a{
	color: black;
	text-decoration: none;
}

.nom_actor strong{
	color: black;
	text-decoration: none;
}

.datos_actor .nom_actor , 
.datos_actor .Nacimiento, 
.datos_actor .pais, 
.datos_actor .bio,
.datos_actor .seemore
{
	font-size: 10px;
	margin-left: 25px;
}

.datos_actor .seemore{
	margin-top: 25px;
}

.imagenactor{
	margin-left: 2px;
}

.linea2{
	border-left: 1px solid green;
	border-right: 1px solid green;
	border-top: 1px solid green;
	border-bottom: 1px solid green;
	box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);
}

.total-actores-actrices{
	background-color: white;
	font-size: 14px;
	color: black;
	margin-left: 10px;
	border-left: 3px solid green;
	border-right: 1px solid green;
	border-top: 1px solid green;
	border-bottom: 1px solid green;
	padding: 5px;
	width: 76.8%;
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
				<div style="border-top: 1px solid green;box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);padding-top:5px;" class="bg-white linea">
					    	<div style="margin-left:25px;font-size:18px;padding-top:-500px;"><strong><i class="fa fa-table"></i> {{ $genero_view }}</strong>
					    			<span style="margin-left:90px;font-size:14px">
					    				<a href="{{ route('frontend.actores') }}">All</a>&nbsp;|
					    				<a href="{{ route('principal.filterSexo', 'M') }}">Actors</a>&nbsp;
							    		<a href="{{ route('principal.filterSexo', 'F') }}">Actress </a>|
					    				
					    				<a href="{{ route('principal.filteractoresporletra', 'A') }}">A</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'B') }}">B</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'C') }}">C</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'D') }}">D</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'E') }}">E</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'F') }}">F</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'G') }}">G</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'H') }}">H</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'I') }}">I</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'J') }}">J</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'K') }}">K</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'L') }}">L</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'M') }}">M</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'N') }}">N</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'O') }}">O</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'P') }}">P</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'Q') }}">Q</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'R') }}">R</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'S') }}">S</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'T') }}">T</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'U') }}">U</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'V') }}">V</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'W') }}">W</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'X') }}">X</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'Y') }}">Y</a>&nbsp;
								    	<a href="{{ route('principal.filteractoresporletra', 'Z') }}">Z</a>&nbsp;
					    			</span>		
								</div>	
					    </div>	
					    		<div style="border-bottom: 1px solid green;box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);" class="bg-white linea">
							    	{!! Form::open(['route' => 'frontend.actores', 'method' => 'GET']) !!}	

							    	{!! Form::text('word', null, ['id' => 'search_actor', 'placeholder' => 'Search...']) !!}

							    	{!! Form::close() !!}							    			
								</div>
						</div>	
				</div>

			<div class="div_main">
				@foreach($actores as $actor)
				<div class="div_acto">
					<div class="row">						
						<div class="col-md-4">
						@foreach($actor->foto as $image)	
							<a href="{{ route('frontend.actores_individual', $actor->id) }}"><img class="imagenactor" src="{{ asset('img/actores/fotos/' . $image->name_foto) }}" height="180" width="130" alt=""></a>
						@endforeach														
						</div>
						
						<div class="col-md-8">	
							<div class="datos_actor">
								<div class="nom_actor">						
									<strong>Nombre: </strong> {{ $actor->nombre }}							
								</div>
								<div class="Nacimiento">
									<strong> Nacimiento: </strong>{{ $actor->fecha_nac }}
								</div>							
								<div class="pais">
									<strong> Pais: </strong>{{ $actor->pais }}
								</div>	
								<div class="bio">
									<span><strong>Biografia:</strong> </span><br>
									<p>
										{{ $actor->biografia }}
									</p>
								</div>
								<div class="seemore">
									<a href="{{ route('frontend.actores_individual', $actor->id) }}" class="btn btn-success btn-xs">See more</a>
								</div>
							</div>	
						</div>							
					</div>
				</div>
				@endforeach	
				<br>
				<div class="total-actores-actrices">
					Total: <strong>{{ $total_actores }}</strong><br>
					Actress:  <strong> {{ $total_actrices }}</strong><br>
					Actors:  <strong> {{ $total_actoresmasculinos }}</strong>
				</div>
			</div>		

		</div>	

		<div class="text-center">
			{!! $actores->render() !!}
		</div>	
	</div>	
</div>

</div>
@endsection

@section('js')

<script>
$( document ).ready(function() {
    var height = $(".div_acto").height();
	$(".bg-aside").height((height+116)*4);
});

</script>

@endsection


