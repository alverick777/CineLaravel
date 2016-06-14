@extends('template.mainfont')

@section('title', 'Director '. $director->nombre)

@section('content')
<style>
	
body{
   background-color: #FBE7CE;
}

.margin-top{
	margin-top: 38px;
}

#search_actor{
	width: 97%;
	margin-left: 12px;
}

.margin_left{
	margin-left: 230px;
}

.margin_top{
	margin-top: -28px;
}

#wrapper_menu {      
	width: 250px;	
}

.div_main{
    background: none repeat scroll 0 0 #fff;
    padding: 5px;
    margin: 0 5px;
    display: block;  
    border-left: 1px solid green; 
    border-right: 1px solid green;  
     border-top: 1px solid green; 
    border-bottom: 1px solid green;  
}

.name_actor{
	font-size: 25px;
	text-align: center;
	color: green;
	padding-top: 14px;
}

.datos_caja{
	font-size: 14px;
	color:black;
	margin-left: -50px;
}


div.filmo-row {
    vertical-align: middle;
    padding: 0px 10px 20px;
    display: block;
    margin-left: -50px;    
}

.year_column {
    float: right;
    text-align: right;
    font-family: Verdana, Arial, sans-serif;
    color: #333;
    font-size: 12px;
    margin-right: 100px;
}

.award-row {
    vertical-align: middle;
    padding: 0px 10px 20px;
    display: block;
    margin-left: -50px;    
}

.showing-resume-award-filmo{
	margin-left: -40px;   
	font-size: 11px;
}

.div-oscar{
	margin-left: -40px;   
	font-size: 11px;
}

.nombre_tipo_premio{
	font-size: 20px;
	color: #B92929; 
}

.nombrepeliserie{
	font-size: 11px;
}

.award{
	margin-top: 10px;
}

.won{
	color: green;
}

.nominated{
	color: red;
}

.know-for{
	margin-left: -50px;
}

.know-for img{
	opacity: 1;
}

.know-for img:hover{
	opacity: 0.8;
}

.titulo-know-for{
	font-size: 20px;
	color: #9E1414;
}

.titulo-movies_series{
	font-size: 16px;
}

</style>

<div class="margin-top">
	@include('template.partials.aside_menu')
</div>

<div class="container margin_left margin_top">		
	<div class="row">
		<div class="col-md-12">	
			<div class="row">	
				<div class="col-md-12">
					<div style="border-top: 1px solid green;border-left: 1px solid green; border-right: 1px solid green;" class="bg-white linea ">
						<div style="margin-left:25px;font-size:18px;padding-top:5px;"><strong style="font-size:18px;"><i class="fa fa-table"></i> {{ $director_view }}</strong>
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

				<div style="border-bottom: 1px solid green;border-left: 1px solid green; border-right: 1px solid green;box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);" class="bg-white linea">							    	
						{!! Form::open(['route' => 'frontend.directores', 'method' => 'GET']) !!}	

						{!! Form::text('word', null, ['id' => 'search_actor', 'placeholder' => 'Search...']) !!}

						{!! Form::close() !!}							    			
				</div>


				</div>	
			</div>

			<div class="div_main" style="margin-left:20px;width:95.5%;margin-top:20px;">
				<div class="row">						
					<div class="col-md-5">
						@foreach($director->foto as $image)
						<img src="{{ asset('img/directores/fotos/' . $image->name_foto) }}" width="380" height="545" alt="">						
						@endforeach
					</div>
					<div class="col-md-7">
						<div class="name_actor">
							<strong>{{ $director->nombre }}</strong>
						</div><hr style="margin-left:-50px;">

						<ul class="nav nav-tabs" role="tablist" id="mytab_individual" style="margin-left:-50px;width:95%;">
						   <li role="presentation" class="active"><a id="tab1" href="#bio" aria-controls="bio" role="tab" data-toggle="tab">Biografia</a></li>
						   <li role="presentation"><a id="tab1" href="#filmo" aria-controls="filmo" role="tab" data-toggle="tab">Filmografia</a></li>
						   <li role="presentation"><a id="tab1" href="#awards" aria-controls="awards" role="tab" data-toggle="tab">Awards</a></li>	
						</ul>

						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="bio">
								<br><br>
								<div class="datos_caja">
									<strong>Fecha Nacimiento: </strong> {{ $director->fecha_naci }}
								</div>
								<div class="datos_caja">
									<strong>Pais: </strong> {{ $director->pais }}
								</div>
								<div class="datos_caja">
									<strong>Biografia: </strong><br>
									 <p style="padding: 10px 25px 0px 0px;font-size:12px;">
									 	{{ $director->biografia }}
									 </p> 
								</div>
								<br>
								<div class="know-for">
									<hr>
									<div class="titulo-know-for">
										<span><strong>Known For</strong></span>
									</div>
									<br><br>
										<strong><span class="titulo-movies_series"><i class="fa fa-film" aria-hidden="true"></i> Movies</span></strong>
										<br>
									@foreach($director->peliculas as $know_for)
										@foreach($know_for->carteles as $image)
											<a href="{{ route('frontend.pelicula_individual', $know_for->id) }}"><img src="{{ asset('img/peliculas/carteles/' . $image->name) }}" alt="" width="160" height="220"></a>										
										@endforeach											
									@endforeach
									<br><br>
									<strong><span class="titulo-movies_series"><i class="fa fa-television" aria-hidden="true"></i> TV. Series</span></strong>
										<br>
									@foreach($director->series as $know_for)
										@foreach($know_for->carteles as $image)
											<a href="{{ route('frontend.serie_individual', $know_for->id) }}"><img src="{{ asset('img/series/carteles/' . $image->name) }}" alt="" width="160" height="220"></a>
										@endforeach
									@endforeach
								</div>
								<br><br>
							</div>

							<div role="tabpanel" class="tab-pane" id="filmo">
								<br><br>
								<span class="showing-resume-award-filmo"> * Showing all credits: <strong>{{ $director->filmografias->count() }}</strong></span>
								<br><br><br>
								@foreach($director->filmografias as $filmo)
								<div class="filmo-row">
									<span class="year_column">{{ $filmo->year_pelicula }}</span>
									<span class="name_peliseri"><b>{{ $filmo->nombre_pelicula }}</b> - ({{ $filmo->tipo_trabajo }})</span><br>										
								</div>
								@endforeach
							</div>

							<div role="tabpanel" class="tab-pane" id="awards">
								<br><br>
								<span class="showing-resume-award-filmo">* Showing all {{ $total_won }} wins and {{ $total_nominated }} nominations</span><br><br>	
									<span class="div-oscar"> <img src="{{ asset('img/movie-award-oscars_318-41295.jpg') }}" alt="" width="20" height="20">Won {{ $director->oscars }} Oscar.</span><br><br><br>								
								@foreach($awards as $awa)
								<div class="award-row">
										<div class="nombre_tipo_premio">{{ $awa->tipo }}</div> <br>	
										@foreach($director->awards as $premio)											
											<div class="award">
												@if($premio->tipo == $awa->tipo)
													 <strong> {{ $premio->year_premio }} - {{ $premio->nombre_premio }} - @if($premio->resultado == 'won') <span class="won">{{ $premio->resultado }}</span> @else <span class="nominated">{{ $premio->resultado }}</span> @endif </strong><br>
													<div class="nombrepeliserie">
														{{ $premio->nombre_pelioserie_premiada }} ({{ $premio->tipo_trabajo }}) - ({{ $premio->year_pelioserie_premiada }})
													</div> 
												@endif
											</div>
										@endforeach
											
								</div>
								@endforeach
							</div>
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
	

</script>

@endsection





