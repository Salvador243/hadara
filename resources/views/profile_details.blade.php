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
		@foreach($pila as $image)
		<div class="card mx-4 my-3" style="width: 18rem;">
			<img class="card-img-top" src="{{asset('storage/files/'.$id[0]->id.'/'.$image)}}" alt="Card image cap">
			<div class="card-body">
				<p class="card-text">Text example</p>
			</div>
		</div>
		@endforeach
	</div>




	@endguest
</div>
@endsection