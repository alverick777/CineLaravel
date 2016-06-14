
@extends('template.mainfont')

@section('title', 'Actor '. $actor->nombre)

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

.personaje{
	font-size: 10px;
	color: #478DAB;	
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
						<div style="margin-left:25px;font-size:18px;padding-top:5px;"><strong style="font-size:18px;"><i class="fa fa-table"></i> {{ $actor_view }}</strong>
							<span style="margin-left:90px;font-size:14px">
							    <a href="{{ route('frontend.actores') }}">All </a>&nbsp;|
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
				<div style="border-bottom: 1px solid green;border-left: 1px solid green; border-right: 1px solid green;box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);" class="bg-white linea">							    	
						{!! Form::open(['route' => 'frontend.actores', 'method' => 'GET']) !!}	

						{!! Form::text('word', null, ['id' => 'search_actor', 'placeholder' => 'Search...']) !!}

						{!! Form::close() !!}							    			
				</div>
				</div>
			</div>	

			<div class="div_main" style="margin-left:20px;width:95.5%;margin-top:20px;">
				<div class="row">						
					<div class="col-md-5">
						@foreach($actor->foto as $image)
						<img src="{{ asset('img/actores/fotos/' . $image->name_foto) }}" width="380" height="550" alt="">						
						@endforeach
					</div>
					<div class="col-md-7">
						<div class="name_actor">
							<strong>{{ $actor->nombre }}</strong>
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
									<strong>Fecha Nacimiento: </strong> {{ $actor->fecha_nac }}
								</div>
								<div class="datos_caja">
									<strong>Pais: </strong> {{ $actor->pais }}
								</div>
								<div class="datos_caja">
									<strong>Biografia: </strong><br>
									 <p style="padding: 10px 25px 0px 0px;font-size:12px;">
									 	{{ $actor->biografia }}
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
									@foreach($actor->peliculas as $know_for)
										@foreach($know_for->carteles as $image)
											<a href="{{ route('frontend.pelicula_individual', $know_for->id) }}"><img src="{{ asset('img/peliculas/carteles/' . $image->name) }}" alt="" width="160" height="220"></a>										
										@endforeach											
									@endforeach
									<br><br>
									<strong><span class="titulo-movies_series"><i class="fa fa-television" aria-hidden="true"></i> TV. Series</span></strong>
										<br>
									@foreach($actor->series as $know_for)
										@foreach($know_for->carteles as $image)
											<a href="{{ route('frontend.serie_individual', $know_for->id) }}"><img src="{{ asset('img/series/carteles/' . $image->name) }}" alt="" width="160" height="220"></a>
										@endforeach
									@endforeach
								</div>
								<br><br>
							</div>

							<div role="tabpanel" class="tab-pane" id="filmo">
								<br><br>
								<span class="showing-resume-award-filmo"> * Showing all credits: <strong>{{ $actor->filmografias->count() }}</strong></span>
								<br><br><br>
								@foreach($actor->filmografias as $filmo)
								<div class="filmo-row">
									<span class="year_column">{{ $filmo->year_peli_o_serie }}</span>
									<span class="name_peliseri"><b>{{ $filmo->name_peli_o_serie }}</b> - ({{ $filmo->tipo_trabajo }})</span><br>
									<span class="personaje">{{ $filmo->nombre_personaje }}</span>	
								</div>
								@endforeach
							</div>

							<div role="tabpanel" class="tab-pane" id="awards">
								<br><br>
								<span class="showing-resume-award-filmo">* Showing all {{ $total_won }} wins and {{ $total_nominated }} nominations</span><br><br>	
									<span class="div-oscar"> <img src="{{ asset('img/movie-award-oscars_318-41295.jpg') }}" alt="" width="20" height="20">Won {{ $actor->oscar }} Oscar.</span><br><br><br>								
								@foreach($awards as $awa)
								<div class="award-row">
										<div class="nombre_tipo_premio">{{ $awa->tipo }}</div> <br>	
										@foreach($actor->awards as $premio)											
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
	
	/*  

<table class="table table-stripped width_table">
										<thead class="table_background">
											<tr>
												<th>Pelicula</th>
												<th>Personaje</th>
												<th>Año</th>											
											</tr>											
										</thead>
										<tbody class="tamano_font">
											@foreach($actor->filmografias as $filmo)
											<tr>
												<td>{{ $filmo->name_peli_o_serie }}</td>
												<td>{{ $filmo->nombre_personaje }}</td>
												<td>{{ $filmo->year_peli_o_serie }}</td>
											</tr>
											@endforeach	
										</tbody>
									</table>
	*/
</script>

@endsection


