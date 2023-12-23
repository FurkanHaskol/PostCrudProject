<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\InfoMailToUsers;

class PostController extends Controller
{
    public function index()
    {
        $posts= auth()->user()->posts()->get();
        return view('post.post-index')
            ->with('posts', $posts);
    }

    public function create()
    {
        $categories= auth()->user()->categories()->get();

        return view('post.post-create')->with('categories', $categories);
    }

    public function add(PostRequest $request)
    {
        $post = new Post();
        $post->title = $request->post_title;
        $post->description = $request->post_description;
        $post->user_id = auth()->id();
        $post->category_id = $request->category;
        $post->save();
        
        $posts= auth()->user()->posts()->get();

        $users = User::all();

        foreach($users as $user){
            Mail::to($user->email)->send(new InfoMailToUsers($user));
            }
        return view('post.post-index')
            ->with('posts', $posts);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories= auth()->user()->categories()->get();
        return view('post.post-edit', compact('post','categories'));
    }

    public function update(PostRequest $request,$id)
    {
        $post = Post::find($id);

        $post->title = $request->post_title;
        $post->description = $request->post_description;
        $post->user_id = auth()->id();
        $post->category_id = $request->category;
        $post->update();

        $posts= auth()->user()->posts()->get();
        return view('post.post-index')
            ->with('posts', $posts);
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        
        $posts= auth()->user()->posts()->get();
        return view('post.post-index')
            ->with('posts', $posts);
    }
}
