<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class UnlikeController extends Controller
{
    public function destroy(Request $request)
    {
        dd($request->unlikePostId);
        $post = Post::find($request->unlikePostId);
        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
