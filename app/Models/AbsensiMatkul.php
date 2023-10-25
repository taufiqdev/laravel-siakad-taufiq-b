<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsensiMatkul extends Model
{
    use HasFactory;

    // 'schedule_id' => 'required|exists:schedules,id',
    // 'kode_absensi' => 'required',
    // 'tahun_akademik' => 'required',
    // 'semester' => 'required',
    // 'pertemuan' => 'required',
    // 'latitude' => 'required',
    // 'longitude' => 'required',
    protected $fillable = [
        'schedule_id',
        'student_id',
        'kode_absensi',
        'tahun_akademik',
        'semester',
        'pertemuan',
        'latitude',
        'longitude',
        'created_by',
        'updated_by',
        'status'
    
    ];

    function schedule() 
    {
        return $this->belongsTo((Schedule::class));
        
    }

    function student() 
    {
        return $this->belongsTo((User::class));
        
    }

}
