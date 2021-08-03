@extends('layouts.app')
@section('content')
{{-- profile_details --}}
<div class="container my-3">
    <!--Picture's title-->
    <h1 class="text-center">{{ $picture->title }}</h1>

    <!--User's presentation card-->
    <div class="card shadow">
        <div class="row">
            <!--Avatar-->
            <div class="col-2 d-flex justify-content-center m-0 p-0">
                <img width="70%" class="align-self-center p-2" 
                src="{{ asset('storage/avatar_profiles/'.$upload_user->avatar) }}">
            </div>
            <!--Information-->
            <div class="col-10 card-body m-0 p-1 align-self-center">
                <h5 class="card-title">{{ $upload_user->name  }}</h5>
                @if($upload_user->enableSignature)
                <blockquote class="blockquote mb-0">
                    <footer class="blockquote-footer">
                        <i>{{ $upload_user->signature }}</i>
                    </footer>
                </blockquote>
                @endif
                <a href="{{ route('Pdetails') }}" class="btn btn-primary mt-3">View Profile</a>
            </div>
        </div>
    </div>

    <!--Picture-->
    <div class="card mt-3">
        <img src="{{ asset('storage/register/'.$upload_user->id.'/'.$picture->path) }}"
         class="card-img-top w-100">
        <div class="card-body">
            <p class="card-text">{{ $picture->description }}</p>
        </div>
        <a href="#" class="btn btn-primary btn-block btn-lg">Download</a>
    </div>

    <!--Comments-->
    <div class="container-fluid bg-secondary mt-2 py-5">
        <!--Title-->
        <h2 class="text-center">Comments</h2>
        <!--Comments section-->
        <div class="comments">
            @foreach($comments as $comment)
            <div class="card shadow my-3">
                <div class="row">
                    <!--Avatar-->
                    <div class="col-2 d-flex justify-content-center m-0 p-0">
                        <img width="70%" class="align-self-center p-2"
                            src="{{ $comment->user->avatar }}">
                    </div>
                    <!--Comment-->
                    <div class="col-10 card-body m-0 p-1 align-self-center">
                        <h5 class="card-title pt-2">{{ $comment->user->name }}</h5>
                        <p class="card-text">{{ $comment->comment }}</p>
                        @if($comment->user->enableSignature)
                        <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer">
                                <i>{{ $comment->user->signature }}</i>
                            </footer>
                        </blockquote>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>


@endsection
