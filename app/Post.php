<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title', 'content', 'category_id', 'image', 'slug'
    ];

    public function getImageAttribute($image)
    {
        return asset($image);
    }

    protected $dates = ['deleted_at'];

    public function category()
    {
        return $this->belongsTo('App\Categories', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }
}
