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
    Route::get('/user/view',[LibraryController::class,'view']);
    Route::get('/home/consumer',[LibraryController::class,'show']);
    Route::get('/home/book',[LibraryController::class,'viewbook']);
    Route::get('/home/book/create',[LibraryController::class,'create']);
    Route::post('/home/book',[LibraryController::class,'store']);
});

Route::get('/home', [LibrarianController::class, 'index'])->name('home');
Route::get('/home/consumer/create',[ConsumerController::class,'create']);
Route::post('/home/consumer',[ConsumerController::class,'store']);
