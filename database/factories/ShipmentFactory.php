<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Shipment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ShipmentFactory extends Factory
{
    protected $model = Shipment::class;

    public function definition(): array
    {
        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'order_number' => 'ORD0' . $this->faker->unique()->numberBetween(100, 999),
            'entity_name' => $this->faker->company(),
            'type' => $this->faker->randomElement(['in', 'out']),
            'order_date' => $this->faker->dateTimeThisMonth(),
            'item_id' => $this->faker->randomElement(Item::get('id')),
            'quantity' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['pending', 'in transit', 'delivered']),
        ];
    }
}
