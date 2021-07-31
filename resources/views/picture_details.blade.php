@extends('layouts.app')
@section('content')
{{-- profile_details --}}
<div class="container my-3">
    <h1 class="text-center">Titulo de la foto</h1>
    <div class="card shadow">
        <div class="row">
            <div class="col-2 d-flex justify-content-center m-0 p-0">
                <img width="70%" class="align-self-center p-2"
                    src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png">
            </div>

            <div class="col-10 card-body m-0 p-1 align-self-center">
                <h5 class="card-title">Nombre de usuario</h5>
                <p class="card-text">Firma</p>
                <a href="#" class="btn btn-primary">View Profile</a>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <img src="https://images.unsplash.com/photo-1627631498534-f0e7bf0db55d?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1349&q=80"
            class="card-img-top w-100">
        <div class="card-body">
            <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate hic pariatur a, ipsum facilis natus
                error quae ex beatae similique sequi, autem minima recusandae fugiat doloremque sunt laborum fugit
                tempore!
            </p>
        </div>
        <a href="#" class="btn btn-primary btn-block btn-lg">Download</a>
    </div>
    <div class="container-fluid bg-secondary mt-2 py-5">
        <h2 class="text-center">Comments</h2>

        <div class="comments">
		<div class="card shadow my-3">
                <div class="row">
                    <div class="col-2 d-flex justify-content-center m-0 p-0">
                        <img width="70%" class="align-self-center p-2"
                            src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png">
                    </div>

                    <div class="col-10 card-body m-0 p-1 align-self-center">
                        <h5 class="card-title pt-2">Usuario 1</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quia modi,
                            excepturi et maxime vitae, repellat amet obcaecati illo deserunt officia ad voluptate rem
                            voluptates maiores quos nemo laboriosam adipisci!</p>
                        <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source
                                    Title</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>

            <div class="card shadow my-3">
                <div class="row">
                    <div class="col-2 d-flex justify-content-center m-0 p-0">
                        <img width="70%" class="align-self-center p-2"
                            src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png">
                    </div>

                    <div class="col-10 card-body m-0 p-1 align-self-center">
                        <h5 class="card-title pt-2">Usuario 2</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio quia modi,
                            excepturi et maxime vitae, repellat amet obcaecati illo deserunt officia ad voluptate rem
                            voluptates maiores quos nemo laboriosam adipisci!</p>
                        <blockquote class="blockquote mb-0">
                            <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source
                                    Title</cite></footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
