<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Consumer;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{

    public function create()
    {
        $librarians = User::all();
        $books = Book::all();
        return view('layouts.consumer_create', compact('librarians', 'books'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'librarian_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'nullable|date',
            'due_date' => 'nullable|date|after:borrowed_at',
            'returned_at' => 'nullable|date|after:due_date',
        ]);

        $consumers=Consumer::create($data);
        $consumers->save();

        return redirect('/home/consumer')->with('status', 'Consumer created successfully!');
    }

}

