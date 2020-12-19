<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index()
    {
        $posts = Post::latest()
            ->with(['user', 'likes'])
            ->paginate(20);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        $request->user()->posts()->create([
            'body' => $request->body
        ]);
        return back();
    }
}
