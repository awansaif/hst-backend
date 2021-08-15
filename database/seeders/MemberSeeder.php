<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'name' => 'Saif ur Rehman',
            'avatar_path' => 'images/avatar/2.png',
        ]);
        Member::create([
            'name' => 'Talha Bin Saleem',
            'avatar_path' => 'images/avatar/3.png',
        ]);
        Member::create([
            'name' => 'Haider Ali',
            'avatar_path' => 'images/avatar/4.png',
        ]);
        Member::create([
            'name' => 'Humza Malik',
            'avatar_path' => 'images/avatar/5.png',
        ]);
    }
}
