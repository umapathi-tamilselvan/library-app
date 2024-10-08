<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Member;
use App\Models\Library;
use App\Models\Librarian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BorrowedRecord extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function member(){
        return $this->belongsTo(Member::class);
    }
    public function library(){
        return $this->belongsTo(Library::class);
    }
    public function librarian(){
        return $this->belongsTo(Librarian::class);
    }
}
