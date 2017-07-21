<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function getRouteKeyName()
    {
      return 'slug';
    }

    public function scopeSearchBySymbol($query, $symbol, $or = false)
    {
      if (!empty($symbol)) {
        if ($or) {
          return $query->orWhere('symbol', 'LIKE', "%{$symbol}%");
        } else {
          return $query->where('symbol', 'LIKE', "%{$symbol}%");
        }
      }
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

    public function createSlug()
    {
      $this->slug = str_slug($this->symbol);
    }
}
