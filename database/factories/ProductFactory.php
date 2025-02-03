<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Category;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'product_name' => $this->faker->word(), // Random product name
            'description' => $this->faker->sentence(), // Random description
            'purchase_price' => $this->faker->randomFloat(2, 10, 1000), // Price between 10-1000
            'retail_price' => null, // Default null (updated later)
            'quantity' => $this->faker->numberBetween(1, 100), // Stock quantity
            'category_id' => Category::inRandomOrder()->value('id') ?? 1, // Random existing category ID
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
