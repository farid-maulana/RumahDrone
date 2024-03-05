<?php

namespace Database\Factories;

use App\Models\Report;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ReportFactory extends Factory
{
    protected $model = Report::class;

    public function definition(): array
    {
        return [
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now(),
          'name' => 'pelaporan inventaris gudang - ' . $this->faker->date('d/m/Y') . '.pdf',
          'file' => 'reports/inventory/' . $this->faker->date('Y-m-d') . '.pdf',
        ];
    }
}
