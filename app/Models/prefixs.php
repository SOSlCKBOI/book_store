<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Prefix
 * @package App\Models
 *
 * Represents the 'prefixs' table, used for titles (Mr., Mrs., etc.).
 */
class prefixs extends Model
{
    // 1. ตารางที่เชื่อมโยง (Table Name)
    // เรากำหนดชื่อตารางเป็น 'prefixs'
    protected $table = 'prefixs'; 

    // 2. Primary Key
    // กำหนดให้ Eloquent รู้ว่า Primary Key คือ 'Prefix_id'
    protected $primaryKey = 'Prefix_id'; 

    // 3. ปิดการใช้งาน Timestamps
    // ตาราง SQL ไม่มีคอลัมน์ created_at และ updated_at
    public $timestamps = false; 
    
    // 4. คอลัมน์ที่อนุญาตให้ Mass Assignment ได้
    protected $fillable = [
        'Prefix_name',
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
