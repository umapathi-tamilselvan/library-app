<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Library;
use App\Models\Consumer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class librarian extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['name','email','consumer_id'];

    public function library(){
        return $this->belongsTo(Library::class);
    }
    public function book(){
        return $this->hasMany(Book::class);
    }
    public function consumer(){
        return $this->hasMany(Consumer::class);
    }
}
