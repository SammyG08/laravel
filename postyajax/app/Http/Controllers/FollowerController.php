<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function store(Request $request, $userId)
    {
        // dd($user);
        $user = User::find($userId);
        $user->followers()->create([
            'follower_id' => $request->user()->id,
        ]);

        return response()->json(['url' => route('user.unfollow', $user->id)], 200);
    }

    public function destroy(Request $request, $userId)
    {
        $user = User::find($userId);
        // dd($user->followers()->where('follower_id', $request->user()->id)->get());
        $user->followers()->with('user')->where('follower_id', $request->user()->id)->delete();
        return response()->json(['url' => route('user.follow', $user->id)], 200);
    }

    public function showFollowers($userId)
    {
        $user = User::find($userId);
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

    public function showFollowing($userId)
    {
        $user = User::find($userId);
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
