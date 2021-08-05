@extends('layouts.app')
@section('content')
{{-- profile_details --}}
<div class="container my-3">
	@guest
	<p>es un invitado, debe registrarse para ver las opciones</p>
	@else
	<div class="alert alert-dark" role="alert">
		<h4 class="alert-heading">Bienvenido!</h4>
		<p>{{Auth::user()->name}}</p>
		<hr>
	</div>
	<form action="{{ route( 'Eprofile', Auth::user()->email) }}" method="post">
		@csrf
		<button class="btn btn-dark" type="submit">Editar Perfil</button>	
	</form>


	<div class="row">
		@foreach($data->pictures as $picture)

		<div class="card mx-4 my-4" style="width: 18rem;">
			<img src="{{ asset($picture->image) }}" class="card-img-top" alt="...">
			<div class="card-body">
				<h5 class="card-title">{{ $picture->title }}</h5>
				<p class="card-text">{{ $picture->description }}</p>
			    <a href="{{ route('picture_details', $picture->id) }}" 
			    	class="btn btn-primary">Go somewhere</a>
			</div>
		</div>
		@endforeach
	</div>




	@endguest
</div>
@endsection