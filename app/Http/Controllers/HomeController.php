<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // คำสั่งนี้จะค้นหาไฟล์ที่ชื่อ 'Home.blade.php'
        // โดยไม่ต้องใส่ .blade.php
        return view('home');

    }
}