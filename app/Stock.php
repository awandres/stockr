<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function getRouteKeyName()
    {
      return 'slug';
    }

    public function scopeSearchBySymbol($query, $symbol)
    {
      if (!empty($symbol)) {
        return $query->where('symbol', 'LIKE', "%{$symbol}%");
      }
    }

    public function scopeSearchByName($query, $name)
    {
      if (!empty($name)) {
        return $query->where('name', 'LIKE', "%{$name}%");
      }
    }

    public function createSlug()
    {
      $this->slug = str_slug($this->symbol);
    }
}
