<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'invoice_number' => 'INV-' . now()->format('Ymd') . '-' . fake()->unique()->numerify('####'),
            'status' => fake()->randomElement(['pending', 'paid', 'cancelled']),
            'total_amount' => 0, // Akan dihitung otomatis setelah produk di-attach
        ];
    }

    // State khusus untuk pesanan yang sudah lunas
    public function paid(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'paid',
        ]);
    }
}