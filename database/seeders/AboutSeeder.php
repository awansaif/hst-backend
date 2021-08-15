<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        About::create([
            'about_text' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dolorum illo illum ad repellat fugit nulla, rerum magni assumenda minima nam dolorem voluptatem ut laudantium optio accusamus iure aut doloremque?'
        ]);
    }
}
