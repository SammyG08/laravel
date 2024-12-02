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
            return back()->with('status', 'Incorrect Credentials');
        } else {
            return redirect(route('home'));
        }
    }
}
