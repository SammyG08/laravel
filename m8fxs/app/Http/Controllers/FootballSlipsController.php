<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FootballSlips;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;

class FootballSlipsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        if (Auth::user()->id == 1) {
            return view('tickets.football');
        }
        return redirect(route('home'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'LEAGUE' => 'required',
            'AWAYTEAM' => 'required',
            'HOMETEAM' => 'required',
            'SELECTION' => 'required',
        ]);

        FootballSlips::create([
            'league' => $request->LEAGUE,
            'homeTeam' => $request->HOMETEAM,
            'awayTeam' => $request->AWAYTEAM,
            'selection' => $request->SELECTION,
            'date' => Date::now(),

        ]);
        return back()->with('message', 'Successfully added to database');
    }
}
