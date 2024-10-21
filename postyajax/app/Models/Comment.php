<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'body',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function comment_likes(){
        return $this->hasMany(CommentLike::class);
    }

    public function likedBy(User $user){
        return $this->comment_likes->contains('user_id',$user->id);
    }

    public function replies(){
        return $this->hasMany(ReplyComment::class);
    }

}
