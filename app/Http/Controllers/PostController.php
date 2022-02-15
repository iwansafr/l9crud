<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        if(!empty($keyword))
        {
            $posts = Post::where('title','like','%'.$keyword.'%')->orderByDesc('id')->paginate(12);
        }else{
            $posts = Post::orderByDesc('id')->paginate(12);
        }
        return view('admin.posts.index',compact('posts','keyword'));
    }
    public function create(PostRequest $request)
    {
        if($post = Post::create($request->except(['_token']))){
            if(!empty($request->file('image')))
            {
                $path = $request->file('image')->store('public/posts');
                $post->image = $path;
                $post->save();
            }
            return redirect('admin/post/add')->with('message',['msg'=>'Post Added Successfully','alert'=>'success']);
        }else{
            return redirect('admin/post/add')->with('message',['msg'=>'Post Failed to Added','alert'=>'danger']);
        }
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('admin/posts/edit',compact('post'));
    }
    public function update(PostRequest $request, $id)
    {
        if(!empty($id)){
            $Post = new Post();
            if($Post->updateOrCreate(['id'=>$id],$request->except(['_token']))){
                if(!empty($request->file('image')))
                {
                    $post = Post::find($id);
                    Storage::delete($post->image);
                    $path = $request->file('image')->store('public/posts');
                    $post->image = $path;
                    $post->save();
                }
                return redirect('admin/post/edit/'.$id)->with('message',['msg'=>'Post Saved Successfully','alert'=>'success']);
            }else{
                return redirect('admin/post/edit/'.$id)->with('message',['msg'=>'Post Failed to Save','alert'=>'danger']);
            }
        }
    }
    public function delete($id)
    {
        if(!empty($id))
        {
            $post = Post::find($id);
            if ($post->delete()) {
                return redirect('admin/post/')->with('message', ['msg' => 'Post Deleted Successfully', 'alert' => 'success']);
            } else {
                return redirect('admin/post/')->with('message', ['msg' => 'Post Failed to Delete', 'alert' => 'danger']);
            }
        }
    }

}
