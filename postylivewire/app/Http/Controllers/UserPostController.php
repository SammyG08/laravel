<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function list($id)
    {
        $user = User::find($id);
        // dd($user->posts);
        $posts = $user->posts()->with(['user', 'likes', 'comments'])->orderBy('created_at', 'desc')->paginate(5);
        // $follower = new Follower();
        // dd($follower); 
        $follower = new Follower();
        $followingCount = $follower->getFollowing($user);
        $postCount = $user->posts->count();
        $userLikes = $user->receivedLikes()->count();
        return view('user.posts.listing', [
            'user' => $user,
            'posts' => $posts,
            'followingCount' => $followingCount,
            'postCount' => $postCount,
            'userLikesReceived' => $userLikes,
        ]);
    }
}
