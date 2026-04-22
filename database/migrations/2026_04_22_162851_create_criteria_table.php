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
        Schema::create('criteria', function (Blueprint $table) {
        $table->id();
        $table->string('code', 10)->unique(); // C01, C02, C03
        $table->string('name'); // Contoh: Efektivitas, Waktu, Biaya
        $table->enum('type', ['benefit', 'cost']); // Sangat penting untuk rumus normalisasi SAW nanti
        $table->decimal('weight', 5, 2); // Bobot kriteria, misal 0.30 (30%)
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('criteria');
    }
};
