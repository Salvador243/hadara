@extends('layouts.app')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.0/dropzone.js"></script>
{{--container principal--}}
<div class="container mt-4">
	<form method="post" action="{{ route('save') }}" 
	enctype="multipart/form-data">
	@csrf
	<div class="pleca rounded-new">
		{{-- 2 Columns pleca --}}
		<div class="row col-sm-auto justify-content-center padding-pleca">
			{{-- first column --}}
			<div class="col-sm-6">
				<div class="container">
					<div class="col-sm-12 my-5 px-5">
						<input id="fichero" type="file" name="img_name">
						<label for="fichero" class="circle">Seleccionar Archivo</label>
					</div>
				</div>
			</div>
			{{-- second column --}}
			<div class="col-sm-5">
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
	</div>
</form>
</div>
</div>














@endsection	