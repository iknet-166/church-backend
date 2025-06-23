<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts-view', compact('posts'));
    }

    public function create()
    {
        return view('create-post');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/posts-view')->with('success', 'Post created successfully!');
    }

    public function edit(Post $post)
    {
        return view('edit-post', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/posts-view')->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/posts-view')->with('success', 'Post deleted successfully!');
    }
}
