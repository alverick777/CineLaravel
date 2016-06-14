
@extends('template.main')

@section('title','Editar Serie ' . $series->titulo_serie)

@section('content')
@include('template.partials.aside_admin')
<br>
<br>
<br>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-3 col-md-offset-1">
			<br>
			<br>
			{!! Form::open(['route' => ['admin.series.update', $series], 'method' => 'PUT','files' => true]) !!}
			@foreach($series->carteles as $image)
				<img src="{{ asset('img/series/carteles/' . $image->name) }}" alt="" style="min-height:100px;max-height: 300px;">
			@endforeach	
			<br><br>
			<div class="form-group">
				{!! Form::label('image', 'Cambiar foto del la serie') !!}
				{!! Form::file('image', array('onchange'=>'readURL4(this);')) !!}
				<br><br>
				<h4 id="mes5" style="display:none;">Preview...</h4>
				<img id="img_prev5" src="" alt="" style="min-height:100px;max-height: 300px;">
			</div>
		</div>

		<div class="col-md-7 col-md-offset-1">
				<h3><i class="fa fa-pencil"> Edicion de {{ $series->titulo_serie }}</i></h3>
				<hr>
				<div class="form-group">				
					{!! Form::text('titulo_serie', $series->titulo_serie, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
				</div>
				<div class="form-group">				
					{!! Form::text('rating', $series->rating, ['class' => 'form-control', 'placeholder' => 'Rating', 'required']) !!}
				</div>	
				<div class="form-group">				
					{!! Form::text('year_serie_inicio', $series->year_serie_inicio, ['class' => 'form-control', 'placeholder' => 'Año Inicio', 'required']) !!}
				</div>
				<div class="form-group">				
					{!! Form::text('year_serie_termino', $series->year_serie_termino, ['class' => 'form-control', 'placeholder' => 'Año Termino', 'required']) !!}
				</div>	
				<div class="form-group">				
					{!! Form::text('temporadas', $series->temporadas, ['class' => 'form-control', 'placeholder' => 'Seasons', 'required']) !!}
				</div>	
				<div class="form-group">
					{!! Form::label('status_poster','Status Poster') !!}	
					{!! Form::select('status_poster', ['si' => 'SI', 'no' => 'NO'], $series->status_poster, ['class' => 'form-control select-oscar', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('status_datos','Status Datos') !!}	
					{!! Form::select('status_datos', ['si' => 'SI', 'no' => 'NO'], $series->status_datos, ['class' => 'form-control select-oscar', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('generos', 'Generos') !!}
					{!! Form::select('generos[]', $generos, $my_generos,['class' => 'form-control select-genero6', 'multiple', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('actores', 'Actors') !!}
					{!! Form::select('actores[]', $actores, $my_actors,['class' => 'form-control select-actor6', 'multiple', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('directores', 'Directores') !!}
					{!! Form::select('directores[]', $directores, $my_directors,['class' => 'form-control select-director6', 'multiple', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('sinopsis', 'Sinopsis') !!}
					{!! Form::textarea('sinopsis', $series->sinopsis ,['id'=>'sinopsis' ,'class' => 'form-control']) !!} 
				</div>		
				<br>	
				<div class="form-group">
					{!! Form::button('<i class="fa fa-floppy-o"> Editar Serie TV</i>',['class' => 'btn btn-success', 'type'=>'submit']) !!}	
					
				</div>

				{!! Form::close() !!}
		</div>
	</div>
</div>			
<br><br><br>
@endsection

@section('js')
	<script>
		/*$('.textarea-sinopsis6').trumbowyg({
		          btns: ['viewHTML',
		            '|', 'formatting',
		            '|', 'btnGrp-design',
		            '|', 'link',            
		            '|', 'btnGrp-justify',
		            '|', 'btnGrp-lists']
		      });*/

		/*var text = $('#sinopsis').trumbowyg('html');		
		console.log(text);*/
			
	</script>

@endsection
