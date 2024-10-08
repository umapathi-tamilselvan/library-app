<?php

namespace App\Models;


use App\Models\Member;
use App\Models\Librarian;
use PharIo\Manifest\Library;
use App\Models\BorrowedRecord;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class book extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function member(){
        return $this->hasMany(Member::class);
    }
    public function borrowedrecord(){
        return $this->hasMany(BorrowedRecord::class);
    }
    public function library(){
        return $this->belongsTo(Library::class);
    }
    public function librarian(){
        return $this->belongsTo(Librarian::class);
    }
}
