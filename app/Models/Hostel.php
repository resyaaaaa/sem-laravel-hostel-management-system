<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Hostel extends Model
{
    /** @use HasFactory<\Database\Factories\HostelFactory> */
    use HasFactory;

    protected $fillable = [
        'hostel_name',
        'current_no_of_rooms',
        'no_of_rooms',
        'no_of_students',
    ];

    public function managers(): HasOne
    {
        return $this->hasOne(Manager::class);
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }
}
