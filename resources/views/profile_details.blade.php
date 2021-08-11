@extends('layouts.app')
@section('content')
    {{-- profile_details --}}
    <div class="container my-3">
        @can('edit profile')
            @if($data->email == Auth::user()->email || Auth::user()->hasrole('admin') )
                <form action="{{ route( 'Eprofile', $data->email) }}" method="post">
                    @csrf
                    <div class="alert alert-dark" role="alert">
                        <h4 class="alert-heading">Bienvenido!</h4>
                        <p>{{Auth::user()->name}}</p>
                        <hr>
                    </div>
                    <button class="btn btn-dark" type="submit">Editar Perfil</button>
                </form>
            @endif
        @endcan
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
                    @can('view', $picture->user_id)
                        <form action="{{route('delete', $picture->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-dark" href="">borrar</button>
                        </form>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection