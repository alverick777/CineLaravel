@extends('template.main')

@section('title', 'Agregar Pelicula')

@section('content')
@include('template.partials.aside_admin')
	<br>
	<br>
	<br>
	<div class="container">
		<div class="row">		
			<div class="col-md-12 col-md-offset-1">
				{!! Form::open(['route' => 'admin.peliculas.store', 'method' => 'POST','files' => true]) !!}
					<h3><i class="fa fa-pencil"> Register</i></h3>
					<hr>
					<div class="form-group">				
						{!! Form::text('titulo_castellano', null, ['class' => 'form-control', 'placeholder' => 'Titulo en Castellano', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('titulo_original', null, ['class' => 'form-control', 'placeholder' => 'Titulo Original', 'required']) !!}
					</div>					
					<div class="form-group">				
						{!! Form::text('year', null, ['class' => 'form-control', 'placeholder' => 'Año', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('duracion', null, ['class' => 'form-control', 'placeholder' => 'Duracion', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('guion', null, ['class' => 'form-control', 'placeholder' => 'Guion', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('musica', null, ['class' => 'form-control', 'placeholder' => 'Musica', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('produccion', null, ['class' => 'form-control', 'placeholder' => 'Produccion', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('distribuidora', null, ['class' => 'form-control', 'placeholder' => 'Distribuidora', 'required']) !!}
					</div>					
					<div class="form-group">
						{!! Form::label('oscar','Oscar') !!}	
						{!! Form::select('oscar', ['si' => 'SI', 'no' => 'NO'], null, ['class' => 'form-control select-oscar', 'required']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('status_poster','Status Poster') !!}	
						{!! Form::select('status_poster', ['si' => 'OK', 'no' => 'Pendiente'], null, ['class' => 'form-control select-oscar', 'required']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('status_datos','Status Datos') !!}	
						{!! Form::select('status_datos', ['si' => 'OK', 'no' => 'Pendiente'], null, ['class' => 'form-control select-oscar', 'required']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('directores', 'Director') !!}
						{!! Form::select('directores[]', $directores, null,['class' => 'form-control select-director', 'multiple', 'required']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('generos', 'Genero') !!}
						{!! Form::select('generos[]', $generos, null,['class' => 'form-control select-genero', 'multiple', 'required']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('actores', 'Cast') !!}
						{!! Form::select('actores[]', $actores, null,['class' => 'form-control select-cast', 'multiple', 'required']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('sinopsis', 'Sinopsis') !!}
						{!! Form::textarea('sinopsis',null ,['class' => 'form-control textarea-sinopsis']) !!} 
					</div>	
					<div class="form-group">
						{!! Form::label('image', 'Cartel') !!}
						{!! Form::file('image', array('onchange'=>'readURL10(this);')) !!}
						 <br><br>
	                     <h4 id="mes10" style="display:none;">Preview...</h4>
	                     <img id="img_prev10" src="" alt="" style="min-height:100px;max-height: 300px;">
					</div>	
					<div class="form-group">
						{!! Form::button('<i class="fa fa-floppy-o"> Agregar Pelicula</i>', ['class' => 'btn btn-success','type'=>'submit']) !!}
					</div>
				{!! Form::close() !!}	
			</div>
		</div>	
	</div>
<br><br>
@endsection

@section('js')
	<script>

		function readURL10(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        reader.onload = function (e) {
		          $('#img_prev10')
		          .attr('src', e.target.result);      
		          };
		          reader.readAsDataURL(input.files[0]);
		    }
		        $('#mes10').css("display", "block");
		}

		$('.select-genero').chosen({
			placeholder_text_multiple: 'Seleccione un maximo de 4 generos',
			max_selected_options: 4,
			search_contains: true,
			width: "50%",
			no_results_text: 'Oops... no hay registros que mostrar'
		});	

		$('.select-director').chosen({
			placeholder_text_multiple: 'Seleccione un maximo de 4 directores',
			max_selected_options: 4,
			search_contains: true,
			width: "50%",
			no_results_text: 'Oops... no hay registros que mostrar'
		});	

		$('.select-cast').chosen({
			placeholder_text_multiple: 'Seleccione un maximo de 25 actores/actrices',
			max_selected_options: 25,
			search_contains: true,
			width: "100%",
			no_results_text: 'Oops... no hay registros que mostrar'
		});	

		$('.textarea-sinopsis').trumbowyg();

	</script>
@endsection