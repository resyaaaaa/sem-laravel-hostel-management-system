<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Manager extends Model
{
    /** @use HasFactory<\Database\Factories\ManagerFactory> */
    use HasFactory;

    protected $fillable = [
        'hostel_id',
        'user_id',
    ];

    public function hostel()
{
    return $this->belongsTo(Hostel::class, 'hostel_id');
}


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
