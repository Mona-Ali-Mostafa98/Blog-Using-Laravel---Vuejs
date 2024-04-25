@extends('layouts.layout')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-10 col-lg-8 col-xl-6">
            <div class="card m-2 p-4 shadow-lg text-black h-75 w-7">
                <div class="card-body p-2">
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create Post</p>
                    <form class="mx-1 mx-md-4" method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        @include('posts.form')
                        <div class="d-flex justify-content-center mx-4 my-3 mb-lg-4">
                            <a href="{{ route('posts.index') }}" type="button" class="btn btn-warning btn-lg me-3">Back</a>
                            <button type="submit" class="btn btn-success btn-lg">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

