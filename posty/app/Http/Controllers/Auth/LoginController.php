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
        $user = User::with('comments', 'likes', 'followers', 'receivedLikes', 'receivedComments', 'posts')->where('email', $request->email)->first();

        $user->authenticated_at = Carbon::now();
        $user->save();
        // dd($user->authenticated_at);
        return redirect(route('chat'));
 
    }

    public function authenticatedAt($user){
        $user->authenticated_at = Carbon::now();
        $user->save();
    }
}
