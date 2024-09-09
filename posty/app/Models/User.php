<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'bio',
        'image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }

    public function receivedLikes(){
        return $this->hasManyThrough(Like::class, Post::class );
    }

    public function receivedComments(){
        return $this->hasManyThrough(Comment::class, Post::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function followers(){
        return $this->hasMany(Follower::class);
    }

    public function following(User $user){
        return $this->followers()->where('follower_id', $user->id)->get()->count();
    }

    public function followedBy(User $user){
        return $this->followers()->where('follower_id', $user->id)->get();
    }

    public function accountOwner(User $user){
        return $this->id === $user->id ? true : false ;
    }

    public function getImageUrl(){
        if($this->image){
            return url('storage/'.$this->image);
        }
        else{
            return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={$this->name}";
        }
    }
 
}
