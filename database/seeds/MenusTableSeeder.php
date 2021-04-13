<?php

use App\Models\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Menu::create([
            'page_id' => 1,
                'order' => 0,
                'location' => 'header',
                'status' => 1
        ]);

        Menu::create([
            'page_id' => 2,
            'order' => 1,
            'location' => 'header',
            'status' => 1
        ]);

        Menu::create([
            'page_id' => 3,
            'order' => 2,
            'location' => 'header',
            'status' => 1
        ]);

        Menu::create([
            'page_id' => 3,
            'order' => 2,
            'location' => 'header',
            'status' => 1
        ]);
        Menu::create([
            'page_id' => 1,
            'order' => 0,
            'location' => 'footer',
            'status' => 1
        ]);
        Menu::create([
            'page_id' => 3,
            'order' => 1,
            'location' => 'header',
            'status' => 1
        ]);


    }
}
