<?php

use App\Http\Controllers\Auth\LoginController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\PostController;
use \App\Http\Controllers\UserController;
use \App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/posts', [PostController::class, "index"])->name('posts.index');
//
//Route::get('/posts/create/', [PostController::class, "create"])->name('posts.create');
//
//Route::post('/posts', [PostController::class, "store"])->name('posts.store');
//
//Route::get('/posts/{post}', [PostController::class, "show"])->name('posts.show');
//
//Route::get('/posts/{post}/edit', [PostController::class, "edit"])->name('posts.edit');
//
//Route::put('/posts/{post}', [PostController::class, "update"])->name('posts.update');
//
//Route::delete('/posts/{post}', [PostController::class, "destroy"])->name('posts.destroy');

Route::resource('/posts', PostController::class)->middleware('auth');
Route::resource('/users', UserController::class);
Route::resource('/comments', CommentController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


use Laravel\Socialite\Facades\Socialite;


Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('redirectToGitHub');

Route::get('auth/callback', function () {
    try {
        $githubUser = Socialite::driver('github')->user();
    } catch (\Exception $e) {
        return redirect('/login')->withErrors(['error' => 'GitHub authentication failed.']);
    }

    $existingUser = User::where('email', $githubUser->email)->first();

    if ($existingUser) {
        Auth::login($existingUser);
    } else {
        // Create a new user
        $newUser = new User();
        $newUser->name = $githubUser->name;
        $newUser->email = $githubUser->email;
        $newUser->github_id = $githubUser->id;
        $newUser->github_token = $githubUser->token;
        $newUser->github_refresh_token = $githubUser->refreshToken; // Note: corrected attribute name
        $newUser->save();

        Auth::login($newUser);
    }

    return redirect('/posts');
})->name('handleGitHubCallback');
