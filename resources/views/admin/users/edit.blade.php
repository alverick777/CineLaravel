@extends('template.main')

@section('title','Editar Usuario ' . $user->name)

@section('content')
@include('template.partials.aside_admin')
<br>
<br>
<br>

<div class="container">
	<div class="row">		
		<div class="col-md-12 col-md-offset-1">
			{!! Form::open(['route' => ['admin.users.update', $user], 'method' => 'PUT']) !!}
			<h3><i class="fa fa-pencil"> Edicion de Usuarios</i></h3>
			<hr>
			<div class="form-group">
				{!! Form::label('name','Name') !!}	
				{!! Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Nombre Completo' ,'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('email','E-Mail') !!}	
				{!! Form::text('email', $user->email, ['class' => 'form-control', 'placeholder' => 'example@gmail.com' ,'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('phone','Phone') !!}	
				{!! Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => '' ,'required']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('status','Status') !!}	
				{!! Form::select('status', ['Active' => 'Active', 'Disabled' => 'Disabled'], $user->status, ['class' => 'form-control']) !!}
			</div>

			<div class="form-group">
				{!! Form::label('tipo','Type') !!}	
				{!! Form::select('tipo', ['member' => 'Miembro', 'admin' => 'Administrador', 'guest' => 'Guest'], $user->tipo, ['class' => 'form-control']) !!}
			</div>
			<br>
			<div class="form-group">
				{!! Form::button('<i class="fa fa-floppy-o"> Editar Usuario</i>',['class' => 'btn btn-success', 'type'=>'submit']) !!}	
				
			</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
<br>
<br>
<br>
<br>
@endsection