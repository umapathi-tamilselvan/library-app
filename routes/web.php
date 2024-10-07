<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\ConsumerController;
use App\Http\Controllers\LibrarianController;

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
    Route::get('/admin/view',[LibraryController::class,'view']);
    Route::get('/admin/consumer',[LibraryController::class,'show']);
    Route::get('/admin/book',[LibraryController::class,'viewbook']);
    Route::get('/admin/book/create',[LibraryController::class,'create']);
    Route::post('/admin/book',[LibraryController::class,'store']);
    Route::get('/admin/user/create',[LibraryController::class,'showuser']);
    Route::post('/admin/user/create',[LibraryController::class,'adduser']);
});

Route::get('/home', [LibrarianController::class, 'index'])->name('home');
Route::get('/home/books/manage', [LibrarianController::class,'view']);

Route::get('/home/consumer',[ConsumerController::class,'view']);
Route::get('/home/consumer/create',[ConsumerController::class,'create']);
Route::post('/home/consumer',[ConsumerController::class,'store']);
Route::get('/home/consumer/{id}/edit',[ConsumerController::class,'show']);
Route::post('/home/consumer/{id}',[ConsumerController::class,'update']);
Route::delete('/home/consumer/{id}/delete',[ConsumerController::class,'destroy']);
