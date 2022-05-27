<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    use HasFactory;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public $userpost = "posts/";
    // Mutators
    public function setMediaPathAttribute($post)
    {
        $this->attributes['media_path'] = $this->userpost . 'User-' . Auth::user()->id . "_" . Auth::user()->username . "/" . $post;
    }

    // Accessors
    public function getMediaPathAttribute($post)
    {
        return Storage::disk('local')->url($post);
    }
}
