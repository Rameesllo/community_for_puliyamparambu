<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a default admin for development purposes
        Admin::firstOrCreate(
            ['email' => 'puliyamparambu.org'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );
    }
}
