<?php

namespace App\Http\Controllers;

use App\Models\Post;

class LikeController extends Controller
{
    public function like(Post $post)
    {
        auth()->user()->likes()->attach($post->id);
        return back();
    }

    public function unlike(Post $post)
    {
        auth()->user()->likes()->detach($post->id);
        return back();
    }
}