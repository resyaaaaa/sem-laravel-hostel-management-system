<?php

namespace Database\Seeders;

use App\Models\Hostel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HostelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $hostels = [
            ['hostel_name' => 'A'],
            ['hostel_name' => 'B'],
            ['hostel_name' => 'C'],
            ['hostel_name' => 'D'],
            ['hostel_name' => 'E'],
            ['hostel_name' => 'F'],
        ];

        foreach ($hostels as $hostel) {
            Hostel::factory()->create($hostel);
        }
    }
}
