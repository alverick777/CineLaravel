@extends('template.main')

@section('title', 'Crear Generos')

@section('content')
@include('template.partials.aside_admin')
<br>
<br>
<br>
<br>
<br>
<div class="container">
	<div class="row">		
			<div class="col-md-12 col-md-offset-1">	
				{!! Form::open(['route' => 'admin.generos.store','method' => 'POST']) !!}
				<h3><i class="fa fa-pencil"> Register</i></h3>
				<hr>
				<div class="form-group">
					{!! Form::label('genero','Genero') !!}	
					{!! Form::text('genero', null, ['class' => 'form-control', 'placeholder' => 'Nombre del genero' ,'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('tipo','Tipo de Genero') !!}	
					{!! Form::select('tipo', ['pelicula' => 'Pelicula', 'videojuegos' => 'Videojuegos', 'libros' => 'Libros', 'series' => 'Series'], null, ['class' => 'form-control', 'placeholder'  => 'Seleccione un tipo de genero...', 'required']) !!}
				</div>

				<div class="form-group">

					{!! Form::button('<i class="fa fa-floppy-o"> Agregar Genero</i>', ['class' => 'btn btn-success','type'=>'submit']) !!}
					
				</div>

				{!! Form::close() !!}
			</div>
		</div>	
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br><br><br>
@endsection
