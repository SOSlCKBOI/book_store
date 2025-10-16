<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;
use App\Models\prefixs;
use App\Models\jobs;
use App\Models\provices;
use App\Models\supprovices;
use App\Models\districts;
use App\Models\faites;
class MemberController extends Controller
{
  public function create()
{
    // ดึงข้อมูล dropdown จากตารางที่เกี่ยวข้องทั้งหมด
    $prefixes = prefixs::all();
    $jobs = jobs::all();
    $faites = faites::all();
    $provinces = provices::all();
    $supprovinces = supprovices::all();
    $districts = districts::all();

    return view('register', compact('prefixes', 'jobs', 'faites', 'provinces', 'supprovinces', 'districts'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'User_name' => 'required|string|max:100',
            'Birth_date' => 'required|date',
            'Faite_id' => 'required|integer',
            'job_id' => 'required|integer',
            'prefix_id' => 'required|integer',
            'provice_id' => 'required|integer',
            'suppro_id' => 'required|integer',
            'district_id' => 'required|integer',
        ]);

        users::create($validated);

        return redirect()->route('register')->with('success', 'เพิ่มสมาชิกเรียบร้อยแล้ว!');
    }


}
