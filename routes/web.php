<?php

use App\Http\Controllers\MonevAimController;
use App\Http\Controllers\SHG\HasilMonevController;
use App\Http\Controllers\SHG\InputDataMonev\KalimantanJawaGasController; 
use App\Http\Controllers\SHG\InputDataMonev\PertaminaGasController;
use App\Http\Controllers\SHG\KpiAssetIntegrityController;
use App\Http\Controllers\SHG\TargetMandatoryCertificationController;
use App\Http\Controllers\SHG\TargetSapAssetController;
use App\Http\Controllers\SHG\TargetStatusAssetInteregrityController;
use App\Http\Controllers\SHG\TargetStatusPLOController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('monev-aim', [MonevAimController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('monev.aim');

// SHG Target Status Asset Intergity
Route::prefix('monev/shg/kinerja/target-status-asset-integrity')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [TargetStatusAssetInteregrityController::class, 'index'])->name('');
    Route::post('/', [TargetStatusAssetInteregrityController::class, 'store'])->name('target-status-asset-integrity');
    Route::get('/data', [TargetStatusAssetInteregrityController::class, 'getData'])->name('target-status-asset-integrity.data');
});

// target-status-plo
Route::prefix('monev/shg/kinerja/target-status-plo')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [TargetStatusPLOController::class, 'index'])->name('target-status-plo');
    Route::post('/', [TargetStatusPLOController::class, 'store'])->name('target-status-plo');
    Route::get('/data', [TargetStatusPLOController::class, 'getData'])->name('target-status-plo.data');
});

// Tindak Lanjut Hasil Monev
Route::prefix('monev/shg/kinerja/hasil-monev')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [HasilMonevController::class, 'index'])->name('hasil-monev');
    Route::post('/', [HasilMonevController::class, 'store'])->name('hasil-monev');
    Route::get('/data', [HasilMonevController::class, 'getData'])->name('hasil-monev.data');
});

// KPI ASSET INTEGRITY
Route::prefix('monev/shg/kinerja/kpi-asset-integrity')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KpiAssetIntegrityController::class, 'index'])->name('kpi-asset-integrity');
    Route::post('/', [KpiAssetIntegrityController::class, 'store'])->name('kpi-asset-integrity');
    Route::get('/data', [KpiAssetIntegrityController::class, 'getData'])->name('kpi-asset-integrity.data');
});

Route::prefix('monev/shg/kinerja/sap')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [TargetSapAssetController::class, 'index'])->name('sap');
    Route::post('/', [TargetSapAssetController::class, 'store'])->name('sap');
    Route::get('/data', [TargetSapAssetController::class, 'getData'])->name('sap.data');
});

Route::prefix('monev/shg/kinerja/mandatory-certification')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [TargetMandatoryCertificationController::class, 'index'])->name('mandatory-certification');
    Route::post('/', [TargetMandatoryCertificationController::class, 'store'])->name('mandatory-certification');
    Route::get('/data', [TargetMandatoryCertificationController::class, 'getData'])->name('mandatory-certification.data');
});


// Input Data Monev
// Pertamina Gas
Route::prefix('monev/shg/input-data/pertamina-gas')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PertaminaGasController::class, 'index'])->name('pertamina-gas');
    Route::post('/', [PertaminaGasController::class, 'store'])->name('pertamina-gas');
    Route::get('/data', [PertaminaGasController::class, 'getData'])->name('pertamina-gas.data');
});

// Kalimantan Jawa Gas
Route::prefix('monev/shg/input-data/kalimantan-jawa-gas')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KalimantanJawaGasController::class, 'index'])->name('kalimantan-jawa-gas');
    Route::post('/', [KalimantanJawaGasController::class, 'store'])->name('kalimantan-jawa-gas');
    Route::get('/data', [KalimantanJawaGasController::class, 'getData'])->name('kalimantan-jawa-gas.data');
});







Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
});


require __DIR__ . '/auth.php';
