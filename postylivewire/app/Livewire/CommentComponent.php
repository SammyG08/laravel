<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CommentComponent extends Component
{
    public $post;
    public $comment;
    protected $rules = ['comment' => 'required'];

    public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function save()
    {
        $this->validate();
        $this->post->comments()->create([
            'body' => $this->comment,
            'user_id' => Auth::user()->id,
        ]);
        $this->comment = '';
        return redirect(route('post.index', ['post' => $this->post]))->with('message', 'Comment added successfully');
    }
    public function render()
    {
        return view('livewire.comment-component');
    }
}
