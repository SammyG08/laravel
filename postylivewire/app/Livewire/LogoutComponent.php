<?php

namespace App\Livewire;

use App\Http\Controllers\Auth\LogoutController;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LogoutComponent extends Component
{
    public function logout()
    {
        $logoutController = new LogoutController();
        $logoutController->store();
    }
    public function render()
    {
        return view('livewire.logout-component');
    }
}
