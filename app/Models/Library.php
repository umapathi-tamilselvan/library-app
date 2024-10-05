<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Consumer;
use App\Models\Librarian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Library extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['librarian_id','book_id','borrowed_at','returned_at'];

    public function book(){
        return $this->hasMany(Book::class);
    }
    public function consumer(){
        return $this->hasMany(Consumer::class);
    }
    public function librarian(){
        return $this->hasMany(Librarian::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }

}
