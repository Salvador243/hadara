@extends('layouts.app')
@section('content')
{{--container principal--}}
<div class="container-fluid mt-4">
	@guest
		<h1 class="text-primary">debe loguarse antes</h1>
	@else	
	
	<form action="{{Route('update','salvador')}}" method="post" accept-charset="utf-8">
		@csrf
		@method('patch')

		<input type="text" name="name" value="{{ Auth::user()->name}}">		
		<input type="text" name="name" value="{{ Auth::user()->email}}">		
		<input type="text" name="name" value="{{ Auth::user()->firma}}">		
		<input type="text" name="name" value="{{ Auth::user()->avatar}}">		
		<input type="text" name="name" value="{{ Auth::user()->birthday}}">		
		<button type="submit">Actualizar</button>
	</form>

	@endguest

	{{--end container principal--}}
</div>
@endsection	