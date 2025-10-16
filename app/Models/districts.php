<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class District
 * @package App\Models
 *
 * Represents the 'districts' table for geographical districts (Amphoe/Khet).
 */
class districts extends Model
{
    // 1. ตารางที่เชื่อมโยง (Table Name)
    protected $table = 'districts'; 

    // 2. Primary Key
    // กำหนดให้ Eloquent รู้ว่า Primary Key คือ 'district_id'
    protected $primaryKey = 'district_id'; 

    // 3. ปิดการใช้งาน Timestamps
    // ตาราง SQL ไม่มีคอลัมน์ created_at และ updated_at
    public $timestamps = false; 
    
    // 4. คอลัมน์ที่อนุญาตให้ Mass Assignment ได้
    protected $fillable = [
        'district_name',
        'Suppro_id', // Foreign Key
    ];

    // 5. การกำหนดชนิดข้อมูล (Casts)
    protected $casts = [
        //
    ];

    /**
     * กำหนดความสัมพันธ์: District เป็นของ Supprovice หนึ่งรายการ
     *
     * @return BelongsTo
     */
    public function supprovice(): BelongsTo
    {
        // District belongs to a Supprovice, using 'Suppro_id' as the FK
        return $this->belongsTo(supprovices::class, 'Suppro_id');
    }

    public function users(): HasMany
    {
        // Province has many Supprovices, using 'Provice_id' as the FK 
        // in the 'supprovices' table.
        return $this->hasMany(users::class);
    }
}
