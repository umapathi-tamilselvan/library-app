<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Librarian;
use Illuminate\Http\Request;

class MemberController extends Controller
{
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

}
