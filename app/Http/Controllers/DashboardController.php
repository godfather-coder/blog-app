<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::withCount('likes')->withCount('comment')->where('user_id', auth()->id())->get();
        $likes = 0;
        $comments = 0;
        foreach ($posts as $post) {
            $likes += $post->likes_count;
            $comments += $post->comment_count;
        }
        return view('dashboard', [
            'posts' => $posts,
            'likes' => $likes,
            'comments' => $comments
        ]);

    }
}