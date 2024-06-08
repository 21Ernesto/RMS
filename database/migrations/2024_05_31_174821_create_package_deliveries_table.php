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
        Schema::create('package_deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_name');
            $table->integer('days_nights');
            $table->string('city');
            $table->decimal('provider_simple', 10,2)->nullable();
            $table->decimal('provider_double', 10,2)->nullable();
            $table->decimal('provider_triple', 10,2)->nullable();
            $table->decimal('provider_quadruple', 10,2)->nullable();
            $table->decimal('provider_children_under_10', 10,2)->nullable();
            $table->decimal('client_simple', 10,2)->nullable();
            $table->decimal('client_double', 10,2)->nullable();
            $table->decimal('client_triple', 10,2)->nullable();
            $table->decimal('client_quadruple', 10,2)->nullable();
            $table->decimal('client_children_under_10', 10,2)->nullable();
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
        Schema::dropIfExists('package_deliveries');
    }
};
