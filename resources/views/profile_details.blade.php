@extends('layouts.app')
@section('content')
{{-- profile_details --}}
<div class="container my-3">
	@guest
		<p>es un invitado, debe registrarse para ver las opciones</p>
	@else
		<p>registrado: {{Auth::user()->name}}</p>
		<form action="{{ route( 'Eprofile', Auth::user()->email) }}" method="post">
			@csrf
			<button type="submit">Editar Perfil</button>	
		</form>
		
	@endguest
</div>
@endsection