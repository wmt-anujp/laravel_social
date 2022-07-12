<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    protected $table = 'languages';
    protected $fillable = ['id', 'language', 'lang_code'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
