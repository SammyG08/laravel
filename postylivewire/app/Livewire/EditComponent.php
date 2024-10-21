<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;


class EditComponent extends Component
{
    use WithFileUploads;
    public $user;
    public $name;
    public $bio;
    public $image;
    public $username;

    protected $rules = [
        "name" => "required",
        "username" => "required",
        "bio" => "nullable",
        "image" => "image",
    ];


    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function save()
    {
        $this->validate();
        $imagePath = $this->image != null ? $this->image->store('profile', 'public') : '';
        $this->user->image ? Storage::disk('public')->delete($this->user->image) : '';
        $this->user->with(['comments', 'posts', 'likes', 'followers', 'receivedLikes', 'receivedComments', 'comments', 'messages'])->where('id', $this->user->id)->update(['name' => $this->name, 'username' => $this->username, 'bio' => $this->bio, 'image' => $imagePath]);
        return redirect(route('profile', $this->user));
    }
    public function render()
    {
        return view('livewire.edit-component');
    }
}
