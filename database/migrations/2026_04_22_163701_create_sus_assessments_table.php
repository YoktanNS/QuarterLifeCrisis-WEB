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
        Schema::create('sus_assessments', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        // Looping untuk membuat 10 kolom pertanyaan SUS (q1 sampai q10)
        for ($i = 1; $i <= 10; $i++) {
            $table->integer('q'.$i); // Akan menampung skor 1 sampai 5
        }
        $table->decimal('total_score', 5, 2); // Skor akhir SUS (skala 0-100)
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sus_assessments');
    }
};
