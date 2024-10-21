<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentLikeController extends Controller
{
    function store(Request $request, Post $post, Comment $comment)
    {
        // dd($comment->comment_likes());
        $comment->comment_likes()->create([
            'user_id' => $request->user()->id
        ]);

        return back();
    }

    function destroy($user, Comment $comment)
    {
        // dd($comment->comment_likes());
        $comment->comment_likes()->with(['comment'])->where('user_id', $user->id)->delete();
        // return back();
    }
}
