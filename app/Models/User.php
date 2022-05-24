<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    protected $fillable = ['name', 'username', 'email', 'password', 'dob', 'profile_photo'];
    public $profilephoto = "profilephoto/";

    // MUTATORS
    public function setProfilePhotoAttribute($image)
    {
        $this->attributes['profile_photo'] = $this->profilephoto . $image;
    }
}
