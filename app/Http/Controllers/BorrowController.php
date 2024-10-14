<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BorrowController extends Controller
{
    public function index()
    {
        $borrowHistorys = auth()->user()->borrowedBooks;
        return view('member.borrowhistory', compact('borrowHistorys'));
    }



    public function store(Request $request)
    {

        $request->validate([
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
            'due_date' => 'required|date',
        ]);
        $book = Book::find($request->book_id);

        if ($book->available_copies <= 0) {
            return back()->withErrors(['error' => 'Sorry, this book is currently unavailable.']);
        }

        $book->available_copies -= 1;
        $book->save();

        $user = User::find($request->user_id);
        $user->borrowedBooks()->attach($request->book_id, [
            'borrowed_at' =>$request->borrowed_at,
            'due_date' =>$request->due_date,
            'returned_at' =>$request->returned_at,
        ]);
        return redirect('/home')->with('success', 'Book borrowed successfully!');
    }


    public function returnBook($userId, $bookId, Request $request)
    {
        $user = User::find($userId);
        $book = Book::find($bookId);

        $borrowRecord = $user->borrowedBooks()->where('book_id', $bookId)->first();

        if ($borrowRecord) {
            $user->borrowedBooks()->updateExistingPivot($bookId, ['returned_at' => $request->input('returned_at')]);
            $book->increment('available_copies');
            return redirect('/borrowhistory')->with('success', 'Book returned successfully!');
        } else {
            return redirect('/borrowhistory')->with('error', 'This book was not borrowed by the user.');
        }
    }


}
