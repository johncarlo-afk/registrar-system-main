<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create a test admin user
        $admin = User::create([
            'name' => 'Carlo',
            'email' => 'lildransckie15@gmail.com',
            'password' => Hash::make('admin123'),
        ]);
        $admin->assignRole('admin'); // 👈 Assign role

        // Create a test student user
        $student = User::create([
            'name' => 'Student User',
            'email' => 'student@example.com',
            'password' => Hash::make('password'),
        ]);
        $student->assignRole('student'); // 👈 Assign role
    }
}
