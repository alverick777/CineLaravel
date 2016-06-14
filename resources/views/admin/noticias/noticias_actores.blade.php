@extends('template.main')

@section('title', 'Noticias Actores')

@section('content')

<style>
	
</style>

@include('template.partials.aside_admin')
<br><br><br><br><br>

<div class="container">
	<div class="row">		
		<div class="col-md-11 col-md-offset-1">
				{!! Form::open(['route' => 'admin.noticias3.store', 'method' => 'POST','files' => true]) !!}
					<h3><i class="fa fa-pencil"> Registrar Noticia de Actores </i></h3>
					<hr>
					<br>
					<div class="form-group">
						{!! Form::label('actores', 'Actores') !!}
                        {!! Form::select('actores[]', $actores2, $my_actores,['id' => 'actores', 'class' => 'form-control select-actors', 'multiple', 'required']) !!}&nbsp;
                    </div>
					<div class="form-group">				
						{!! Form::text('titulo', null, ['class' => 'form-control', 'placeholder' => 'Titulo', 'required']) !!}
					</div>					
					<div class="form-group">				
						{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripcion foto', 'required']) !!}
					</div>
					<div class="form-group">
						{!! Form::label('image', 'Foto') !!}
						{!! Form::file('image', array('onchange'=>'readURL(this);')) !!}
						<br><br>
			            <h4 id="mes16" style="display:none;">Preview...</h4>
			            <img id="img_prev16" src="" alt="" style="min-height:100px;max-height: 300px;">
					</div>	
					
					<div class="form-group">
						{!! Form::button('<i class="fa fa-floppy-o"> Agregar Noticia </i>', ['id' => 'btn_noticia', 'class' => 'btn btn-success','type'=>'submit']) !!}
					</div>
				{!! Form::close() !!}
				<hr>	
				<br>
				<table class="table table-stripped">
                <thead class="bg-danger">
                    <th>ID</th>
                    <th>Foto</th>                    
                    <th>Titulo</th>
                    <th>Descripcion</th> 
                    <th></th>                                                  
                </thead>
                <tbody id="datos_noticia_peli">
                  @foreach($noticias as $noticia)
                    <tr>
                      <td>{{ $noticia->id }}</td>   
                      <td>                       
                         <img src="{{ asset('img/noticias_actores/' . $noticia->foto) }}" alt="" style="min-height: 30px;max-height: 30px;">
                      </td>
                      <td>{{ $noticia->titulo }}</td>  
                      <td>{{ $noticia->descripcion }}</td>   
                      <td><a href="{{ route('admin.noticias3.destroy', $noticia->id) }}" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"> Delete</i></a></td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
				<div class="text-center">
					{!! $noticias->render() !!}
				</div>
				
				</div>	
				
					
			<br><br>
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
          $('#img_prev16')
          .attr('src', e.target.result);      
          };
          reader.readAsDataURL(input.files[0]);
    }
        $('#mes16').css("display", "block");
    }
   

     $('.select-actors').chosen({
      placeholder_text_multiple: 'Seleccione un Actor',
      max_selected_options: 1,
      disable_search_threshold: 1,
      width: "30%",
      no_results_text: 'Oops... no hay registros que mostrar'
    });


</script>
@endsection