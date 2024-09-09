<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function list(User $user){
        // dd($user->posts);
        $posts = $user->posts()->orderBy('created_at', 'desc')->with('user', 'likes', 'comments')->paginate(5);
        // $follower = new Follower();
        // dd($follower);    
        return view('user.posts.listing', [
            'user' => $user,
            'posts' => $posts,
            'follower' => new Follower(),
        ]);
    }
}
