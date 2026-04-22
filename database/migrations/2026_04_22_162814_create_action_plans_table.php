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
        Schema::create('action_plans', function (Blueprint $table) {
        $table->id();
        $table->string('code', 10)->unique(); // Contoh: AP01, AP02
        $table->string('name'); // Contoh: Membuat Jurnal Syukur, Konseling Karir
        $table->text('description')->nullable();
        // Kita hubungkan ke QLC Level agar rekomendasi yang muncul sesuai dengan tingkat krisisnya
        $table->foreignId('qlc_level_id')->constrained('qlc_levels')->cascadeOnDelete();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('action_plans');
    }
};
