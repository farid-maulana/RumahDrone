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
        $deliveryDate = $this->faker->dateTimeThisMonth();
        $shipmentDate = $this->faker->dateTimeThisMonth($deliveryDate);
        $orderDate = $this->faker->dateTimeThisMonth($shipmentDate);

        $status = $this->faker->randomElement(['pending', 'in transit', 'delivered']);
        $items = $this->faker->randomElement(Item::get('id'));

        if ($status === 'pending') {
            $shipmentDate = null;
            $deliveryDate = null;
        } elseif ($status === 'in transit') {
            $deliveryDate = null;
        }

        return [
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'order_number' => 'ORD0' . $this->faker->unique()->numberBetween(100, 999),
            'customer' => $this->faker->company(),
            'address' => $this->faker->address(),
            'order_date' => $orderDate,
            'shipment_date' => $shipmentDate,
            'delivery_date' => $deliveryDate,
            'item_id' => $items,
            'quantity' => $this->faker->numberBetween(1, 10),
            'status' => $status,
        ];
    }
}
