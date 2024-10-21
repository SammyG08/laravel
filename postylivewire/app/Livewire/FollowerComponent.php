<?php

namespace App\Livewire;

use App\Http\Controllers\FollowerController;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class FollowerComponent extends Component
{
    use WithPagination;

    public $user;
    public $userLikesReceived;
    public $followingCount;
    public $postCount;

    protected $paginationTheme = 'bootstrap';



    public function mount($user, $userLikesReceived, $followingCount, $postCount)
    {
        $this->user = $user;
        $this->userLikesReceived = $userLikesReceived;
        $this->followingCount = $followingCount;
        $this->postCount = $postCount;
    }

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

    #[On('RefreshLikeComponent')]
    public function refreshFollowerComponent() {}

    public function render()
    {
        return view('livewire.follower-component', ['posts' => $this->user->posts()->with(['user', 'likes', 'comments'])->orderBy('created_at', 'desc')->paginate(5)]);
    }
}
