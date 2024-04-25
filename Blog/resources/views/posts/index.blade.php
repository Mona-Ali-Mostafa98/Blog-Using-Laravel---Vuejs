@extends('layouts.layout')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row justify-content-between align-items-center">
                        <h4 class="col text-primary">Posts</h4>
                        <a href="{{ route('posts.create') }}" class="col-2 me-2 btn btn-primary">Add Post</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table class="table table-bordered table-hover table-responsive">
                                <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Cover</th>
                                    <th>Title</th>
                                    <th>Posted At</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <th scope="row">{{ $post['id'] }}</th>
                                            <td><img src="{{ $post->cover_url }}" alt="" height="60" width="60"></td>
                                            <td>{{ $post['title'] }}</td>
                                            <td>{{ $post['created_at'] }}  </td>
                                            <td>
                                                <span class="badge rounded-pill {{ $post['status'] == 'Not Available' ? 'bg-danger' : 'bg-success' }}">
                                                    {{ $post['status'] }}
                                                </span>
                                            </td>
                                            <td style="width: 20vw">
                                                <div class="row justify-content-start align-items-start">
                                                    <div class="col-auto"><a href="{{ route('posts.show', $post['id'] ) }}" class="btn btn-outline-success p-2">Show</a></div>
                                                    <div class="col-auto"><a href="{{ route('posts.edit', $post['id'] ) }}" class="btn btn-outline-warning p-2">Edit</a></div>
                                                    <div class="col-auto">
                                                        <form class="form-inline" method="post" action="{{ route('posts.destroy', $post['id'] ) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="btn btn-outline-danger glow mb-1 mb-sm-0 mr-0 mr-sm-1 waves-effect waves-light show_confirm">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{ $posts->links() }}

    {{--    {{ $posts->onEachSide(5)->links('layouts.pagination') }}--}}
@endsection
