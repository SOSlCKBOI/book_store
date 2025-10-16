<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Book
 * @package App\Models
 *
 * Represents the 'Books' table and its relationships to licenses, publishers, 
 * categories, and languages.
 */
class books extends Model
{
    // 1. ตารางที่เชื่อมโยง (Table Name)
    protected $table = 'Books'; 

    // 2. Primary Key
    // กำหนดให้ Eloquent รู้ว่า Primary Key คือ 'Book_id'
    protected $primaryKey = 'Book_id'; 

    // 3. ปิดการใช้งาน Timestamps
    // ตาราง SQL ไม่มีคอลัมน์ created_at และ updated_at
    public $timestamps = false; 
    
    // 4. คอลัมน์ที่อนุญาตให้ Mass Assignment ได้
    protected $fillable = [
        'Book_name',
        'PublicationYear',
        'License_id',
        'Publisher_id',
        'Catagory_id',
        'Language_id',
    ];

    // 5. การกำหนดชนิดข้อมูล (Casts)
    protected $casts = [
        'PublicationYear' => 'int',
    ];

    // --- Relationships (BelongsTo) ---

    /**
     * ความสัมพันธ์ไปยังตาราง licenses
     * @return BelongsTo
     */
    public function license(): BelongsTo
    {
        return $this->belongsTo(licenses::class, 'License_id');
    }

    /**
     * ความสัมพันธ์ไปยังตาราง publishers
     * @return BelongsTo
     */
    public function publisher(): BelongsTo
    {
        return $this->belongsTo(publishers::class, 'Publisher_id');
    }

    /**
     * ความสัมพันธ์ไปยังตาราง catagories
     * @return BelongsTo
     */
    public function catagory(): BelongsTo
    {
        return $this->belongsTo(catagories::class, 'Catagory_id');
    }

    /**
     * ความสัมพันธ์ไปยังตาราง languages
     * @return BelongsTo
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(languages::class, 'Language_id');
    }

    public function borrows(): HasMany
    {
        // Province has many Supprovices, using 'Provice_id' as the FK 
        // in the 'supprovices' table.
        return $this->hasMany(borrows::class);
    }
}
