<?php

use App\Models\Color;
use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Kırmızı',
                'hexCode' => '#FF0000',
                'order' => 2
            ],
            [
                'name' => 'Beyaz',
                'hexCode' => '#FFFFFF',
                'order' => 1
            ],
            [
                'name' => 'Siyah',
                'hexCode' => '#000000',
                'order' => 0
            ]
        ];

        foreach ($data as $item)
            Color::create($item);
    }
}
