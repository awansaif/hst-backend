<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'first_name' => 'Saif ur',
            'last_name'  => 'Rehman',
            'email'      => 'admin@admin.com',
            'about'      => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, maxime blanditiis eius totam doloribus iure harum odio atque esse aliquid voluptatem sapiente. Architecto blanditiis neque dignissimos dolor quae. Delectus, soluta.',
            'password'   => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'avatar_path' => 'images/avatar/1.jpg',
        ]);
    }
}
