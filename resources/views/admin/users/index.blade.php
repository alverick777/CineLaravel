@extends('template.main')

@section('title', 'Lista de Usuarios')

@section('content')
@include('template.partials.aside_admin')
<br><br>
<div class="container height">
	<div class="row">		
		<div class="col-md-12 col-md-offset-1">
		<br>
		<br>
		<h3><i class="fa fa-table"> Lista de Usuarios</i></h3>
		<br>
		<a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-xs"><i class="fa fa-plus-square"></i> &nbsp;Registrar nuevo usuario</a>
		<hr>
		<table class="table table-striped">
			<thead>
				<th>ID</th>
				<th>Foto</th>
				<th>Name</th>
				<th>E-Mail</th>
				<th>Phone</th>
				<th>Status</th>
				<th>Type</th>		
				<th></th>
			</thead>
			<tbody>
				@foreach($users as $user)
					<tr>
						<td>{{ $user->id }}</td>
						<td>
							<img src="{{ asset('img/avatars/' . $user->avatar->name) }}" alt="" style="min-height: 30px;max-height: 30px;">
						</td>
						<td>{{ $user->name }}</td>
						<td>{{ $user->email }}</td>				
						<td>{{ $user->phone }}</td>
						<td>
							@if($user->status == "Active")
								<span class="label label-success">{{ $user->status }}</span>
							@else
								<span class="label label-default">{{ $user->status }}</span>	
							@endif
						</td>
						<td>					
							@if($user->tipo == "admin")
								<span class="label label-danger">{{ $user->tipo }}</span>
							@else
								@if($user->tipo == "guest")
									<span class="label label-success coloramarillo">{{ $user->tipo }}</span>
								@else
									<span class="label label-primary">{{ $user->tipo }}</span>	
								@endif
							@endif		
						</td>
						<td><a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
							<a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('Seguro que deseas eliminarlo?')" class="btn btn-danger btn-xs"><i class="fa fa-trash fa-lg"></i></a>
							<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal" data-id ="{{ $user->id }}" data-idsender="{{ Auth::user()->id }}"> <i class="fa fa-envelope"></i> Messages</button>
						</td>
					</tr>
				@endforeach

			</tbody>
		</table>
			<div class="text-center">
				{!! $users->render() !!}
			</div>	
			 <br><br>
                <div class="alert alert-success" role="alert"><strong> Total de Usuarios en el sistema: {{ $total }}</strong></div>	
		</div>

	
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog modal-lg" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button id="btn_close" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title" id="myModalLabel"><i class="fa fa-envelope"></i> Mensaje personal Usuario</h4>
		      </div>
		      <div class="modal-body">
		      	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
				<input type="hidden" id="user_id">
				<input type="hidden" id="user_id_sender">
		      	<div class="form-group">
		      		<label for="mensaje"> Mensaje </label>
		      		<textarea value="" class="textarea-mensaje" name="mensaje" id="mensaje" cols="77" rows="10"></textarea>
		      	</div>
		        	<div id="msj-success" class="alert alert-success alert" role="alert" style="display:none">		        		
			  			<strong>Tarea Exitosa!</strong> Registro ingresado correctamente
			  		</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" id="btn_close2" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-minus-circle"></i> Close</button>
		        <button type="button" id="btn_send" class="btn btn-success"><i class="fa fa-paper-plane"></i> Send Message</button>
		      </div>
		    </div>
		  </div>
		</div>


	</div>
</div>
<br>
<br>
<br>
<br><br>
@endsection

@section('js')

<script>   
	
$('.textarea-mensaje').trumbowyg();

$('#myModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget);
  var id_user = button.data('id');  // id del usuario al que pertenece el mensaje
  var user_id_sender = button.data('idsender'); // el id del usuario que mando el mensaje
  
  $('#user_id').val(id_user);
  $('#user_id_sender').val(user_id_sender);
  
 
});

$("#btn_send").click(function(){
   		var id = $('#user_id').val();	
   		var sender_id =  $('#user_id_sender').val();
    	send_message(id,sender_id);
});		

$("#btn_close2").click(function(){
	$('.textarea-mensaje').trumbowyg('empty');
	$('#msj-success').css('display', 'none');
});	 

$("#btn_close").click(function(){
	$('.textarea-mensaje').trumbowyg('empty');
	$('#msj-success').css('display', 'none');
});	   



</script>

@endsection