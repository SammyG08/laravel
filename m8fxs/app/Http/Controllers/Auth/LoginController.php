<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view("auth.login");
    }
    public function attempt(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return session()->flash('status', 'Incorrect credentials');
        } else {
            // if (Auth::user()->id == 1) {
            //     // dd(Auth::user()->id);
            //     return redirect(route('dashboard', Auth::user()->id));
            // } else {
            //     return redirect(route('home'));
            // }
            return redirect(route('home'));
        }
    }
}
