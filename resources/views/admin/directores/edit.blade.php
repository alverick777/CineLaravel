@extends('template.main')

@section('title','Editar director' . $directores->nombre)

@section('content')
@include('template.partials.aside_admin')
<br>
<br>
<br>
<br><br>
<div class="container">
	<div class="row">
		<div class="col-md-3 col-md-offset-1">
			<br>
			<br>
			{!! Form::open(['route' => ['admin.directores.update', $directores], 'method' => 'PUT','files' => true]) !!}
			@foreach($directores->foto as $image)
				<img src="{{ asset('img/directores/fotos/' . $image->name_foto) }}" alt="" style="min-height:100px;max-height: 300px;">
			@endforeach	
			<br><br>
			<div class="form-group">
				{!! Form::label('image', 'Cambiar foto del director') !!}
				{!! Form::file('image', array('onchange'=>'readURL2(this);')) !!}
				<br><br>
				<h4 id="mes4" style="display:none;">Preview...</h4>
				<img id="img_prev4" src="" alt="" style="min-height:100px;max-height: 300px;">
			</div>
		</div>

		<div class="col-md-7 col-md-offset-1">
				<h3><i class="fa fa-pencil"> Edicion de {{ $directores->nombre }}</i></h3>
				<hr>
				<div class="form-group">				
					{!! Form::text('nombre', $directores->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre', 'required']) !!}
				</div>
				<div class="form-group">				
					{!! Form::text('fecha_naci', $directores->fecha_naci, ['class' => 'form-control', 'placeholder' => 'Fecha Nacimiento', 'required']) !!}
				</div>
					<div class="form-group">				
					{!! Form::text('pais', $directores->pais, ['class' => 'form-control', 'placeholder' => 'Pais', 'required']) !!}
				</div>													
				<div class="form-group">
					{!! Form::label('biografia', 'Biografia') !!}
					{!! Form::textarea('biografia',$directores->biografia ,['class' => 'form-control']) !!} 
				</div>		
				<br>	
				<div class="form-group">
					{!! Form::button('<i class="fa fa-floppy-o"> Editar Director</i>',['class' => 'btn btn-success', 'type'=>'submit']) !!}	
					
				</div>

				{!! Form::close() !!}
		</div>
	</div>
</div>			
<br><br><br>

@endsection

@section('js')
	<script>
		function readURL2(input) {
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

		   /*$('.textarea-biografia2').trumbowyg({
			    btns: ['viewHTML',
			      '|', 'formatting',
			      '|', 'btnGrp-design',
			      '|', 'link',			      
			      '|', 'btnGrp-justify',
			      '|', 'btnGrp-lists']
			});*/

	</script>

@endsection