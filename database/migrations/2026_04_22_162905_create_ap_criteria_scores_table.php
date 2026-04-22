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
        Schema::create('ap_criteria_scores', function (Blueprint $table) {
        $table->id();
        $table->foreignId('action_plan_id')->constrained('action_plans')->cascadeOnDelete();
        $table->foreignId('criterion_id')->constrained('criteria')->cascadeOnDelete();
        $table->decimal('score', 8, 2); // Nilai asli yang diberikan oleh pakar/peneliti
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ap_criteria_scores');
    }
};
