<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Consumer;
use Illuminate\Http\Request;

class ConsumerController extends Controller
{


    Public function view(){

        $librarian=auth()->user();

        $consumers=Consumer::where('librarian_id',$librarian->id)->get();
        return view('librarian.consumerview',compact('consumers'));
    }
    public function create()
    {
        $librarians = User::all();
        $books = Book::all();
        return view('librarian.consumer_create', compact('librarians', 'books'));
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'librarian_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'nullable|date',
            'due_date' => 'nullable|date|after:borrowed_at',
            'returned_at' => 'nullable|date|after:due_date',
        ]);

        $consumers=Consumer::create($data);
        $consumers->save();

        return redirect('/home/consumer')->with('status', 'Consumer created successfully!');
    }
    public function show($id)
    {   $librarians = User::all();
        $books = Book::all();
        $consumer=Consumer::find($id);
        return view('librarian.consumeredit',compact('consumer','librarians','books'));
    }

   public function update( $id){
           $data = request()->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'librarian_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'nullable|date',
            'due_date' => 'nullable|date|after:borrowed_at',
            'returned_at' => 'nullable|date|before:due_date',
        ]);
        $consumers=Consumer::find($id);
        $consumers->update($data);
        return redirect('/home/consumer')->with('status','');
    }
    public function destroy($id){
        $consumers=Consumer::find($id);
        $consumers->delete();
        return redirect('/home/consumer')->with('status','');
    }

}

