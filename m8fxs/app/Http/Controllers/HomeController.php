<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FootballSlips;
use App\Models\BasketBallTips;

class HomeController extends Controller
{
    public function index()
    {
        // dd(date('Y-m-d'));
        $footballPredictions = FootballSlips::where('date', date('Y-m-d'))->get();
        $basketballPredictions = BasketBallTips::where('date', date('Y-m-d'))->get();
        $previousFootballPredictions = FootballSlips::where('date', date('Y-m-d', strtotime('yesterday')))->get();
        $previousBasketballPredictions = BasketBallTips::where('date', date('Y-m-d', strtotime('yesterday')))->get();
        // dd($previousFootballPredictions);
        // dd($footballPredictions);
        return view(
            'home',
            ['predictions' => $footballPredictions, 'basketballPredictions' => $basketballPredictions, 'previousFootballTickets' => $previousFootballPredictions, 'previousBasketballTickets' => $previousBasketballPredictions]
        );
    }
}
