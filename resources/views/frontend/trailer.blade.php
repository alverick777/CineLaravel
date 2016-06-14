@extends('template.mainfont')

@section('title', 'Trailers')

@section('content')
<style>

body{
   background-color: #FBE7CE;
}

.grupodetrailers{
	position: relative;
	background-color: #FCF3E8;
    height: 100%;
    border-left: 2px solid green;
	border-right: 2px solid green;
	border-bottom: 2px solid green;	
	box-shadow: 0 5px 4px rgba(0, 0, 0, 0.1);
}

.bg-trailer-header{
	margin-left: 40px;
}

#cabecera-trailer{
	background: url('/img/trailers.jpg') center center;
	height: 310px;
}

.trailer{
	display: inline-block;
	margin-left: 18px;
	width: 155px;
}

.titulo{
	margin-left: 25px;
	font-size: 25px;
	color: #EB9605;
}

.play{	
	display: block;
    position: relative;
    z-index: 2;
    top: -140px;
    left: 50px;
    opacity: 0.5;
    width: 50px;
}

.play:hover{
	opacity: 0.8;
	cursor: pointer;
}

.imagen{
	display: block;
    position: relative;
    z-index: 1;
}

.description{
	position: relative;
	top: -45px;
	width: 155px;	
	box-sizing: border-box;
	text-align: center;
	font-size: 10px;
}

.trailer_video{
	display: none;
	margin-left: -700px;
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
				<header id="aa" class="bg-trailer-header">
					<header id="cabecera-trailer"></header>			
					<div class="grupodetrailers">	
						<br>
						<span class="titulo"><i class="fa fa-film" aria-hidden="true"> Listado de Trailers</i></span>
						<hr>	
						@foreach($trailers as $trailer)		
						<div id="{{ $trailer->id }}" class="trailer">
							@foreach($trailer->pelicula->carteles as $image)
								<img class="imagen" src="{{ asset('img/peliculas/carteles/' . $image->name) }}" height="230" width="155" alt="">
							@endforeach	
							<a class="trai" href="#" data-toggle="modal" data-target="#trail" data-namepeli='{{ $trailer->pelicula->titulo_original }}' data-name="{{ $trailer->name_trailer }}"><img class="play" src="{{ asset('img/logo_play.svg') }}" height="50" width="50" alt="">	
							<div class="description">
								<a href="{{ route('frontend.pelicula_individual', $trailer->pelicula->id) }}">{{ $trailer->name_peli }} ({{ $trailer->pelicula->year }})</a>
							</div>
						</div>
						@endforeach
						<br>					
					</div>
				</header>
				
			</div>
		</div>	
	</div>

	</div>	
</div>

				<div class="modal fade" id="trail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				  <div class="modal-dialog modal-lg" role="dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title text-center"><span id="titulo"></span></h4>
				      </div>
				      <div class="modal-body">		
					    <br>	
					    	<div id="video">
								<video width="870" height="495"controls>
									<source src="" type="video/mp4">	
								</video>	
					    	</div>			    

							<br><br>	
						
				      </div>    
				    </div>
				  </div>
				</div>

@endsection


@section('js')

<script>  

$(document).ready(function() {

$('#trail').on('show.bs.modal', function (event) {
	var modal = $(this);
	var button = $(event.relatedTarget);	
	var titulo = button.data('namepeli');
	var name = button.data('name');
	
	var ruta = "http://localhost:8000/trailers/" + name;
	
	modal.find('#titulo').text("Official Trailer " + titulo);

	var video = $('#video video')[0];
	video.src = ruta;
	video.load();
	video.play();

	
});

 //Este evento se genera cuando el popup modal se cierra al pulsar en el aspa, en el boton cerrar o se pincha fuera de el
    $('#trail').on('hidden.bs.modal', function () {
        var video = $('#video video')[0];		
		video.pause();
    });


	var height = $(".grupodetrailers").height();
	$(".bg-aside").height(height+310);


});

</script>

@endsection