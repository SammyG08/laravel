<?php

namespace App\Livewire;

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CommentLikeController;
use Livewire\Component;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Models\CommentLike;
use App\Models\User;

class CommentLikeComponent extends Component
{
    // public $comments;
    public $post;

    public function mount(Post $post)
    {
        $this->post = $post;
        // $this->comments = $post->comments()->with('user', 'replies', 'comment_likes')->get();
    }

    public function save($comment)
    {
        // dd($comment);
        $like = new CommentLike;
        $like->user_id = Auth::user()->id;
        $like->comment_id = $comment['id'];
        $like->save();
    }

    public function destroy(Comment $comment)
    {
        // dd($comment);
        $commmentLikeController = new CommentLikeController();
        $commmentLikeController->destroy(Auth::user(),  $comment);
    }

    public function delete(Comment $comment)
    {
        $commentController = new CommentController();
        $commentController->destroy($comment);
        $this->dispatch('RefreshLikeComponent');
    }
    public function render()
    {
        return view('livewire.comment-like-component', ['comments' => $this->post->comments()->with('user', 'replies', 'comment_likes')->get()]);
    }
}
