@extends('template.main')

@section('title','Panel de Administracion')

@section('content')

<br>

<div class="container-fluid">

<div class="alert alert-success" role="alert"><h4 class="text-center"> PANEL DE ADMINISTRACION</h4></div>
<hr>
<br>
	<div class="col-lg-3 col-md-6 animacion">
		<div class="panel panel-red">
		    <div class="panel-heading">
		        <div class="row">
		            <div class="col-xs-3">
		                <i class="fa fa-user fa-5x"></i>
		            </div>
			        <div class="col-xs-9 text-right">                         
			            <div><strong>USERS</strong></div>
			        </div>
		        </div>
		    </div>
		    <a href="{{ route('admin.users.index') }}">
		       <div class="panel-footer">
		            <span class="pull-left">View Details</span>
		            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
		             <div class="clearfix"></div>
		         </div>
		    </a>
		</div>
	</div>

	<div class="col-lg-3 col-md-6 animacion">
         <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-film fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">                         
                         <div><strong>MOVIES</strong></div>
                    </div>
                 </div>
            </div>
             <a href="{{ route('admin.peliculas.index') }}">
                <div class="panel-footer">
                     <span class="pull-left">View Details</span>
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
	                        <i class="fa fa-users fa-5x"></i>
	                    </div>
	                    <div class="col-xs-9 text-right">                         
	                         <div><strong>ACTORS</strong></div>
	                    </div>
	                 </div>
	            </div>
	             <a href="{{ route('admin.actores.index') }}">
	                <div class="panel-footer">
	                     <span class="pull-left">View Details</span>
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
	                        <i class="fa fa-arrows fa-5x"></i>
	                    </div>
	                    <div class="col-xs-9 text-right">                         
	                         <div><strong>GENEROS</strong></div>
	                    </div>
	                 </div>
	            </div>
	             <a href="{{ route('admin.generos.index') }}">
	                <div class="panel-footer">
	                     <span class="pull-left">View Details</span>
	                     <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                     <div class="clearfix"></div>
	                </div>
	            </a>
	        </div>
	    </div>

	    <div class="col-lg-3 col-md-6 animacion">
	         <div class="panel panel-calipso">
	            <div class="panel-heading">
	                <div class="row">
	                    <div class="col-xs-3">
	                        <i class="fa fa-television fa-5x"></i>
	                    </div>
	                    <div class="col-xs-9 text-right">                         
	                         <div><strong>TV SERIES</strong></div>
	                    </div>
	                 </div>
	            </div>
	             <a href="#">
	                <div class="panel-footer">
	                     <span class="pull-left">View Details</span>
	                     <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                     <div class="clearfix"></div>
	                </div>
	            </a>
	        </div>
	    </div>

	     <div class="col-lg-3 col-md-6 animacion">
	         <div class="panel panel-brown">
	            <div class="panel-heading">
	                <div class="row">
	                    <div class="col-xs-3">
	                        <i class="fa fa-gamepad fa-5x"></i>
	                    </div>
	                    <div class="col-xs-9 text-right">                         
	                         <div><strong>VIDEOGAMES</strong></div>
	                    </div>
	                 </div>
	            </div>
	             <a href="#">
	                <div class="panel-footer">
	                     <span class="pull-left">View Details</span>
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
	                        <i class="fa fa-book fa-5x"></i>
	                    </div>
	                    <div class="col-xs-9 text-right">                         
	                         <div><strong>BOOKS</strong></div>
	                    </div>
	                 </div>
	            </div>
	             <a href="#">
	                <div class="panel-footer">
	                     <span class="pull-left">View Details</span>
	                     <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                     <div class="clearfix"></div>
	                </div>
	            </a>
	        </div>
	    </div>

	     <div class="col-lg-3 col-md-6 animacion">
	         <div class="panel panel-info">
	            <div class="panel-heading">
	                <div class="row">
	                    <div class="col-xs-3">
	                        <i class="fa fa-html5 fa-5x"></i>
	                    </div>
	                    <div class="col-xs-9 text-right">                         
	                         <div><strong>SOFTWARE</strong></div>
	                    </div>
	                 </div>
	            </div>
	             <a href="#">
	                <div class="panel-footer">
	                     <span class="pull-left">View Details</span>
	                     <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                     <div class="clearfix"></div>
	                </div>
	            </a>
	        </div>
	    </div>

	    
	
</div>

<hr>
<div class="container-fluid">
<div class="col-lg-3 col-md-6 animacion">
	         <div class="panel panel-green">
	            <div class="panel-heading">
	                <div class="row">
	                    <div class="col-xs-3">
	                        <i class="fa fa-pie-chart fa-5x"></i>
	                    </div>
	                    <div class="col-xs-9 text-right">                         
	                         <div><strong>ESTADISTICAS</strong></div>
	                    </div>
	                 </div>
	            </div>
	             <a href="#">
	                <div class="panel-footer">
	                     <span class="pull-left">View Details</span>
	                     <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                     <div class="clearfix"></div>
	                </div>
	            </a>
	        </div>
	    </div>

<div class="col-lg-3 col-md-6 animacion">
	         <div class="panel panel-red">
	            <div class="panel-heading">
	                <div class="row">
	                    <div class="col-xs-3">
	                        <i class="fa fa-tags fa-5x"></i>
	                    </div>
	                    <div class="col-xs-9 text-right">                         
	                         <div><strong>TAGS</strong></div>
	                    </div>
	                 </div>
	            </div>
	             <a href="#">
	                <div class="panel-footer">
	                     <span class="pull-left">View Details</span>
	                     <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                     <div class="clearfix"></div>
	                </div>
	            </a>
	        </div>
	    </div>

	    <div class="col-lg-3 col-md-6 animacion">
	         <div class="panel panel-primary">
	            <div class="panel-heading">
	                <div class="row">
	                    <div class="col-xs-3">
	                        <i class="fa fa-picture-o fa-5x"></i>
	                    </div>
	                    <div class="col-xs-9 text-right">                         
	                         <div><strong>POSTERS</strong></div>
	                    </div>
	                 </div>
	            </div>
	             <a href="#">
	                <div class="panel-footer">
	                     <span class="pull-left">View Details</span>
	                     <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
	                     <div class="clearfix"></div>
	                </div>
	            </a>
	        </div>
	    </div>

</div>
<br>
<br>
<br>

@endsection