<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin123',
                'email' => 'admin@gmail.com',
                'password' => '123456789',
                'role' => 'Admin',
            ],
            [
                'name' => 'Manager123',
                'email' => 'manager@gmail.com',
                'password' => '123456789',
                'role' => 'Manager',
            ],
            [
                'name' => 'Student123',
                'email' => 'student@gmail.com',
                'password' => '123456789',
                'role' => 'Student',
            ],
            [
                'name' => 'Lucas',
                'email' => 'jvanfwk88@gmail.com',
                'password' => '123456789',
                'role' => 'Student',
            ],
        ];

        foreach ($users as $user) {
            User::factory()->create($user);
        }

        $this->call(HostelSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(ManagerSeeder::class);
        $this->call(StudentSeeder::class);
    }
}
