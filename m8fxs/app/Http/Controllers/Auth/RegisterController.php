<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullName' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'ageCheckBox' => 'accepted',
        ]);

        User::create([
            'name' => $request->fullName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect(route('login'))->with('status', 'Account created successfully');
    }
}
