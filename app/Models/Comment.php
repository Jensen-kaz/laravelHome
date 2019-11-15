<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;

    public function author()
    {
        return $this->belongsTo('App\Models\User','userId');
    }

}
