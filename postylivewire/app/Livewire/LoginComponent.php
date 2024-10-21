<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Auth\LoginController;

class LoginComponent extends Component
{
    public $email;
    public $password;
    public $remember;
    public $status;

    protected $rules = [
        'email' => 'required|email|',
        'password' => 'required',
    ];

    public function store()
    {
        $this->validate();
        $login = new LoginController();
        if (!$login->attempt($this->email, $this->remember, $this->password)) {
            session()->flash('status', 'Invalid login credentials');
        } else {
            $user = User::with('comments', 'likes', 'followers', 'receivedLikes', 'receivedComments', 'posts')->where('email', '=', $this->email)->first();

            $user->authenticated_at = Carbon::now();
            $user->save();
            $this->redirect(route('chat'));
        }
    }
    public function render()
    {
        return view('livewire.login-component');
    }
}
