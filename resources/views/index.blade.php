@extends('layouts.app')

@section('content')
<div class="container">
@if(!count($results))
    <h2 class="text-center text-muted mt-5">There's no result's to show</h2>
@else
    @if($type)
    <div class="row row-cols-3">
        @foreach($results as $picture)
        <div class="col my-3">
            <a href="{{ route('picture_details', $picture->id) }}">
                <img class="d-block w-100 shadow" src="{{ $picture->path }}">
            </a>
        </div>
        @endforeach
    </div>
    @else
        @foreach($results as $profile)
        <!--User's presentation card-->
        <div class="card shadow mt-2">
            <div class="row">
                <!--Avatar-->
                <div class="col-2 d-flex justify-content-center m-0 p-0">
                    <img width="70%" class="align-self-center p-2" src="{{ $profile->avatar }}">
                </div>
                <!--Information-->
                <div class="col-10 card-body m-0 p-1 align-self-center">
                    <h5 class="card-title">{{ $profile->name  }}</h5>
                    @if($profile->enableSignature)
                    <blockquote class="blockquote mb-0">
                        <footer class="blockquote-footer">
                            <i>{{ $profile->signature }}</i>
                        </footer>
                    </blockquote>
                    @endif
                    <a href="{{ route('Pdetails') }}" class="btn btn-primary mt-3">View Profile</a>
                </div>
            </div>
        </div>
        @endforeach
    @endif
@endif
</div>
@endsection
