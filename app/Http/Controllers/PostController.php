<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
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
