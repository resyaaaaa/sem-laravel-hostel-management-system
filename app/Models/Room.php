<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'hostel_id',
        'room_no',
        'allocated',
    ];

    public function hostel()
    {
        return $this->belongsTo(Hostel::class,'hostel_id');
    }

    public function student()
    {
        return $this->hasOne(Student::class, 'student_id');
    }

    public function scopeVacant($query)
    {
        return $query->where('allocated', false);
    }
}

