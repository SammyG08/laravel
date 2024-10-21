<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\ReplyComment;
use Illuminate\Http\Request;

class ReplyCommentController extends Controller
{
    public function index($id)
    {
        $comment = Comment::find($id);
        // dd($comment);
        return view('reply-comment', ['comment' => $comment]);
    }

    function destroy($replyId)
    {
        // dd($reply);
        ReplyComment::with('user')->where('id', $replyId)->delete();
        // return back();
    }

    public function showReplies($id)
    {
        $comment = Comment::find($id);
        $replies = $comment->replies()->with(['user'])->get();
        // dd($replies);
        return view('show-replies', [
            'replies' => $replies,
            'comment' => $comment,
        ]);
    }
}
