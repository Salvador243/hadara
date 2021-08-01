@extends('layouts.app')
@section('content')
{{-- profile_details --}}
<div class="container-fluid mt-4">
	@guest
		<p>es un invitado, debe registrarse para ver las opciones</p>
	@else
		
	@endguest
</div>
@endsection