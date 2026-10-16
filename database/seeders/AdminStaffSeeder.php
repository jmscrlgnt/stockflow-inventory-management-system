<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminStaffSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@stockflow.test'],
            [
                'name' => 'StockFlow Administrator',
                'password' => Hash::make('Admin@12345'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'staff@stockflow.test'],
            [
                'name' => 'StockFlow Staff',
                'password' => Hash::make('Staff@12345'),
                'role' => 'staff',
            ]
        );
    }
}