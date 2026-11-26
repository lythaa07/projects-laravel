<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        return [
            'category_id' => Category::factory(),
            'name' => fake()->words(3, true),
            'sku' => strtoupper(fake()->unique()->bothify('PRD-####-???')),
            'price' => fake()->numberBetween(50, 2500) * 1000, // Kelipatan Rp1.000
            'stock' => fake()->numberBetween(5, 50),
        ];
    }

    // State khusus untuk simulasi produk yang stoknya habis
    public function outOfStock(): static
    {
        return $this->state(fn (array $attributes) => [
            'stock' => 0,
        ]);
    }
}