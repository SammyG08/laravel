<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(){
        return view('search');
    }

    public function find(Request $request){
        $result = User::with('posts', 'likes', 'comments')->where('username', $request->search)->get();
        // dd($result);
        return view('search', ['results'=> $result]);
    }
}
