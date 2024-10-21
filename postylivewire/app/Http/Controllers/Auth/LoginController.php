<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.login');
    }

    public function attempt($email, $remember, $password)
    {
        if (!Auth::attempt(['email' => $email,  'password' => $password], (bool)$remember)) {
            return false;
        } else return true;
    }

    public function authenticatedAt($user)
    {
        $user->authenticated_at = Carbon::now();
        $user->save();
    }
}
