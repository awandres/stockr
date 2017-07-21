<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stock;
use App\User;

class Portfolio extends Model
{
    public function stocks()
    {
      return $this->belongsToMany(Stock::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
