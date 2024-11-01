<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentLikeController extends Controller
{
    function store(Request $request)
    {
        $comment = Comment::find($request->likeId);
        $comment->comment_likes()->create([
            'user_id' => $request->user()->id
        ]);
        return response()->json(['id' => $comment->id],  200);
    }

    function destroy(Request $request)
    {
        $comment = Comment::find($request->unLikeId);
        $comment->comment_likes()->with(['comment'])->where('user_id', $request->user()->id)->delete();
        return response()->json(data: ['id' => $comment->id], status: 200);
    }
}
