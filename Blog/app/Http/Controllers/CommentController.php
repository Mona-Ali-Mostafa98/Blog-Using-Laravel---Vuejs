<?php

namespace App\Http\Controllers;

use \App\Http\Requests\comments\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request)
    {
        $data = $request->except('_token');
        Comment::create($data);
        return redirect()->route('posts.index');
    }

}
