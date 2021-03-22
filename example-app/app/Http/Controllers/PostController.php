<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Http\Requests\StorePostRequest;






class PostController extends Controller
{
    public function index() {
    
        $allposts = Post::paginate(15); //object of elequont collection
        return view('posts.index' , [
            'posts' => $allposts
         ] );
    }




    public function show($postId) {
    $post = Post::find($postId); //object of post model
    return view('posts.show',[
        'post' => $post,
      

    ]);

 }


 public function create() {
    return view('posts.create',[
        'users' => User::all()
    ]);


 }
 public function store(StorePostRequest $request){

    $requestData = $request->all();
    post::create($requestData);
    return redirect()->route('posts.index');
 }



 public function edit($post){

    $post = Post::find($post) ;
    return view('posts.edit',['post'=>$post,'users'=>User::all()]);
 
    }

 public function update(StorePostRequest $request, Post $post){


    $post->update($request->all());

    return redirect()->route('posts.index') ->with('success','Post updated successfully');
    
 }

  //remove post
 public function destroy(Post $post){

    // $post = Post::delete($postId); 
    // return view('posts.index');
    // $Post = Post::where('title', 'Laravel')->first(); //select * from posts where title = 'Laravel' limit 1;
    // DB::delete('delete from posts where id = ?',[$postId]);
    // Post::where('id',$postId)->delete();
    // return redirect()->route('posts.index');
    //  Post::destroy($postId);
    //  return redirect()->route('posts.index');

     $post->delete();
     return redirect()->route('posts.index')->with('success','Post deleted successfully');
                                              
 }








}