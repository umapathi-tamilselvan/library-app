<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Library;

class BookController extends Controller
{
    public function viewbook()
    {
        $books = Book::paginate(6);

        return view('admin.book', compact('books'));
    }

    public function createbook()
    {
        $libraries = Library::all();

        return view('admin.addbook', compact('libraries'));
    }

    public function store()
    {
        $data = request()->validate([
            'book_name' => 'required',
            'content' => 'required',
            'library_id' => 'required|exists:libraries,id',
            'total_copies' => 'required',
            'available_copies' => 'required',
        ]);
        $libraries = Library::all();
        $books = Book::create($data);
        $books->save();

        return redirect('/book')->with('success', 'Book added successfully!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->back()->with('delete', 'Book deleted successfully!');
    }
}
