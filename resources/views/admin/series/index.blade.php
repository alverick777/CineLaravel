@extends('template.main')

@section('title', 'Lista de TV Series')

@section('content')

@include('template.partials.aside_admin')
<br>
<br>
<br>
<br><br>
<div class="container">
	<div class="row">		
		<div class="col-md-11 col-md-offset-1">
		<input type="hidden" name="_token" value="{{ csrf_token() }}" id="tokendeleteserie">
			<ul class="nav nav-tabs" role="tablist" id="mytab">
	          <li role="presentation" class="active"><a id="tab1" href="#list" aria-controls="list" role="tab" data-toggle="tab">View</a></li>
	          <li role="presentation"><a href="#add" aria-controls="add" role="tab" data-toggle="tab">Add</a></li>            
	        </ul>

	        <div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="list">				
					<br>	              
		            <h3><i class="fa fa-table"> Lista de Series de TV</i> </h3>
		            <hr>
			       	<a href="{{ route('series.seriespendientes') }}" class="btn btn-success btn-xs"><i class="fa fa-question-circle" aria-hidden="true"></i> &nbsp;Series Pendientes</a>
			       	{!! Form::open(['route' => 'admin.series.index', 'method' => 'GET']) !!}  
		                <div class="pull-right">
		                    {!! Form::text('titulo', null, ['id' => 'search_serie', 'placeholder' => 'Search...']) !!}  
		                </div>             
              		{!! Form::close() !!} 			       	
		            <br>
		            <br>	              
		            <br>
		            <table class="table table-stripped">
		                <thead class="bg-info">
		                    <th>ID</th>
		                    <th>Foto</th>
		                    <th>Titulo</th>
		                    <th>rating</th>
		                    <th>Año Inicio</th>
		                    <th>Año Termino</th>
		                    <th>Seasons</th>		                    		                    
		                    <th></th>           
		                </thead>
		                <tbody id="datos">
		                  @foreach($series as $serie)
		                    <tr>
		                      <td>{{ $serie->id }}</td>   
		                      <td>  
		                        @foreach($serie->carteles as $image)
		                         <img src="{{ asset('img/series/carteles/' . $image->name) }}" alt="" style="min-height: 30px;max-height: 30px;">
		                        @endforeach                         
		                      </td>
		                      <td>{{ $serie->titulo_serie }}</td>       
		                      <td>{{ $serie->rating }}</td>   
		                      <td>{{ $serie->year_serie_inicio }}</td>   
		                      <td>{{ $serie->year_serie_termino }}</td>
		                      <td>{{ $serie->temporadas }}</td>
		                      <td>
		                       <a href="{{ route('admin.series.edit', $serie->id) }}" class="btn btn-warning btn-xs"><i class="fa fa-wrench"></i> Edit&nbsp;</a>
		                       <a href="#"><button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_delete" data-id='{{ $serie->id }}' data-name='{{ $serie->titulo_serie }}'><i class="fa fa-trash-o"></i> Delete</button></a>	 
		                       <a href="{{ route('admin.capitulos.loadCapitulos', $serie->id) }}" class="btn btn-success btn-xs"><i class="fa fa-wrench"></i> Administrador de Temporadas</a>	 
		                      </td>                                         
		                    </tr>
		                  @endforeach
		                </tbody>
              </table>
              <div class="text-center">
            {!! $series->render() !!}
          </div>
              <br><br>
                <div class="alert alert-success" role="alert"><strong> Total de Series de TV en el sistema: {{ $total }}</strong></div>
              <br><br><br>
				</div>
				<div role="tabpanel" class="tab-pane" id="add">
					<br><br>
					<!-- -->

					{!! Form::open(['route' => 'admin.series.store', 'method' => 'POST','files' => true]) !!}
					<h3><i class="fa fa-pencil"> Register</i></h3>
					<hr>
					<br>
					<div class="form-group">				
						{!! Form::text('titulo_serie', null, ['class' => 'form-control', 'placeholder' => 'Titulo', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('year_serie_inicio', null, ['class' => 'form-control', 'placeholder' => 'Año de Inicio', 'required']) !!}
					</div>
					<div class="form-group">				
						{!! Form::text('year_serie_termino', null, ['class' => 'form-control', 'placeholder' => 'Año de termino', 'required']) !!}
					</div>										
					<div class="form-group">				
						{!! Form::text('temporadas', null, ['class' => 'form-control', 'placeholder' => 'N° Seasons', 'required']) !!}
					</div>	
					<div class="form-group">
						{!! Form::label('status_poster','Status Poster') !!}	
						{!! Form::select('status_poster', ['si' => 'OK', 'no' => 'Pendiente'], null, ['class' => 'form-control select-oscar', 'required']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('status_datos','Status Datos') !!}	
						{!! Form::select('status_datos', ['si' => 'OK', 'no' => 'Pendiente'], null, ['class' => 'form-control select-oscar', 'required']) !!}
					</div>				
					<div class="form-group">
						{!! Form::label('generos', 'Generos') !!}
						{!! Form::select('generos[]', $generos, null,['class' => 'form-control select-genero2', 'multiple', 'required']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('actores', 'Cast') !!}
						{!! Form::select('actores[]', $actores , null,['class' => 'form-control select-cast2', 'multiple', 'required']) !!}
					</div>		
					<div class="form-group">
						{!! Form::label('directores', 'Director') !!}
						{!! Form::select('directores[]', $directores , null,['class' => 'form-control select-director2', 'multiple', 'required']) !!}
					</div>		
					<div class="form-group">
						{!! Form::label('sinopsis', 'Sinopsis') !!}
						{!! Form::textarea('sinopsis',null ,['class' => 'form-control textarea-sinopsis2']) !!} 
					</div>	
					<div class="form-group">
						{!! Form::label('image', 'Poster') !!}
						{!! Form::file('image', array('onchange'=>'readURL(this);')) !!}
						<br><br>
			            <h4 id="mes4" style="display:none;">Preview...</h4>
			            <img id="img_prev4" src="" alt="" style="min-height:100px;max-height: 300px;">
					</div>	
					<br><br>
					<div class="form-group">
						{!! Form::button('<i class="fa fa-floppy-o"> Agregar Serie TV</i>', ['class' => 'btn btn-success','type'=>'submit']) !!}
					</div>
				{!! Form::close() !!}
					
				</div>
			</div>


		</div>
	</div>
</div>

<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="exampleModalLabel"></h4>
                <br>
            </div>
            <div class="modal-body">              
              <span><h5>Desea Continuar?</h5></span>
              <input id="id_serie" type="hidden" value="">             
            </div>    
            <div class="modal-footer">              
              <button id="btn_si3" type="button" class="btn btn-success"><i class="fa fa-check-circle"></i> Si</button>
              <button id="btn_no3" type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-minus-circle"></i> No</button>
            </div>
          </div>
        </div>
    </div>

    

<br>
<br>
<br>
<br>
@endsection

@section('js')

<script>   
	
// funcion para preview de la imagen a subir
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
          $('#img_prev4')
          .attr('src', e.target.result);      
          };
          reader.readAsDataURL(input.files[0]);
    }
        $('#mes4').css("display", "block");
    }

$('.select-genero2').chosen({
      placeholder_text_multiple: 'Seleccione un maximo de 3 generos',
      max_selected_options: 3,
      disable_search_threshold: 3,
      width: "50%",
      no_results_text: 'Oops... no hay registros que mostrar'
    });

    $('.select-cast2').chosen({
      placeholder_text_multiple: 'Seleccione un maximo de 15 actores',
      max_selected_options: 15,
      disable_search_threshold: 15,
      width: "50%",
      no_results_text: 'Oops... no hay registros que mostrar'
    });

  $('.select-director2').chosen({
      placeholder_text_multiple: 'Seleccione un maximo de 3 directores',
      max_selected_options: 3,
      disable_search_threshold: 3,
      width: "50%",
      no_results_text: 'Oops... no hay registros que mostrar'
    });

$('#modal_delete').on('show.bs.modal', function (event) {
  var modal = $(this);
  var button = $(event.relatedTarget);

  var id = button.data('id');
  var name = button.data('name');

  modal.find('#exampleModalLabel').text("Delete Serie - " + name);
  modal.find('#id_serie').val(id);  
});




  $('.textarea-sinopsis2').trumbowyg();  



</script>

@endsection