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
        Schema::create('tipos_habitaciones', function (Blueprint $table) {
            $table->id();
            $table->enum('nombre', ['estándar', 'junior', 'suite'])->unique()->comment('nombre del tipo de la habitacion'); // Estándar, Junior, Suite
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_habitaciones');
    }
};
