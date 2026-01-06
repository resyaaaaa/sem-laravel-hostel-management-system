<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i < 7; $i++) {
            for ($j = 111; $j < 1110; $j += 111)
                Room::factory()->create(
                    ['hostel_id' => $i, 'room_no' => $j]
                );
        }
    }
}
