<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bookcontroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BorrowController;

Route::get('/', function () {
    return view('register');
});

Route::get('/login', [UserController::class, 'getlogin'])->name('login');
Route::post('/login', [UserController::class, 'tologin'])->name('login');

Route::get('/register', [UserController::class, 'getregister'])->name('register');
Route::post('/register', [UserController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [UserController::class, 'tologout'])->name('logout'); 
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('add-products',[Bookcontroller::class,'create']);
Route::post('add-products',[Bookcontroller::class,'store']);
Route::get('books',[Bookcontroller::class,'index']);
Route::get('/books/{id}/edit',[Bookcontroller::class,'edit']);
Route::put('update-books{id}',[Bookcontroller::class,'update']);
Route::resource('books', Bookcontroller::class); 

Route::get('/formpinjam/{book_id}', [BookController::class, 'formpinjam'])->name('formpinjam');
Route::get('/borrow', [BorrowController::class, 'index'])->name('borrow.index');
Route::post('/borrow', [BorrowController::class, 'store'])->name('borrow.store');
