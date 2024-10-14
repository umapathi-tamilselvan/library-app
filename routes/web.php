<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\UsersController;
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
    Route::get('/admin/member',[LibraryController::class,'viewmember']);
    Route::get('/admin/book',[BookController::class,'viewbook']);
    Route::get('/admin/book/create',[BookController::class,'createbook']);
    Route::post('/admin/book',[BookController::class,'store']);
});

Route::get('/home', [UserController::class, 'index'])->name('home');
Route::get('/home/books',[UserController::class,'bookview']);
Route::get('/home/borrow',[UserController::class,'borrowview']);



Route::post('/home', [BorrowController::class, 'store'])->name('borrow.store');




