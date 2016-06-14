@extends('template.main')

@section('title', 'Noticias Peliculas')

@section('content')

<style>
	
</style>

@include('template.partials.aside_admin')
<br><br><br><br><br>

<div class="container">
	<div class="row">		
		<div class="col-md-11 col-md-offset-1">
				{!! Form::open(['route' => 'admin.noticias.store', 'method' => 'POST','files' => true]) !!}
					<h3><i class="fa fa-pencil"> Registrar Noticia de Peliculas </i></h3>
					<hr>
					<br>
					<div class="form-group">
						{!! Form::label('peliculas', 'Peliculas') !!}
                        {!! Form::select('peliculas[]', $pelis2, $my_films,['id' => 'peliculas', 'class' => 'form-control select-pelis', 'multiple', 'required']) !!}&nbsp;
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
			            <h4 id="mes15" style="display:none;">Preview...</h4>
			            <img id="img_prev15" src="" alt="" style="min-height:100px;max-height: 300px;">
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
                         <img src="{{ asset('img/noticias_peliculas/' . $noticia->foto) }}" alt="" style="min-height: 30px;max-height: 30px;">
                      </td>
                      <td>{{ $noticia->titulo }}</td>  
                      <td>{{ $noticia->descripcion }}</td>
                      <td><a href="{{ route('admin.noticias.destroy', $noticia->id) }}" class="btn btn-danger"> <i class="fa fa-trash" aria-hidden="true"> Delete</i></a></td>
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
          $('#img_prev15')
          .attr('src', e.target.result);      
          };
          reader.readAsDataURL(input.files[0]);
    }
        $('#mes15').css("display", "block");
    }
   

     $('.select-pelis').chosen({
      placeholder_text_multiple: 'Seleccione una pelicula',
      max_selected_options: 1,
      disable_search_threshold: 1,
      width: "30%",
      no_results_text: 'Oops... no hay registros que mostrar'
    });


</script>
@endsection
