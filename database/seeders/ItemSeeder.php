<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'code' => 'DRONEMDELA',
                'name' => 'Drone Model A',
                'description' => 'High-quality drone with advanced features',
                'quantity' => 50,
                'minimum_stock' => 10,
            ],
            [
                'code' => 'CMRMDULXYZ',
                'name' => 'Camera Module XYZ',
                'description' => 'High-resolution camera module',
                'quantity' => 30,
                'minimum_stock' => 5,
            ],
            [
                'code' => 'BATTPCKABC',
                'name' => 'Battery Pack ABC',
                'description' => 'Lithium-ion battery pack',
                'quantity' => 100,
                'minimum_stock' => 20,
            ],
            [
                'code' => 'PPLRSETDEF',
                'name' => 'Propeller Set DEF',
                'description' => 'Set of propellers for drone',
                'quantity' => 80,
                'minimum_stock' => 15,
            ],
            [
                'code' => 'GPSMDULUVW',
                'name' => 'GPS Module UVW',
                'description' => 'Global positioning system module',
                'quantity' => 40,
                'minimum_stock' => 8,
            ],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
