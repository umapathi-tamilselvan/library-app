<?php

namespace App\Models;


use App\Models\Consumer;
use App\Models\Librarian;
use PharIo\Manifest\Library;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class book extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function consumer(){
        return $this->hasMany(Consumer::class);
    }
    public function library(){
        return $this->belongsTo(Library::class);
    }
    public function librarian(){
        return $this->belongsTo(Librarian::class);
    }
}
