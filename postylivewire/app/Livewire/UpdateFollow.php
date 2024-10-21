<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UpdateFollow extends Component
{
    public $user;
    public $fromSearch;
    public $fromFollowing;
    public $fromFollowers;


    public function mount(User $user, $fromSearch = false, $fromFollowers = false, $fromFollowing = false)
    {
        $this->user = $user;
        $this->fromSearch = $fromSearch;
        $this->fromFollowing = $fromFollowing;
        $this->fromFollowers = $fromFollowers;
    }

    public function save()
    {
        $this->user->followers()->create([
            'follower_id' => Auth::user()->id,
        ]);
    }
    public function render()
    {
        return view('livewire.update-follow');
    }
}
