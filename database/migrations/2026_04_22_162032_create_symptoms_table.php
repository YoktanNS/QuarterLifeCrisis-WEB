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
        Schema::create('symptoms', function (Blueprint $table) {
        $table->id();
        $table->foreignId('category_id')->constrained('symptom_categories')->cascadeOnDelete();
        $table->string('code', 10)->unique(); // G01, G02, dst
        $table->text('statement'); // Pernyataan kuesioner
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('symptoms');
    }
};
