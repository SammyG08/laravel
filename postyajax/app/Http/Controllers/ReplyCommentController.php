<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\ReplyComment;
use Illuminate\Http\Request;

class ReplyCommentController extends Controller
{
    public function index($commentId)
    {
        $comment = Comment::find($commentId);
        // dd($comment);
        return view('reply-comment', ['comment' => $comment]);
    }

    public function store(Request $request, $commentId)
    {
        $comment = Comment::find($commentId);
        // dd($comment->replies->count());
        $this->validate($request, [
            'body' => 'required',
        ]);


        $comment->replies()->create([
            'body' => $request->body,
            'user_id' => $request->user()->id,
        ]);

        // return redirect(route('show.replies', $comment));
        return redirect(route('post'))->with('message', 'Reply sent successfully');
    }
    function destroy($replyId)
    {
        $reply = ReplyComment::find($replyId);
        // dd($reply);
        ReplyComment::with('user')->where('id', $reply->id)->delete();
        return back();
    }

    public function showReplies($commentId)
    {
        $comment = Comment::find($commentId);
        $replies = $comment->replies()->with(['user'])->get();
        // dd($replies);
        return view('show-replies', [
            'replies' => $replies,
            'comment' => $comment,
        ]);
    }
}
