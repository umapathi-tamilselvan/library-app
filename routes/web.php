<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::middleware(['is_admin'])->group(function () {
    Route::get('/home/admin', [LibraryController::class, 'index'])->name('home.admin');
    Route::get('/user',[LibraryController::class,'user']);
    Route::get('/borrowedhistory',[LibraryController::class,'borrow']);
    Route::post('/borrowedhistory/return', [BorrowController::class, 'returnBook'])->name('return.book');


    Route::get('/book',[BookController::class,'viewbook']);
    Route::get('/book/create',[BookController::class,'createbook']);
    Route::post('/book',[BookController::class,'store']);
    Route::delete('/book/delete/{id}', [BookController::class, 'destroy'])->name('book.delete');


});

Route::get('/home', [UserController::class, 'index'])->name('home');
Route::get('/books',[UserController::class,'bookview']);
Route::get('/borrow',[UserController::class,'borrowview']);



Route::post('/borrow', [BorrowController::class, 'store'])->name('borrow.store');
Route::get('/borrowhistory',[BorrowController::class,'index']);



