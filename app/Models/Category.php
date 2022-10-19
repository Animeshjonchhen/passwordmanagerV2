<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function password()
    {
        return $this->hasMany(Password::class,'passwords_id');
    }

    public function user()
    {
        return $this->belongsToMany(User::class);
    }
}
