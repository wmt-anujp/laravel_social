<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;

class Buyer extends Authenticable
{
    protected $table = "buyers";
    protected $guard = "buyer";
    protected $fillable = ['email', 'password'];
    protected $hidden = ['password'];
    use HasFactory;
}
