<?php

namespace App\Http\Controllers;

use App\Models\Borrow;
use App\Models\User;

class LibraryController extends Controller
{
    public function index()
    {
        return view('admin.admin');
    }

    public function user()
    {
        $members = User::get();

        return view('admin.memberview', compact('members'));
    }

    public function borrow()
    {
        $borrowHistorys = Borrow::with(['user', 'book'])->get();

        return view('admin.borrowedhistory', compact('borrowHistorys'));
    }
}
