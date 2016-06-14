@extends('template.main')

@section('title','Editar Genero ' . $genero->genero)

@section('content')
@include('template.partials.aside_admin')
<br>
<br>
<br>
<br><br>
<div class="container">
	<div class="row">		
			<div class="col-md-12 col-md-offset-1">					
				{!! Form::open(['route' => ['admin.generos.update', $genero], 'method' => 'PUT']) !!}
				<h3><i class="fa fa-pencil"> Edicion de Generos</i></h3>
				<hr>
				<div class="form-group">
					{!! Form::label('genero','Genero') !!}	
					{!! Form::text('genero', $genero->genero, ['class' => 'form-control', 'placeholder' => 'Genero' ,'required']) !!}
				</div>

				<div class="form-group">
					{!! Form::label('tipo','Tipo') !!}	
					{!! Form::select('tipo', ['pelicula' => 'Pelicula', 'videojuegos' => 'Videojuegos', 'libros' => 'Libros', 'series' => 'Series'], $genero->tipo, ['class' => 'form-control']) !!}
				</div>
				<br>	
				<div class="form-group">
					{!! Form::button('<i class="fa fa-floppy-o"> Editar Genero</i>',['class' => 'btn btn-success', 'type'=>'submit']) !!}	
					
				</div>

				{!! Form::close() !!}
			</div>
	</div>
</div>
<br>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br>

@endsection