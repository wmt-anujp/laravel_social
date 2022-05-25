<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;
    public $profilephoto = "profile/";

    // MUTATORS
    public function setProfilePhotoAttribute($image)
    {
        $this->attributes['profile_photo'] = $this->profilephoto . $image;
    }

    // Accessors
    public function getProfilePhotoAttribute($image)
    {
        return $image = Storage::disk('local')->url($image);
    }
}
