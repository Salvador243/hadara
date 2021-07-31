@extends('layouts.app')

@section('content')
<div class="container my-3">
    <div class="row row-cols-3">
        <div class="col">
            <a href="{{ route('picture_details') }}">
                <img class="d-block w-100 shadow"
                    src="https://images.unsplash.com/photo-1627631498534-f0e7bf0db55d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1349&q=80">
            </a>
        </div>
        <div class="col">
            <img class="d-block w-100 shadow"
                src="https://images.unsplash.com/photo-1627635174808-34b5172f815a?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1489&q=80">
        </div>
        <div class="col">
            <img class="d-block w-100 shadow"
                src="https://images.unsplash.com/photo-1627476517425-d43c87b32eea?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=749&q=80">
        </div>

        <div class="col-12 mt-2 bg-primary"></div>

        <div class="col">
            <img src="https://images.unsplash.com/photo-1627659032600-f12943af28f8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=751&q=80"
                alt="" class="d-block w-100 shadow">

        </div>

        <div class="col">
            <img src="https://images.unsplash.com/photo-1627661235020-8c730d3a6c29?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=334&q=80"
                alt="" class="d-block w-100 shadow">
        </div>

        <div class="col">
            <img src="https://images.unsplash.com/photo-1627534640676-fbcac1e4bac8?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=508&q=80"
                alt="" class="d-block w-100 shadow">

        </div>
    </div>
</div>
@endsection
