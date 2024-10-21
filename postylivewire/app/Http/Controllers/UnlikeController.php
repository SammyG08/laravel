<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class UnlikeController extends Controller
{
    public function destroy(Post $post, Request $request)
    {

        $request->user()->likes()->where('post_id', $post->id)->delete();
        return back();
    }
}
