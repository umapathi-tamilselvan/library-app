<?php

namespace App\Models;

use App\Models\Book;
use App\Models\Member;
use App\Models\Library;
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
    public function member(){
        return $this->hasMany(Member::class);
    }
    public function borrowedrecord(){
        return $this->belongsTo(BorrowedRecord::class);
    }
}
