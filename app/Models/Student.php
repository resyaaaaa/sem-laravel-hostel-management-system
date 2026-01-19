<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = [
        'user_id',
        'room_id',
        'hostel_id',
        'dept',
        'year_of_study',
    ];

    public function applications(): HasOne
    {
        return $this->hasOne(Application::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function room(){
        return $this->belongsTo(Room::class,'room_id');
    }

    public function hostel(){
        return $this->belongsTo(Hostel::class);
    }
}
