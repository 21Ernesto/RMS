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
        Schema::create('sale_inns', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->nullable();
            $table->string('payment_id');

            $table->string('trip_name');
            $table->string('quantity');
            $table->string('price')->nullable();
            $table->string('price_real')->nullable();
            $table->date('datestart');

            $table->string('type_trips');

            $table->string('currency');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('payment_method');
            $table->string('payment_status');
            $table->double('total');
            $table->double('total_real');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sale_inns');
    }
};
