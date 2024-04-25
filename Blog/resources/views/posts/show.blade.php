@extends('layouts.layout')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-md-10 col-lg-8 col-xl-6">
            <div class="card m-2 p-4 shadow-lg text-black h-75 w-7">
                <div class="card-body p-2">
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Show Post</p>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><p class="card-text"><span
                                    class="text-success fw-bold">ID : </span>{{ $post['id'] }}</p></li>
                        <li class="list-group-item"><p class="card-text"><span
                                    class="text-success fw-bold">Title : </span>{{ $post['title'] }}</p></li>
                        <li class="list-group-item">
                            <p class="card-text"><span class="text-success fw-bold">Status : </span>
                                <span class="badge rounded-pill {{ $post['status'] == 'Not Available' ? 'bg-danger' : 'bg-success' }}">{{ $post['status'] }} </span>
                            </p>
                        </li>
                        <li class="list-group-item"><p class="card-text"><span
                                    class="text-success fw-bold">Posted At : </span>{{ $post['created_at'] }}</p></li>
                        <li class="list-group-item"><p class="card-text"><span class="text-success fw-bold">Description : </span>{{ $post['description'] }}
                            </p></li>
                    </ul>
                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"> Comments</p>

                    @foreach ($post->comments as $comment)
                        <div class="comment">
                            <p>{{ $comment->comment }}</p>
                        </div>
                    @endforeach

                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Add Comment</p>

                    <form class="mx-1 mx-md-4" method="post" action="{{ route('comments.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col">
                                <div class="form-floating mb-3 position-relative">
                                    <textarea class="form-control border-0 border-bottom shadow" placeholder="enter a comment here" name="comment" id="comment" style="height: 100px" cols="30" rows="10">{{ old('comment', $post['comment']) }}</textarea>
                                    <label for="comment">Comment</label>
                                </div>
                            </div>
                        </div>

                        <input name="user_id" hidden value="{{ \Illuminate\Support\Facades\Auth::id() }}">
                        <input name="post_id" hidden value="{{ $post->id }}">
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
