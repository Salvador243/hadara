@extends('layouts.app')
@section('content')
{{-- profile_details --}}
<div class="container-fluid mt-4">
	@guest
		<p>es un invitado, debe registrarse para ver las opciones</p>
	@else
		<h3>nombre: {{ Auth::user()->name }} </h3>
		<h3>email: {{ Auth::user()->password }}</h3>
	@endguest
</div>
@endsection