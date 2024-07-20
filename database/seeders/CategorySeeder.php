<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => '創作活動']);
        Category::create(['name' => '民族染織']);
        Category::create(['name' => '伝統工芸']);
        Category::create(['name' => 'テキスタイルアート']);
    }
}
