@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
{{--container principal--}}
<div class="container-fluid mt-4">
	<div class="container">
		<form method="post" action="{{ route('save') }}" 
		enctype="multipart/form-data">
		@csrf
		<div 
		class="rounded row justify-content-center col-12 my-5 pleca">
		<div class="col-lg-5 my-5">
			<div class="card rounded">
				<div class="card-body-new">
					<input class="rounded form-control" type="file" name="img_name">
				</div>
			</div>
		</div>
		<div class="linea"></div>
		<div class="col-lg-5">
			<div class="input-group">
				<input type="text" class="rounded form-control my-4" name="title" 
				placeholder="Inserte Titulo">
			</div>
			<div class="input-group">
				<input type="text" class="rounded form-control my-4" name="description" 
				placeholder="Inserta Descripcion">
			</div>
			<div class="input-group">
				<input type="text" class="rounded form-control my-4" name="tags" 
				placeholder="Etiquetas" disabled="">
			</div>

			<div class="d-grid gap-2 d-md-flex justify-content-md-end">
				<button class="my-3 btn btn-danger" type="">publicar</button>
			</div>

		</div>

	</div>

		{{-- <div class="form-group">
			<label for="">sube la foto</label>
			<input type="file" class="form-control-file" name="img_name">
		</div>

		<div class="form-group">
			<label for="">inserta titulo</label>
			<input type="text" name="title">
		</div>

		<div class="form-group">
			<label for="">inserta descripcion</label>
			<input type="text" name="description">
		</div> --}}


		{{-- <button type="submit" class="btn btn-info">subir</button> --}}

	</form>
</div>

{{--
<script type="text/javascript">
	Dropzone.options.dropzone =
	{
		maxFilesize: 10,
		renameFile: function (file) {
			var dt = new Date();
			var time = dt.getTime();
			return time + file.name;
		},
		acceptedFiles: ".jpeg,.jpg,.png,.gif",
		addRemoveLinks: true,
		timeout: 60000,
		success: function (file, response) {
			console.log(response);
		},
		error: function (file, response) {
			return false;
		}
	};
</script>
--}}
</div>
@endsection	