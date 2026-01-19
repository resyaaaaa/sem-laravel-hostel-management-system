<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class HostelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('hostels')->insert([
            ['id' => 1, 'hostel_name' => 'A', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'hostel_name' => 'B', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'hostel_name' => 'C', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'hostel_name' => 'D', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'hostel_name' => 'E', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'hostel_name' => 'F', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
