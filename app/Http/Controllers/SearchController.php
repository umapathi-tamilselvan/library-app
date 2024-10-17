<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request) {
        $query = $request->input('query');


        $users = User::where('name', 'like', '%' . $query . '%')->orWhere('email', 'like', '%' . $query . '%')
                     ->get();


        $books = Book::where('book_name', 'like', '%' . $query . '%') ->orWhere('content', 'like', '%' . $query . '%')
                     ->get();


        return view('admin.dashboard', compact('users', 'books', 'query'));
    }

}
