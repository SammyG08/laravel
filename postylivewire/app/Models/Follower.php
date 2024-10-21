<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    use HasFactory;

    protected $fillable =[
        'follower_id',
        'user_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function getFollowing(User $user){
        return $this->with('user')->where('follower_id', $user->id)->get()->count();
    }
}
