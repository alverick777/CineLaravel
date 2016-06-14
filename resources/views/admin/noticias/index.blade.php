
@extends('template.main')

@section('title', 'Admin Noticias')

@section('content')

@include('template.partials.aside_admin')
<br>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-10 col-md-offset-2">
			<h3 style="margin-left:30px;"><i class="fa fa-table"> Administrador de Noticias </i> </h3>
			<hr style="margin-left:30px;">
			<br>	

			<div class="col-lg-3 col-md-6 animacion">
				<div class="panel panel-red">
				    <div class="panel-heading">
				        <div class="row">
				            <div class="col-xs-3">
				                <i class="fa fa-newspaper-o fa-5x" aria-hidden="true"></i>
				            </div>
				        <div class="col-xs-9 text-right">                         
				            <div><strong>NOTICIAS PELICULAS</strong></div>
				        </div>
				        </div>
				    </div>
				    <a href="{{ route('admin.noticias.noticias_peliculas') }}">
				       <div class="panel-footer">
				            <span class="pull-left">News Admin</span>
				            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				             <div class="clearfix"></div>
				         </div>
				    </a>
				</div>
			</div>
	
			<div class="col-lg-3 col-md-6 animacion">
				<div class="panel panel-green">
				    <div class="panel-heading">
				        <div class="row">
				            <div class="col-xs-3">
				                <i class="fa fa-newspaper-o fa-5x" aria-hidden="true"></i>
				            </div>
				        <div class="col-xs-9 text-right">                         
				            <div><strong>NOTICIAS SERIES</strong></div>
				        </div>
				        </div>
				    </div>
				    <a href="{{ route('admin.noticias.noticias_series') }}">
				       <div class="panel-footer">
				            <span class="pull-left">News Admin</span>
				            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				             <div class="clearfix"></div>
				         </div>
				    </a>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 animacion">
				<div class="panel panel-yellow">
				    <div class="panel-heading">
				        <div class="row">
				            <div class="col-xs-3">
				                <i class="fa fa-newspaper-o fa-5x" aria-hidden="true"></i>
				            </div>
				        <div class="col-xs-9 text-right">                         
				            <div><strong>NOTICIAS VIDEOGAMES</strong></div>
				        </div>
				        </div>
				    </div>
				    <a href="{{ route('admin.users.index') }}">
				       <div class="panel-footer">
				            <span class="pull-left">News Admin</span>
				            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				             <div class="clearfix"></div>
				         </div>
				    </a>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 animacion">
				<div class="panel panel-blue">
				    <div class="panel-heading">
				        <div class="row">
				            <div class="col-xs-3">
				                <i class="fa fa-newspaper-o fa-5x" aria-hidden="true"></i>
				            </div>
				        <div class="col-xs-9 text-right">                         
				            <div><strong>NOTICIAS BOOKS</strong></div>
				        </div>
				        </div>
				    </div>
				    <a href="{{ route('admin.users.index') }}">
				       <div class="panel-footer">
				            <span class="pull-left">News Admin</span>
				            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				             <div class="clearfix"></div>
				         </div>
				    </a>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 animacion">
				<div class="panel panel-amarillo">
				    <div class="panel-heading">
				        <div class="row">
				            <div class="col-xs-3">
				                <i class="fa fa-newspaper-o fa-5x" aria-hidden="true"></i>
				            </div>
				        <div class="col-xs-9 text-right">                         
				            <div><strong>NOTICIAS ACTORES</strong></div>
				        </div>
				        </div>
				    </div>
				    <a href="{{ route('admin.noticias.noticias_actores') }}">
				       <div class="panel-footer">
				            <span class="pull-left">News Admin</span>
				            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				             <div class="clearfix"></div>
				         </div>
				    </a>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 animacion">
				<div class="panel panel-black">
				    <div class="panel-heading">
				        <div class="row">
				            <div class="col-xs-3">
				                <i class="fa fa-newspaper-o fa-5x" aria-hidden="true"></i>
				            </div>
				        <div class="col-xs-9 text-right">                         
				            <div><strong>NOTICIAS SOFTWARE</strong></div>
				        </div>
				        </div>
				    </div>
				    <a href="{{ route('admin.users.index') }}">
				       <div class="panel-footer">
				            <span class="pull-left">News Admin</span>
				            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
				             <div class="clearfix"></div>
				         </div>
				    </a>
				</div>
			</div>
			

			<hr>

		</div>	
		
	</div>
</div>

@endsection

@section('js')

<script>

</script>

@endsection