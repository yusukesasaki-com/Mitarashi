<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = ['title', 'sort', 'list_type', 'summary_type', 'url'];

    public function posts()
    {
      return $this->hasMany('App\Post');
    }
}
