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
    {
        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes', 'comments'])->paginate(5);
        return view('post', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);

        $request->user()->posts()->create($request->only('body'));
        $post = Post::orderBy('created_at', 'desc')->with(['user', 'likes', 'comments'])->first();
        // $profilePicture = $post->user->getImageUrl();
        // $postOwnerName = $post->user->name;
        // $postUser = $post->user;
        // $postCreatedAt = $post->createdAt->DiffForHumans();
        // $postBody = $post->body;
        // $postDetails = ["profilePicture" => $profilePicture, "owner" => $postOwnerName, "createdAt" => $postCreatedAt, "body" => $postBody, 'user' => $postUser];
        return response()->json(data: ['post' => $post], status: 200);
        // return back();
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect(route('post'));
    }

    public function show(Post $post)
    {
        $comments = $post->comments()->with('user', 'replies', 'comment_likes')->get();
        // dd($comments);
        return view('post-index', ['post' => $post, 'comments' => $comments]);
    }
}
