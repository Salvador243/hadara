@extends('layouts.app')
@section('content')
{{--container principal--}}
<div class="container my-3">
	<form action="{{route('update.data')}}" method="post" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		@foreach($user as $data)
		<div class="container rounded pleca">
			<div class="row col-md-12 mt-5">
				<div class="col-md-6 my-5 justify-content-center">
					<img  class="rounded-circle mx-auto d-block mb-4" src="{{ asset($data->avatar) }}">
					<input class="form-control" type="file" name="img_name">
				</div>
				<div class="col-md-6">
					<div class="input-group mt-5">
						<span class="input-group-text">Nombre</span>
						<input type="text" class="form-control rounded" placeholder="Username" value="{{$data->name}}" name="name">
					</div>
					<div class="input-group mt-4">
						<span class="input-group-text">Correo Electronico</span>
						<input type="email" class="form-control rounded" placeholder="E-mail"  value="{{$data->email}}" name="email" readonly>
					</div>
					<div class="input-group mt-4 mb-5">
						<span class="input-group-text">Firma</span>
						<input type="text" class="form-control rounded" placeholder="Signature" value="{{$data->signature}}" name="signature">
					</div>
					<div class="d-grid gap-2 d-md-flex justify-content-md-end">
						<button class="my-3 btn btn-danger" type="">Actualizar</button>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</form>
</div>

@endsection	