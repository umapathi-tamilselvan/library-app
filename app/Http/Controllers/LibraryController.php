<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Member;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BorrowedRecord;
use App\Models\Librarian;


class LibraryController extends Controller
{
  public function index(){
    return view('admin.admin');
  }

public function viewmember(){
    $members=User::get();
    return view('admin.memberview',compact('members'));
}

}
