<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['categoría Tour', 'categoría Paquete', 'categoría Promo', 'categoría Paque', 'Tren', 'categoría Amigo']),
            'slug' => Str::slug($this->faker->unique()->name),
            'image' => $this->faker->imageUrl(),
            'key' => $this->faker->randomElement(['tour', 'packages', 'promotions', 'travelpackages', 'friendscombos', 'mayantrains']),
            'menu_id' => $this->faker->randomElement(Menu::pluck('id')->toArray()),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
