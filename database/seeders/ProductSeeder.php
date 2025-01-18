<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Factory as Faker;
use App\Models\Product as ProductModel;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        $name = ['Natural Cotton Make Up Remover', 'Plant Based Vegan Soap', 'Natural Bath Pouf', 'Bamboo Based Toothbrush',
                'Linen Kitchen Sponge', 'Wooden Spoon', 'Beeswax Wraps', 'Eco Dish Brush',
                'Reusable Shopping Bag', 'Reusable Water Bottle PINK', 'Reusable Water Bottle GREEN', 'Bamboo Paper Straws'
        ];

        $price = [
            25000, 25000, 20000, 20000,
            15000, 50000, 60000, 35000,
            20000, 150000, 150000, 25000
        ];

        $desc = [
            'Soft and reusable cotton pads, perfect for gently removing makeup while being kind to the environment.',
            'A nourishing soap made from plant-based ingredients, ideal for sensitive skin and free of harmful chemicals.',
            'A biodegradable bath pouf made from natural fibers to exfoliate your skin gently and sustainably.',
            'An eco-friendly toothbrush with a bamboo handle and soft bristles, reducing plastic waste in oral care.',
            'Durable and biodegradable linen sponges for effective cleaning without harming the planet.',
            'A stylish and sturdy wooden spoon, perfect for cooking or serving, made from sustainably sourced materials.',
            'Reusable food wraps made from organic cotton and beeswax, a natural alternative to plastic wrap.',
            'A versatile dish brush with a wooden handle and natural bristles for an eco-friendly way to clean your dishes.',
            'A durable and foldable shopping bag, ideal for carrying groceries and reducing single-use plastic bags.',
            'A stylish, eco-friendly water bottle in a vibrant pink color to keep you hydrated on the go.',
            'A sleek, sustainable water bottle in a calming green shade, perfect for everyday use.',
            'Eco-friendly and biodegradable bamboo paper straws, a sustainable choice for sipping your favorite beverages.'
        ];

        $category_id = [
            1, 1, 1, 1,
            2, 2, 2, 2,
            3, 3, 3, 3
        ];

        for($i = 0; $i < 12; $i++){
            ProductModel::create([
                'name' => $name[$i],
                'price' => $price[$i],
                'desc' => $desc[$i],
                'stock' => 20,
                'sold' => $faker->numberBetween(5, 75),
                'image' => $i+1,
                'category_id'=> $category_id[$i]
            ]);
        }

    }
}
