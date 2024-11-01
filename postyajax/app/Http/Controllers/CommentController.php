<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index($postId)
    {
        $post = Post::find($postId);
        // $comment = $post->comments;
        // dd($comment);
        return view('comment', [
            'post' => $post,
        ]);
    }

    public function store(Request $request, $postId)
    {
        // dd($request->user()->posts());
        $post = Post::find($postId);
        $this->validate($request, [
            'body' => 'required',
        ]);
        // dd($post->comments());  
        $post->comments()->create([
            'user_id' => $request->user()->id,
            'body' => $request->body,
        ]);

        // return route('post');
        return redirect(route('post'))->with('message', 'Comment added successfully');
    }

    function destroy($commentId)
    {
        // $this->authorize('delete', $comment);
        // dd($comment);
        Comment::with('user', 'comment_likes', 'replies')->where('id', $commentId)->delete();

        return back();
    }
}
