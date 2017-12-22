<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Portfolio;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function portfolio()
    {
      return $this->hasOne(Portfolio::class);
    }

    public function following()
    {
      return $this->belongsToMany('App\User', 'followers', 'following_user_id')->withTimeStamps();
    }

    public function isFollowing(User $user)
    {
      return !is_null($this->following()->where('user_id', $user->id)->first());
    }
    // public function following()
    // {
    //   return $this->belongsToMany(Following::class);
    // }
}
