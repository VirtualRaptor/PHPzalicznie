<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'username',
        'email',
        'password',
    ];

    public function jokesSaved()
    {
        return $this->hasMany(Joke::class);
    }

    protected $table = 'users';
}
