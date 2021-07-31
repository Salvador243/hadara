@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-3">
        @foreach($pictures as $picture)
        <div class="col my-3">
            <a href="{{ route('picture_details', $picture->id) }}">
                <img class="d-block w-100 shadow" src="{{ $picture->path }}">
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
