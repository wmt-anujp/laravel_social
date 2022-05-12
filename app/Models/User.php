<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{
    use HasFactory;
    use AuthAuthenticatable;
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function liked()
    {
        return $this->hasMany(Like::class);
    }
}
