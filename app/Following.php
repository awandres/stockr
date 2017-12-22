<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stock;
use App\User;

class Following extends Model
{
    public function stocks()
    {
      return $this->belongsToMany(User::class);
    }

    // public function user()
    // {
    //   return $this->belongsTo(User::class);
    // }
}
