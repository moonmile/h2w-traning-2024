<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'slug' => 'special',
            'title' => '今月のお薦め',
            'description' => '今月のお薦め商品を紹介します。',
            'image' => '',
            'sortid' => 1,
            'display' => true,
            'is_delete' => false,
        ]);
        Category::create([
            'slug' => 'main',
            'title' => 'メインメニュー',
            'description' => 'メインメニューのハンバーガーを紹介します。',
            'image' => '',
            'sortid' => 2,
            'display' => true,
            'is_delete' => false,
        ]);
        Category::create([
            'slug' => 'sidemenu',
            'title' => 'サイドメニュー',
            'description' => 'サウドメニューのポテトやドリンクを紹介します。',
            'image' => '',
            'sortid' => 3,
            'display' => true,
            'is_delete' => false,
        ]);
    }
}
