@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
{{--container principal--}}
<div class="container-fluid mt-4">
	@guest
	<label for="">Inicie sesion para cargar imagenes</label>
	@else
	<div class="container">

		<h2>Carga tus imagenes</h2>

		<form method="post" action="{{ route('save',Auth::user()->email) }}" 
			enctype="multipart/form-data">
			@csrf
			<div class="form-group">
				<label for="">sube la foto</label>
				<input type="file" class="form-control-file" name="path">
			</div>

			<div class="form-group">
				<label for="">inserta titulo</label>
				<input type="text" name="title">
			</div>
			<div class="form-group">
				<label for="">inserta titulo</label>
				<input type="text" name="description">
			</div>
			<button type="submit" class="btn btn-info">subir</button>
		</form>
	</div>

	@endguest
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