<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Librarian;
use Illuminate\Http\Request;
use App\Models\BorrowedRecord;

class MemberController extends Controller
{
 public function __construct(){

        $this->middleware('auth');
    }

    public function index(){

        return view('home');
    }
    public function bookview(){
        $books=Book::get();
        return view('member.book',compact('books'));
    }
    public function borrowview(){
        $books=Book::get();
        $librarians=Librarian::get();

        return view('member.borrow',compact('books','librarians'));
    }
    public function store() {

        $data = request()->validate([
            'member_id' => 'required|exists:members,id',
            'librarian_id' => 'required|exists:librarians,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'nullable|date',
            'due_date' => 'nullable|date|after:borrowed_at',
            'returned_at' => 'nullable|date|after:due_date',
            
        ]);

        $data['user_id'] = auth()->user()->id;
        $borrowedRecord = BorrowedRecord::create($data);

        $books = Book::find($data['book_id']);

        if ($books && $books->available_copies > 0) {
            $books->available_copies -= 1;
            $books->save();
        } else {
            return redirect('/home')->back()->with('error', 'No available copies for this book.');
        }

        return redirect('/home')->with('success', 'Book borrowed successfully and available copies reduced.');
    }
    public function show()
    {
        // Get the current logged-in user ID
        $userId = auth()->user()->id;

        // Fetch borrow history for the logged-in user
        $borrowedRecords = BorrowedRecord::where('user_id', $userId)->get();

        return view('member.borrowhistory', compact('borrowedRecords'));
    }



}
