<?php

namespace App\Livewire;

use App\Http\Controllers\ReplyCommentController;
use Livewire\Component;

class DeleteReplyComponent extends Component
{
    public $comment;

    public function delete($reply)
    {
        // dd($reply);
        $replyController = new ReplyCommentController();
        $replyController->destroy($reply['id']);
    }
    public function render()
    {
        return view('livewire.delete-reply-component', ['replies' => $this->comment->replies()->with(['user'])->get()]);
    }
}
