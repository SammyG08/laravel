<?php declare(strict_types=0);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Laravel\Prompts\error;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }
    public function index(Request $request ){
        return view('auth.register');
    }

    public function store(Request $request){
       $this->validate($request, [
            'name'=>['required','max:255'],
            'email'=>['required','email','max:255'],
            'username'=>['required','max:255'],
            'password'=>['required','confirmed'],
        ]);
        

        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        return redirect(route('login'));

    }
}
