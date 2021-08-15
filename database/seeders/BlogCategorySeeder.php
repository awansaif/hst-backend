<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class BlogCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'title' => 'Fashion',
            'slug' => 'fashion',
        ]);
        Category::create([
            'title' => 'Lifestyle',
            'slug' => 'lifestyle',
        ]);
        Category::create([
            'title' => 'Beauty',
            'slug' => 'beauty',
        ]);
        Category::create([
            'title' => 'Travel',
            'slug' => 'travel',
        ]);
        Category::create([
            'title' => 'Photograph',
            'slug' => 'photograph',
        ]);
    }
}
