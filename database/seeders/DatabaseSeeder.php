<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\PackageDelivery;
use App\Models\SaleDelivery;
use App\Models\SaleInn;
use App\Models\Trip;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@test.com',
            'password' => bcrypt('password'),
        ]);

        // Menu::factory()->count(6)->create();
        // Category::factory()->count(6)->create();
        // Trip::factory()->count(100)->create();
        // PackageDelivery::factory()->count(100)->create();
        // SaleInn::factory()->count(100)->create();
        // SaleDelivery::factory()->count(100)->create();

    }
}
