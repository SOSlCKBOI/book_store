<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Faites
 * @package App\Models
 *
 * Represents the 'Faites' task table based on the new structure: Faite_id and Faite_name.
 */
class Faites extends Model
{
    // 1. ตารางที่เชื่อมโยง (Table Name)
    // แม้ว่า Laravel จะเดาจากชื่อ Model ได้ แต่เรากำหนดชัดเจนเพื่อป้องกันความผิดพลาด
    protected $table = 'faites'; 

    // 2. Primary Key
    // กำหนดให้ Eloquent รู้ว่า Primary Key คือ 'Faite_id'
    protected $primaryKey = 'Faite_id'; 

    // 3. ปิดการใช้งาน Timestamps
    // ตาราง SQL ใหม่ไม่มีคอลัมน์ created_at และ updated_at
    public $timestamps = false; 
    
    // 4. คอลัมน์ที่อนุญาตให้ Mass Assignment ได้
    protected $fillable = [
        'Faite_name',
    ];

    // 5. การกำหนดชนิดข้อมูล (Casts)
    // ไม่มีการ Cast ข้อมูลที่ซับซ้อนในตารางใหม่
    protected $casts = [
        //
    ];

    /**
     * ความสัมพันธ์: Faites หนึ่งรายการสามารถมี Users ได้หลายคน
     * (เชื่อมโยงผ่าน Faite_id ที่อยู่ในตาราง Users)
     *
     * @return HasMany
     */
    public function users(): HasMany
    {
        // กำหนดให้ชี้ไปที่ User::class และใช้ 'Faite_id' เป็น Foreign Key ในตาราง Users
        return $this->hasMany(users::class); 
    }
}
