<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    // Accessors
    public function getAuthAddressAttribute($value)
    {
        return ucwords($value);
    }

    public function getAuthFnameAttribute($value)
    {
        return ucwords($value);
    }
    public function getAuthLnameAttribute($value)
    {
        return ucwords($value);
    }
    public function getAuthDescAttribute($value)
    {
        return ucwords($value);
    }

    // Mutators
    public function setAuthAddressAttribute($value)
    {
        $this->attributes['auth_address'] = ucwords($value);
    }
    public function setAuthFnameAttribute($value)
    {
        $this->attributes['auth_fname'] = ucwords($value);
    }
    public function setAuthLnameAttribute($value)
    {
        $this->attributes['auth_lname'] = ucwords($value);
    }
    public function setAuthDescAttribute($value)
    {
        $this->attributes['auth_desc'] = ucwords($value);
    }
}
