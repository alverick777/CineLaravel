@extends('template.main')

@section('title', 'Register Usuario')

@section('content')
<br>
<br>
<br>
<br>
@include('template.partials.aside_admin')
<div class="container">
	<div class="row">		
		<div class="col-md-12 col-md-offset-1">

			{!! Form::open(['route' => 'admin.users.store','method' => 'POST','files' => true]) !!}
			<h3><i class="fa fa-pencil"> Register</i></h3>
			<hr>
			<div class="form-group">
				{!! Form::label('name','Nombre') !!}	
				{!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nombre Completo' ,'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('email','Correo Electronico') !!}	
				{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com' ,'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('password','Contraseña') !!}	
				{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***************' ,'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('phone','Phone') !!}	
				{!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => '' ,'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('tipo','Tipo') !!}	
				{!! Form::select('tipo', ['member' => 'Member', 'admin' => 'Administrator', 'guest' => 'Guest'], null, ['class' => 'form-control', 'placeholder'  => 'Seleccione una opcion...', 'required']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('image', 'Avatar') !!}
				{!! Form::file('image') !!}
			</div>	
			<div class="form-group">

				{!! Form::button('<i class="fa fa-floppy-o"> Agregar Usuario</i>',['class' => 'btn btn-success','type'=>'submit']) !!}	
				
			</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
<br>
<br>
<br>

@endsection

