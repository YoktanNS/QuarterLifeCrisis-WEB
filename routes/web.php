<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssessmentController;

Route::get('/', function () {
    return redirect()->route('assessment.index');
});

// Grup Rute untuk fitur Tes QLC
Route::prefix('tes-qlc')->name('assessment.')->group(function () {
    Route::get('/', [AssessmentController::class, 'index'])->name('index'); // Menampilkan form
    Route::post('/', [AssessmentController::class, 'store'])->name('store'); // Memproses form
    Route::get('/hasil/{id}', [AssessmentController::class, 'showResult'])->name('result'); // Menampilkan hasil
});