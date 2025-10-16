<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Province
 * @package App\Models
 *
 * Represents the 'provices' table for geographical provinces.
 */
class provices extends Model
{
    // 1. ตารางที่เชื่อมโยง (Table Name)
    protected $table = 'provices'; 

    // 2. Primary Key
    // กำหนดให้ Eloquent รู้ว่า Primary Key คือ 'Provice_id'
    protected $primaryKey = 'Provice_id'; 

    // 3. ปิดการใช้งาน Timestamps
    // ตาราง SQL ไม่มีคอลัมน์ created_at และ updated_at
    public $timestamps = false; 
    
    // 4. คอลัมน์ที่อนุญาตให้ Mass Assignment ได้
    protected $fillable = [
        'Provice_name',
    ];

    // 5. การกำหนดชนิดข้อมูล (Casts)
    protected $casts = [
        //
    ];

    /**
     * กำหนดความสัมพันธ์: Province มี Supprovices ได้หลายรายการ
     *
     * @return HasMany
     */
    public function supprovices(): HasMany
    {
        // Province has many Supprovices, using 'Provice_id' as the FK 
        // in the 'supprovices' table.
        return $this->hasMany(supprovices::class, 'Provice_id');
    }

    public function users(): HasMany
    {
        // Province has many Supprovices, using 'Provice_id' as the FK 
        // in the 'supprovices' table.
        return $this->hasMany(users::class);
    }
}
