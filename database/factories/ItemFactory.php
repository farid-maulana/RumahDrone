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
        return [
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
          'code' => $this->faker->word(),
          'name' => $this->faker->name(),
          'description' => $this->faker->text(),
          'quantity' => $this->faker->word(),
          'minimum_stock' => $this->faker->word(),
        ];
    }
}
