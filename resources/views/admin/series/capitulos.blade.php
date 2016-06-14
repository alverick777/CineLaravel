@extends('template.main')

@section('title', 'Capitulos_Series')

@section('content')
<style>
	#select_portada{
		width: 150px;
	}
</style>
@include('template.partials.aside_admin')
<br>

<div class="container">
	<div class="row">	

		<div class="col-md-11 col-md-offset-1">
			<div class="row">				
			<br>
		      <h3><i class="fa fa-table"> Lista de capitulos - Serie {{ $nombre_serie }}</i> </h3>			
		    <hr>		    
		    <a href="#"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_season" data-id='{{ $id_serie }}' data-name='{{ $nombre_serie }}'><i class="fa fa-floppy-o"></i> Nuevo Capitulo</button></a>
		    <br><br>		
			<table class="table table-stripped">
		        <thead class="bg-success">
		           <th>ID</th>
		           <th>Nombre</th>
		           <th>Nombre Castellano</th>				   
		           <th>Season</th>
		           <th>N° Fotos</th>		           
		           <th></th>		                           
		        </thead>
		        <tbody id="datos">	
		         @foreach($capitulos as $capitulo)	                  
		            <tr>
			            <td>{{ $capitulo->id }}</td>
			            <td>{{ $capitulo->nombre_capitulo }}</td>   		                      
   			            <td>{{ $capitulo->nombre_capitulo_castellano }}</td>						
			            <td>{{ $capitulo->temporada }}</td>    
			            <td>{{ $capitulo->fotos->count() }}</td>
			            <td>		                      
			              <a href="{{ route('admin.capitulos.destroy', $capitulo->id) }}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete</a>
			              <a href="#"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_images" data-id='{{ $capitulo->id }}' data-name='{{ $capitulo->nombre_capitulo }}' data-idserie='{{ $capitulo->serie_id }}'><i class="fa fa-picture-o" aria-hidden="true"></i> </button></a>	
			            </td>                                         
		            </tr>	
		          @endforeach	              
		        </tbody>
           </table>
		   <div class="text-center">
              {!! $capitulos->render() !!}
           </div>
           <br>
		</div>	

	
		</div>		

	</div>
</div>	

<div class="modal fade" id="modal_season" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-lg" role="dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel"></h4>
                <br>
            </div>
            <div class="modal-body">


			<div class="row">
                {!! Form::open(['route' => 'admin.capitulos.store', 'method' => 'POST']) !!}
				<div class="col-md-6">
	  	                {!! Form::hidden('serie_id', null, ['id' => 'id_serie', 'class' => 'form-control', 'required']) !!}
					<div class="form-group">				
						{!! Form::text('nombre_capitulo', null, ['class' => 'form-control', 'placeholder' => 'Titulo Capitulo', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('nombre_capitulo_castellano', null, ['class' => 'form-control', 'placeholder' => 'Titulo Español', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('fecha_estreno', null, ['class' => 'form-control', 'placeholder' => 'Fecha Estreno', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('guionista', null, ['class' => 'form-control', 'placeholder' => 'Guionista', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('director', null, ['class' => 'form-control', 'placeholder' => 'Director', 'required']) !!}
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">				
						{!! Form::text('duracion', null, ['class' => 'form-control', 'placeholder' => 'Duracion', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('link_imdb', null, ['class' => 'form-control', 'placeholder' => 'Link IMDB', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('num_capi_temp', null, ['class' => 'form-control', 'placeholder' => 'Numero Capitulo de Temporada', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('num_capi_general', null, ['class' => 'form-control', 'placeholder' => 'Numero Capitulo General', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('temporada', null, ['class' => 'form-control', 'placeholder' => 'Temporada', 'required']) !!}
					</div>					
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">				
					{!! Form::text('sinopsis_capitulo', null, ['class' => 'form-control', 'placeholder' => 'Sinopsis', 'required']) !!}
				</div>
				<div class="form-group">
	 				{!! Form::label('descripcion_capitulo', 'Descripcion') !!}
					{!! Form::textarea('descripcion_capitulo',null ,['class' => 'form-control']) !!} 
				</div>
				</div>
			</div>

            </div>    

            <div class="modal-footer">              
             <div class="form-group">
				{!! Form::button('<i class="fa fa-floppy-o"> Add Chapter</i>', ['class' => 'btn btn-success pull-right','type'=>'submit']) !!}
			</div>
			  {!! Form::close() !!}
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="modal_images" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-lg" role="dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="titulo_header"></h4>               
            </div>
            <div class="modal-body"> 
				{!! Form::open(['route' => 'admin.imagenescapitulos.store', 'method' => 'POST','files' => true]) !!}
					{!! Form::hidden('capitulo_id', null, ['id' => 'capitulo_id', 'class' => 'form-control', 'required']) !!}
					{!! Form::hidden('capitulo_name', null, ['id' => 'capitulo_name', 'class' => 'form-control', 'required']) !!}
					{!! Form::hidden('serie_id', null, ['id' => 'serie_id', 'class' => 'form-control', 'required']) !!}
				<div class="form-group">
					{!! Form::label('portadaYesNo','Imagen Portada (Si o No)') !!}	
					{!! Form::select('portadaYesNo', ['si' => 'Si', 'no' => 'No'], null, ['id' => 'select_portada', 'class' => 'form-control', 'placeholder'  => 'Seleccione una opcion...', 'required']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('image', 'Poster') !!}
					{!! Form::file('image', array('onchange'=>'readURL(this);')) !!}
						<br><br>
				        <h4 id="mes5" style="display:none;">Preview...</h4>
				        <img id="img_prev5" src="" alt="" style="min-height:100px;max-height: 300px;">
				</div>										        
            </div>    
            <div class="modal-footer">              
             	<div class="form-group">
					{!! Form::button('<i class="fa fa-floppy-o"> Agregar Imagen</i>', ['class' => 'btn btn-success','type'=>'submit']) !!}
				</div>

				{!! Form::close() !!}
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
          $('#img_prev5')
          .attr('src', e.target.result);      
          };
          reader.readAsDataURL(input.files[0]);
    }
        $('#mes5').css("display", "block");
    }

$( document ).ready(function() {
$('#modal_season').on('show.bs.modal', function (event) {
  var modal = $(this);
  var button = $(event.relatedTarget);

  var id = button.data('id');
  var name = button.data('name');

  modal.find('#exampleModalLabel').text("Add Chapter of Serie " + name);
  modal.find('#id_serie').val(id);  
});

  $('.textarea-desc').trumbowyg();

  $('#modal_images').on('show.bs.modal', function (event) {
  var modal = $(this);
  var button = $(event.relatedTarget);

  var id = button.data('id');
  var name = button.data('name');
  var serie_id = button.data('idserie');

  modal.find('#titulo_header').text("Add images of a chapter - " + name);
  modal.find('#capitulo_id').val(id);
  modal.find('#capitulo_name').val(name);
  modal.find('#serie_id').val(serie_id);

});



 });
</script>

@endsection