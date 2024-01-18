<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
            'name' => 'Admin user',
            'surname' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
            'status' => 'active',
            'password' => bcrypt('test1234'),
            'image' => 'https://cdn3.iconfinder.com/data/icons/logos-brands-3/24/logo_brand_brands_logos_linux-512.png',
            'phone' => '123456789',
            ],
            [
                'name' => 'Vendor user',
                'surname' => 'vendor',
                'email' => 'vendor@example.com',
                'role' => 'vendor',
                'status' => 'active',
                'password' => bcrypt('test1234'),
                'image' => 'https://cdn1.iconfinder.com/data/icons/business-456/500/processing-512.png',
                'phone' => '123456789',
            ],
            [
                'name' => 'User',
                'surname' => 'user',
                'email' => 'user@example.com',
                'role' => 'user',
                'status' => 'active',
                'password' => bcrypt('test1234'),
                'image' => 'https://cdn0.iconfinder.com/data/icons/small-n-flat/24/678130-profile-alt-4-512.png',
                'phone' => '123456789',
            ]
        ]);
    }
}
