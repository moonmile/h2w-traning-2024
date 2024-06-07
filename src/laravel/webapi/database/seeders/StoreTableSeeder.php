<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Store;
use App\Models\StoreProductLink ;


class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $stores = [
            ['id' => 1, 'name' => '秋葉原店', 'address' => ' '],
            ['id' => 2, 'name' => '東京店', 'address' => ' '],
            ['id' => 3, 'name' => '池袋店', 'address' => ' '],
            ['id' => 4, 'name' => '東武練馬店', 'address' => ' '],
            ['id' => 5, 'name' => '札幌店', 'address' => ' '],
        ];
        foreach ($stores as $store) {
            Store::create($store);
        }

        $storeProductLink = [
            ['store_id' => 1, 'product_id' => 1, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 2, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 3, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 4, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 5, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 6, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 7, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 8, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 9, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 10, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 11, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 12, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 13, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 14, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 15, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 16, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 17, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 18, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 19, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 20, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 21, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 22, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 23, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 24, 'stock' => 10],
            ['store_id' => 1, 'product_id' => 25, 'stock' => 10],

            ['store_id' => 2, 'product_id' => 1, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 2, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 3, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 4, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 5, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 6, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 7, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 8, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 9, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 10, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 11, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 12, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 13, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 14, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 15, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 16, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 17, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 18, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 19, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 20, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 21, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 22, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 23, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 24, 'stock' => 10],
            ['store_id' => 2, 'product_id' => 25, 'stock' => 10],

            ['store_id' => 3, 'product_id' => 1, 'stock' => 10],
            ['store_id' => 3, 'product_id' => 2, 'stock' => 10],
            ['store_id' => 3, 'product_id' => 3, 'stock' => 10],
            ['store_id' => 3, 'product_id' => 4, 'stock' => 10],
            ['store_id' => 3, 'product_id' => 5, 'stock' => 10],
            ['store_id' => 3, 'product_id' => 6, 'stock' => 10],
            ['store_id' => 3, 'product_id' => 7, 'stock' => 10],
            ['store_id' => 3, 'product_id' => 8, 'stock' => 10],
            ['store_id' => 3, 'product_id' => 9, 'stock' => 10],
            ['store_id' => 3, 'product_id' => 10, 'stock' => 10],
        ];
        foreach ($storeProductLink as $link) {
            StoreProductLink::create($link);
        }

    }
}
