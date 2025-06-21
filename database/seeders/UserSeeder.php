<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'User Paid',
                'email' => 'paid@example.com',
                'password' => Hash::make('password'),
                'status' => 'paid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User Unpaid',
                'email' => 'unpaid@example.com',
                'password' => Hash::make('password'),
                'status' => 'unpaid',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
