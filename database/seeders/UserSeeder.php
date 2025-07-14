<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@mail.com',
                'password' => 'admin123', // TANPA bcrypt
                'role' => 'admin',
            ],
            [
                'name' => 'User Biasa',
                'email' => 'user@mail.com',
                'password' => 'user123', // TANPA bcrypt
                'role' => 'user',
            ],
        ]);
    }
}
