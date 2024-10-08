<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Librarian;


class LibraryController extends Controller
{
  public function index(){
    return view('admin.admin');
  }

  public function viewbook(){
    $books=Book::get();
   return view('admin.book',compact('books'));
 }
 public function createbook(){
    return view('admin.addbook');
  }

  public function store(){
    $data=request()->validate([
     'book_name'=>'required',
     'content'=>'required',
     'total_copies'=>'required',
     'available_copies'=>'required',
    ]);
    $books=Book::create($data);
    $books->save();
    return redirect('/admin/book')->with('success','');
  }
public function viewmember(){
    $members=Member::get();
    return view('admin.memberview',compact('members'));
}
public function librarianview(){
    $librarians=Librarian::get();
    return view('admin.librarianview',compact('librarians'));
}

public function librariancreate(){
    return view('admin.createlibrarian');
}
public function storelibrarian(){
    $data=request()->validate([
        'name'=>'required',
        'email'=>'required',
        'phone'=>'required'
    ]);
    $librarians=Librarian::create($data);
    $librarians->save();
    return redirect('/admin/librarian')->with('success','');
}
}
