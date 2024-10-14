<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    public function store(Request $request)
    {

        $request->validate([
            'book_id' => 'required|exists:books,id',
            'user_id' => 'required|exists:users,id',
            'borrowed_at' => 'required|date|before_or_equal:today',
            'due_date' => 'required|date|after:borrowed_at',
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
        ]);
        $borrowedAt = Carbon::parse($request->borrowed_at)->format('Y-m-d');
        $dueDate = Carbon::parse($request->due_date)->format('Y-m-d');
        $returnedAt = $request->returned_at ? Carbon::parse($request->returned_at)->format('Y-m-d') : null;

        $user = User::find($request->user_id);
        $user->borrowedBooks()->attach($request->book_id, [
            'borrowed_at' =>$borrowedAt,
            'due_date' =>$dueDate,
            'returned_at' =>$returnedAt,
        ]);
        return redirect('/home')->with('success', 'Book borrowed successfully!');
    }

}
