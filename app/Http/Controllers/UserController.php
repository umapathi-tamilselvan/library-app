<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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

        return view('member.borrow',compact('books'));
    }
   

}


