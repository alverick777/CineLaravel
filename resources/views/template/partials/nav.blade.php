
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
              <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                
                <a class="navbar-brand" href="{{ route('principal.index') }}"><i class="fa fa-film fa-xs"></i> Scorpion's Megazine</a>
            @if(Auth::user())                
                <a class="navbar-brand na" href="{{ route('principal.index') }}"><i class="fa fa-home fa-xs"></i></i></i> Home</a>
                <a class="navbar-brand na" href="{{ route('contact') }}"><i class="fa fa-envelope fa-xs"></i></i></i> Contact</a>
                @if(Auth::user()->admin())
                    <a class="navbar-brand na" href="{{ route('admin.users.index') }}"><i class="fa fa-cogs fa-xs"></i></i> Admin</a>
                @endif
            @endif
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                @if(Auth::user())
                <li class="dropdown">
                    <a href="#" id="click_noleidos" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i><span id="num_mensajes" class="label label-danger new_mes"></span> </a>
                    <ul id="mensajes_noleidos" class="dropdown-menu message-dropdown">

                    </ul>
                </li>
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('img/avatars/' . Auth::user()->avatar->name) }}" alt="" class="img-circle img-avatar"> &nbsp;{{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{ route('admin.perfil') }}"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>                                             
                        <li class="divider"></li>
                        <li>
                            <a href="{{ route('admin.auth.logout') }}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
                 @else
                 <li><a href="{{ route('admin.auth.login') }}"><span class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-user"> </span> &nbsp;Sign In</span></a></li>
                 <li><a href="{{ route('admin.users.create') }}"><span class="btn btn-success btn-xs"> <i class="fa fa-pencil-square-o fa-lg"></i> &nbsp;Sign Up</span></a></li>
            </ul> 
                @endif           
        </nav>



    </div>
    <!-- /#wrapper -->




<!--

<div class="container anchura">
    <div class="row">
        <div class="col-md-12">
            <div class="navbar-wrapper">
                <div class="container anchura">
                    <div class="navbar navbar-inverse navbar-static-top" role="navigation">
                        <div class="container">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span><span
                                        class="icon-bar"></span><span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="{{ route('principal.index') }}"><span class="glyphicon glyphicon-film"></span> Scorpion's Megazine</a>
                            </div>
                            <div class="navbar-collapse collapse">
                                <ul class="nav navbar-nav">
                                    @if(Auth::user())
                                    <li><a href="{{ route('principal.index') }}"> <span class="glyphicon glyphicon-home"></span> Home</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#contact" data-original-title> <span class="glyphicon glyphicon-envelope"></span> Contact</a></li> 
                                        @if(Auth::user()->admin())
                                            <li><a href="{{ route('admin.index') }}"> <i class="fa fa-cogs"></i> Admin</a></li> 
                                        @endif
                                    @endif
                                </ul>
                                    
                                <ul class='nav navbar-nav navbar-right'> 
                                  @if(Auth::user())                                   
                                  <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 

                                        <img src="{{ asset('img/avatars/' . Auth::user()->avatar->name) }}" alt="" class="img-circle img-avatar"> 

                                        &nbsp;{{ Auth::user()->name }} <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li><a href="#"><i class="fa fa-user fa-lg"></i> &nbsp;Perfil</a></li>
                                      <li role="separator" class="divider"></li>
                                      <li><a href="{{ route('admin.auth.logout') }}"><i class="fa fa-sign-out fa-lg"></i> &nbsp;Salir</a></li>
                                    </ul>
                                  </li>
                                  @else
                                    <li><a href="{{ route('admin.auth.login') }}"><span class="btn btn-info btn-xs"> <span class="glyphicon glyphicon-user"> </span> &nbsp;Sign In</span></a></li>
                                    <li><a href="{{ route('admin.users.create') }}"><span class="btn btn-success btn-xs"> <i class="fa fa-pencil-square-o fa-lg"></i> &nbsp;Sign Up</span></a></li>
                                </ul>                               
                                  @endif
                            </div>  
                        </div>  
                    </div> 
                </div> 
            </div>
        </div>
    </div>
</div> 
-->
