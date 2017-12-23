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

    public function createSlug()
    {
      $this->slug = str_slug($this->name);
    }

    public function comments()
    {
      return $this->hasMany('App\Comment', 'posted_to_id', 'id');
    }
    public function scopeSearchByName($query, $name, $or = false)
    {
      if (!empty($name)) {
        if ($or) {
          return $query->orWhere('name', 'LIKE', "%{$name}%");
        } else {
          return $query->where('name', 'LIKE', "%{$name}%");
        }
      }
    }
    // public function following()
    // {
    //   return $this->belongsToMany(Following::class);
    // }
}
