<?php

namespace Database\Factories;

use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PackageDelivery>
 */
class PackageDeliveryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hotel_name' => $this->faker->company,
            'days_nights' => $this->faker->numberBetween(1, 10),
            'city' => $this->faker->city,
            'provider_simple' => $this->faker->randomFloat(2, 50, 500),
            'provider_double' => $this->faker->randomFloat(2, 50, 500),
            'provider_triple' => $this->faker->randomFloat(2, 50, 500),
            'provider_quadruple' => $this->faker->randomFloat(2, 50, 500),
            'provider_children_under_10' => $this->faker->randomFloat(2, 10, 200),
            'client_simple' => $this->faker->randomFloat(2, 100, 1000),
            'client_double' => $this->faker->randomFloat(2, 100, 1000),
            'client_triple' => $this->faker->randomFloat(2, 100, 1000),
            'client_quadruple' => $this->faker->randomFloat(2, 100, 1000),
            'client_children_under_10' => $this->faker->randomFloat(2, 10, 200),
            'stars' => $this->faker->numberBetween(1, 5),
            'trip_id' => $this->faker->randomElement(Trip::pluck('id')->toArray()),
        ];
    }
}
