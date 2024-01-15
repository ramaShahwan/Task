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
        Schema::create('estates', function (Blueprint $table) {
            $table->id();
           
            $table->string('Address')->nullable();
            $table->string('Contact_phone')->nullable();
            $table->string('outlook')->nullable();
            $table->string('description')->nullable();
            $table->string('direction')->nullable();
            $table->string('floor')->nullable();
            $table->string('ownership')->nullable();
            $table->integer('room_number')->nullable();
            $table->integer('bath_number')->nullable();
            $table->double('price')->nullable();
            $table->boolean('parking')->default(0)->nullable;
            $table->boolean('place_for_barbecue')->default(0)->nullable;
            $table->boolean('left')->default(0)->nullable;
            $table->boolean('TV_cable')->default(0)->nullable;
            $table->boolean('internet')->default(0)->nullable;
            $table->boolean('central_heating')->default(0)->nullable;
            $table->string('images')->nullable();
            $table->string('slug')->default(0)->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estate');
    }
};
