<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FootballSlips extends Model
{
    protected $fillable = [
        'league',
        'homeTeam',
        'awayTeam',
        'selection',
        'results',
        'date',
    ];

    protected $table = 'table_football_slips';
    public $timestamps = false;
}
