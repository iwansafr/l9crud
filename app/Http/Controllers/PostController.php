<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if(!empty($keyword))
        {
            $posts = Post::where('title','like','%'.$keyword.'%')->paginate(1);
        }else{
            $posts = Post::paginate(1);
        }
        return view('admin.posts.index',compact('posts','keyword'));
    }
    public function create(PostRequest $request)
    {
        $post = new Post();
        if($post->create($request->except(['_token']))){
            return redirect('admin/post/add')->with('message',['msg'=>'Post Added Successfully','alert'=>'success']);
        }else{
            return redirect('admin/post/add')->with('message',['msg'=>'Post Failed to Added','alert'=>'danger']);
        }
    }
}
