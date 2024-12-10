<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Array of users to seed
        $users = [
            [
                'username' => 'admin1',
                'password' => 'admin',
                'role' => 'Admin',
            ],
            [
                'username' => 'admin2',
                'password' => 'admin',
                'role' => 'Admin',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
