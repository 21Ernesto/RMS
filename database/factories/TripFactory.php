<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(4),
            'slug' => Str::slug($this->faker->unique()->sentence(4)),
            'front_page' => $this->faker->imageUrl(),
            'banner' => $this->faker->imageUrl(),
            'day' => $this->faker->randomDigitNotNull(),
            'outstanding' => $this->faker->boolean(50),
            'first_email' => $this->faker->safeEmail,
            'second_email' => $this->faker->safeEmail,
            'price' => $this->faker->randomFloat(2, 100, 1000),
            'price_real' => $this->faker->randomFloat(2, 100, 1000),
            'type_trips' => $this->faker->randomElement(['tour', 'packages', 'promotions', 'travelpackages', 'friendscombos', 'mayantrains']),
            'category_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
