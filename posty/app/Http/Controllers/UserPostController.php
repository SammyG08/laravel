<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Http\Request;

class UserPostController extends Controller
{
    public function list(User $user){
        // dd($user->posts);
        $posts = $user->posts()->orderBy('created_at', 'desc')->with('user', 'likes')->paginate(5);
        return view('user.posts.listing', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
