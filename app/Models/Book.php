<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $imagefolder = "public/bookimg/";
    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    // Mutators
    public function setBookImageAttribute($image)
    {
        $this->attributes['book_image'] = $this->imagefolder . $image;
    }
}
