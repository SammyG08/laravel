<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Follower;
use App\Mail\PostLiked;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;

class ChatController extends Controller
{
    public function __construct()
    {
        $this->middleware(middleware: 'auth');
    }
    public function index(){
        $followerId = Follower::where(column: 'user_id', operator: Auth::user()->id)->with(relations: 'user')->get(columns: 'follower_id');
        $users = User::with(relations: ['posts', 'followers', 'likes', 'comments', 'receivedComments', 'receivedLikes'])->find(id: $followerId);
        // dd(vars: $users);
        return view(view: 'dashboard',  data: ['users' =>$users]);
    }

    public function show(User $user){
        // dd($user->authenticated_at);
        return view(view:'user.messages.index', data: ['user'=>$user]);
    }
}

