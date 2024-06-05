<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Like;
use App\Models\Post;

class PostContrller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::latest()->withCount('likes')->with('comment')->paginate(10);
        return view('posts.index', [
            'posts' => $posts,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        Post::create($data);

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        if (auth()->id() == $post->user_id) {
            return view('posts.edit', ['post' => $post]);
        }

        return abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        if ($post->user_id == auth()->id()) {
            $post->update($request->validated());
        }

        return abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {

        if ($post->user_id == auth()->id()) {
            $post->delete();

            return redirect()->route('posts.index');

        }

        return abort(403);
    }

}