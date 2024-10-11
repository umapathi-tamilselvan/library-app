<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Library extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function books(){
        return $this->hasMany(Book::class);
    }
    public function user(){
        return $this->belongsToMany(User::class);
    }


}
