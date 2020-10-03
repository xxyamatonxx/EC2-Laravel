<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    //
    public function add(Request $request)
    {
        $comments = new Comment;
        $comments->body = $request->body;
        $post = Post::findOrFail($request->post_id);
        $post->comments()->save($comments);
        return redirect()->route('detail', $post->id);
    }
}