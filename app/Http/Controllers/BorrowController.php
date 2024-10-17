<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Http\Request;
use App\Mail\BorrowNotification;
use App\Mail\ReturnNotification;
use Illuminate\Support\Facades\Mail;

class BorrowController extends Controller
{
    public function index()
    {

        $borrowHistorys = Borrow::where('user_id', auth()->id())->get();

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

      $borrow=  Borrow::create([
            'user_id' => auth()->id(),
            'book_id' => $request->book_id,
            'borrowed_at' => $request->borrowed_at,
            'due_date' => $request->due_date,
            'returned_at' => null,
        ]);
        Mail::to(auth()->user()->email)->send(new BorrowNotification($borrow));

        return redirect('/home')->with('success', 'Book borrowed successfully!');
    }

    public function returnBook(Request $request)
    {

        $borrowId = $request->input('borrow_id');
        $borrow = Borrow::find($borrowId);

        if (! $borrow || $borrow->returned_at) {
            return redirect('/borrowedhistory')->withErrors(['error' => 'This book was either not borrowed or has already been returned.']);
        }

        $borrow->update([
            'returned_at' => $request->input('returned_at', Carbon::now()),
        ]);

        $borrow->book->increment('available_copies');
        Mail::to($borrow->user->email)->send(new ReturnNotification($borrow));

        return redirect('/borrowedhistory')->with('success', 'Book returned successfully!');
    }
}
