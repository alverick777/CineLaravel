@extends('template.main')

@section('title','Login')

@section('content')
<style>
	.width_login{
		width: 70%;
	}
</style>
<br><br><br><br><br>

<div class="container">

	<div class="row">
		<div class="col-md-3">
			<img src="{{ asset('img/user-gold.jpg') }}" id="logo">
		</div>

		<div class="col-md-9">			
			<div class="panel panel-success width_login">
			  	<div class="panel-heading">
				    <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> USER LOGIN</h3>
				</div>
				<div class="panel-body font-oswald">
				    {!! Form::open(['route' => 'admin.auth.login', 'method' => 'POST']) !!}
				<div class="form-group">
					{!! Form::label('email', 'E-Mail') !!}
					{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@gmail.com']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('password', 'Password') !!}
					{!! Form::password('password', ['class' => 'form-control', 'placeholder' => '***********']) !!}
				</div>
				<div class="form-group">		
					{!! Form::button('<i class="fa fa-user fa-md"> <b>ENTER</b></i>', array('class'=>'btn btn-success', 'type'=>'submit')) !!}
				</div>

					{!! Form::close() !!}
					
			  	</div>
			  	<div class="panel-footer">
					<br>
					<div class="login-links"> 
					      <a href="forgot-password.html">Forgot your password?</a>
					      <br />
					      <a href="{{ route('admin.users.create') }}"> Don't have an account? <strong>Sign Up</strong>
					      </a>
					</div>
					<div class="social-buton-left">
						<a href="" class="btn btn-primary btn-xs"> <i class="fa fa-facebook fa-xs"></i> Login with Facebook </a>
						<a href="" class="btn btn-danger btn-xs"> <i class="fa fa-google-plus fa-xs"></i> Login with Google Plus </a>
						<a href="" class="btn btn-success btn-xs"> <i class="fa fa-github"></i> Login with Github </a>
						<a href="" class="btn btn-info btn-xs"> <i class="fa fa-linkedin"></i> Login with Linkedin </a>
					</div> 
			  	</div>
			</div>
		</div>
	</div>
</div>
<hr>
<br><br>
<br><br>

@endsection
@section('js')


@endsection
