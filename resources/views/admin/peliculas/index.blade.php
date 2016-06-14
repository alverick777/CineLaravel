@extends('template.main')

@section('title','Listado de Peliculas')

@section('content')
<br>
<div class="container">
@include('template.partials.aside_admin')
	<div class="container">
		<div class="row">		
			<div class="col-md-12 col-md-offset-1">			
					<br>
					<br>	
					<br><br>
					<h3><i class="fa fa-table"> Lista de Peliculas</i> </h3>
					<br>
					<a href="{{ route('admin.peliculas.create') }}" class="btn btn-primary btn-xs"><i class="fa fa-plus-square"></i> &nbsp;Registrar nueva pelicula</a>
					<a href="{{ route('peliculas.pendientes') }}" class="btn btn-success btn-xs"><i class="fa fa-question-circle" aria-hidden="true"></i> &nbsp;Peliculas Pendientes</a>
					<hr>
					{!! Form::open(['route' => 'admin.peliculas.index', 'method' => 'GET']) !!}  
		                <div class="pull-right">
		                    {!! Form::text('titulo', null, ['id' => 'search_peliculas', 'placeholder' => 'Search...']) !!}  
		                </div>             
              		{!! Form::close() !!} 
					
					<table class="table table-stripped">
						<thead>
							<th>ID</th>
							<th>Foto</th>
							<th>Titulo Original</th>
							<th>Titulo Castellano</th>							
							<th>Año</th>
							<th>Duracion</th>
							<th></th>
							<th></th>
							<th></th>
						</thead>
						<tbody>
							@foreach($peliculas as $pelicula)
								<tr>
									<td>{{ $pelicula->id }}</td>
									<td>
										@foreach($pelicula->carteles as $image)
										<img src="{{ asset('img/peliculas/carteles/' . $image->name) }}" alt="" style="min-height: 30px;max-height: 30px;">
										@endforeach	
									</td>					
									<td>{{ $pelicula->titulo_original }}</td>				
									<td>{{ $pelicula->titulo_castellano }}</td>											
									<td>{{ $pelicula->year }}</td>			
									<td>{{ $pelicula->duracion }}</td>
									<td style="display:none">{{ $pelicula->guion }}</td>
									<td style="display:none">{{ $pelicula->musica }}</td>
									<td>
										<a href="{{ route('admin.peliculas.edit', $pelicula->id) }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
										<a href="{{ route('admin.peliculas.destroy', $pelicula->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-lg"></i></a>

										<a href="#"><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#trailerModal" data-id='{{ $pelicula->id }}' data-titulo='{{ $pelicula->titulo_original }}'><i class="fa fa-film fa-xs"></i></button></a>

										<a href="#"><button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal" data-guion='{{ $pelicula->guion }}' data-musica='{{ $pelicula->musica }}' data-produccion='{{ $pelicula->produccion }}' data-distribuidora='{{ $pelicula->distribuidora }}' data-rating='{{ $pelicula->rating }}' data-oscar='{{ $pelicula->oscar }}' data-sinopsis='{{ $pelicula->sinopsis }}' data-pelisdire='{{ $pelicula->directores }}' data-peliscast='{{ $pelicula->actores }}' data-pelisgenres='{{ $pelicula->generos }}' data-name="{{ $pelicula->titulo_original }}" ><i class="fa fa-eye fa-lg"></i></button></a>
										@if($pelicula->oscar == 'si')
											<a href="#"><button type="button" class="btn btn-success btn-xs" data-toggle="modal" data-target="#candidatasModal" data-id='{{ $pelicula->id }}' data-titulo='{{ $pelicula->titulo_original }}'><i class="fa fa-briefcase" aria-hidden="true"></i></button></a>
										@else
										
										@endif
									</td>																					
								</tr>
							@endforeach
						</tbody>
					</table>
					<div class="text-center">
						{!! $peliculas->render() !!}
					</div>
					<br><br>
					<div class="alert alert-success" role="alert"><strong> Total de peliculas en el sistema: {{ $total }}</strong></div>
				</div>
					<br>
					<br>
					<br>
					<br>
					<br>

				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				  <div class="modal-dialog" role="dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title text-center" id="exampleModalLabel">Extra Data Movie - <span id="name_peli"></span></h4>
				      </div>
				      <div class="modal-body">				        			          
				            <h5><strong>Guion:</strong> <span id="guion"></span></h5>
				            <h5><strong>Musica:</strong> <span id="musica"></span></h5>
				            <h5><strong>Produccion:</strong> <span id="produccion"></span></h5>
				            <h5><strong>Distribuidora:</strong> <span id="distribuidora"></span></h5>
				            <h5><strong>Rating:</strong> <span id="rating"></span> <strong><span class="text-success" id="info_data"></span></strong></h5>
				            <h5><strong>Oscar:</strong> <span id="oscar"></span></h5>
							<h5 id="dir"><strong>Dirctor(es):</strong> </h5>
							<h5 id="cast666"><strong>Reparto:</strong> </h5>
							<h5 id="genre666"><strong>Genero(s):</strong> </h5>
				            <h5><strong>Sinopsis:</strong></h5>
				            <textarea id="sinopsis" rows="10" cols="78"></textarea>		
				      </div>    
				    </div>
				  </div>
				</div>


				<div class="modal fade" id="trailerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				  <div class="modal-dialog" role="dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title text-center"><span id="titulo_trailer"></span></h4>
				      </div>
				      <div class="modal-body">				        			          
				            {!! Form::open(['route' => 'admin.trailers.store', 'method' => 'POST','files' => true]) !!}				              
			                  <div class="form-group">                    
			                     {!! Form::hidden('pelicula_id', null, array('id' => 'movie_id')) !!}			                     
			                  </div>			                   
			                  <div class="form-group">
			                    {!! Form::text('idioma', null, ['id'=>'idioma', 'class' => 'form-control', 'placeholder' => 'Idioma', 'required']) !!}
			                  </div> 
			                   <div class="form-group">
		                        {!! Form::label('trailer', 'Archivo') !!}
		                        <input type="file" id="trailer" name="trailer">		                    
		                      </div>  	
			                <br>
			                  <div class="form-group">
			                    {!! Form::button('<i class="fa fa-star"> Add Trailer</i>', ['class' => 'btn btn-success','type'=>'submit']) !!}
			                  </div>   
			              {!! Form::close() !!}
				      </div>    
				    </div>
				  </div>
				</div>


			<div class="modal fade" id="candidatasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
				  <div class="modal-dialog" role="dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title text-center"><span id="titulo_pelicula"></span></h4>
				      </div>
				      <div class="modal-body">				        			          
				          {!! Form::open(['route' => 'admin.candidates.store', 'method' => 'POST']) !!}				              
			           	  <div class="form-group">                    
			                  {!! Form::hidden('pelicula_id', null, array('id' => 'movie_id2')) !!}			                     
			              </div>
						  <div class="form-group">
			                  {!! Form::text('nombre_candidata', null, ['id'=>'nombre_candidata', 'class' => 'form-control', 'placeholder' => 'Candidate Name', 'required']) !!}
			              </div> 
			              <br>
			              <div class="form-group">
			                    {!! Form::button('<i class="fa fa-star"> Add Candidate</i>', ['class' => 'btn btn-success','type'=>'submit']) !!}
		                  </div>   
			              {!! Form::close() !!}
				      </div>    
				    </div>
				  </div>
				</div>


			
			</div>
		</div>
	</div>

	<br><br><br><br><br><br>
@endsection



@section('js')
	<script>

		

</script>

@endsection