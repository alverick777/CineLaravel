@extends('template.mainfont')

@section('title', 'Oscars Winners')

@section('content')

<style>

body{
   background-color: #FBE7CE;
}

.bg_main{
    background-color: #FCF3E8;
    height: 100%;
 } 

 .bg-oscars{
 	height: 100%;
 	background-color:white;
 	margin-left: 25px; 	 
 	box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);
 }

 .bg-oscars header{
 	font-size: 25px;
 	text-align: center; 	
 	color: white;
 	height: 300px; 	
 }

.bg-oscars header span{
	position: absolute;
	left:75px;
	top: 240px;	
}

.years{
	position: absolute;
	left:75px;
	top: 270px;	
	font-size: 12px;
}

.titulo_resena{
	margin-left: 25px; 
	font-size:25px;
    color:#EB9605;
}

.bg-oscars section p{
	padding: 25px;
} 

.bg-oscars section{
	border-left: 3px solid green;
	border-right: 3px solid green;
	border-bottom: 3px solid green;
}
 
.peliculas_winners{
	margin-left: 25px;
	border-left: 7px solid #D2820B;
	border-bottom: 0.5px solid #D2820B;
	padding-right: 10px;
	width: 94%;
}

.listado_titulo{
	margin-left: 25px; 
	font-size:25px;
    color:black;
}

.titulos_peliculas{
	margin-left: 20px; 
	font-size: 18px;
}

.titulo_espanol{
	font-size: 12px;
}

.director{
	margin-left: 20px;
	font-size: 11px;
	color: gray;
}

.candidatas_main{
	margin-left: 20px;
	font-size: 11px;
	color: gray;	
}

.candidata{
	margin-left: 40px;
}

.titulo_candidatas{
	margin-left: 20px;
}

.linea2{
	border-left: 1px solid green;
	border-right: 1px solid green;
	border-top: 1px solid green;
	border-bottom: 1px solid green;
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
					    <div class="bg-oscars">
							<header style="background: url('/img/Dolby.Theatre.original.5636.jpg') center center;">
								<span><i class="fa fa-trophy fa-x2" aria-hidden="true"></i> Ganadores del oscar</span>
								<div class="years">1928 - 2016</div>
							</header>
							<section>
								<br><br><br>
								<div class="titulo_resena"><i class="fa fa-eye" aria-hidden="true"> Historia de los Oscars</i></div><br>
								<p>La primera ceremonia fue presentada el 16 de mayo de 1929, en un almuerzo privado en el hotel Hollywood Roosevelt, con una audiencia de cerca de 270 personas. La fiesta llevada a cabo después de la ceremonia tuvo lugar en el hotel Mayfair.5 El coste de las entradas para los invitados a la ceremonia fue de cinco dólares. Quince estatuillas fueron entregadas, premiando artistas, directores y otras personalidades de la industria del cine por sus trabajos, estrenados entre 1927 y 1928.<br/><br/>

								Los ganadores eran anunciados con tres meses de anterioridad a la ceremonia, sin embargo, esto cambió a partir de la segunda edición, en 1930. Desde entonces y durante la primera década, los resultados fueron dados a los periódicos para su publicación a las 11 pm, durante la ceremonia.5 Este método fue reemplazado después de que Los Angeles Times anunciara a los ganadores antes de que esta hubiera iniciado. Como resultado, los sobres sellados con los nombres de los ganadores empezaron a ser utilizados desde 1941<br/><br/>

								Durante las primeras seis ceremonias, el periodo de elegibilidad se prolongó durante dos años. Por ejemplo, la segunda ceremonia que tuvo lugar el 3 de abril de 1930, reconoció películas que fueron estrenadas entre el 1 de agosto de 1928 y el 31 de julio de 1929. A partir de la séptima ceremonia, llevada a cabo 1935, el periodo de elegibilidad era el año inmediatamente anterior, desde el 1 de enero hasta el 31 de diciembre.<br/><br/>

								El primer actor galardonado fue Emil Jannings, por su actuación en The Last Command y en The Way of All Flesh. Sin embargo, el actor tuvo que regresar a Europa antes de la ceremonia, por lo que la Academia acordó darle la estatuilla antes; esto hizo que Jannings fuese el primer ganador del Óscar en la historia. Las personas que eran condecoradas recibían su premio por todos los trabajos realizados en una categoría específica durante el periodo de calificación; por ejemplo, Jannings recibió el Óscar por dos películas que protagonizó durante ese periodo. A partir de la cuarta ceremonia el sistema cambió y las personas comenzaron a ser reconocidas por una actuación en particular en una sola película. Hasta la octogésima tercera ceremonia, llevada a cabo en 2011, un total de 2 809 estatuillas han sido entregadas para 1 853 premios.6 Igualmente, un total de 302 actores han ganado el Óscar en categorías de actuación o en categorías honoríficas o juveniles.<br/><br/>
								</p>								
								<div class="listado_titulo"><i class="fa fa-pencil-square-o" aria-hidden="true"> Listado de Peliculas ganadoras</i></div>
								<hr>
								@foreach($oscarwinners as $oscar)
								<div class="peliculas_winners">
									<span class="titulos_peliculas">{{ $oscar->titulo_original }} <span class="titulo_espanol">({{ $oscar->titulo_castellano }}) - {{ $oscar->year }} </span> </span><br>
									<span class="director"> 
										 - Director:
										 @foreach($oscar->directores as $dires)
										 	{{ $dires->nombre }}
										 @endforeach
									</span>
									<span class="candidatas_main">	
										<div class="titulo_candidatas"> - Candidatas nominadas</div>
										@foreach($oscar->candidatas as $candi)						
										<div class="candidata">{{ $candi->nombre_candidata }}</div>
										@endforeach
									</span>
								</div><br>								
								@endforeach
								<br><br><br><br>
							</section>
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
    var height = $(".bg-oscars").height();
	$(".bg-aside").height(height);
});

</script>

@endsection