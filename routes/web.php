<?php

use App\Http\Controllers\MonevAimController;
use App\Http\Controllers\SHG\HasilMonevController;
use App\Http\Controllers\SHG\InputDataMonev\KalimantanJawaGasController;
use App\Http\Controllers\SHG\InputDataMonev\PertaminaGasController;
use App\Http\Controllers\SHG\InputTargetKinerja\StatusAssetInteregrityController;
use App\Http\Controllers\SHG\InputTArgetKinerja\Target2025KPIController;
use App\Http\Controllers\SHG\InputTargetKinerja\TargetSAPController;
use App\Http\Controllers\SHG\InputTargetKinerja\TargetStatusAssetController;
use App\Http\Controllers\SHG\KpiAssetIntegrityController;
use App\Http\Controllers\SHG\TargetMandatoryCertificationController;
use App\Http\Controllers\SHG\TargetSapAssetController;
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

// SHG Status Asset Intergity
Route::prefix('monev/shg/kinerja/status-asset-integrity')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusAssetInteregrityController::class, 'index'])->name('');
    Route::post('/', [StatusAssetInteregrityController::class, 'store'])->name('status-asset-integrity');
    Route::get('/data', [StatusAssetInteregrityController::class, 'getData'])->name('status-asset-integrity.data');

    // Route::get('/target-status', [TargetStatusAssetInteregrityController::class, 'targetStatus'])->name('target-status');
    // Route::get('/target-2025', [TargetStatusAssetInteregrityController::class, 'target2025'])->name('target-2025');
    // Route::get('/prognosa', [TargetStatusAssetInteregrityController::class, 'prognosa'])->name('prognosa');
    // Route::get('/selisih', [TargetStatusAssetInteregrityController::class, 'selisih'])->name('selisih');
});

// SHG Target Status
Route::prefix('monev/shg/kinerja/target-status-asset')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [TargetStatusAssetController::class, 'index'])->name('target-status-asset');
    Route::post('/', [TargetStatusAssetController::class, 'store'])->name('target-status-asset');
    Route::get('/data', [TargetStatusAssetController::class, 'data'])->name('target-status-asset.data');
    // Route::get('/{id}/edit', [TargetStatusPLOController::class, 'edit'])->name('target-status.edit');
    // Route::put('/{id}', [TargetStatusPLOController::class, 'update'])->name('target-status.update');
    // Route::delete('/{id}', [TargetStatusPLOController::class, 'destroy'])->name('target-status.destroy');
});

// SHG Target SAP
Route::prefix('monev/shg/kinerja/target-sap')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [TargetSAPController::class, 'index'])->name('target-sap');
    Route::post('/', [TargetSAPController::class, 'store'])->name('target-sap');
    Route::get('/data', [TargetSAPController::class, 'data'])->name('target-sap.data');
    Route::put('/{id}', [TargetSAPController::class, 'update'])->name('target-sap.update');
    Route::delete('/{id}', [TargetSAPController::class, 'destroy'])->name('target-sap.destroy');
});

// SHG Target 2025 AI
Route::prefix('monev/shg/kinerja/target-2025-ai')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [Target2025KPIController::class, 'index'])->name('target-2025-ai');
    Route::post('/', [Target2025KPIController::class, 'store'])->name('target-2025-ai');
    Route::get('/data', [Target2025KPIController::class, 'data'])->name('target-2025-ai.data');
    Route::get('/{id}/edit', [Target2025KPIController::class, 'edit'])->name('target-2025-ai.edit');
    Route::put('/{id}', [Target2025KPIController::class, 'update'])->name('target-2025-ai.update');
    Route::delete('/{id}', [Target2025KPIController::class, 'destroy'])->name('target-2025-ai.destroy');
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
