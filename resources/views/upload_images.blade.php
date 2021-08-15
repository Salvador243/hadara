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
		class="rounded row justify-content-center col-md-12 my-5 pleca">
		<div class="col-lg-5 my-5">
			<div class="card2 rounded form-group">
				<div class="my-5 file-select centrado">
					<input type="file" name="img_name" aria-label="Archivo">
				</div>
			</div>
		</div>
		<div class="col-md-1">
			<div class="linea"></div>
		</div>
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
</form>
</div>
</div>
@endsection	