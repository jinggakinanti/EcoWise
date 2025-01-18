<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Category as CategoryModel;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $type = ['Personal Care', 'Household', 'Reusable'
                ];

        for($i = 0; $i < 3; $i++){
            CategoryModel::create([
                'type' => $type[$i]
            ]);
        }
    }
}
