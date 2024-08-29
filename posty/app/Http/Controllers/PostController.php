<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostLiked;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only('destroy', 'store');
    }
    public function index()
    {   $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(10);
        // dd($posts->created_at);
        return view('post', ['posts'=>$posts]);
    }

    public function store(Request $request){
        $this->validate($request, [
            'body' => 'required',
        ]);  
          
        $request->user()->posts()->create($request->only('body'));
        return back();
    }

    public function destroy(Post $post){
        $this->authorize('delete', $post);
        $post->delete();
        return back();
    }

    public function show(Post $post){
        // dd($post);
        return view('post-index', ['post'=>$post]);
    }
}
