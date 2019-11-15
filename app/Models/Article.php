<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $timestamps = false;

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'article_id');
    }
}
