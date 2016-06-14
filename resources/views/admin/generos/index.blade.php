@extends('template.main')

@section('title', 'Lista de Generos')

@section('content')
@include('template.partials.aside_admin')
<br><br>
<div class="container height">
	<div class="row">		
			<div class="col-md-12 col-md-offset-1">	
				<br>
				<br>
				<h3><i class="fa fa-table"> Lista de Generos</i></h3>
				<br>
				<a href="{{ route('admin.generos.create') }}" class="btn btn-primary btn-xs"><i class="fa fa-plus-square"></i> &nbsp;Registrar nuevo Genero</a>
				<hr>
				<table class="table table-striped">
					<thead>
						<th>ID</th>
						<th>Genero</th>
						<th>Tipo</th>		
						<th></th>
					</thead>
					<tbody>
						@foreach($generos as $genero)
							<tr>
								<td>{{ $genero->id }}</td>
								<td>{{ $genero->genero }}</td>
								<td>{{ $genero->tipo }}</td>				
								
								<td><a href="{{ route('admin.generos.edit', $genero->id) }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 	
								<a href="{{ route('admin.generos.destroy', $genero->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-lg"></i></a>										
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				<div class="text-center">
					{!! $generos->render() !!}
				</div>

			</div>
	</div>
</div>
<br>
<br>
<hr>
@endsection