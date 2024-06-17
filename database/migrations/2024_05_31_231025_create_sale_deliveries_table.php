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
        Schema::create('sale_deliveries', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->string('payment_id');

            $table->string('trip_name');
            $table->string('hotel_name');

            $table->integer('quantity_simple')->nullable();
            $table->integer('quantity_double')->nullable();
            $table->integer('quantity_triple')->nullable();
            $table->integer('quantity_quadruple')->nullable();
            $table->integer('quantity_children_under_10')->nullable();

            $table->date('datestart');

            $table->string('type_trips');

            $table->string('currency');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('payment_method');
            $table->string('payment_status');

            $table->decimal('provider_simple', 10, 2)->nullable();
            $table->decimal('provider_double', 10, 2)->nullable();
            $table->decimal('provider_triple', 10, 2)->nullable();
            $table->decimal('provider_quadruple', 10, 2)->nullable();
            $table->decimal('provider_children_under_10', 10, 2)->nullable();
            $table->decimal('client_simple', 10, 2)->nullable();
            $table->decimal('client_double', 10, 2)->nullable();
            $table->decimal('client_triple', 10, 2)->nullable();
            $table->decimal('client_quadruple', 10, 2)->nullable();
            $table->decimal('client_children_under_10', 10, 2)->nullable();

            $table->double('total');
            $table->double('total_real');

            $table->unsignedBigInteger('trip_id');
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->unsignedBigInteger('package_delivery_id');
            $table->foreign('package_delivery_id')->references('id')->on('package_deliveries')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_deliveries');
    }
};
