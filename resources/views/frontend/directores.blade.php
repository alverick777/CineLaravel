@extends('template.mainfont')

@section('title', 'Directores')

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

.div_dire {
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


#search_dire{
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

.total-directores{
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
					    				<a href="{{ route('frontend.directores') }}">All</a>&nbsp;|
					    				<a href="{{ route('principal.filterSexoDirector', 'M') }}">Male</a>&nbsp;
							    		<a href="{{ route('principal.filterSexoDirector', 'F') }}">Female </a>|
					    				
					    				<a href="{{ route('principal.filterdirectorporletra', 'A') }}">A</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'B') }}">B</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'C') }}">C</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'D') }}">D</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'E') }}">E</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'F') }}">F</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'G') }}">G</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'H') }}">H</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'I') }}">I</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'J') }}">J</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'K') }}">K</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'L') }}">L</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'M') }}">M</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'N') }}">N</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'O') }}">O</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'P') }}">P</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'Q') }}">Q</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'R') }}">R</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'S') }}">S</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'T') }}">T</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'U') }}">U</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'V') }}">V</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'W') }}">W</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'X') }}">X</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'Y') }}">Y</a>&nbsp;
								    	<a href="{{ route('principal.filterdirectorporletra', 'Z') }}">Z</a>&nbsp;
					    			</span>		
								</div>	
					    </div>	
					    		<div style="border-bottom: 1px solid green;box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);" class="bg-white linea">
							    	{!! Form::open(['route' => 'frontend.directores', 'method' => 'GET']) !!}	

							    	{!! Form::text('word', null, ['id' => 'search_dire', 'placeholder' => 'Search...']) !!}

							    	{!! Form::close() !!}							    			
								</div>
						</div>	
				</div>

			<div class="div_main">
				@foreach($directores as $director)
				<div class="div_dire">
					<div class="row">						
						<div class="col-md-4">
						@foreach($director->foto as $image)	
							<a href="{{ route('frontend.directores_individual', $director->id) }}"><img class="imagenactor" src="{{ asset('img/directores/fotos/' . $image->name_foto) }}" height="180" width="130" alt=""></a>
						@endforeach														
						</div>
						
						<div class="col-md-8">	
							<div class="datos_actor">
								<div class="nom_actor">						
									<strong>Nombre: </strong> {{ $director->nombre }}							
								</div>
								<div class="Nacimiento">
									<strong> Nacimiento: </strong>{{ $director->fecha_naci }}
								</div>							
								<div class="pais">
									<strong> Pais: </strong>{{ $director->pais }}
								</div>	
								<div class="bio">
									<span><strong>Biografia:</strong> </span><br>
									<p>
										{{ $director->biografia }}
									</p>
								</div>
								<div class="seemore">
									<a href="{{ route('frontend.directores_individual', $director->id) }}" class="btn btn-success btn-xs">See more</a>
								</div>
							</div>	
						</div>							
					</div>
				</div>
				@endforeach	
				<br>
				<div class="total-directores">
					Total: <strong>{{ $total_directores }}</strong><br>
					Female: <strong> {{ $totalfemaledirectors }} </strong><br>
					Male: <strong> {{ $totalmaledirectors }}</strong>
				</div>
			</div>	


			</div>
			<div class="text-center">
				{!! $directores->render() !!}
			</div>	
	</div>
</div>


@endsection

@section('js')

<script>
$( document ).ready(function() {
    var height = $(".div_dire").height();
	$(".bg-aside").height((height+116)*4);
});

</script>

@endsection

