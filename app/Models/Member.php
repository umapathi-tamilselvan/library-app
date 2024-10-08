<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Library;
use App\Models\Librarian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['name','email'];
    
    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function librarian(){
        return $this->belongsTo(Librarian::class);
    }
    public function library(){
        return $this->belongsTo(Library::class);
    }

}
