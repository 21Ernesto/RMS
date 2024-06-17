<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaleInn>
 */
class SaleInnFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $uuid = $this->faker->uuid;
        $uuidLast8 = strtoupper(substr($uuid, -8));

        return [
            'uuid' => 'FAC_'.$uuidLast8,
            'payment_id' => $uuid,
            'trip_name' => $this->faker->sentence,
            'quantity' => $this->faker->randomDigit,
            'price' => $this->faker->randomNumber(4),
            'price_real' => $this->faker->randomNumber(4),
            'datestart' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
            'type_trips' => $this->faker->randomElement(['tour', 'friendscombos']),
            'currency' => $this->faker->randomElement(['USD', 'EUR']),
            'customer_name' => $this->faker->name,
            'customer_email' => $this->faker->email,
            'payment_method' => $this->faker->randomElement(['Credit Card', 'PayPal', 'Cash']),
            'payment_status' => $this->faker->randomElement(['Completed']),

        ];
    }
}
