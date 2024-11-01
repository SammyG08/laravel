<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\View;
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
        $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes', 'comments'])->get();
        return view('post', ['posts' => $posts]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required',
        ]);
        // dd($request->body);

        $request->user()->posts()->create($request->only('body'));
        $post = Post::orderBy('created_at', 'desc')->with(['user', 'likes', 'comments'])->first();
        // $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes', 'comments'])->paginate(5);

        // $profilePicture = $post->user->getImageUrl();
        // $postOwnerName = $post->user->name;
        // $postUser = $post->user;
        // $postCreatedAt = $post->createdAt->DiffForHumans();
        // $postBody = $post->body;
        // $postDetails = ["profilePicture" => $profilePicture, "owner" => $postOwnerName, "createdAt" => $postCreatedAt, "body" => $postBody, 'user' => $postUser];
        // return response()->json(data: ['post' => $post], status: 200);
        $html =  View::make('newpost', data: ['post' => $post])->render();
        return response()->json(['html' => $html], 200);
    }

    public function destroy(Request $request)
    {

        $post = Post::find($request->deletePostId);
        $this->authorize('delete', $post);
        $post->delete();
        return response()->json(data: ['id' => $request->deletePostId], status: 200);
    }

    public function show($postId)
    {
        $post = Post::find($postId);
        $comments = $post->comments()->with('user', 'replies', 'comment_likes')->get();
        // dd($comments);
        return view('post-index', ['post' => $post, 'comments' => $comments]);
    }
}
