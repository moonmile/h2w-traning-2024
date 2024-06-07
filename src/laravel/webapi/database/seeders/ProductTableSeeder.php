<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductCategoryLink ;



class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sortid = 1;
        $products = [
            // Existing burger options...
            // ...

            // ハンバーガー
            [
                'slug' => 'burger1',
                'name' => 'モスバーガー',
                'description' => ' ',
                'image' => ' ',
                'price' => 440,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'burger2',
                'name' => 'モスチーズバーガー',
                'description' => ' ',
                'image' => ' ',
                'price' => 480,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'burger3',
                'name' => 'ダブルモスバーガー',
                'description' => ' ',
                'image' => ' ',
                'price' => 600,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'burger4',
                'name' => 'ダブルモスチーズバーガー',
                'description' => ' ',
                'image' => ' ',
                'price' => 640,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'burger5',
                'name' => 'スパイシーモスバーガー',
                'description' => ' ',
                'image' => ' ',
                'price' => 480,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'burger6',
                'name' => 'スパイシーモスチーズバーガー',
                'description' => ' ',
                'image' => ' ',
                'price' => 520,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'burger7',
                'name' => 'スパイシーダブルモスバーガー',
                'description' => ' ',
                'image' => ' ',
                'price' => 640,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'burger8',
                'name' => 'スパイシーダブルモスチーズバーガー',
                'description' => ' ',
                'image' => ' ',
                'price' => 640,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'burger9',
                'name' => 'テリヤキバーガー',
                'description' => ' ',
                'image' => ' ',
                'price' => 430,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'burger10',
                'name' => 'モス野菜バーガー',
                'description' => ' ',
                'image' => ' ',
                'price' => 440,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ホットドック
            [
                'slug' => 'hotdog1',
                'name' => 'ホットドッグ',
                'description' => ' ',
                'image' => ' ',
                'price' => 400,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'hotdog2',
                'name' => 'チリドッグ',
                'description' => ' ',
                'image' => ' ',
                'price' => 430,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'hotdog3',
                'name' => 'スパイシーチリドッグ',
                'description' => ' ',
                'image' => ' ',
                'price' => 470,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ソイパティ
            [
                'slug' => 'soiburger1',
                'name' => 'ソイモスバーガー',
                'description' => ' ',
                'image' => ' ',
                'price' => 460,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'soiburger2',
                'name' => 'ソイバーガー',
                'description' => ' ',
                'image' => ' ',
                'price' => 260,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'soiburger3',
                'name' => 'ソイチーズバーガー',
                'description' => ' ',
                'image' => ' ',
                'price' => 300,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // サイドメニュー
            [
                'slug' => 'side1',
                'name' => 'フレンチフライポテト',
                'description' => ' ',
                'image' => ' ',
                'price' => 240,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'side2',
                'name' => 'オニポテ（フレンチフライポテト＆オニオンフライ）',
                'description' => ' ',
                'image' => ' ',
                'price' => 300,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'side3',
                'name' => 'モスチキン',
                'description' => ' ',
                'image' => ' ',
                'price' => 320,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'side4',
                'name' => 'チキンナゲット',
                'description' => ' ',
                'image' => ' ',
                'price' => 360,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // ドリンク・スープ
            [
                'slug' => 'drink1',
                'name' => 'アイスコーヒー',
                'description' => ' ',
                'image' => ' ',
                'price' => 260,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'drink2',
                'name' => 'アイスティ',
                'description' => ' ',
                'image' => ' ',
                'price' => 260,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'drink3',
                'name' => 'ブレンドコーヒー',
                'description' => ' ',
                'image' => ' ',
                'price' => 290,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // デザート
            [
                'slug' => 'dessert1',
                'name' => 'ひんやりドルチェ 葛 ベリー',
                'description' => ' ',
                'image' => ' ',
                'price' => 260,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'slug' => 'dessert1',
                'name' => 'ひんやりドルチェ 葛 トロピカル',
                'description' => ' ',
                'image' => ' ',
                'price' => 260,
                'sortid' => $sortid ++, 
                'display' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        $productCategoryLink = [
            // メインメニュー
            [ 'category_id' => 4, 'product_id' => 1, ],         
            [ 'category_id' => 4, 'product_id' => 11, ],        
            [ 'category_id' => 4, 'product_id' => 14, ],        
            // ハンバーガー
            [ 'category_id' => 5, 'product_id' => 1, ],
            [ 'category_id' => 5, 'product_id' => 2, ],
            [ 'category_id' => 5, 'product_id' => 3, ],
            [ 'category_id' => 5, 'product_id' => 4, ],
            [ 'category_id' => 5, 'product_id' => 5, ],
            [ 'category_id' => 5, 'product_id' => 6, ],
            [ 'category_id' => 5, 'product_id' => 7, ],
            [ 'category_id' => 5, 'product_id' => 8, ],
            [ 'category_id' => 5, 'product_id' => 9, ],
            [ 'category_id' => 5, 'product_id' => 10, ],
            // ホットドック
            [ 'category_id' => 6, 'product_id' => 11, ],
            [ 'category_id' => 6, 'product_id' => 12, ],
            [ 'category_id' => 6, 'product_id' => 13, ],
            // ソイパティ
            [ 'category_id' => 7, 'product_id' => 14, ],
            [ 'category_id' => 7, 'product_id' => 15, ],
            [ 'category_id' => 7, 'product_id' => 16, ],
            // サイドメニュー
            [ 'category_id' => 8, 'product_id' => 17, ],
            [ 'category_id' => 8, 'product_id' => 18, ],
            [ 'category_id' => 8, 'product_id' => 19, ],
            [ 'category_id' => 8, 'product_id' => 20, ],
            // ドリンク・スープ
            [ 'category_id' => 9, 'product_id' => 21, ],
            [ 'category_id' => 9, 'product_id' => 22, ],
            [ 'category_id' => 9, 'product_id' => 23, ],
            // デザート
            [ 'category_id' => 10, 'product_id' => 24, ],
            [ 'category_id' => 10, 'product_id' => 25, ],
        ];
        foreach ($productCategoryLink as $link) {
            ProductCategoryLink::create($link);
        }
    }
}
