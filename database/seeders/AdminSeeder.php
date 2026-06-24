<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        // Buat role Admin jika belum ada
        $role = Role::firstOrCreate(['name' => 'Admin']);

        // Buat user Admin
        User::updateOrCreate(
            ['email' => 'admin@arini.com'],
            [
                'name' => 'Administrator',
                'password' => 'password123',
                'role_id' => $role->id,
            ]
        );
    }
}
