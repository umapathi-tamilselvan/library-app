<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PharIo\Manifest\Library;

class book extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function library()
    {
        return $this->belongsTo(Library::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}
