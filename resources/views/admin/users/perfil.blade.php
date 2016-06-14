@extends('template.main')

@section('title', 'Perfil de Usuario')

@section('content')
<br><br><br>
<div class="container fondo">
          <div class="row">
            <div class="col-md-12">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url('/img/780886-crimea-pictures.jpg') center center;color:white">
                  <h3 class="widget-user-username">{{ Auth::user()->name }}</h3>
                  <h5 class="widget-user-desc">{{ Auth::user()->tipo }}</h5>
                </div>
                <div class="widget-user-image">
                  <img class="img-circle" src="{{ asset('img/avatars/' . Auth::user()->avatar->name) }}" alt="User Avatar">
                </div>
                <br><br><br>
                <div class="box-footer alto">
                    <div class="col-md-12">
                      
                    <ul class="nav nav-tabs" role="tablist" id="mytab">
                       <li role="presentation" class="active"><a id="tab1" href="#datos" aria-controls="datos" role="tab" data-toggle="tab">Datos</a></li>
                       <li role="presentation"><a href="#mensajes" aria-controls="mensajes" role="tab" data-toggle="tab">Mensajes</a></li> 
                       <li role="presentation"><a href="#comentarios" aria-controls="comentarios" role="tab" data-toggle="tab">Comentarios</a></li>  
                       <li role="presentation"><a href="#updateinfo" aria-controls="updateinfo" role="tab" data-toggle="tab">Actualizar Info</a></li>  
                       <li role="presentation"><a href="#updatefoto" aria-controls="updatefoto" role="tab" data-toggle="tab">Actualizar fotos</a></li>           
                    </ul>
                    <br><br>
                     
                      <div class="tab-content">

                          <div role="tabpanel" class="tab-pane active" id="datos">
                               <div class="panel panel-info widthh">
                                <div class="panel-heading">
                                  <h3 class="panel-title text-center">Datos Personales {{ Auth::user()->name }}</h3>
                                </div>
                                <div class="panel-body">
                                    <strong><i class="fa fa-user"></i> Nombre:</strong> {{ Auth::user()->name }} </br>
                                    <strong><i class="fa fa-envelope"></i> E-Mail:</strong> {{ Auth::user()->email }} </br>
                                    <strong><i class="fa fa-archive"></i> Tipo:</strong> {{ Auth::user()->tipo }} </br>
                                    <strong><i class="fa fa-phone-square"></i> Telefono:</strong> {{ Auth::user()->phone }}</br>
                                    <strong><i class="fa fa-bars"></i> Status:</strong> {{ Auth::user()->status }}</br>
                                    <strong><i class="fa fa-pencil"></i> Fecha de registro:</strong> {{ Auth::user()->created_at->diffForHumans() }} </br></br></br>
                                    <strong><i class="fa fa-pencil"></i> Cambiar password:</strong> </br>                                    
                                    <input id="cambiapass" type="text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="" class="btn btn-warning btn-xs"><i class="fa fa-wrench"></i> Change Password &nbsp;</a>                                     
                                </div>
                                <br><br><br>
                              </div>
                          </div>      
                          <div role="tabpanel" class="tab-pane" id="mensajes">
                                BBBB
                          </div> 
                          <div role="tabpanel" class="tab-pane" id="comentarios">
                                CCCC
                          </div>
                          <div role="tabpanel" class="tab-pane" id="updateinfo">
                                DDDDD
                          </div>
                          <div role="tabpanel" class="tab-pane" id="updatefoto">
                                EEEEE
                          </div>

                      </div>
                    </div>
                </div>


              </div><!-- /.widget-user -->
            </div><!-- /.col -->
          </div><!-- /.row -->
	
</div>



























	
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

@endsection