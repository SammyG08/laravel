<?php

namespace App\Http\Controllers;

use App\Models\Follower;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth")->only("store, edit");
    }
    public function index($userId)
    {
        $user = User::find($userId);
        $follower = new Follower;
        return view('user.view-profile', ['user' => $user, 'follower' => $follower]);
    }

    public function edit($userId)
    {
        $user = User::find($userId);
        return view('user.edit-profile', ['user' => $user]);
    }

    public function store(Request $request, $userId)
    {
        $user = User::find($userId);
        // dd($user);
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'bio' => 'nullable',
            'image' => 'image',
        ]);
        $imagePath = $request->hasFile('image') ? $request->file('image')->store('profile', 'public') : '';
        $user->image ? Storage::disk('public')->delete($user->image) : '';
        $user->with(['comments', 'posts', 'likes', 'followers', 'receivedLikes', 'receivedComments', 'comments', 'messages'])->where('id', $user->id)->update(['name' => $request->name, 'username' => $request->username, 'bio' => $request->bio, 'image' => $imagePath]);
        return redirect(route('profile', $user));
    }
}
