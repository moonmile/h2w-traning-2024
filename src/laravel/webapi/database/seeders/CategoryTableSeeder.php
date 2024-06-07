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
            'slug' => 'special1',
            'title' => '今月のお薦め',
            'description' => '今月のお薦め商品を紹介します。',
            'image' => '',
            'sortid' => 1,
            'display' => true,
        ]);
        Category::create([
            'slug' => 'special2',
            'title' => 'ネット注文特別価格メニュー',
            'description' => ' ',
            'image' => '',
            'sortid' => 2,
            'display' => true,
        ]);
        Category::create([
            'slug' => 'special3',
            'title' => '限定メニュー',
            'description' => ' ',
            'image' => '',
            'sortid' => 3,
            'display' => true,
        ]);

        Category::create([
            'slug' => 'main1',
            'title' => 'メインメニュー',
            'description' => 'メインメニューのハンバーガーを紹介します。',
            'image' => '',
            'sortid' => 10,
            'display' => true,
        ]);
        Category::create([
            'slug' => 'main2',
            'title' => 'ハンバーガー',
            'description' => ' ',
            'image' => '',
            'sortid' => 11,
            'display' => true,
        ]);
        Category::create([
            'slug' => 'main3',
            'title' => 'ホットドック',
            'description' => ' ',
            'image' => '',
            'sortid' => 12,
            'display' => true,
        ]);
        Category::create([
            'slug' => 'main4',
            'title' => 'ソイパティ',
            'description' => ' ',
            'image' => '',
            'sortid' => 13,
            'display' => true,
        ]);



        Category::create([
            'slug' => 'sidemenu1',
            'title' => 'サイドメニュー',
            'description' => 'サイドメニューのポテトやドリンクを紹介します。',
            'image' => '',
            'sortid' => 20,
            'display' => true,
        ]);
        Category::create([
            'slug' => 'sidemenu2',
            'title' => 'ドリンク・スープ',
            'description' => ' ',
            'image' => '',
            'sortid' => 21,
            'display' => true,
        ]);
        Category::create([
            'slug' => 'sidemenu3',
            'title' => 'デザート',
            'description' => ' ',
            'image' => '',
            'sortid' => 22,
            'display' => true,
        ]);

    }
}
