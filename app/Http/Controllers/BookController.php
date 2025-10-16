<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\books;
use App\Models\licenses;
use App\Models\publishers;
use App\Models\catagories;
use App\Models\languages;

class BookController extends Controller
{
    // แสดงฟอร์มเพิ่มหนังสือ
    public function create()
    {
        $licenses = licenses::all();
        $publishers = publishers::all();
        $catagories = catagories::all();
        $languages = languages::all();

        return view('add-book', compact('licenses', 'publishers', 'catagories', 'languages'));
    }

    // บันทึกข้อมูลหนังสือ
    public function store(Request $request)
{
    $validated = $request->validate([
        'Book_name' => 'required|string|max:255',
        'PublicationYear' => 'required|integer|between:1900,' . date('Y'),
        'License_id' => 'required|integer',
        'Publisher_id' => 'required|integer',
        'Catagory_id' => 'required|integer',
        'Language_id' => 'required|integer',
    ], [
        'PublicationYear.between' => 'กรุณากรอกปีให้ถูกต้อง',
        'PublicationYear.required' => 'กรุณากรอกปีพิมพ์',
    ]);

    books::create($validated);

    return redirect()->route('book.add')->with('success', 'เพิ่มหนังสือเรียบร้อยแล้ว!');
}

}

