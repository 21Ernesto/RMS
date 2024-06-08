<?php

namespace Database\Factories;

use App\Models\PackageDelivery;
use App\Models\Trip;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaleDelivery>
 */
class SaleDeliveryFactory extends Factory
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
            'quantity_simple' => $this->faker->randomDigit,
            'quantity_double' => $this->faker->randomDigit,
            'quantity_triple' => $this->faker->randomDigit,
            'quantity_quadruple' => $this->faker->randomDigit,
            'quantity_children_under_10' => $this->faker->randomDigit,
            'datestart' => $this->faker->date(),
            'type_trips' => $this->faker->randomElement(['packages', 'mayantrains', 'travelpackages']),
            'currency' => $this->faker->currencyCode,
            'customer_name' => $this->faker->name,
            'customer_email' => $this->faker->safeEmail,
            'payment_method' => $this->faker->randomElement(['Credit Card', 'PayPal', 'Stripe']),
            'payment_status' => $this->faker->randomElement(['Completed']),
            'trip_id' => $this->faker->randomElement(Trip::pluck('id')->toArray()),
            'package_delivery_id' => $this->faker->randomElement(PackageDelivery::pluck('id')->toArray()),
            'created_at' => $this->faker->dateTimeBetween('2024-01-01', '2024-06-30')->format('Y-m-d'),
            'updated_at' => now(),
        ];
    }
}
