@extends('template.main')

@section('title', 'Lista de Directores')

@section('content')
@include('template.partials.aside_admin')
<br><br><br><br><br>
<div class="container">
  <div class="row">
  	<div class="col-md-12 col-md-offset-1">  		
      
        <ul class="nav nav-tabs" role="tablist" id="mytab">
          <li role="presentation" class="active"><a id="tab1" href="#list" aria-controls="list" role="tab" data-toggle="tab">List</a></li>
          <li role="presentation"><a href="#add" aria-controls="add" role="tab" data-toggle="tab">Add</a></li> 
          <li role="presentation"><a href="#view_awards" aria-controls="view_awards" role="tab" data-toggle="tab">Awards & Filmography</a></li>
        </ul>

		 <div class="tab-content"> 

			<div role="tabpanel" class="tab-pane active" id="list">
			  <br>
              <br>  
              <h3><i class="fa fa-table"> Lista de Directores</i> </h3>
              {!! Form::open(['route' => 'admin.directores.index', 'method' => 'GET']) !!}  
                <div class="pull-right">
                    {!! Form::text('nombre', null, ['id' => 'search_director', 'placeholder' => 'Search...']) !!}  
                </div>             
              {!! Form::close() !!} 
              <br>    
              <hr>
              <table class="table table-stripped">
                <thead class="bg-info">
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Pais</th>                    
                    <th></th>           
                </thead>
                <tbody id="datos">
                  @foreach($directores as $director)
                    <tr>
                      <td>{{ $director->id }}</td>
                      <td>
                        @foreach($director->foto as $image)
                         <img src="{{ asset('img/directores/fotos/' . $image->name_foto) }}" alt="" style="min-height: 30px;max-height: 30px;">
                        @endforeach
                      </td>
                      <td>{{ $director->nombre }}</td>       
                      <td>{{ $director->fecha_naci }}</td>   
                      <td>{{ $director->pais }}</td>    
                      <td>
                       <a href="{{ route('admin.directores.edit', $director->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-wrench"></i></a> 
                       <a href="{{ route('admin.directores.destroy', $director->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
                       <a href="#"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_award" data-id='{{ $director->id }}' data-name='{{ $director->nombre }}'><i class="fa fa-star"></i> Add Awards</button></a>
                       <a href="#"><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal_filmography" data-id='{{ $director->id }}' data-name='{{ $director->nombre }}'><i class="fa fa-film"></i> Add filmography</button></a>                       
                      </td>                                         
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="text-center">
            	{!! $directores->render() !!}
          	</div>
              <br><br>
                <div class="alert alert-success" role="alert"><strong> Total de Directores en el sistema: {{ $total }}</strong></div>
              <br><br><br>
          </div>
			
			<div role="tabpanel" class="tab-pane" id="add">
				      <br>
              <br>
              <br>
              <div class="container">
                <div class="row">   
                  <div class="col-md-12">
                    {!! Form::open(['route' => 'admin.directores.store', 'method' => 'POST','files' => true]) !!}
                      <h3><i class="fa fa-pencil"> Register</i></h3>
                      <hr>
                      <div class="form-group">        
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
                      </div>
                      <div class="form-group">        
                        {!! Form::text('fecha_naci', null, ['class' => 'form-control', 'placeholder' => '1980/05/05', 'required']) !!}
                      </div>
                      <div class="form-group">        
                        {!! Form::text('pais', null, ['class' => 'form-control', 'placeholder' => 'Pais', 'required']) !!}
                      </div>
                       <div class="form-group">
                      {!! Form::label('sexo','Sexo') !!}  
                      {!! Form::select('sexo', ['F' => 'Female', 'M' => 'Male'], null, ['class' => 'form-control', 'placeholder'  => 'Seleccione sexo...', 'required']) !!}
                    </div>
                      <div class="form-group">
                        {!! Form::label('biografia', 'Biografia') !!}
                        {!! Form::textarea('biografia',null ,['class' => 'form-control textarea-biografia']) !!} 
                      </div>  
                      <div class="form-group">
                        {!! Form::label('image', 'Foto') !!}
                        {!! Form::file('image', array('onchange'=>'readURL(this);')) !!}
                        <br><br>
                        <h4 id="mes3" style="display:none;">Preview...</h4>
                        <img id="img_prev3" src="" alt="" style="min-height:100px;max-height: 300px;">
                      </div>  
                      <div class="form-group">
                        {!! Form::button('<i class="fa fa-floppy-o"> Agregar Director</i>', ['class' => 'btn btn-success','type'=>'submit']) !!}
                      </div>
                    {!! Form::close() !!} 
                  </div>
                </div>  
              </div>
            <br><br>
			</div>
			
      <div role="tabpanel" class="tab-pane" id="view_awards">
        <div class="container">
            <div class="row">   
              <div class="col-md-12">
                <br>
                <br>
                    <div class="form-group">
                        {!! Form::label('directores', 'Directores') !!}
                        {!! Form::select('directores[]', $dires, $my_directores,['id' => 'dires', 'class' => 'form-control select-dires', 'multiple', 'required']) !!}&nbsp;
                        {!! Form::button('<i class="fa fa-download"> Load Awards & Filmography</i>', ['id'=>'btn_awards', 'class' => 'btn btn-success btn-md','type'=>'button']) !!}
                    </div>
                <br>

                <ul class="nav nav-tabs" role="tablist" id="mytab">
                  <li role="presentation" class="active"><a href="#view_view_awards" aria-controls="view_view_awards" role="tab" data-toggle="tab">Awards</a></li>
                  <li role="presentation"><a href="#view_view_filmography" aria-controls="view_view_filmography" role="tab" data-toggle="tab">Filmography</a></li>
                </ul>
                 <div class="tab-content"> 

                    <div role="tabpanel" class="tab-pane active" id="view_view_awards">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokenawards">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokendeleteaward">    
                            <br>
                            <h3 id="titulo"> <i class="fa fa-star"></i> Awards <i class="fa fa-star"></i></h3></br>                    
                            <hr>
                            <table class="table table-stripped">
                                <thead class="bg-warning">
                                  <th>ID</th>
                                  <th>Premio</th>
                                  <th>Año Premio</th>
                                  <th>resultado</th>
                                  <th>Tipo</th>
                                  <th>Pelicula Premiada</th>                    
                                  <th></th>                                  
                                </thead>
                                <tbody id="list_awards">                                                       
                                                    
                                </tbody>
                            </table>
                      </div>

                    <div role="tabpanel" class="tab-pane" id="view_view_filmography">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokenfilmo">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokendeletefilmo">    
                            <br>
                            <h3 id="titulo"> <i class="fa fa-film"></i> Filmografia <i class="fa fa-film"></i></h3></br>                    
                            <hr>
                            <table class="table table-stripped">
                                <thead class="bg-warning">
                                  <th>ID</th>
                                  <th>Pelicula</th>
                                  <th>Año</th>
                                  <th></th>                                  
                                </thead>
                                <tbody id="list_filmogra">                                                       
                                                      
                                </tbody>
                            </table>
                    </div>
                </div>
            

                </div>
            </div>
        </div>
      </div>

    

		 </div>
		 <br><br><br><br>
  	</div>

    <div class="modal fade" id="modal_award" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel"></h4>
            </div>
            <div class="modal-body">              
              {!! Form::open(['route' => 'admin.awards.store', 'method' => 'POST']) !!}
                  <div class="form-group">                    
                     {!! Form::hidden('id_director', null, array('id' => 'id_director')) !!}
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

    <div class="modal fade" id="modal_filmography" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel"></h4>
            </div>
            <div class="modal-body">             
              {!! Form::open(['route' => 'admin.filmografia.store', 'method' => 'POST']) !!}
                  <div class="form-group">                    
                     {!! Form::hidden('id_director', null, array('id' => 'id_director2')) !!}
                  </div> 
                  <div class="form-group">
                    {!! Form::label('tipo_trabajo','Tipo') !!}
                    {!! Form::select('tipo_trabajo', ['TV. Serie' => 'TV. Serie', 'Movie' => 'Pelicula'], null, ['class' => 'form-control', 'placeholder'  => 'Seleccione un tipo...', 'required']) !!}
                  </div>
                   <div class="form-group">
                    {!! Form::text('nombre_pelicula', null, ['class' => 'form-control', 'placeholder' => 'Pelicula', 'required']) !!}              
                  </div>
                  <div class="form-group">
                    {!! Form::text('year_pelicula', null, ['id'=>'year_pelicula', 'class' => 'form-control', 'placeholder' => 'Año', 'required']) !!}                    
                  </div>                 
                <br>
                  <div class="form-group">
                    {!! Form::button('<i class="fa fa-star"> Add Pelicula to Filmography</i>', ['class' => 'btn btn-success','type'=>'submit']) !!}                    
                  </div>   
              {!! Form::close() !!}
            </div>    
          </div>
        </div>
    </div>



 <div class="modal fade" id="modal_decision" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel"></h4>
                <br>
            </div>
            <div class="modal-body">              
              <span><h5>Desea Continuar?</h5></span>
              <input id="id_dire" type="hidden" value="">
              <input id="id_award" type="hidden" value="">
            </div>    
            <div class="modal-footer">              
              <button id="btn_si" type="button" class="btn btn-success"><i class="fa fa-check-circle"></i> Si</button>
              <button id="btn_no" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-minus-circle"></i> No</button>
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
              <input id="id_dire2" type="hidden" value="">
              <input id="id_filmo" type="hidden" value="">
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

@endsection


@section('js')
<script>  



</script>

@endsection

              