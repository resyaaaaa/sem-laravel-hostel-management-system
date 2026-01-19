<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'id' => 'CA12345',
                'user_id' => '3',
                'hostel_id' => 1,
                'room_id' => 1,
                'dept' => 'FTKEE',
                'year_of_study' => '2',
            ],
            [
                'id' => 'CB22083',
                'user_id' => '4',
                'hostel_id' => 1,
                'room_id' => 1,
                'dept' => 'FKOM',
                'year_of_study' => '4',
            ]
        ];

        foreach ($students as $student) {
            Student::factory()->create($student);
        }
    }
}
