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
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('front_page')->nullable();
            $table->string('banner')->nullable();
            $table->string('day');
            $table->boolean('outstanding')->nullable()->default(false);
            $table->string('first_email')->nullable();
            $table->string('second_email')->nullable();
            $table->string('price')->nullable();
            $table->string('price_real')->nullable();
            $table->string('type_trips');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trips');
    }
};
