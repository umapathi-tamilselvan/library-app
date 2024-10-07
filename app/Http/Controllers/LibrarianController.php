<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Consumer;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }

      public function index(){

        $user=auth()->user();
        $consumers=Consumer::where('librarian_id',$user->id)->get();
       return view('home',compact('consumers'));
      }
      public function create(){
        return view('layouts.consumer_create');
      }
    public function view(){
        $books =Book::get();
        return view('librarian.book',compact('books'));

    }

}
