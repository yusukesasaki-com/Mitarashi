<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = ['title', 'sort'];

    public function posts()
    {
      return $this->hasMany('App\Post');
    }
}
