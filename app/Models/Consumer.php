<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Library;
use App\Models\Librarian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class consumer extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=[ 'name',
    'email',
    'librarian_id',
    'book_id',
    'borrowed_at',
    'due_date',
    'returned_at'];
    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function library(){
      return $this->belongsTo(Library::class);
    }
    public function librarian(){
        return $this->belongsTo(Librarian::class);
    }

}
