<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Comment;

class ReplyCommentComponent extends Component
{
    public $comment;
    public $reply;
    protected $rules = [
        'reply' => 'required',
    ];

    public function mount(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function save()
    {
        $this->validate();
        $this->comment->replies()->create([
            'body' => $this->reply,
            'user_id' => Auth::user()->id,
        ]);

        return redirect(route('show.replies', $this->comment->id));
    }
    public function render()
    {
        return view('livewire.reply-comment-component');
    }
}
