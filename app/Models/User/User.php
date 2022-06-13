<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $guard = 'user';
    protected $fillable = ['name', 'username', 'email', 'password', 'profile_photo'];

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function like()
    {
        return $this->hasMany(Like::class, 'user_id', 'id');
    }

    public function getProfilePhotoAttribute($profile)
    {
        return Storage::disk('local')->url($profile);
    }
}
