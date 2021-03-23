<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{    
    //show all posts
    public function index()
    {
        // $posts=Post::paginate(2);  //pagination in postman testing 
        $posts = Post::with('user')->limit(50)->get();
        return PostResource::collection ($posts);
    }

    //show single post 
    public function show(Post $post)
    {
        return new PostResource($post);

    }

    //store
    public function store(StorePostRequest $request)
    
    {
        $post=Post::create ($request -> all());
        return new PostResource ($post);
    }

}


