<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentLikeController extends Controller
{
    function store(Request $request, Post $post, Comment $comment){
        // dd($comment->comment_likes());
        $comment->comment_likes()->create([
            'user_id' => $request->user()->id
        ]);

        return back();

    }

    function destroy(Request $request, Post $post, Comment $comment){
        // dd($comment->comment_likes());
        $comment->comment_likes()->where('user_id', $request->user()->id)->delete();
        return back();
    }
}
