<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    public function discover()
    {
        $follower = new Follower();
        $userModel = new User();
        $followedByActiveUser = $follower->with('user')->where('follower_id', Auth::user()->id)->get('user_id');
        $count = count($followedByActiveUser);
        $usersNotFollowed = [];
        if($count >= 1){
            $users = $userModel->with('comments', 'likes', 'posts', 'followers')->whereNot('id', $followedByActiveUser[$count-1]->user_id)->get();
            array_push($usersNotFollowed, $users);
        }
        else{
            $users = $userModel->with('comments','likes', 'posts', 'followers' )->whereNot('id', Auth::user()->id)->get();
            array_push($usersNotFollowed, $users);
        }
        return $usersNotFollowed;
    }

    public function search(){
        Auth::user() ? $usersNotFollowed = $this->discover() : $usersNotFollowed = null;
        return view('search', [
            'users' => $usersNotFollowed,
        ]);
    }

    public function find(Request $request){
        $result = User::with('posts', 'likes', 'comments')->where('username', 'like', '%'. $request->search . '%')->get();
        Auth::user() ? $usersNotFollowed = $this->discover() : $usersNotFollowed = null;
        return view('search', ['results'=> $result,  'users' => $usersNotFollowed, ]);
    }


}
