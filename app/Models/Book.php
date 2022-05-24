<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class Book extends Model
{
    use HasFactory;
    public $imagefolder = "bookimg/";
    // public $imagefolder = asset(Storage::disk("local")->url("bookimg/"));

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    // Mutators
    public function setBookImageAttribute($image)
    {
        // $imagefolder = $request->move(public_path('bookimg'));
        // $this->imagefolder = Storage::disk(['local'])->url("bookimg/");
        $this->attributes['book_image'] = $this->imagefolder . $image;
    }
}
