<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;
    protected $table = 'users';
    protected $fillable = ['name', 'email', 'password'];

    public function roles() {
        return $this->belongsToMany('App\Models\Role', 'role_users', 'user_id', 'role_id');
    }

}
