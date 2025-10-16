<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\books;
use App\Models\borrows;

class BorrowController extends Controller
{
    // แสดง form
    public function index()
    {
        $users = users::all();   // ข้อมูลสมาชิก
        $books = books::all();   // ข้อมูลหนังสือ

        return view('borrow-return', compact('users', 'books'));
    }

    // บันทึกยืม/คืน
    public function store(Request $request)
{
    $validated = $request->validate([
        'User_id' => 'required|integer',
        'Book_id' => 'required|integer',
        'status_' => 'required|in:0,1', // 0=ยืม, 1=คืน
    ]);

    // แปลง status_ เป็น int แน่นอน
    $validated['status_'] = (int) $validated['status_'];

    $validated['Borrow_date'] = now(); // วันที่ปัจจุบัน

    borrows::create($validated);

    return redirect()->route('borrow.return')->with('success', 'บันทึกข้อมูลเรียบร้อยแล้ว!');
}

}
