<?php

namespace App\Models;


use App\Models\User;
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

    public function borrowers()
    {
        return $this->belongsToMany(User::class, 'borrowed_books')
                    ->withPivot('borrowed_at', 'due_date', 'returned_at')
                    ->withTimestamps();
    }
}
