<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Post $post)
    {
        Comment::create([
            'text' => $this->validate($request, [
                'text' => 'required|max:255'
            ])['text'],
            'user_id' => auth()->id(),
            'post_id' => $post->id
        ]);
        return redirect()->back();

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        if (auth()->id() !== $comment->user_id) {
            abort(403);
        }
        $comment->update([
            'text' => $this->validate($request, [
                'text' => 'required|max:255'
            ])['text']
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(comment $comment)
    {
        if (auth()->id() !== $comment->user_id) {
            abort(403);
        }
        $comment->delete();
        return redirect()->back();
    }
}