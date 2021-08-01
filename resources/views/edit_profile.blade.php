@extends('layouts.app')
@section('content')
{{--container principal--}}
<div class="container my-3">
	<form action="{{route('update.data')}}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PATCH')

		@foreach($user as $data)
		<div class="card mt-4">
			<div class="row">
				<img class="img-thumbnail" src="{{ asset('storage/avatar_profiles/'.$data->avatar)}}"> 
				<div class="form-group">
					<label for="exampleFormControlFile1">Cambiar foto</label>
					<input type="file" class="form-control-file" name="avatar">
				</div>
			</div>

		</div>

		<div class="input-group mt-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Nombre</span>
			</div>
			<input type="text" class="form-control" value="{{$data->name}}" name="name">
		</div>

		<div class="input-group mt-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Correo Electronico</span>
			</div>
			<input type="email" class="form-control" value="{{$data->email}}" name="email">
		</div>
		@if($data->enableSignature == 1)

		<div class="input-group mt-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Firma</span>
			</div>
			<input type="text" class="form-control" value="{{$data->signature}}" name="signature">
		</div>
		@else

		<div class="card">
			<label for="">Desea crear una firma?</label>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="si" value="option1">
				<label class="form-check-label" for="exampleRadios1">
					Si
				</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" id="no" value="option2" checked>
				<label class="form-check-label" for="exampleRadios2">
					No
				</label>
			</div>
		</div>

		<div id="insert"></div>

		@endif
		@endforeach
		<button  class="btn btn-dark mt-4" type="submit">Actualizar</button>
	</div>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready( function(){
		$("#si").on('click', function(){
			$("#insert").html(`
				<div id="firma" class="input-group mt-3">
				<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1">Firma</span>
				</div>
				<input name="signature" type="text" class="form-control" value="">
				</div>
				`);
			$("#no").click(function(){
				$("#firma").remove();
			});
		});
	});


</script>
@endsection	