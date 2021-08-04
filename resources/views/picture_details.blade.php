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
                src="{{ asset($upload_user->avatar) }}">
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
        <img src="{{ asset($picture->image) }}"
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
        @if(Auth::check())
        <!--Form to add a comment-->
        <form action="{{ route('addComment') }}" method="GET" id="form-comment" class="card shadow p-2">
            @csrf
            <div class="mb-3">
                <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
                <input type="text" name="picture_id" value="{{ $picture->id }}" hidden>
                <textarea name="comment" cols="30" rows="8" class="form-control"
                    placeholder="Write a comment...."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Comment</button>
        </form>
        @endif

        <!--Comments section-->
        <div id="comments">
            @foreach($comments as $comment)
            <div class="card shadow my-3">
                <div class="row">
                    <!--Avatar-->
                    <div class="col-2 d-flex justify-content-center m-0 p-0">
                        <img width="70%" class="align-self-center p-2" src="{{ asset($comment->user->avatar) }}">
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
                        <blockquote class="blockquote mb-0 text-center">
                            <footer class="blockquote-footer">
                                <i>{{$comment->created_at}}</i>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $("#form-comment").submit(function (ev) {
            $.ajax({
                type: $('#form-comment').attr('method'),
                url: $('#form-comment').attr('action'),
                data: $('#form-comment').serialize(),
                success: function (data) {
                    showComments(data);
                }
            });
            ev.preventDefault();
        });

        function showComments(data) {
            var comments = JSON.parse(data);
            var str = '';

            for (let comment of comments) {
                str += `
                    <div class="card shadow mt-3">
                        <div class="row">
                            <!--Avatar-->
                            <div class="col-2 d-flex justify-content-center m-0 p-0">
                                <img width="70%" class="align-self-center p-2" src="${comment.user.avatar}">
                            </div>
                            <!--Comment-->
                            <div class="col-10 card-body m-0 p-1 align-self-center">
                                <h5 class="card-title pt-2">${comment.user.name}</h5>
                                <p class="card-text">${comment.comment}</p>`;
                if (comment.user.enableSignature) {
                    str += `
                                        <blockquote class="blockquote mb-0">
                                            <footer class="blockquote-footer">
                                                <i>${comment.user.signature}</i>
                                            </footer>
                                        </blockquote>`;
                }
                str += `
                                <blockquote class="blockquote mb-0 text-center">
                                            <footer class="blockquote-footer">
                                                <i>${comment.created_at}</i>
                                            </footer>
                                        </blockquote>
                            </div>
                        </div>
                    </div>`;
            }

            $("#comments").html(str);
        }
    });

</script>


@endsection
