<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function getRouteKeyName()
    {
      return 'slug';
    }

    public function createSlug()
    {
      $this->slug = str_slug($this->symbol);
    }
}
