<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class RegisterComponent extends Component
{
    public $password;
    public $password_confirmation;
    public $username;
    public $email;
    public $name;

    public function store()
    {
        $this->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'username' => ['required', 'max:255'],
            'password' => ['required', 'confirmed'],
        ]);


        User::create([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        return redirect(route('login'));
    }
    public function render()
    {
        return view('livewire.register-component');
    }
}
