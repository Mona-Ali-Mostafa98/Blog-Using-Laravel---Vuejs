@extends('layouts.layout')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row justify-content-between align-items-center">
                        <h4 class="col text-primary">Users</h4>
                        <a href="{{ route('users.create') }}" class="col-2 me-2 btn btn-primary">Add User</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <table class="table table-bordered table-hover table-responsive">
                                <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Added At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <th scope="row">{{ $user['id'] }}</th>
                                            <td>{{ $user['name'] }}</td>
                                            <td>{{ $user['email'] }}  </td>
                                            <td>{{ $user['created_at'] }}  </td>
                                            <td style="width: 20vw">
                                                <div class="row justify-content-start align-items-start">
                                                    <div class="col-auto"><a href="{{ route('users.show', $user['id'] ) }}" class="btn btn-outline-success p-2">Show</a></div>
                                                    <div class="col-auto"><a href="{{ route('users.edit', $user['id'] ) }}" class="btn btn-outline-warning p-2">Edit</a></div>
                                                    <div class="col-auto">
                                                        <form class="form-inline" method="post" action="{{ route('users.destroy', $user['id'] ) }}">
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
    {{ $users->links() }}

    {{--    {{ $users->onEachSide(5)->links('layouts.pagination') }}--}}
@endsection
