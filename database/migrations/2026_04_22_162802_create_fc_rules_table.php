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
        Schema::create('fc_rules', function (Blueprint $table) {
        $table->id();
        // Relasi ke tabel Level QLC (Kesimpulan)
        $table->foreignId('qlc_level_id')->constrained('qlc_levels')->cascadeOnDelete();
        // Relasi ke tabel Gejala (Fakta)
        $table->foreignId('symptom_id')->constrained('symptoms')->cascadeOnDelete();
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fc_rules');
    }
};
