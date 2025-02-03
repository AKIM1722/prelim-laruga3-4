<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\MarkUpHistory;

class MarkUpHistoryFactory extends Factory
{
    protected $model = MarkUpHistory::class;

    public function definition(): array
    {
        return [
            'product_id' => $this->faker->randomNumber(), // Random product ID
            'old_price' => $this->faker->randomFloat(2, 50, 500), // Random old price between 50-500
            'new_price' => $this->faker->randomFloat(2, 100, 1000), // Random new price between 100-1000
            'markup_percentage' => $this->faker->randomFloat(2, 1, 50), // Random markup percentage
            'changed_at' => $this->faker->dateTimeBetween('-1 year', 'now'), // Random date within the last year
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
