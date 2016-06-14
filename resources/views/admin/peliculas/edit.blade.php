@extends('template.main')

@section('title','Editar Pelicula ' . $pelicula->titulo_original)

@section('content')
@include('template.partials.aside_admin')
<br>
<br>
<br>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-3 col-md-offset-1">
			<br><br>
			{!! Form::open(['route' => ['admin.peliculas.update', $pelicula], 'method' => 'PUT','files' => true]) !!}
			@foreach($pelicula->carteles as $image)
				<img src="{{ asset('img/peliculas/carteles/' . $image->name) }}" alt="" style="min-height:100px;max-height: 300px;">
			@endforeach	
			<br><br>
			<div class="form-group">
				{!! Form::label('image', 'Cambiar cartel de la pelicula') !!}
				{!! Form::file('image', array('onchange'=>'readURL(this);')) !!}
				<br><br>
				<h4 id="mes" style="display:none;">Preview...</h4>
				<img id="img_prev" src="" alt="" style="min-height:100px;max-height: 300px;">
			</div>	
		</div>
			
		<div class="col-md-7 col-md-offset-1">
				
				<h3><i class="fa fa-pencil"> Edicion de Peliculas</i></h3>
				<hr>
				<div class="form-group">
					{!! Form::label('titulo_castellano','Titulo Castellano') !!}				
					{!! Form::text('titulo_castellano', $pelicula->titulo_castellano, ['class' => 'form-control', 'placeholder' => 'Titulo en Castellano', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('titulo_original','Titulo Original') !!}					
					{!! Form::text('titulo_original', $pelicula->titulo_original, ['class' => 'form-control', 'placeholder' => 'Titulo Original', 'required']) !!}
				</div>				
				<div class="form-group">
					{!! Form::label('year','Año') !!}				
					{!! Form::text('year', $pelicula->year, ['class' => 'form-control', 'placeholder' => 'Año', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('duracion','Duracion') !!}				
					{!! Form::text('duracion', $pelicula->duracion, ['class' => 'form-control', 'placeholder' => 'Duracion', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('guion','Guion') !!}					
					{!! Form::text('guion', $pelicula->guion, ['class' => 'form-control', 'placeholder' => 'Guion', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('musica','Musica') !!}				
					{!! Form::text('musica', $pelicula->musica, ['class' => 'form-control', 'placeholder' => 'Musica', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('produccion','Produccion') !!}				
					{!! Form::text('produccion', $pelicula->produccion, ['class' => 'form-control', 'placeholder' => 'Produccion', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('distribuidora','Distribuidora') !!}					
					{!! Form::text('distribuidora', $pelicula->distribuidora, ['class' => 'form-control', 'placeholder' => 'Distribuidora', 'required']) !!}
				</div>				
				<div class="form-group">
					{!! Form::label('oscar','Oscar') !!}	
					{!! Form::select('oscar', ['si' => 'SI', 'no' => 'NO'], $pelicula->oscar, ['class' => 'form-control select-oscar', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('status_poster','Status Poster') !!}	
					{!! Form::select('status_poster', ['si' => 'SI', 'no' => 'NO'], $pelicula->status_poster, ['class' => 'form-control select-oscar', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('status_datos','Status Datos') !!}	
					{!! Form::select('status_datos', ['si' => 'SI', 'no' => 'NO'], $pelicula->status_datos, ['class' => 'form-control select-oscar', 'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('generos', 'Generos') !!}
					{!! Form::select('generos[]', $generos, $my_generos,['class' => 'form-control select-genero', 'multiple', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('actores', 'Cast') !!}
					{!! Form::select('actores[]', $actores, $my_actors,['class' => 'form-control select-genero', 'multiple', 'required']) !!}
				</div>
				
				<div class="form-group">
					{!! Form::label('sinopsis', 'Sinopsis') !!}
					{!! Form::textarea('sinopsis',$pelicula->sinopsis ,['class' => 'form-control']) !!} 
				</div>		
				<br>	
				<div class="form-group">
					{!! Form::button('<i class="fa fa-floppy-o"> Editar Pelicula</i>',['class' => 'btn btn-success', 'type'=>'submit']) !!}	
					
				</div>

				{!! Form::close() !!}
		</div>
	</div>
</div>
<br>
<br>
<br>

@endsection

@section('js')
	<script>

	function readURL(input) {
		if (input.files && input.files[0]) {
		    var reader = new FileReader();
		    reader.onload = function (e) {
			    $('#img_prev')
			    .attr('src', e.target.result);			
			    };
			    reader.readAsDataURL(input.files[0]);
		}
				$('#mes').css("display", "block");
    }

		$('.select-genero').chosen({
			placeholder_text_multiple: 'Seleccione un maximo de 4 generos',
			max_selected_options: 4,
			search_contains: true,
			width: "100%",
			no_results_text: 'Oops... no hay registros que mostrar'
		});	

		$('.textarea-sinopsis').trumbowyg({
			    btns: ['viewHTML',
			      '|', 'formatting',
			      '|', 'btnGrp-design',
			      '|', 'link',			      
			      '|', 'btnGrp-justify',
			      '|', 'btnGrp-lists']
			});

	</script>

@endsection