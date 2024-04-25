<?php

namespace App\Http\Controllers;

use App\Http\Requests\users\CreateUserRequest;
use App\Http\Requests\users\UpdateUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy("id", "DESC")->paginate(15);

        return view('users.index', ["users" => $users]);
    }

    public function create()
    {
        $user = new User();
        return view("users.create", ["user"=>$user]);
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->except('_token');
        User::create($data);
        return redirect()->route('users.index');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', ["user" => $user]);
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', ["user" => $user]);
    }

    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $data = $request->except('_token', '_method');
        $user->update($data);
        return redirect()->route('users.index');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/users');
    }
}
