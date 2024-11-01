<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->likePostId);

        $post = Post::find($request->likePostId);
        // dd($post);

        $post->likes()->create([
            'user_id' => $request->user()->id,
        ]);
        // dd($post->likes()->onlyTrashed()->get()->count());
        // if(!$post->likes()->onlyTrashed()->where('user_id', $request->user()->id)->count()){
        //     Mail::to($post->user)->send(new PostLiked(Auth::user(), $post)); 
        // }
        $html = view('likeDeleteCommentUnlikeLogic', ['post' => Post::find($request->likePostId)])->render();
        return response()->json(data: ['html' => $html, 'id' => $request->likePostId], status: 200);
        // return back();
    }
}
