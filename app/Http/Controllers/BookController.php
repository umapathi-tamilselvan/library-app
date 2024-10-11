<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Library;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function viewbook(){
        $books=Book::get();
       return view('admin.book',compact('books'));
     }
     public function createbook(){
        $libraries = Library::all();
        return view('admin.addbook',compact('libraries'));
      }

      public function store(){
        $data=request()->validate([
         'book_name'=>'required',
         'content'=>'required',
         'library_id'=>'required|exists:libraries,id',
         'total_copies'=>'required',
         'available_copies'=> 'required'
        ]);
        $libraries = Library::all();
        $books=Book::create($data);
        $books->save();
        return redirect('/admin/book')->with('success','');
      }
}
