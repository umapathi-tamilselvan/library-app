<?php

namespace App\Models;


use App\Models\User;
use App\Models\Borrow;
use PharIo\Manifest\Library;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class book extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function library() {
        return $this->belongsTo(Library::class);
    }

   public function user(){
    return $this->hasMany(User::class);
   }

   public function borrows()
{
    return $this->hasMany(Borrow::class);
}
}
