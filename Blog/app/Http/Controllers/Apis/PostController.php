<?php

namespace App\Http\Controllers\Apis;

use App\Http\Controllers\Controller;
use App\Http\Requests\posts\CreatePostRequest;
use App\Http\Requests\posts\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Traits\UploadImageTrait;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    use UploadImageTrait;

    public function index()
    {
        $posts = Post::orderBy("id", "DESC")->with('user')->paginate(15);
        return PostResource::collection($posts);
    }


    public function store(CreatePostRequest $request)
    {
        $data = $request->except('cover' , '_token');
        $data['cover'] = $this->uploadImage($request, 'cover', 'posts');
        $post = Post::create($data);
        return response()->json(["message"=> "Post Added successfully", "post"=>$post]);
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }

    public function update(UpdatePostRequest $request, string $id)
    {
        $post = Post::findOrFail($id);
        $data = $request->except('cover' , '_token', '_method');
        $old_cover = $post->cover;

        $data['cover'] = $this->uploadImage($request, 'cover', 'posts');

        if(!$request->hasFile('profile_image')){
            unset($data['profile_image']);
        }

        $post->update($data);

        if ($old_cover && isset($data['profile_image'])) {
            Storage::disk('public')->delete($old_cover);
        }
        return response()->json(["message"=> "Post Updated successfully", "post"=>$post]);
    }


    public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        if ($post->cover) {
            Storage::disk('public')->delete($post->cover);
        }
        return redirect('/posts');
    }
}
