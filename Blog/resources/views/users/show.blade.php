@extends('layouts.layout')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-10 col-lg-8 col-xl-6">
            <div class="card m-2 p-4 shadow-lg text-black h-75 w-7">
                <div class="card-body p-2">
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Show User</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><p class="card-text"><span
                                    class="text-success fw-bold">ID : </span>{{ $user['id'] }}</p></li>
                        <li class="list-group-item"><p class="card-text"><span
                                    class="text-success fw-bold">Name : </span>{{ $user['name'] }}</p></li>
                        <li class="list-group-item"><p class="card-text"><span
                                    class="text-success fw-bold">email : </span>{{ $user['email'] }}</p></li>
                        <li class="list-group-item"><p class="card-text"><span
                                    class="text-success fw-bold">Usered At : </span>{{ $user['created_at'] }}</p></li>
                        <li class="list-group-item"><p class="card-text"><span class="text-success fw-bold">Description : </span>{{ $user['description'] }}
                            </p></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
