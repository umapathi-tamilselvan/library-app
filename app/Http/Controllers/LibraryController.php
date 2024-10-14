<?php

namespace App\Http\Controllers;


use App\Models\User;

use App\Http\Controllers\Controller;



class LibraryController extends Controller
{
  public function index(){
    return view('admin.admin');
  }

public function user(){
    $members=User::get();
    return view('admin.memberview',compact('members'));
}
public function borrow(){
    $borrowHistorys = User::with('borrowedBooks')->get();
    return view('admin.borrowedhistory', compact('borrowHistorys'));
}
}
