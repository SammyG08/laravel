<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BasketBallTips extends Model
{
    public $timestamps = false;
    protected $table = 'basketball_tips';

    public $fillable = [
        'league',
        'homeTeam',
        'awayTeam',
        'selection',
        'results',
        'date',
    ];
}
