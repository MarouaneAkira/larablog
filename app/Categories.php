<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function posts()
    {
        return $this->hasMany('App\Post', 'category_id');
    }
}
