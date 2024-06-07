<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductRecommendation;

class ProductRecommendationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            ['store_id' => 1, 'store_sort' => 1, 'product_id' => 1, 'image' => ' ', 'description' => '今月のお薦め商品です。', 'display' => true],
            ['store_id' => 1, 'store_sort' => 2, 'product_id' => 10, 'image' => ' ', 'description' => '今月のお薦め商品です。', 'display' => true],
            ['store_id' => 1, 'store_sort' => 3, 'product_id' => 11, 'image' => ' ', 'description' => '今月のお薦め商品です。', 'display' => true],

            ['store_id' => 2, 'store_sort' => 1, 'product_id' => 1, 'image' => ' ', 'description' => '今月のお薦め商品です。', 'display' => true],
            ['store_id' => 2, 'store_sort' => 2, 'product_id' => 14, 'image' => ' ', 'description' => '今月のお薦め商品です。', 'display' => true],
            ['store_id' => 2, 'store_sort' => 3, 'product_id' => 11, 'image' => ' ', 'description' => '今月のお薦め商品です。', 'display' => true],

            ['store_id' => 3, 'store_sort' => 1, 'product_id' => 2, 'image' => ' ', 'description' => '今月のお薦め商品です。', 'display' => true],

        ];


        foreach ($items as $item) {
            ProductRecommendation::create($item);
        }
        //
    }
}
