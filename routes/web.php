<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/borrow-return', [BorrowController::class, 'index'])->name('borrow.return');
Route::get('/register', [MemberController::class, 'create'])->name('member.register');
Route::get('/books/create', [BookController::class, 'create'])->name('book.add');
