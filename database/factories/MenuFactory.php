<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Tour', 'Paquete', 'Amigo', 'Promo', 'Tren', 'Paque']),
            'slug' => Str::slug($this->faker->unique()->sentence(2)),
            'status' => $this->faker->boolean(50),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
