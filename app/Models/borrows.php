<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Borrow
 * @package App\Models
 *
 * Represents the 'borrows' table, tracking book borrowing transactions.
 */
class borrows extends Model
{
    // 1. ตารางที่เชื่อมโยง (Table Name)
    protected $table = 'borrows'; 

    // 2. Primary Key
    protected $primaryKey = 'Borrow_id'; 

    // 3. ปิดการใช้งาน Timestamps
    public $timestamps = false; 
    
    // 4. คอลัมน์ที่อนุญาตให้ Mass Assignment ได้
    protected $fillable = [
        'Borrow_date',
        'status_',  // 0 = ยืม, 1 = คืน
        'User_id',
        'Book_id',
    ];

    // 5. การกำหนดชนิดข้อมูล (Casts)
    protected $casts = [
        'Borrow_date' => 'date',
        'status_' => 'int',
    ];

    // --- Relationships (BelongsTo) ---

    /**
     * ความสัมพันธ์ไปยังตาราง users
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(users::class, 'User_id');
    }

    /**
     * ความสัมพันธ์ไปยังตาราง books
     * @return BelongsTo
     */
    public function book(): BelongsTo
    {
        return $this->belongsTo(books::class, 'Book_id');
    }
}
