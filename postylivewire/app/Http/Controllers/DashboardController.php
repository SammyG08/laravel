<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Follower;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(middleware: 'auth');
    }
    public function index(){
        $followersId = Follower::where(column: 'user_id', operator: Auth::user()->id)->get(columns: 'follower_id');
        $users = User::find($followersId);
        return view(view: 'dashboard', data: ['users'=>$users]);
    }
}
