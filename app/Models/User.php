<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class User extends Authenticable
{
    protected $table = 'users';
    use HasFactory;
    protected $fillable = ['name', 'email', 'password'];
    protected $hidden = ['password',];
}
