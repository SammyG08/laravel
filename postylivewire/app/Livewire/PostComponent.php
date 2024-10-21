<?php

namespace App\Livewire;

use App\Events\RefreshLikeComponent;
use Livewire\Component;
use App\Models\User;
use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use App\Http\Controllers\PostController;


class PostComponent extends Component
{
    use WithPagination;
    public $post;
    // public $posts;
    public $user;

    protected $rules = [
        'post' => 'required',
    ];

    // protected $listeners = [
    //     'Post' => '$refresh'
    // ];

    protected $paginationTheme = 'bootstrap';
    // public function mount()
    // {
    //     $this->posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes', 'comments'])->paginate(10);
    // }
    public function savePost(User $user)
    {
        // $this->validate();
        // $user->posts()->create([
        //     'body' => $this->post,
        // ]);
        // $this->post = ' ';
        // $this->redirectRoute('post');
        $this->user = $user;
        $this->dispatch('Post');
    }

    #[On('Post')]

    public function listenForNewPost()
    {
        $this->validate();
        $this->user->posts()->create([
            'body' => $this->post,
        ]);
        $this->post = '';
        // $this->redirectRoute('post');
        // $this->dispatch('$refresh');
        // $this->dispatch('refresh-me'); 
        // $this->dispatch(' RefreshLikeComponent');
        $this->dispatch(' RefreshLikeComponent');
    }

    #[On('RefreshLikeComponent')]
    public function refreshPostComponent()
    {
        // dd('refreshing post component');
    }

    public function render()
    {
        return view('livewire.post-component', ['posts' =>  Post::orderBy('created_at', 'desc')->with(['user', 'likes', 'comments'])->get()]);
    }
}
