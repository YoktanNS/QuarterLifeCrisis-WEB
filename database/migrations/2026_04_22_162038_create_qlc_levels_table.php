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
        Schema::create('qlc_levels', function (Blueprint $table) {
        $table->id();
        $table->string('code', 10)->unique(); // L01 (Ringan), L02 (Sedang), L03 (Berat)
        $table->string('name'); 
        $table->text('description');
        $table->text('referral_message')->nullable(); // Pesan rujukan ke psikolog jika Berat
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qlc_levels');
    }
};
