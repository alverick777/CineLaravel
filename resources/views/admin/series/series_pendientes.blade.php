
@extends('template.main')

@section('title','Series Pendientes')

@section('content')

@include('template.partials.aside_admin')
	<div class="container">
		<div class="row">		
			<div class="col-md-11 col-md-offset-1">
				
				<br><br>
				<h3><i class="fa fa-question-circle" aria-hidden="true"> Lista de Series Pendientes</i></h3>				
				<hr>
				<br>
				<table class="table table-stripped">
				<thead class="bg-success">
					<tr>
						<th>Titulo</th>
						<th>Status Poster</th>
						<th>Status Datos</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					@foreach($series as $serie)
					<tr>
						<td>{{ $serie->titulo_serie }}</td>
						<td>
							@if($serie->status_poster === 'no')
								<span class="label label-danger">Pendiente</span>
							@else
								<span class="label label-success">Ok</span>
							@endif							
						</td>
						<td>
							@if($serie->status_datos === 'no')
								<span class="label label-danger">Pendiente</span>
							@else
								<span class="label label-success">Ok</span>
							@endif							
						</td>
						<td><a href="{{ route('admin.series.edit', $serie->id) }}" class="btn btn-primary btn-xs">Ver</a></td>
					</tr>
					@endforeach
				</tbody>
				</table>
				<div class="text-center">
					{!! $series->render() !!}
				</div>
			</div>
		</div>
	</div>
<br><br><br><br><br>
@endsection

@section('js')
<script>		

</script>

@endsection