<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome'); // หน้าเริ่มต้น
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

// =======================
// สมาชิก (Member)
// =======================
// ฟอร์มสมัครสมาชิก
Route::get('/register', [MemberController::class, 'create'])->name('member.register');
// บันทึกสมาชิกใหม่
Route::post('/register', [MemberController::class, 'store'])->name('member.store');

// Dynamic Dropdown
Route::get('/districts/{province_id}', [MemberController::class, 'getDistricts']);
Route::get('/subdistricts/{district_id}', [MemberController::class, 'getSubdistricts']);

// =======================
// หนังสือ (Book)
// =======================
// ฟอร์มเพิ่มหนังสือ
Route::get('/books/create', [BookController::class, 'create'])->name('book.add');
// บันทึกหนังสือใหม่
Route::post('/books/create', [BookController::class, 'store'])->name('book.store');

// =======================
// ยืม-คืน (Borrow)
// =======================
// ฟอร์มยืม-คืน
Route::get('/borrow-return', [BorrowController::class, 'index'])->name('borrow.return');
// บันทึกยืม/คืน
Route::post('/borrow-return', [BorrowController::class, 'store'])->name('borrow.store');