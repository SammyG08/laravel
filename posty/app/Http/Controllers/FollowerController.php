<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store (Request $request, User $user){
        $user->followers()->create([
            'follower_id' => $request->user()->id,
        ]);
        return back();
    }

    public function destroy(Request $request, User $user){
        // dd($user->followers()->where('follower_id', $request->user()->id)->get());
        $user->followers()->where('follower_id', $request->user()->id)->delete();
        return back();
    }

    public function showFollowers(User $user, Request $request){
        $followers = $user->followers()->with('user')->get();
        $userModel= [];
        foreach ($followers as $follower){
            $users = $user->where('id', $follower->follower_id)->get();
            // dd($users[0]->username);
            array_push($userModel, $users);
        }
        // dd($userModel);
        return view('list-followers', ['userModel'=> $userModel, 'user'=>$user]);
    }

}
