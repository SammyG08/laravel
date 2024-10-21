<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\FollowerController;

class ListFollowing extends Component
{
    public $user;


    public function save()
    {
        $this->user->followers()->create([
            'follower_id' => Auth::user()->id,
        ]);
    }
    public function delete()
    {
        $followerController = new FollowerController();
        $followerController->destroy(Auth::user(), $this->user);
    }
    public function render()
    {
        return view('livewire.list-following');
    }
}
