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

    //user has one portfolio
    public function portfolio()
    {
      return $this->hasOne(Portfolio::class);
    }

    //user belongs to many other users
    public function following()
    {
      return $this->belongsToMany('App\User', 'followers', 'following_user_id')->withTimeStamps();
    }

    //tried to make a slug
    public function createSlug()
    {
      $this->slug = str_slug($this->name);
    }

    //user has many comments
    public function comments()
    {
      return $this->hasMany('App\Comment', 'posted_to_id', 'id');
    }

    //can search by name
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

}
