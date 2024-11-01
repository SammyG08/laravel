<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class UnlikeController extends Controller
{
    public function destroy(Request $request)
    {

        $post = Post::find($request->unlikePostId);
        $request->user()->likes()->where('post_id', $post->id)->delete();
        $html = view('likeDeleteCommentUnlikeLogic', ['post' => $post])->render();
        return response()->json(['html' => $html, 'id' => $request->unlikePostId], 200);
    }
}
