<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
      }

      public function index(){

       return view('home');


}
}
