<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@iris.com',
            'password' => Hash::make('Mangoman987'),
            'role' => 'admin', // Manually assign admin role
        ]);
        User::create([
            'name' => 'User',
            'email' => 'user@iris.com',
            'password' => Hash::make('Mangoman987'),
            'role' => 'user', // Manually assign admin role
        ]);
    }
}
