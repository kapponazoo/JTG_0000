<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'カテゴリ1']);
        Category::create(['name' => 'カテゴリ2']);
        Category::create(['name' => 'カテゴリ3']);
    }
}
