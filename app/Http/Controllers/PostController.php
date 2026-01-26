<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index','show');
    }

    public function index()
    {
        $posts= Post::get();
    

        return view('post.index', ['posts'=>$posts]);
    }
    public function show(Post $post)
    {
        return view('post.show', ['post' => $post]);
    }
    public function create()
    {
         return view('post.create',['post'=> new Post]);
    }
    public function store(SavePostRequest $request)
    {
        Post::create($request->validated());
        return to_route('post.index')->with('status', 'Post creado');
    }
    public function edit(Post $post)
    {
        return view('post.edit', ['post'=>$post]);
    }
    public function update(SavePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        return to_route('post.show', $post)->with('status', 'Post Actualizado');
    }
    public function destroy(Post $post)
    {
        $post->delete();
        return to_route('post.index')->with('status', 'Post Eliminado');
    }
}