<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(Request $request, User $user)
    {
        // dd($user);
        $user->followers()->create([
            'follower_id' => $request->user()->id,
        ]);
        return back();
    }

    public function destroy($authenticatedUser, User $user)
    {
        // dd($user->followers()->where('follower_id', $request->user()->id)->get());
        $user->followers()->with('user')->where('follower_id', $authenticatedUser->id)->delete();
        // return back();
    }

    public function showFollowers($id, Request $request)
    {
        $user = User::find($id);
        $followers = $user->followers()->with(['user'])->get();
        $userModel = [];
        foreach ($followers as $follower) {
            $users = $user->with(['comments', 'posts', 'likes', 'followers', 'receivedComments', 'receivedLikes'])->where('id', $follower->follower_id)->get();
            // dd($users[0]->username);
            array_push($userModel, $users);
        }
        // dd($userModel);
        return view('list-followers', ['userModel' => $userModel, 'user' => $user]);
    }

    public function showFollowing($id, Request $request)
    {
        $user = User::find($id);
        $follower = new Follower();
        $userModel = new User();
        $following = $follower->with(['user'])->where('follower_id', $user->id)->get();
        $followingUser = [];
        // dd($following);
        foreach ($following as $followermodel) {
            array_push($followingUser, $userModel->with(['comments', 'posts', 'likes', 'followers', 'receivedComments', 'receivedLikes'])->where('id', $followermodel->user_id)->get());
        }
        return view('list-following', ['followingUser' => $followingUser, 'user' => $user]);
    }
}
