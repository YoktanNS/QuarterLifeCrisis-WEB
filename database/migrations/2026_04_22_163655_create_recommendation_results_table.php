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
        Schema::create('recommendation_results', function (Blueprint $table) {
        $table->id();
        $table->foreignId('assessment_id')->constrained()->cascadeOnDelete();
        $table->foreignId('action_plan_id')->constrained('action_plans')->cascadeOnDelete();
        $table->decimal('saw_score', 8, 4); // Nilai akhir perhitungan SAW, butuh 4 desimal agar akurat
        $table->integer('rank'); // Peringkat 1, 2, 3...
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendation_results');
    }
};
