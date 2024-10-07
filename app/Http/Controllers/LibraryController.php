<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Consumer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class LibraryController extends Controller
{
  public function index(){
    return view('admin.admin');
  }
  public function view(){
    $librarians=User::get();
    return view('admin.librarianview',compact('librarians'));
  }
  public function show(){

    $consumers=Consumer::get();
    return view('admin.consumerview',compact('consumers'));
  }
  public function viewbook(){
     $books=Book::get();
    return view('admin.book',compact('books'));
  }

  public function create(){
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
  public function showuser(){
    return view('admin.createuser');
  }
  public function adduser(Request $request){
    $request->validate([
       'name' => 'required',
    'email' => 'required|email|unique:users',
    'password' => 'required|min:8',
    ]);
    $user = new User();
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();
    return redirect('/admin/view')->with('success','');
  }
}
