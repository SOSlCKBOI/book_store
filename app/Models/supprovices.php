<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User;

/**
 * Class Supprovice
 * @package App\Models
 *
 * Represents the 'supprovices' table, which acts as a subordinate or related province/territory.
 */
class supprovices extends Model
{
    // 1. ตารางที่เชื่อมโยง (Table Name)
    protected $table = 'supprovices'; 

    // 2. Primary Key
    // กำหนดให้ Eloquent รู้ว่า Primary Key คือ 'Suppro_id'
    protected $primaryKey = 'Suppro_id'; 

    // 3. ปิดการใช้งาน Timestamps
    // ตาราง SQL ไม่มีคอลัมน์ created_at และ updated_at
    public $timestamps = false; 
    
    // 4. คอลัมน์ที่อนุญาตให้ Mass Assignment ได้
    protected $fillable = [
        'Suppro_name',
        'Provice_id', // Foreign Key ที่อนุญาตให้บันทึกได้
    ];

    /**
     * กำหนดความสัมพันธ์: Supprovice เป็นของ Province
     * เชื่อมต่อผ่านคอลัมน์ Provice_id ในตารางนี้
     *
     * @return BelongsTo
     */
    public function province(): BelongsTo
    {
        // Supprovice belongs to a Province, using 'Provice_id' as the FK
        return $this->belongsTo(provices::class, 'Provice_id');
    }

    public function districts(): HasMany
    {
        // Province has many Supprovices, using 'Provice_id' as the FK 
        // in the 'supprovices' table.
        return $this->hasMany(districts::class);
    }

    public function users(): HasMany
    {
        // Province has many Supprovices, using 'Provice_id' as the FK 
        // in the 'supprovices' table.
        return $this->hasMany(users::class);
    }
}
