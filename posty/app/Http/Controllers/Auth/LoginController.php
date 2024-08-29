<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class LoginController extends Controller
{

    public function __construct(){
        $this->middleware('guest');
    } 

    public function index (){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request, [
            'email'=>'required|email|',
            'password'=>'required',
        ]);

        // dd((bool)$request->remember);        

        if (!Auth::attempt($request->only('email', 'password'),(bool)$request->remember)){
            return(back()->with('status','Invalid login credentials'));
        }
        return redirect(route('dashboard'));
 
     }
}
