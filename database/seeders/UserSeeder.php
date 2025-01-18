<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User as UserModel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserModel::create([
            'name' => 'admin',
            'address' => 'Binus',
            'phone' => '08123456789',
            'email' => 'admin@gmail.com',
            'password' => 'admin123',
            'earth_star' => 0,
        ]);
    }
}
