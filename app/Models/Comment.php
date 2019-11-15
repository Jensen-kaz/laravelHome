<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $timestamps = false;
    protected $table = 'comments';


    public function author()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

}
