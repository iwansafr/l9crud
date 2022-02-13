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
            $posts = Post::where('title','like','%'.$keyword.'%')->orderByDesc('id')->paginate(12);
        }else{
            $posts = Post::orderByDesc('id')->paginate(2);
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
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        session(['post'=>$post]);
        return view('admin/posts/edit',compact('post'));
    }
    public function update(PostRequest $request)
    {
        $post = session('post');
        if(!empty($post->id)){
            $Post = new Post();
            session()->forget('post');
            if($Post->updateOrCreate(['id'=>$post->id],$request->except(['_token']))){
                return redirect('admin/post/edit/'.$post->id)->with('message',['msg'=>'Post Saved Successfully','alert'=>'success']);
            }else{
                return redirect('admin/post/edit/'.$post->id)->with('message',['msg'=>'Post Failed to Save','alert'=>'danger']);
            }
        }
    }
}
