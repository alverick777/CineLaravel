
@extends('template.main')

@section('title', 'Lista de Actores')

@section('content')
@include('template.partials.aside_admin')
<br>
<br>
<br><br>
<div class="container">
  <div class="row">
    <div class="col-md-12 col-md-offset-1">       
      <br>
        <ul class="nav nav-tabs" role="tablist" id="mytab">
          <li role="presentation" class="active"><a id="tab1" href="#home" aria-controls="home" role="tab" data-toggle="tab">View</a></li>
          <li role="presentation"><a href="#add_actor" aria-controls="add_actor" role="tab" data-toggle="tab">Add</a></li>  
          <li role="presentation"><a href="#filmo_actor" aria-controls="filmo_actor" role="tab" data-toggle="tab">Filmography (Ajax)</a></li>    
          <li role="presentation"><a href="#award_actor" aria-controls="award_actor" role="tab" data-toggle="tab">Awards (Ajax)</a></li>       
        </ul>
        
        <div class="tab-content"> 
          <div role="tabpanel" class="tab-pane active" id="home">
              <br>               
              <h3><i class="fa fa-table"> Lista de Actores</i> </h3>              
              <hr>
              <a href="{{ route('actores.actorespendientes') }}" class="btn btn-success btn-xs"><i class="fa fa-question-circle" aria-hidden="true"></i> &nbsp;Actores Pendientes</a> 

              {!! Form::open(['route' => 'admin.actores.index', 'method' => 'GET']) !!}  
                <div class="pull-right">
                    {!! Form::text('nombre', null, ['id' => 'search_actor', 'placeholder' => 'Search...']) !!}  
                </div>             
              {!! Form::close() !!} 
              <br>
              <br>
              <br>
              <table class="table table-stripped">
                <thead class="bg-info">
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Oscars</th>
                    <th>Pais</th>
                    <th></th>           
                </thead>
                <tbody id="datos">
                  @foreach($actores as $actor)
                    <tr>
                      <td>{{ $actor->id }}</td>   
                      <td>  
                        @foreach($actor->foto as $image)
                         <img src="{{ asset('img/actores/fotos/' . $image->name_foto) }}" alt="" style="min-height: 30px;max-height: 30px;">
                        @endforeach                         
                      </td>
                      <td>{{ $actor->nombre }}</td>       
                      <td>{{ $actor->fecha_nac }}</td>
                      <td>{{ $actor->oscar }}</td>   
                      <td>{{ $actor->pais }}</td>    
                      <td>
                       <a href="{{ route('admin.actores.edit', $actor->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-wrench"></i> Edit&nbsp;</a> 
                       <a href="{{ route('admin.actores.destroy', $actor->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                       <a href="#"><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_filmography_actor" data-id='{{ $actor->id }}' data-name='{{ $actor->nombre }}'><i class="fa fa-film"></i> Add filmography</button></a>
                       <a href="#"><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal_award_actor" data-id='{{ $actor->id }}' data-name='{{ $actor->nombre }}'><i class="fa fa-trophy" aria-hidden="true"></i> Add Awards</button></a>    
                      </td>                                         
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="text-center">
            {!! $actores->render() !!}
          </div>
              <br><br>
                <div class="alert alert-success" role="alert"><strong> Total de Actores en el sistema: {{ $total }}</strong></div>
              <br><br><br>
          </div>
          <div role="tabpanel" class="tab-pane" id="add_actor">
            <br>
            <br>
            <br>
            <div class="container">
              <div class="row">   
                <div class="col-md-12">
                  {!! Form::open(['route' => 'admin.actores.store', 'method' => 'POST','files' => true]) !!}
                    <h3><i class="fa fa-pencil"> Register</i></h3>
                    <hr>
                    <div class="form-group">        
                      {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
                    </div>
                    <div class="form-group">        
                      {!! Form::text('fecha_nac', null, ['class' => 'form-control', 'placeholder' => '1980/05/05', 'required']) !!}
                    </div>
                    <div class="form-group">        
                      {!! Form::text('pais', null, ['class' => 'form-control', 'placeholder' => 'Pais', 'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label('sexo','Sexo') !!}  
                      {!! Form::select('sexo', ['F' => 'Female', 'M' => 'Male'], null, ['class' => 'form-control', 'placeholder'  => 'Seleccione sexo...', 'required']) !!}
                    </div>
                    <div class="form-group">        
                      {!! Form::text('oscar', null, ['class' => 'form-control', 'placeholder' => 'N° Oscars', 'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label('status_datos','Status Datos') !!}  
                      {!! Form::select('status_datos', ['si' => 'OK', 'no' => 'Pendiente'], null, ['class' => 'form-control select-oscar', 'required']) !!}
                    </div>
                    <div class="form-group">
                      {!! Form::label('biografia', 'Biografia') !!}
                      {!! Form::textarea('biografia',null ,['class' => 'form-control textarea-biografia']) !!} 
                    </div>  
                    <div class="form-group">
                      {!! Form::label('image', 'Foto') !!}
                      {!! Form::file('image', array('onchange'=>'readURL(this);')) !!}
                      <br><br>
                      <h4 id="mes" style="display:none;">Preview...</h4>
                      <img id="img_prev" src="" alt="" style="min-height:100px;max-height: 300px;">
                    </div>  
                    <div class="form-group">
                      {!! Form::button('<i class="fa fa-floppy-o"> Agregar Actor</i>', ['class' => 'btn btn-success','type'=>'submit']) !!}
                    </div>
                  {!! Form::close() !!} 
                </div>
              </div>  
            </div>
            <br><br>
          </div>

          <div role="tabpanel" class="tab-pane" id="filmo_actor">
              <div class="row">   
                <div class="col-md-12">                  
                  <br>
                  <br>
                    <div class="form-group">
                        {!! Form::label('actores', 'Actores') !!}
                        {!! Form::select('actores[]', $actores2, $my_actores,['id' => 'actores', 'class' => 'form-control select-dires', 'multiple', 'required']) !!}&nbsp;
                        {!! Form::button('<i class="fa fa-download"> Load Filmography</i>', ['id'=>'btn_filmo_actor', 'class' => 'btn btn-success btn-md','type'=>'button']) !!}
                    </div>
                  <br>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokenfilmo_actor">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokendeletefilmoactor">    
                    <br>
                    <h3 id="titulo2"> <i class="fa fa-film"></i> Filmografia <i class="fa fa-film"></i></h3></br>                    
                    <hr>
                    <table class="table table-stripped">
                      <thead class="bg-warning">
                        <th>ID</th>
                        <th>Nombre Trabajo</th>
                         <th>Año</th>
                         <th>Personaje</th>
                         <th style="width:100px;"></th>    
                         <th style="width:50px;"></th>                              
                        </thead>
                      <tbody id="list_filmogra_actor">                                                       
                                                      
                      </tbody>
                    </table>
                    <br><br><br><br><br>
                </div>
              </div>
          </div>

          <div role="tabpanel" class="tab-pane" id="award_actor">
            <div class="row">   
                <div class="col-md-12">                  
                    <br>
                    <br>
                    <div class="form-group">
                        {!! Form::label('actores', 'Actores') !!}
                        {!! Form::select('actores[]', $actores2, $my_actores,['id' => 'actores2', 'class' => 'form-control select-dires', 'multiple', 'required']) !!}&nbsp; 
                       {!! Form::button('<i class="fa fa-download"> Load Awards</i>', ['id'=>'btn_award_actor', 'class' => 'btn btn-success btn-md','type'=>'button']) !!}
                    </div>
                    <br>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokenaward_actor">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokendeleteawardactor">    
                    <br>
                    <h3 id="titulo_award_actor"> <i class="fa fa-film"></i> Awards <i class="fa fa-film"></i></h3></br>                    
                    <hr>
                    <table class="table table-stripped">
                      <thead class="bg-warning">
                        <th>ID</th>
                        <th>Award Name</th>
                         <th>Year</th>
                         <th>Resultado</th>
                         <th>Work</th>
                         <th>Tipo</th>
                         <th style="width:100px;"></th>    
                         <th style="width:50px;"></th>                              
                        </thead>
                      <tbody id="list_award_actor">                                                       
                                                      
                      </tbody>
                    </table>
                    <br><br><br><br><br>
                </div>
            </div>
          </div>

        </div>



        <div class="modal fade" id="modal_filmography_actor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel"></h4>
            </div>
            <div class="modal-body">             
              {!! Form::open(['route' => 'admin.filmografia_actor.store', 'method' => 'POST']) !!}
                  <div class="form-group">                    
                     {!! Form::hidden('actor_id', null, array('id' => 'actor_id')) !!}
                  </div> 
                   <div class="form-group">
                    {!! Form::text('name_peli_o_serie', null, ['class' => 'form-control', 'placeholder' => 'Trabajo', 'required']) !!}              
                  </div>
                  <div class="form-group">
                    {!! Form::label('tipo_trabajo','Tipo') !!}
                    {!! Form::select('tipo_trabajo', ['TV. Serie' => 'TV. Serie', 'Movie' => 'Pelicula'], null, ['class' => 'form-control', 'placeholder'  => 'Seleccione un tipo...', 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::text('year_peli_o_serie', null, ['id'=>'year_peli_o_serie', 'class' => 'form-control', 'placeholder' => 'Año', 'required']) !!}
                  </div> 
                  <div class="form-group">
                    {!! Form::text('nombre_personaje', null, ['id'=>'nombre_personaje', 'class' => 'form-control', 'placeholder' => 'Personaje', 'required']) !!}
                  </div>                    
                <br>
                  <div class="form-group">
                    {!! Form::button('<i class="fa fa-star"> Add Work to Filmography</i>', ['class' => 'btn btn-success','type'=>'submit']) !!}                    
                  </div>   
              {!! Form::close() !!}
            </div>    
          </div>
        </div>
    </div>


     <div class="modal fade" id="modal_decision_actor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel"></h4>
                <br>
            </div>
            <div class="modal-body">              
              <span><h5>Desea Continuar?</h5></span>
              <input id="id_actor2" type="hidden" value="">
              <input id="id_filmo_actor" type="hidden" value="">
            </div>    
            <div class="modal-footer">              
              <button id="btn_si_actor" type="button" class="btn btn-success"><i class="fa fa-check-circle"></i> Si</button>
              <button id="btn_no_actor" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-minus-circle"></i> No</button>
            </div>
          </div>
        </div>
    </div>



<div class="modal fade" id="modal_award_actor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="name_actor"></h4>
            </div>
            <div class="modal-body">             
              {!! Form::open(['route' => 'admin.awardactor.store', 'method' => 'POST']) !!}
                <div class="form-group">                    
                    {!! Form::hidden('actor_id', null, array('id' => 'actor_id')) !!}
                </div> 
                <div class="form-group">
                    {!! Form::text('nombre_premio', null, ['id' => 'nombre_premio', 'class' => 'form-control', 'placeholder' => 'Name Award', 'required']) !!}              
                  </div>                 
                  <div class="form-group">
                    {!! Form::text('year_premio', null, ['id'=>'year_premio', 'class' => 'form-control', 'placeholder' => 'Año', 'required']) !!}
                  </div> 
                  <div class="form-group">
                    {!! Form::text('resultado', null, ['id'=>'resultado', 'class' => 'form-control', 'placeholder' => 'Resultado', 'required']) !!}
                  </div>  
                  <div class="form-group">
                    {!! Form::text('nombre_pelioserie_premiada', null, ['id'=>'nombre_pelioserie_premiada', 'class' => 'form-control', 'placeholder' => 'Movie or TV. Serie', 'required']) !!}
                  </div>     
                  <div class="form-group">
                    {!! Form::label('tipo_trabajo','Tipo') !!}
                    {!! Form::select('tipo_trabajo', ['TV. Serie' => 'TV. Serie', 'Movie' => 'Pelicula'], null, ['class' => 'form-control', 'placeholder'  => 'Seleccione un tipo...', 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::text('year_pelioserie_premiada', null, ['id'=>'year_pelioserie_premiada', 'class' => 'form-control', 'placeholder' => 'Año Movie or TV. Serie', 'required']) !!}
                  </div>  
                   <div class="form-group">
                    {!! Form::text('tipo', null, ['id'=>'tipo', 'class' => 'form-control', 'placeholder' => 'Tipo Premio', 'required']) !!}
                  </div>                    
                <br>
                  <div class="form-group">
                    {!! Form::button('<i class="fa fa-star"> Add Award</i>', ['class' => 'btn btn-success','type'=>'submit']) !!}                    
                  </div>   
              {!! Form::close() !!}
            </div>    
          </div>
        </div>
    </div>

<div class="modal fade" id="modal_decision2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel"></h4>
                <br>
            </div>
            <div class="modal-body">              
              <span><h5>Desea Continuar?</h5></span>
              <input id="id_actor3" type="hidden" value="">
              <input id="id_award3" type="hidden" value="">
            </div>    
            <div class="modal-footer">              
              <button id="btn_si2" type="button" class="btn btn-success"><i class="fa fa-check-circle"></i> Si</button>
              <button id="btn_no2" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-minus-circle"></i> No</button>
            </div>
          </div>
        </div>
    </div>


    </div> 
  </div>  
</div>

@endsection


@section('js')

<script>  

// funcion para preview de la imagen a subir
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#img_prev')
          .attr('src', e.target.result);      
          };
          reader.readAsDataURL(input.files[0]);
    }
        $('#mes').css("display", "block");
    }

// codigo para trumbowyg del text area de la biografia
$('.textarea-biografia').trumbowyg();

</script>

@endsection