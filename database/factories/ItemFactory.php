<?php

namespace Database\Factories;

use App\Models\Item;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ItemFactory extends Factory
{
    protected $model = Item::class;

    public function definition(): array
    {
        $names = [
            'Drone Bag',
            'Extra Batteries',
            'Remote Controller',
            'Propeller Guards',
            'Gimbal Stabilizer',
            'ND Filters',
            'Charging Hub',
            'Memory Card',
            'Carrying Case',
            'Landing Pad',
            'Drone Repair Kit',
            'FPV Goggles',
            'Drone Backpack',
            'Drone Landing Gear',
            'Drone Antenna',
        ];

        return [
            'code' => $this->faker->unique()->regexify('[A-Z0-9]{10}'),
            'name' => $this->faker->unique()->randomElement($names),
            'description' => $this->faker->sentence(3),
            'quantity' => $this->faker->numberBetween(1, 100),
            'minimum_stock' => $this->faker->numberBetween(1, 20),
        ];
    }
}
