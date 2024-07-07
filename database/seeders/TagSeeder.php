<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    public function run()
    {
        Tag::create(['name' => 'タグ1']);
        Tag::create(['name' => 'タグ2']);
        Tag::create(['name' => 'タグ3']);
    }
}
