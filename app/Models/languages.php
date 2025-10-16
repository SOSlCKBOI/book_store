<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Language
 * @package App\Models
 *
 * Represents the 'languages' table for storing language references.
 */
class languages extends Model
{
    // 1. ตารางที่เชื่อมโยง (Table Name)
    protected $table = 'languages'; 

    // 2. Primary Key
    // กำหนดให้ Eloquent รู้ว่า Primary Key คือ 'language_id'
    protected $primaryKey = 'Language_id'; 

    // 3. ปิดการใช้งาน Timestamps
    // ตาราง SQL ไม่มีคอลัมน์ created_at และ updated_at
    public $timestamps = false; 
    
    // 4. คอลัมน์ที่อนุญาตให้ Mass Assignment ได้
    protected $fillable = [
        'Language_name',
    ];

    // 5. การกำหนดชนิดข้อมูล (Casts)
    protected $casts = [
        //
    ];

    public function books(): HasMany
    {
        // Province has many Supprovices, using 'Provice_id' as the FK 
        // in the 'supprovices' table.
        return $this->hasMany(books::class);
    }
}
