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
        Schema::create('sale_promos', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->string('payment_id');

            $table->integer('quantity_child')->nullable();
            $table->integer('quantity_adult')->nullable();

            $table->date('datestart');

            $table->string('type_trips');

            $table->string('currency');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('payment_method');
            $table->string('payment_status');

            $table->decimal('adult_price_client', 10, 2);
            $table->decimal('child_price_client', 10, 2);
            $table->decimal('adult_price_provider', 10, 2);
            $table->decimal('child_price_provider', 10, 2);

            $table->double('total');
            $table->double('total_real');
            $table->unsignedBigInteger('trip_id');
            $table->foreign('trip_id')->references('id')->on('trips')->onDelete('cascade');
            $table->unsignedBigInteger('promo_in_id');
            $table->foreign('promo_in_id')->references('id')->on('promo_inns')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_promos');
    }
};
