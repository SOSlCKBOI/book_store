<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Job
 * @package App\Models
 *
 * Represents the 'jobs' table.
 */
class jobs extends Model
{
    // 1. ตารางที่เชื่อมโยง (Table Name)
    // Laravel จะเดาชื่อตารางเป็น 'jobs' จาก Model ชื่อ 'Job' แต่เรากำหนดชัดเจน
    protected $table = 'jobs'; 

    // 2. Primary Key
    // กำหนดให้ Eloquent รู้ว่า Primary Key คือ 'Job_id' ไม่ใช่ 'id'
    protected $primaryKey = 'Job_id'; 

    // 3. ปิดการใช้งาน Timestamps
    // ตาราง SQL ไม่มีคอลัมน์ created_at และ updated_at
    public $timestamps = false; 
    
    // 4. คอลัมน์ที่อนุญาตให้ Mass Assignment ได้
    protected $fillable = [
        'Job_name',
    ];

    // 5. การกำหนดชนิดข้อมูล (Casts)
    protected $casts = [
        //
    ];

    public function users(): HasMany
    {
        // กำหนดให้ชี้ไปที่ User::class และใช้ 'Faite_id' เป็น Foreign Key ในตาราง Users
        return $this->hasMany(users::class); 
    }
}
