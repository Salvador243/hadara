@extends('layouts.app')
@section('content')


{{-- Pleca --}}
<div class="container mt-5 pleca rounded-new">
	{{-- 2 Columns pleca --}}
	<div class="row col-md-12 justify-content-center padding-pleca">
		{{-- first column --}}
		<div class="col-md-6 padding-img">
			<img src="{{ asset($picture->image) }}" class="card-img-top">        
		</div>
		{{-- second column --}}
		<div class="col-12 col-sm-12 col-md-6 ">
			<div class="container pt-3">
				<div class="row justify-content-start">
					<div class="col-md-5 col-sm-12 col-12">
						@auth
						<a class="icon-details pr-4" href="{{ asset($picture->image) }}" download>
							<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
								<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z"/>
								<path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z"/>
							</svg>
							@endauth
							<a class="icon-details" href="">
								<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-share" viewBox="0 0 16 16">
									<path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"/>
								</svg>
							</a>
						</a>
					</div>
					<div class="col-md-7 col-sm-12 col-12">
						<div class="row justify-content-end">
							<div class="col-6 ">
								<div class="">
									<a class="" href="{{ route('profiles',$upload_user->id) }}">	
										<p class="name-user">{{ $picture->user->name }}</p>
									</a>
								</div>
							</div>
							<div class="col-6">
								<a href="{{ route('profiles',$upload_user->id) }}">
									<img src="{{ asset($picture->user->avatar) }}" class="avatar float-right" width="60px" height="55px">
								</a>
							</div>
						</div>
						{{-- <div class="row justify-content-end">
							@auth
							<div class="col-sm-12 col-12">
								<a class="" href="{{ route('profiles',$upload_user->id) }}">	
									<p class="name-user">{{ $picture->user->name }}</p>
								</a>
							</div>
							<div class="col-sm-12 col-12">
								<a href="{{ route('profiles',$upload_user->id) }}">
									<img src="{{ asset($picture->user->avatar) }}" class="avatar float-right" width="60px" height="55px">
								</a>
							</div>
							@endauth
						</div> --}}
					</div>
				</div>
			</div>






			<p class="title-details">{{ $picture->title }}</p>
			<p class="description">{{ $picture->description }}</p>
			<blockquote class="blockquote">
				<footer class="firma">
					<cite title="Source Title">{{$upload_user->signature}}</cite>
				</footer>
			</blockquote>


			<div class="border-bottom"></div>

<div class="col-md-6  py-3">
			<h2 class="comentarios">Comentarios</h2>
			@if(Auth::check())
			<!--Form to add a comment-->
			<form action="{{ route('addComment') }}" method="GET" id="form-comment" class="">
				@csrf
				<div class="row col-6">
					<div class="row justify-content-start">
						<div class="col-3 align-self-center">
							<img width="50px" height="45px" class="align-self-center avatar" 
							src="{{ asset(Auth::user()->avatar) }}">
						</div>
						<div class="col-3 align-self-center">
							<div class="mb-3">
								<input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
								<input type="text" name="picture_id" value="{{ $picture->id }}" hidden>
								<textarea name="comment" cols="24" class="card-comment"
								placeholder="Write a comment...."></textarea>
							</div>
							<button type="submit" class="btn btn-danger">Comentar</button>
						</div>
					</div>
				</div>
			</form>
			@endif
			<div class="mt-5" id="comments">
				@foreach($comments as $comment)
				<div class="row col-12 col-md-6 col-sm-12">
					<div class="row justify-content-start">
						<div class="col-12 col-md-3 col-sm-12 ">
							<div class="col-md-2 d-flex justify-content-center">
								<img width="50px" height="45px" class="align-self-center avatar"
								src="{{ asset($comment->user->avatar) }}">
							</div>
						</div>
						<div class="col-12 col-md-3 col-sm-12 ">
							<div class="card-new align-self-center">
								<div class="card-comment">
									<p class="pt-3 text-center">{{ $comment->comment }}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>

		</div>





{{-- 		<div class="row col-6">
			<div class="row justify-content-start">
				<div class="col-3 align-self-center">
					<img width="50px" height="45px" class="align-self-center avatar" 
						src="{{ asset(Auth::user()->avatar) }}">
				</div>
				<div class="col-3 align-self-center">
					<div class="mb-3">
							<input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
							<input type="text" name="picture_id" value="{{ $picture->id }}" hidden>
							<textarea name="comment" cols="24" class="card-comment"
							placeholder="Write a comment...."></textarea>
						</div>
						<button type="submit" class="btn btn-danger">Comentar</button>
				</div>
			</div>
		</div> --}}



		{{-- comments --}}


		<div class="col-md-6  py-3">
			<h2 class="comentarios">Comentarios</h2>
			@if(Auth::check())
			<!--Form to add a comment-->
			<form action="{{ route('addComment') }}" method="GET" id="form-comment" class="">
				@csrf
				<div class="row col-6">
					<div class="row justify-content-start">
						<div class="col-3 align-self-center">
							<img width="50px" height="45px" class="align-self-center avatar" 
							src="{{ asset(Auth::user()->avatar) }}">
						</div>
						<div class="col-3 align-self-center">
							<div class="mb-3">
								<input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>
								<input type="text" name="picture_id" value="{{ $picture->id }}" hidden>
								<textarea name="comment" cols="24" class="card-comment"
								placeholder="Write a comment...."></textarea>
							</div>
							<button type="submit" class="btn btn-danger">Comentar</button>
						</div>
					</div>
				</div>
			</form>
			@endif
			<div class="mt-5" id="comments">
				@foreach($comments as $comment)
				<div class="row col-12 col-md-6 col-sm-12">
					<div class="row justify-content-start">
						<div class="col-12 col-md-3 col-sm-12 ">
							<div class="col-md-2 d-flex justify-content-center">
								<img width="50px" height="45px" class="align-self-center avatar"
								src="{{ asset($comment->user->avatar) }}">
							</div>
						</div>
						<div class="col-12 col-md-3 col-sm-12 ">
							<div class="card-new align-self-center">
								<div class="card-comment">
									<p class="pt-3 text-center">{{ $comment->comment }}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
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
						<div class="row">

						<!--Avatar-->

						<div class="col-md-2 d-flex justify-content-center">
						<img width="50px" height="45px" class="align-self-center avatar"
						src="${comment.user.avatar}">
						</div>

						<!--Comment-->
						<div class="card-new align-self-center">
						<div class="card-comment">
						<p class="pt-3 text-center">${comment.comment}</p>`;


						str += `
						</div>
						</div>
						</div>`;
					}

					$("#comments").html(str);
				}
			});
		</script>

		@endsection
