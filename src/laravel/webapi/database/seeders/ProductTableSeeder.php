<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;



class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            // Existing burger options...
            // ...

            // Add more burger options here...
            [
                'slug' => 'burger',
                'name' => 'ハンバーガー',
                'description' => 'Description of Burger 5',
                'image' => 'https://example.com/burger5.jpg',
                'price' => 9.99,
                'sortid' => 5,
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'is_delete' => false,
            ],
            [
                'slug' => 'burger2',
                'name' => 'チーズバーガー',
                'description' => 'Description of Burger 6',
                'image' => 'https://example.com/burger6.jpg',
                'price' => 10.99,
                'sortid' => 6,
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'is_delete' => false,
            ],
            // Add more burger options here...
            [
                'slug' => 'burger3',
                'name' => 'チキンバーガー',
                'description' => 'Description of Burger 14',
                'image' => 'https://example.com/burger14.jpg',
                'price' => 15.99,
                'sortid' => 14,
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
                'is_delete' => false,
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
