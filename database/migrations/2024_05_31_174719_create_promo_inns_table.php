<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('promo_inns', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_name');
            $table->integer('duration_days_nights');
            $table->string('city');
            $table->decimal('adult_price_client', 10, 2);
            $table->decimal('child_price_client', 10, 2);
            $table->decimal('adult_price_provider', 10, 2);
            $table->decimal('child_price_provider', 10, 2);
            $table->integer('stars');
            $table->unsignedBigInteger('trip_id');
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo_inns');
    }
};
