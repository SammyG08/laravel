<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;

class LikeComponent extends Component
{
    // #[Reactive]
    public $post;
    public $fromIndex = false;

    // protected $listeners = [
    //     'RefreshLikeComponent' => '$refresh',
    // ];

    public function mount(Post $post = null, $fromIndex = false)
    {
        $this->post = $post;
        $this->fromIndex = $fromIndex;
    }

    public function registerLike()
    {
        $this->post->likes()->create([
            'user_id' => Auth::user()->id,
        ]);
    }
    public function destroy(User $user)
    {
        // dd($this->post->id);
        $user->likes()->where('post_id', $this->post->id)->delete();
        // return back();
    }

    public function delete()
    {
        // dd($this->post);
        $postController = new PostController();
        $postController->destroy($this->post);
        $this->dispatch('RefreshLikeComponent');
        $this->fromIndex ? $this->redirectRoute('post') : "";
    }

    #[On('RefreshLikeComponent')]
    function refreshLikeComponent()
    {
        // dd('hello from the like component');
    }


    public function render()
    {
        return view('livewire.like-component');
    }
}
