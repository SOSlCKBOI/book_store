<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class User
 * @package App\Models
 *
 * Represents the 'Users' table and establishes relationships with all master tables.
 */
class users extends Model
{
    // 1. ตารางที่เชื่อมโยง (Table Name)
    protected $table = 'Users'; 

    // 2. Primary Key
    // กำหนดให้ Eloquent รู้ว่า Primary Key คือ 'User_id'
    protected $primaryKey = 'User_id'; 

    // 3. ปิดการใช้งาน Timestamps
    // ตาราง SQL ไม่มีคอลัมน์ created_at และ updated_at
    public $timestamps = false; 
    
    // 4. คอลัมน์ที่อนุญาตให้ Mass Assignment ได้
    protected $fillable = [
        'User_name',
        'Birth_date',
        // Foreign Keys
        'Faite_id',
        'job_id',
        'prefix_id',
        'provice_id',
        'suppro_id',
        'district_id',
    ];

    // 5. การกำหนดชนิดข้อมูล (Casts)
    protected $casts = [
        'Birth_date' => 'date',
    ];


    // --- RELATIONSHIPS (ความสัมพันธ์ BelongsTo) ---

    /**
     * ความสัมพันธ์กับตาราง Faites (Task Status/Type)
     * @return BelongsTo
     */
    public function faite(): BelongsTo
    {
        return $this->belongsTo(faites::class, 'Faite_id');
    }

    /**
     * ความสัมพันธ์กับตาราง jobs (ตำแหน่งงาน)
     * @return BelongsTo
     */
    public function job(): BelongsTo
    {
        return $this->belongsTo(jobs::class, 'job_id');
    }

    /**
     * ความสัมพันธ์กับตาราง prefixes (คำนำหน้าชื่อ)
     * @return BelongsTo
     */
    public function prefix(): BelongsTo
    {
        return $this->belongsTo(prefixs::class, 'prefix_id');
    }

    /**
     * ความสัมพันธ์กับตาราง provinces (จังหวัดหลัก)
     * @return BelongsTo
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(provices::class, 'provice_id');
    }
    
    /**
     * ความสัมพันธ์กับตาราง supprovices (จังหวัดย่อย/ข้อมูลพื้นที่รอง)
     * @return BelongsTo
     */
    public function supprovice(): BelongsTo
    {
        return $this->belongsTo(supprovices::class, 'suppro_id');
    }

    /**
     * ความสัมพันธ์กับตาราง districts (อำเภอ/เขต)
     * @return BelongsTo
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(districts::class, 'district_id');
    }

    public function borrows(): HasMany
    {
        // Province has many Supprovices, using 'Provice_id' as the FK 
        // in the 'supprovices' table.
        return $this->hasMany(borrows::class);
    }
}
