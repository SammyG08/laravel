<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\ReplyComment;
use Illuminate\Http\Request;

class ReplyCommentController extends Controller
{
    public function index(Comment $comment){
        // dd($comment);
       return view('reply-comment', ['comment'=>$comment]);
    }

    public function store(Request $request, Comment $comment){
        // dd($comment->replies->count());
        $this->validate($request,[
            'body' => 'required',
        ]);


        $comment->replies()->create([
            'body' => $request->body,
            'user_id' => $request->user()->id,
        ]);

        // return redirect(route('show.replies', $comment));
        return redirect(route('post'))->with('message', 'Reply sent successfully');
    }
    function destroy(Request $request, ReplyComment $reply){
        // dd($reply);
        ReplyComment::with('user')->where('id', $reply->id)->delete();
        return back();
    }

    public function showReplies(Comment $comment){
        $replies = $comment->replies()->with(['user'])->get();
        // dd($replies);
        return view('show-replies', [
            'replies' => $replies,
            'comment' => $comment,
        ]);    
    }
}
