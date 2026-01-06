<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Room extends Model
{
    /** @use HasFactory<\Database\Factories\RoomFactory> */
    use HasFactory;

    protected $fillable = [
        'hostel_id',
        'room_no',
        'allocated',
    ];

    public function hostel(): BelongsTo
    {
        return $this->belongsTo(related: Hostel::class);
    }

    public function students(): HasOne
    {
        return $this->hasOne(Student::class);
    }

    public function applications(): HasOne
    {
        return $this->hasOne(Application::class);
    }
}
