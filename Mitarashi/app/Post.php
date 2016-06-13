<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['title', 'item_id', 'body', 'state', 'published_at'];

    public function item()
    {
      return $this->belongsTo('App\Item');
    }

}
