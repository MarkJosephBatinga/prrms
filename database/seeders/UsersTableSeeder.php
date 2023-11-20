<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'user_type' => 'admin',
            'name' => 'Super Admin',
            'email' => '00000',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
        ]);
    }
}
