<?php

use App\Http\Controllers\MonevAimController;
use App\Http\Controllers\SHG\HasilMonevController;
use App\Http\Controllers\SHG\InputDataMonev\kalimantan\AirBudgetTaggingKJGController;
use App\Http\Controllers\SHG\InputDataMonev\kalimantan\AssetBreakDownKjgController;
use App\Http\Controllers\SHG\InputDataMonev\kalimantan\AvailabilityKjgController;
use App\Http\Controllers\SHG\InputDataMonev\kalimantan\KondisiVacantAIMSKjgController;
use App\Http\Controllers\SHG\InputDataMonev\kalimantan\MandatoryCertificationKjgController;
use App\Http\Controllers\SHG\InputDataMonev\kalimantan\PelatihanAimsKjgController;
use App\Http\Controllers\SHG\InputDataMonev\kalimantan\RealisasiAnggaranAiKjg2025Controller;
use App\Http\Controllers\SHG\InputDataMonev\kalimantan\RealisasiProgressFisikAI2025KjgController;
use App\Http\Controllers\SHG\InputDataMonev\kalimantan\RencanaPemeliharaanBesarKjgController;
use App\Http\Controllers\SHG\InputDataMonev\kalimantan\SistemInformasiAimsKjgController;
use App\Http\Controllers\SHG\InputDataMonev\kalimantan\StatusPloKjgController;
use App\Http\Controllers\SHG\InputDataMonev\KalimantanJawaGasController;
use App\Http\Controllers\SHG\InputDataMonev\pertamina\AirBudgetTaggingPtgController;
use App\Http\Controllers\SHG\InputDataMonev\pertamina\AssetBreakDownPtgController;
use App\Http\Controllers\SHG\InputDataMonev\pertamina\AvailabilityPtgController;
use App\Http\Controllers\SHG\InputDataMonev\pertamina\KondisiVacantAIMSPtgController;
use App\Http\Controllers\SHG\InputDataMonev\pertamina\MandatoryCertificationPtgController;
use App\Http\Controllers\SHG\InputDataMonev\pertamina\PelatihanAIMSPtgController;
use App\Http\Controllers\SHG\InputDataMonev\pertamina\RealisasiAnggaranAIPtg2025Controller;
use App\Http\Controllers\SHG\InputDataMonev\pertamina\RealisasiProgressFisikAI2025PtgController;
use App\Http\Controllers\SHG\InputDataMonev\pertamina\RencanaPemeliharaanBesarPtgController;
use App\Http\Controllers\SHG\InputDataMonev\pertamina\SapAssetPtgController;
use App\Http\Controllers\SHG\InputDataMonev\pertamina\SistemInformasiAimsPtgController;
use App\Http\Controllers\SHG\InputDataMonev\pertamina\StatusPloPtgController;
use App\Http\Controllers\SHG\InputDataMonev\PertaminaGasController;
use App\Http\Controllers\SHG\InputDataMonev\pertaSamtan\AssetBreakdownPtsgController;
use App\Http\Controllers\SHG\InputDataMonev\pertaSamtan\AvailabilityPtsgController;
use App\Http\Controllers\SHG\InputDataMonev\pertaSamtan\KondisiVacantAimsPtsgController;
use App\Http\Controllers\SHG\InputDataMonev\pertaSamtan\MandatoryCertificationPtsgController;
use App\Http\Controllers\SHG\InputDataMonev\pertaSamtan\PelatihanAimsPtsgController;
use App\Http\Controllers\SHG\InputDataMonev\pertaSamtan\RealisasiAnggaranAiPtsgController;
use App\Http\Controllers\SHG\InputDataMonev\pertaSamtan\RealisasiProgressFisikAiPtsgController;
use App\Http\Controllers\SHG\InputDataMonev\pertaSamtan\RencanaPemeliharaanPtsgController;
use App\Http\Controllers\SHG\InputDataMonev\pertaSamtan\SistemInformasiAimsPtsgController;
use App\Http\Controllers\SHG\InputDataMonev\pertaSamtan\StatusPloPtsgController;
use App\Http\Controllers\SHG\InputDataMonev\PertaSamtanGasController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\AssetBreakdownPliController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\KondisiVacantAimsPliController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\MandatoryCertificationPliController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\PelatihanAimsPliController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\RealisasiAnggaranAiPLIController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\RencanaPemeliharaanPliController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\SistemInformasiAimsPliController;
use App\Http\Controllers\SHG\InputDataMonev\pgnlngindonesia\StatusAssetAIPLIController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\StatusPloPliController;
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

// Route::get('login', function () {
//     return view('auth.login');
// })->name('login');

Route::get('/', function () {
    return view('dashboard'); 
});


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
// Pertamina Gas Status Asset 2025 AI PTG
Route::prefix('monev/shg/input-data/pertamina-gas')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PertaminaGasController::class, 'index'])->name('pertamina-gas');
    Route::post('/', [PertaminaGasController::class, 'store'])->name('pertamina-gas.store');
    Route::get('/data', [PertaminaGasController::class, 'data'])->name('pertamina-gas.data');
    Route::get('/{id}', [PertaminaGasController::class, 'show'])->name('pertamina-gas.show');
    Route::put('/{id}', [PertaminaGasController::class, 'update'])->name('pertamina-gas.update');
    Route::delete('/{id}', [PertaminaGasController::class, 'destroy'])->name('pertamina-gas.destroy');
});

// SHG Mandatory Certification PTG
Route::prefix('monev/shg/input-data/mandatory-certification-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationPtgController::class, 'index'])->name('mandatory-certification-ptg');
    Route::post('/', [MandatoryCertificationPtgController::class, 'store'])->name('mandatory-certification-ptg');
    Route::get('/data', [MandatoryCertificationPtgController::class, 'data'])->name('mandatory-certification-ptg.data');
    // Route::get('/{id}/edit', [MandatoryCertificationPtgController::class, 'edit'])->name('mandatory-certification-ptg.edit');
    Route::put('/{id}', [MandatoryCertificationPtgController::class, 'update'])->name('mandatory-certification-ptg.update');
    Route::delete('/{id}', [MandatoryCertificationPtgController::class, 'destroy'])->name('mandatory-certification-ptg.destroy');
});

// SAP Asset PTG
Route::prefix('monev/shg/input-data/sap-asset-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SapAssetPtgController::class, 'index'])->name('sap-asset-ptg');
    Route::post('/', [SapAssetPtgController::class, 'store'])->name('sap-asset-ptg.store');
    Route::get('/data', [SapAssetPtgController::class, 'data'])->name('sap-asset-ptg.data');
    // Route::get('/{id}', [SapAssetPtgController::class, 'show'])->name('sap-asset-ptg.show');
    Route::put('/{id}', [SapAssetPtgController::class, 'update'])->name('sap-asset-ptg.update');
    Route::delete('/{id}', [SapAssetPtgController::class, 'destroy'])->name('sap-asset-ptg.destroy');
});

// Status PLO PTG
Route::prefix('monev/shg/input-data/status-plo-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloPtgController::class, 'index'])->name('status-plo-ptg');
    Route::post('/', [StatusPloPtgController::class, 'store'])->name('status-plo-ptg.store');
    Route::get('/data', [StatusPloPtgController::class, 'data'])->name('status-plo-ptg.data');
    // Route::get('/{id}/edit', [StatusPloPtgController::class, 'edit'])->name('status-plo-ptg.edit');
    Route::put('/{id}', [StatusPloPtgController::class, 'update'])->name('status-plo-ptg.update');
    Route::delete('/{id}', [StatusPloPtgController::class, 'destroy'])->name('status-plo-ptg.destroy');
});

// Asset Breakdown PTG
Route::prefix('monev/shg/input-data/asset-breakdown-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakDownPtgController::class, 'index'])->name('asset-breakdown-ptg');
    Route::post('/', [AssetBreakdownPtgController::class, 'store'])->name('asset-breakdown-ptg.store');
    Route::get('/data', [AssetBreakdownPtgController::class, 'data'])->name('asset-breakdown-ptg.data');
    // Route::get('/{id}', [AssetBreakdownPtgController::class, 'show'])->name('asset-breakdown-ptg.show');
    Route::put('/{id}', [AssetBreakdownPtgController::class, 'update'])->name('asset-breakdown-ptg.update');
    Route::delete('/{id}', [AssetBreakdownPtgController::class, 'destroy'])->name('asset-breakdown-ptg.destroy');
});

// Kondisi Vacant Fungsi Aims PTG
Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAIMSPtgController::class, 'index'])->name('kondisi-vacant-fungsi-aims-ptg');
    Route::post('/', [KondisiVacantAIMSPtgController::class, 'store'])->name('kondisi-vacant-fungsi-aims-ptg.store');
    Route::get('/data', [KondisiVacantAIMSPtgController::class, 'data'])->name('kondisi-vacant-fungsi-aims-ptg.data');
    // Route::get('/{id}/edit', [KondisiVacantAIMSPtgController::class, 'edit'])->name('kondisi-vacant-fungsi-aims-ptg.edit');
    Route::put('/{id}', [KondisiVacantAIMSPtgController::class, 'update'])->name('kondisi-vacant-fungsi-aims-ptg.update');
    Route::delete('/{id}', [KondisiVacantAIMSPtgController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-ptg.destroy');
});

// Rencana Pemeliharaan Besar AIMS PTG
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-besar-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanBesarPtgController::class, 'index'])->name('rencana-pemeliharaan-besar-ptg');
    Route::post('/', [RencanaPemeliharaanBesarPtgController::class, 'store'])->name('rencana-pemeliharaan-besar-ptg.store');
    Route::get('/data', [RencanaPemeliharaanBesarPtgController::class, 'data'])->name('rencana-pemeliharaan-besar-ptg.data');
    // Route::get('/{id}/edit', [RencanaPemeliharaanBesarAimsPtgController::class, 'edit'])->name('rencana-pemeliharaan-besar-aims-ptg.edit');
    Route::put('/{id}', [RencanaPemeliharaanBesarPtgController::class, 'update'])->name('rencana-pemeliharaan-besar-ptg.update');
    Route::delete('/{id}', [RencanaPemeliharaanBesarPtgController::class, 'destroy'])->name('rencana-pemeliharaan-besar-ptg.destroy');
});

// Sistem Informasi AIMS PTG
Route::prefix('monev/shg/input-data/sistem-informasi-aims-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsPtgController::class, 'index'])->name('sistem-informasi-aims-ptg');
    Route::post('/', [SistemInformasiAimsPtgController::class, 'store'])->name('sistem-informasi-aims-ptg.store');
    Route::get('/data', [SistemInformasiAimsPtgController::class, 'data'])->name('sistem-informasi-aims-ptg.data');
    // Route::get('/{id}/edit', [SistemInformasiAimsPtgController::class, 'edit'])->name('sistem-informasi-aims-ptg.edit');
    Route::put('/{id}', [SistemInformasiAimsPtgController::class, 'update'])->name('sistem-informasi-aims-ptg.update');
    Route::delete('/{id}', [SistemInformasiAimsPtgController::class, 'destroy'])->name('sistem-informasi-aims-ptg.destroy');
});

// Pelatihan Aims PTG
Route::prefix('monev/shg/input-data/pelatihan-aims-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAIMSPtgController::class, 'index'])->name('pelatihan-aims-ptg');
    Route::post('/', [PelatihanAimsPtgController::class, 'store'])->name('pelatihan-aims-ptg.store');
    Route::get('/data', [PelatihanAimsPtgController::class, 'data'])->name('pelatihan-aims-ptg.data');
    // Route::get('/{id}/edit', [PelatihanAimsPtgController::class, 'edit'])->name('pelatihan-aims-ptg.edit');
    Route::put('/{id}', [PelatihanAimsPtgController::class, 'update'])->name('pelatihan-aims-ptg.update');
    Route::delete('/{id}', [PelatihanAimsPtgController::class, 'destroy'])->name('pelatihan-aims-ptg.destroy');
});

// Realisasi Anggaran AI PTG
Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAIPtg2025Controller::class, 'index'])->name('realisasi-anggaran-ai-ptg');
    Route::post('/', [RealisasiAnggaranAIPtg2025Controller::class, 'store'])->name('realisasi-anggaran-ai-ptg.store');
    Route::get('/data', [RealisasiAnggaranAIPtg2025Controller::class, 'data'])->name('realisasi-anggaran-ai-ptg.data');
    // Route::get('/{id}/edit', [RealisasiAnggaranAIPtgController::class, 'edit'])->name('realisasi-anggaran-ai-ptg.edit');
    Route::put('/{id}', [RealisasiAnggaranAIPtg2025Controller::class, 'update'])->name('realisasi-anggaran-ai-ptg.update');
    Route::delete('/{id}', [RealisasiAnggaranAIPtg2025Controller::class, 'destroy'])->name('realisasi-anggaran-ai-ptg.destroy');
});

// Realisasi Progress Fisik AI 2025 PTG
Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAI2025PtgController::class, 'index'])->name('realisasi-progress-fisik-ai-ptg');
    Route::post('/', [RealisasiProgressFisikAi2025PtgController::class, 'store'])->name('realisasi-progress-fisik-ai-ptg.store');
    Route::get('/data', [RealisasiProgressFisikAi2025PtgController::class, 'data'])->name('realisasi-progress-fisik-ai-ptg.data');
    // Route::get('/{id}/edit', [RealisasiProgressFisikAi2025PtgController::class, 'edit'])->name('realisasi-progress-fisik-ai-2025-ptg.edit');
    Route::put('/{id}', [RealisasiProgressFisikAi2025PtgController::class, 'update'])->name('realisasi-progress-fisik-ai-ptg.update');
    Route::delete('/{id}', [RealisasiProgressFisikAi2025PtgController::class, 'destroy'])->name('realisasi-progress-fisik-ai-ptg.destroy');
});

// Availability PTG
Route::prefix('monev/shg/input-data/availability-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilityPtgController::class, 'index'])->name('availability-ptg');
    Route::post('/', [AvailabilityPtgController::class, 'store'])->name('availability-ptg.store');
    Route::get('/data', [AvailabilityPtgController::class, 'data'])->name('availability-ptg.data');
    // Route::get('/{id}/edit', [AvailabilityPtgController::class, 'edit'])->name('availability-ptg.edit');
    Route::put('/{id}', [AvailabilityPtgController::class, 'update'])->name('availability-ptg.update');
    Route::delete('/{id}', [AvailabilityPtgController::class, 'destroy'])->name('availability-ptg.destroy');
});

// Air Budget Tagging PTG
Route::prefix('monev/shg/input-data/air-budget-tagging-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingPtgController::class, 'index'])->name('air-budget-tagging-ptg');
    Route::post('/', [AirBudgetTaggingPtgController::class, 'store'])->name('air-budget-tagging-ptg.store');
    Route::get('/data', [AirBudgetTaggingPtgController::class, 'data'])->name('air-budget-tagging-ptg.data');
    // Route::get('/{id}/edit', [AirBudgetTaggingPtgController::class, 'edit'])->name('air-budget-tagging-ptg.edit');
    Route::put('/{id}', [AirBudgetTaggingPtgController::class, 'update'])->name('air-budget-tagging-ptg.update');
    Route::delete('/{id}', [AirBudgetTaggingPtgController::class, 'destroy'])->name('air-budget-tagging-ptg.destroy');
});


// SHG
// Kalimantan Jawa Gas
Route::prefix('monev/shg/input-data/kalimantan-jawa-gas')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KalimantanJawaGasController::class, 'index'])->name('kalimantan-jawa-gas');
    Route::post('/', [KalimantanJawaGasController::class, 'store'])->name('kalimantan-jawa-gas');
    Route::get('/data', [KalimantanJawaGasController::class, 'data'])->name('kalimantan-jawa-gas.data');
    Route::put('/{id}', [KalimantanJawaGasController::class, 'update'])->name('kalimantan-jawa-gas.update');
    Route::delete('/{id}', [KalimantanJawaGasController::class, 'destroy'])->name('kalimantan-jawa-gas.destroy');
});

Route::prefix('monev/shg/input-data/mandatory-certification-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationKjgController::class, 'index'])->name('mandatory-certification-kjg');
    Route::post('/', [MandatoryCertificationKjgController::class, 'store'])->name('mandatory-certification-kjg.store');
    Route::get('/data', [MandatoryCertificationKjgController::class, 'data'])->name('mandatory-certification-kjg.data');
    // Route::get('/{id}', [MandatoryCertificationKjgController::class, 'show'])->name('mandatory-certification-kjg.show');
    Route::put('/{id}', [MandatoryCertificationKjgController::class, 'update'])->name('mandatory-certification-kjg.update');
    Route::delete('/{id}', [MandatoryCertificationKjgController::class, 'destroy'])->name('mandatory-certification-kjg.destroy');
});

Route::prefix('monev/shg/input-data/asset-breakdown-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownKjgController::class, 'index'])->name('asset-breakdown-kjg');
    Route::post('/', [AssetBreakdownKjgController::class, 'store'])->name('asset-breakdown-kjg.store');
    Route::get('/data', [AssetBreakdownKjgController::class, 'data'])->name('asset-breakdown-kjg.data');
    // Route::get('/{id}/edit', [AssetBreakdownKjgController::class, 'edit'])->name('asset-breakdown-kjg.edit');
    Route::put('/{id}', [AssetBreakdownKjgController::class, 'update'])->name('asset-breakdown-kjg.update');
    Route::delete('/{id}', [AssetBreakDownKjgController::class, 'destroy'])->name('asset-breakdown-kjg.destroy');
});

// Status PLO KJG
Route::prefix('monev/shg/input-data/status-plo-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloKjgController::class, 'index'])->name('status-plo-kjg');
    Route::post('/', [StatusPloKjgController::class, 'store'])->name('status-plo-kjg.store');
    Route::get('/data', [StatusPloKjgController::class, 'data'])->name('status-plo-kjg.data');
    // Route::get('/{id}/edit', [StatusPloKjgController::class, 'edit'])->name('status-plo-kjg.edit');
    Route::put('/{id}', [StatusPloKjgController::class, 'update'])->name('status-plo-kjg.update');
    Route::delete('/{id}', [StatusPloKjgController::class, 'destroy'])->name('status-plo-kjg.destroy');
});

Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAIMSKjgController::class, 'index'])->name('kondisi-vacant-fungsi-aims-kjg');
    Route::post('/', [KondisiVacantAIMSKjgController::class, 'store'])->name('kondisi-vacant-fungsi-aims-kjg.store');
    Route::get('/data', [KondisiVacantAIMSKjgController::class, 'data'])->name('kondisi-vacant-fungsi-aims-kjg.data');
    // Route::get('/{id}/edit', [KondisiVacantAIMSKjgController::class, 'edit'])->name('kondisi-vacant-fungsi-aims-kjg.edit');
    Route::put('/{id}', [KondisiVacantAIMSKjgController::class, 'update'])->name('kondisi-vacant-fungsi-aims-kjg.update');
    Route::delete('/{id}', [KondisiVacantAIMSKjgController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-kjg.destroy');
});

// Pelatihan Aims KJG
Route::prefix('monev/shg/input-data/pelatihan-aims-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsKjgController::class, 'index'])->name('pelatihan-aims-kjg');
    Route::post('/', [PelatihanAimsKjgController::class, 'store'])->name('pelatihan-aims-kjg.store');
    Route::get('/data', [PelatihanAimsKjgController::class, 'data'])->name('pelatihan-aims-kjg.data');
    // Route::get('/{id}/edit', [PelatihanAimsKjgController::class, 'edit'])->name('pelatihan-aims-kjg.edit');
    Route::put('/{id}', [PelatihanAimsKjgController::class, 'update'])->name('pelatihan-aims-kjg.update');
    Route::delete('/{id}', [PelatihanAimsKjgController::class, 'destroy'])->name('pelatihan-aims-kjg.destroy');
});

// Sistem Informasi Aims KJG
Route::prefix('monev/shg/input-data/sistem-informasi-aims-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsKjgController::class, 'index'])->name('sistem-informasi-aims-kjg');
    Route::post('/', [SistemInformasiAimsKjgController::class, 'store'])->name('sistem-informasi-aims-kjg.store');
    Route::get('/data', [SistemInformasiAimsKjgController::class, 'data'])->name('sistem-informasi-aims-kjg.data');
    // Route::get('/{id}/edit', [SistemInformasiAimsKjgController::class, 'edit'])->name('sistem-informasi-aims-kjg.edit');
    Route::put('/{id}', [SistemInformasiAimsKjgController::class, 'update'])->name('sistem-informasi-aims-kjg.update');
    Route::delete('/{id}', [SistemInformasiAimsKjgController::class, 'destroy'])->name('sistem-informasi-aims-kjg.destroy');
});

// Rencana Pemeliharaan Besar AIMS KJG
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-besar-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanBesarKjgController::class, 'index'])->name('rencana-pemeliharaan-besar-kjg');
    Route::post('/', [RencanaPemeliharaanBesarKjgController::class, 'store'])->name('rencana-pemeliharaan-besar-kjg.store');
    Route::get('/data', [RencanaPemeliharaanBesarKjgController::class, 'data'])->name('rencana-pemeliharaan-besar-kjg.data');
    // Route::get('/{id}/edit', [RencanaPemeliharaanBesarKjgController::class, 'edit'])->name('rencana-pemeliharaan-besar-kjg.edit');
    Route::put('/{id}', [RencanaPemeliharaanBesarKjgController::class, 'update'])->name('rencana-pemeliharaan-besar-kjg.update');
    Route::delete('/{id}', [RencanaPemeliharaanBesarKjgController::class, 'destroy'])->name('rencana-pemeliharaan-besar-kjg.destroy');
});

// Realisasi Anggaran AI KJG
Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiKjg2025Controller::class, 'index'])->name('realisasi-anggaran-ai-kjg');
    Route::post('/', [RealisasiAnggaranAiKjg2025Controller::class, 'store'])->name('realisasi-anggaran-ai-kjg.store');
    Route::get('/data', [RealisasiAnggaranAiKjg2025Controller::class, 'data'])->name('realisasi-anggaran-ai-kjg.data');
    // Route::get('/{id}/edit', [RealisasiAnggaranAIPtg2025Controller::class, 'edit'])->name('realisasi-anggaran-ai-kjg.edit');
    Route::put('/{id}', [RealisasiAnggaranAiKjg2025Controller::class, 'update'])->name('realisasi-anggaran-ai-kjg.update');
    Route::delete('/{id}', [RealisasiAnggaranAiKjg2025Controller::class, 'destroy'])->name('realisasi-anggaran-ai-kjg.destroy');
});

// Realisasi Progress Fisik AI KJG
Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAI2025KjgController::class, 'index'])->name('realisasi-progress-fisik-ai-kjg');
    Route::post('/', [RealisasiProgressFisikAI2025KjgController::class, 'store'])->name('realisasi-progress-fisik-ai-kjg.store');
    Route::get('/data', [RealisasiProgressFisikAI2025KjgController::class, 'data'])->name('realisasi-progress-fisik-ai-kjg.data');
    // Route::get('/{id}/edit', [RealisasiProgressFisikAiKjgController::class, 'edit'])->name('realisasi-progress-fisik-ai-kjg.edit');
    Route::put('/{id}', [RealisasiProgressFisikAI2025KjgController::class, 'update'])->name('realisasi-progress-fisik-ai-kjg.update');
    Route::delete('/{id}', [RealisasiProgressFisikAI2025KjgController::class, 'destroy'])->name('realisasi-progress-fisik-ai-kjg.destroy');
});

// Availability KJG
Route::prefix('monev/shg/input-data/availability-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilityKjgController::class, 'index'])->name('availability-kjg');
    Route::post('/', [AvailabilityKjgController::class, 'store'])->name('availability-kjg.store');
    Route::get('/data', [AvailabilityKjgController::class, 'data'])->name('availability-kjg.data');
    // Route::get('/{id}/edit', [AvailabilityKjgController::class, 'edit'])->name('availability-kjg.edit');
    Route::put('/{id}', [AvailabilityKjgController::class, 'update'])->name('availability-kjg.update');
    Route::delete('/{id}', [AvailabilityKjgController::class, 'destroy'])->name('availability-kjg.destroy');
});

Route::prefix('monev/shg/input-data/air-budget-tagging-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingKJGController::class, 'index'])->name('air-budget-tagging-kjg');
    Route::post('/', [AirBudgetTaggingKjgController::class, 'store'])->name('air-budget-tagging-kjg.store');
    Route::get('/data', [AirBudgetTaggingKjgController::class, 'data'])->name('air-budget-tagging-kjg.data');
    // Route::get('/{id}/edit', [AirBudgetTaggingKjgController::class, 'edit'])->name('air-budget-tagging-kjg.edit');
    Route::put('/{id}', [AirBudgetTaggingKjgController::class, 'update'])->name('air-budget-tagging-kjg.update');
    Route::delete('/{id}', [AirBudgetTaggingKjgController::class, 'destroy'])->name('air-budget-tagging-kjg.destroy');
});

// PT. Perta Samtan Gas
Route::prefix('monev/shg/input-data/perta-samtan-gas')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PertaSamtanGasController::class, 'index'])->name('perta-samtan-gas');
    Route::post('/', [PertaSamtanGasController::class, 'store'])->name('perta-samtan-gas');
    Route::get('/data', [PertaSamtanGasController::class, 'data'])->name('perta-samtan-gas.data');
    Route::put('/{id}', [PertaSamtanGasController::class, 'update'])->name('perta-samtan-gas.update');
    Route::delete('/{id}', [PertaSamtanGasController::class, 'destroy'])->name('perta-samtan-gas.destroy');
});

// Mandatory Certification PTSG
Route::prefix('monev/shg/input-data/mandatory-certification-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationPtsgController::class, 'index'])->name('mandatory-certification-ptsg');
    Route::post('/', [MandatoryCertificationPtsgController::class, 'store'])->name('mandatory-certification-ptsg.store');
    Route::get('/data', [MandatoryCertificationPtsgController::class, 'data'])->name('mandatory-certification-ptsg.data');
    // Route::get('/{id}/edit', [MandatoryCertificationPtsgController::class, 'edit'])->name('mandatory-certification-ptsg.edit');
    Route::put('/{id}', [MandatoryCertificationPtsgController::class, 'update'])->name('mandatory-certification-ptsg.update');
    Route::delete('/{id}', [MandatoryCertificationPtsgController::class, 'destroy'])->name('mandatory-certification-ptsg.destroy');
});

// Asset Breakdown PTSG
Route::prefix('monev/shg/input-data/asset-breakdown-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownPtsgController::class, 'index'])->name('asset-breakdown-ptsg');
    Route::post('/', [AssetBreakdownPtsgController::class, 'store'])->name('asset-breakdown-ptsg.store');
    Route::get('/data', [AssetBreakdownPtsgController::class, 'data'])->name('asset-breakdown-ptsg.data');
    // Route::get('/{id}', [AssetBreakdownPtsgController::class, 'show'])->name('asset-breakdown-ptsg.show');
    Route::put('/{id}', [AssetBreakdownPtsgController::class, 'update'])->name('asset-breakdown-ptsg.update');
    Route::delete('/{id}', [AssetBreakdownPtsgController::class, 'destroy'])->name('asset-breakdown-ptsg.destroy');
});
// Kondisi Vacant Fungsi AIMS PTSG
Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAimsPtsgController::class, 'index'])->name('kondisi-vacant-fungsi-aims-ptsg');
    Route::post('/', [KondisiVacantAimsPtsgController::class, 'store'])->name('kondisi-vacant-fungsi-aims-ptsg.store');
    Route::get('/data', [KondisiVacantAimsPtsgController::class, 'data'])->name('kondisi-vacant-fungsi-aims-ptsg.data');
    // Route::get('/{id}/edit', [KondisiVacantAimsPtsgController::class, 'edit'])->name('kondisi-vacant-fungsi-aims-ptsg.edit');
    Route::put('/{id}', [KondisiVacantAimsPtsgController::class, 'update'])->name('kondisi-vacant-fungsi-aims-ptsg.update');
    Route::delete('/{id}', [KondisiVacantAimsPtsgController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-ptsg.destroy');
});



Route::prefix('monev/shg/input-data/status-plo-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloPtsgController::class, 'index'])->name('status-plo-ptsg');
    Route::post('/', [StatusPloPtsgController::class, 'store'])->name('status-plo-ptsg.store');
    Route::get('/data', [StatusPloPtsgController::class, 'data'])->name('status-plo-ptsg.data');
    Route::put('/{id}', [StatusPloPtsgController::class, 'update'])->name('status-plo-ptsg.update');
    Route::delete('/{id}', [StatusPloPtsgController::class, 'destroy'])->name('status-plo-ptsg.destroy');
});

Route::prefix('monev/shg/input-data/pelatihan-aims-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsPtsgController::class, 'index'])->name('pelatihan-aims-ptsg');
    Route::post('/', [PelatihanAimsPtsgController::class, 'store'])->name('pelatihan-aims-ptsg.store');
    Route::get('/data', [PelatihanAimsPtsgController::class, 'data'])->name('pelatihan-aims-ptsg.data');
    // Route::get('/{id}/edit', [PelatihanAimsPtsgController::class, 'edit'])->name('pelatihan-aims-ptsg.edit');
    Route::put('/{id}', [PelatihanAimsPtsgController::class, 'update'])->name('pelatihan-aims-ptsg.update');
    Route::delete('/{id}', [PelatihanAimsPtsgController::class, 'destroy'])->name('pelatihan-aims-ptsg.destroy');
});

// Sistem Informasi Aims PTSG
Route::prefix('monev/shg/input-data/sistem-informasi-aims-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsPtsgController::class, 'index'])->name('sistem-informasi-aims-ptsg');
    Route::post('/', [SistemInformasiAimsPtsgController::class, 'store'])->name('sistem-informasi-aims-ptsg.store');
    Route::get('/data', [SistemInformasiAimsPtsgController::class, 'data'])->name('sistem-informasi-aims-ptsg.data');
    // Route::get('/{id}/edit', [SistemInformasiAimsPtsgController::class, 'edit'])->name('sistem-informasi-aims-ptsg.edit');
    Route::put('/{id}', [SistemInformasiAimsPtsgController::class, 'update'])->name('sistem-informasi-aims-ptsg.update');
    Route::delete('/{id}', [SistemInformasiAimsPtsgController::class, 'destroy'])->name('sistem-informasi-aims-ptsg.destroy');
});

// Rencana Pemeliharaan Besar PTSG
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-besar-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanPtsgController::class, 'index'])->name('rencana-pemeliharaan-besar-ptsg');
    Route::post('/', [RencanaPemeliharaanPtsgController::class, 'store'])->name('rencana-pemeliharaan-besar-ptsg.store');
    Route::get('/data', [RencanaPemeliharaanPtsgController::class, 'data'])->name('rencana-pemeliharaan-besar-ptsg.data');
    // Route::get('/{id}/edit', [RencanaPemeliharaanBesarPtsgController::class, 'edit'])->name('rencana-pemeliharaan-besar-ptsg.edit');
    Route::put('/{id}', [RencanaPemeliharaanPtsgController::class, 'update'])->name('rencana-pemeliharaan-besar-ptsg.update');
    Route::delete('/{id}', [RencanaPemeliharaanPtsgController::class, 'destroy'])->name('rencana-pemeliharaan-besar-ptsg.destroy');
});

// Availability PTSG
Route::prefix('monev/shg/input-data/availability-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilityPtsgController::class, 'index'])->name('availability-ptsg');
    Route::post('/', [AvailabilityPtsgController::class, 'store'])->name('availability-ptsg.store');
    Route::get('/data', [AvailabilityPtsgController::class, 'data'])->name('availability-ptsg.data');
    // Route::get('/{id}/edit', [AvailabilityPtsgController::class, 'edit'])->name('availability-ptsg.edit');
    Route::put('/{id}', [AvailabilityPtsgController::class, 'update'])->name('availability-ptsg.update');
    Route::delete('/{id}', [AvailabilityPtsgController::class, 'destroy'])->name('availability-ptsg.destroy');
});

// Realisasi Anggaran AI PTSG
Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiPtsgController::class, 'index'])->name('realisasi-anggaran-ai-ptsg');
    Route::post('/', [RealisasiAnggaranAiPtsgController::class, 'store'])->name('realisasi-anggaran-ai-ptsg.store');
    Route::get('/data', [RealisasiAnggaranAiPtsgController::class, 'data'])->name('realisasi-anggaran-ai-ptsg.data');
    // Route::get('/{id}/edit', [RealisasiAnggaranAIPtsgController::class, 'edit'])->name('realisasi-anggaran-ai-ptsg.edit');
    Route::put('/{id}', [RealisasiAnggaranAiPtsgController::class, 'update'])->name('realisasi-anggaran-ai-ptsg.update');
    Route::delete('/{id}', [RealisasiAnggaranAiPtsgController::class, 'destroy'])->name('realisasi-anggaran-ai-ptsg.destroy');
});

// Realisasi Progress Fisik AI PTSG
Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAiPtsgController::class, 'index'])->name('realisasi-progress-fisik-ai-ptsg');
    Route::post('/', [RealisasiProgressFisikAiPtsgController::class, 'store'])->name('realisasi-progress-fisik-ai-ptsg.store');
    Route::get('/data', [RealisasiProgressFisikAiPtsgController::class, 'data'])->name('realisasi-progress-fisik-ai-ptsg.data');
    // Route::get('/{id}/edit', [RealisasiProgressFisikAiPtsgController::class, 'edit'])->name('realisasi-progress-fisik-ai-ptsg.edit');
    Route::put('/{id}', [RealisasiProgressFisikAiPtsgController::class, 'update'])->name('realisasi-progress-fisik-ai-ptsg.update');
    Route::delete('/{id}', [RealisasiProgressFisikAiPtsgController::class, 'destroy'])->name('realisasi-progress-fisik-ai-ptsg.destroy');
});

// PGN LNG Indonesia
Route::prefix('monev/shg/input-data/pgn-lng-indonesia')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusAssetAIPLIController::class, 'index'])->name('pgn-lng-indonesia');
    Route::post('/', [StatusAssetAIPLIController::class, 'store'])->name('pgn-lng-indonesia.store');
    Route::get('/data', [StatusAssetAIPLIController::class, 'data'])->name('pgn-lng-indonesia.data');
    // Route::get('/{id}/edit', [PgnLngIndonesiaController::class, 'edit'])->name('pgn-lng-indonesia.edit');
    Route::put('/{id}', [StatusAssetAIPLIController::class, 'update'])->name('pgn-lng-indonesia.update');
    Route::delete('/{id}', [StatusAssetAIPLIController::class, 'destroy'])->name('pgn-lng-indonesia.destroy');
});

// Status PLO PLI
Route::prefix('monev/shg/input-data/status-plo-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloPliController::class, 'index'])->name('status-plo-pli');
    Route::post('/', [StatusPloPLIController::class, 'store'])->name('status-plo-pli.store');
    Route::get('/data', [StatusPloPLIController::class, 'data'])->name('status-plo-pli.data');
    // Route::get('/{id}/edit', [StatusPloPLIController::class, 'edit'])->name('status-plo-pli.edit');
    Route::put('/{id}', [StatusPloPLIController::class, 'update'])->name('status-plo-pli.update');
    Route::delete('/{id}', [StatusPloPLIController::class, 'destroy'])->name('status-plo-pli.destroy');
});

Route::prefix('monev/shg/input-data/mandatory-certification-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationPliController::class, 'index'])->name('mandatory-certification-pli');
    Route::post('/', [MandatoryCertificationPliController::class, 'store'])->name('mandatory-certification-pli.store');
    Route::get('/data', [MandatoryCertificationPliController::class, 'data'])->name('mandatory-certification-pli.data');
    // Route::get('/{id}/edit', [MandatoryCertificationPliController::class, 'edit'])->name('mandatory-certification-pli.edit');
    Route::put('/{id}', [MandatoryCertificationPliController::class, 'update'])->name('mandatory-certification-pli.update');
    Route::delete('/{id}', [MandatoryCertificationPliController::class, 'destroy'])->name('mandatory-certification-pli.destroy');
});

Route::prefix('monev/shg/input-data/asset-breakdown-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownPliController::class, 'index'])->name('asset-breakdown-pli');
    Route::post('/', [AssetBreakdownPliController::class, 'store'])->name('asset-breakdown-pli.store');
    Route::get('/data', [AssetBreakdownPliController::class, 'data'])->name('asset-breakdown-pli.data');
    // Route::get('/{id}/edit', [AssetBreakdownPliController::class, 'edit'])->name('asset-breakdown-pli.edit');
    Route::put('/{id}', [AssetBreakdownPliController::class, 'update'])->name('asset-breakdown-pli.update');
    Route::delete('/{id}', [AssetBreakdownPliController::class, 'destroy'])->name('asset-breakdown-pli.destroy');
});

Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAimsPliController::class, 'index'])->name('kondisi-vacant-fungsi-aims-pli');
    Route::post('/', [KondisiVacantAIMSPliController::class, 'store'])->name('kondisi-vacant-fungsi-aims-pli.store');
    Route::get('/data', [KondisiVacantAIMSPliController::class, 'data'])->name('kondisi-vacant-fungsi-aims-pli.data');
    // Route::get('/{id}/edit', [KondisiVacantAIMSPliController::class, 'edit'])->name('kondisi-vacant-fungsi-aims-pli.edit');
    Route::put('/{id}', [KondisiVacantAIMSPliController::class, 'update'])->name('kondisi-vacant-fungsi-aims-pli.update');
    Route::delete('/{id}', [KondisiVacantAIMSPliController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-pli.destroy');
});
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-besar-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanPliController::class, 'index'])->name('rencana-pemeliharaan-besar-pli');
    Route::post('/', [RencanaPemeliharaanPliController::class, 'store'])->name('rencana-pemeliharaan-besar-pli.store');
    Route::get('/data', [RencanaPemeliharaanPliController::class, 'data'])->name('rencana-pemeliharaan-besar-pli.data');
    // Route::get('/{id}/edit', [RencanaPemeliharaanBesarPliController::class, 'edit'])->name('rencana-pemeliharaan-besar-pli.edit');
    Route::put('/{id}', [RencanaPemeliharaanPliController::class, 'update'])->name('rencana-pemeliharaan-besar-pli.update');
    Route::delete('/{id}', [RencanaPemeliharaanPliController::class, 'destroy'])->name('rencana-pemeliharaan-besar-pli.destroy');
});

Route::prefix('monev/shg/input-data/sistem-informasi-aims-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsPliController::class, 'index'])->name('sistem-informasi-aims-pli');
    Route::post('/', [SistemInformasiAimsPliController::class, 'store'])->name('sistem-informasi-aims-pli.store');
    Route::get('/data', [SistemInformasiAimsPliController::class, 'data'])->name('sistem-informasi-aims-pli.data');
    // Route::get('/{id}/edit', [SistemInformasiAimsPliController::class, 'edit'])->name('sistem-informasi-aims-pli.edit');
    Route::put('/{id}', [SistemInformasiAimsPliController::class, 'update'])->name('sistem-informasi-aims-pli.update');
    Route::delete('/{id}', [SistemInformasiAimsPliController::class, 'destroy'])->name('sistem-informasi-aims-pli.destroy');
});

Route::prefix('monev/shg/input-data/pelatihan-aims-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsPliController::class, 'index'])->name('pelatihan-aims-pli');
    Route::post('/', [PelatihanAimsPliController::class, 'store'])->name('pelatihan-aims-pli.store');
    Route::get('/data', [PelatihanAimsPliController::class, 'data'])->name('pelatihan-aims-pli.data');
    // Route::get('/{id}/edit', [PelatihanAimsPliController::class, 'edit'])->name('pelatihan-aims-pli.edit');
    Route::put('/{id}', [PelatihanAimsPliController::class, 'update'])->name('pelatihan-aims-pli.update');
    Route::delete('/{id}', [PelatihanAimsPliController::class, 'destroy'])->name('pelatihan-aims-pli.destroy');
});

Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiPLIController::class, 'index'])->name('realisasi-anggaran-ai-pli');
    Route::post('/', [RealisasiAnggaranAiPLIController::class, 'store'])->name('realisasi-anggaran-ai-pli.store');
    Route::get('/data', [RealisasiAnggaranAiPLIController::class, 'data'])->name('realisasi-anggaran-ai-pli.data');
    // Route::get('/{id}/edit', [RealisasiAnggaranAIPliController::class, 'edit'])->name('realisasi-anggaran-ai-pli.edit');
    Route::put('/{id}', [RealisasiAnggaranAiPLIController::class, 'update'])->name('realisasi-anggaran-ai-pli.update');
    Route::delete('/{id}', [RealisasiAnggaranAiPLIController::class, 'destroy'])->name('realisasi-anggaran-ai-pli.destroy');
});



Route::middleware(['auth'])->group(function () {
    Route::redirect('   ettings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
});


require __DIR__ . '/auth.php';
