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
        Schema::create('hotel_tipo_habitacion_acomodacion', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained('hoteles')->onDelete('cascade');
            $table->foreignId('tipo_habitacion_acomodacion_id')->constrained('tipo_habitacion_acomodacion')->onDelete('cascade');
            $table->integer('cantidad')->nullable(false)->comment('cantidad de habitaciones segun el tipo por cada hotel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_tipo_habitacion');
    }
};
