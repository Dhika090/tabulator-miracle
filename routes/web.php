<?php

use App\Http\Controllers\MonevAimController;
use App\Http\Controllers\SHG\HasilMonevController;
use App\Http\Controllers\SHG\InputDataMonev\GagasEnergi\AirBudgetTaggingGEIController;
use App\Http\Controllers\SHG\InputDataMonev\GagasEnergi\AssetBreakdownGEIController;
use App\Http\Controllers\SHG\InputDataMonev\GagasEnergi\AvailabilityGEIController;
use App\Http\Controllers\SHG\InputDataMonev\GagasEnergi\KondisiVacantAimsGEIController;
use App\Http\Controllers\SHG\InputDataMonev\GagasEnergi\MandatoryCertificationGEIController;
use App\Http\Controllers\SHG\InputDataMonev\GagasEnergi\PelatihanAimsGEIController;
use App\Http\Controllers\SHG\InputDataMonev\GagasEnergi\RealisasiAnggaranAiGEIController;
use App\Http\Controllers\SHG\InputDataMonev\GagasEnergi\RealisasiProgressFisikAiGEIController;
use App\Http\Controllers\SHG\InputDataMonev\GagasEnergi\RencanaPemeliharaanGEIController;
use App\Http\Controllers\SHG\InputDataMonev\GagasEnergi\SistemInformasiAimsGEIController;
use App\Http\Controllers\SHG\InputDataMonev\GagasEnergi\StatusAssetAiGEIController;
use App\Http\Controllers\SHG\InputDataMonev\GagasEnergi\StatusPloGEIController;
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
use App\Http\Controllers\SHG\InputDataMonev\NusantaraRegas\AirBudgetTaggingNRController;
use App\Http\Controllers\SHG\InputDataMonev\NusantaraRegas\AssetBreakdownNRController;
use App\Http\Controllers\SHG\InputDataMonev\NusantaraRegas\AvailabilityNRController;
use App\Http\Controllers\SHG\InputDataMonev\NusantaraRegas\KondisiVacantNRController;
use App\Http\Controllers\SHG\InputDataMonev\NusantaraRegas\MandatoryCertificationNRController;
use App\Http\Controllers\SHG\InputDataMonev\NusantaraRegas\PelatihanAimsNRController;
use App\Http\Controllers\SHG\InputDataMonev\NusantaraRegas\RencanaPemeliharaanNRController;
use App\Http\Controllers\SHG\InputDataMonev\NusantaraRegas\SistemInformasiAimsNRController;
use App\Http\Controllers\SHG\InputDataMonev\NusantaraRegas\StatusAssetAiNRController;
use App\Http\Controllers\SHG\InputDataMonev\NusantaraRegas\StatusPloNRController;
use App\Http\Controllers\SHG\InputDataMonev\PertaArunGas\AirBudgetTaggingPAGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaArunGas\AssetBreakdownPAGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaArunGas\AvailabilityPAGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaArunGas\KondisiVacantAimsPAGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaArunGas\MandatoryCertificationPAGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaArunGas\PelatihanAimsPAGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaArunGas\RealisasiAnggaranAiPAGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaArunGas\RealisasiProgressFisikAiPAGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaArunGas\RencanaPemeliharaanPAGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaArunGas\SistemInformasiAimsPAGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaArunGas\StatusAssetAiPAGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaArunGas\StatusPloPAGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaDayaGas\AssetBreakdownPDGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaDayaGas\AvailabilityPDGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaDayaGas\KondisiVacantAimsPDGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaDayaGas\MandatoryCertificationPDGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaDayaGas\PelatihanAimsPDGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaDayaGas\RealisasiAnggaranAiPDGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaDayaGas\RealisasiProgressFisikAiPDGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaDayaGas\RencanaPemeliharaanPDGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaDayaGas\SistemInformasiAimsPDGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaDayaGas\StatusAssetAiPDGController;
use App\Http\Controllers\SHG\InputDataMonev\PertaDayaGas\StatusPloPDGController;
use App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga\AirBudgetTaggingPTGNController;
use App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga\AssetBreakdownPTGNController;
use App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga\AvailabilityPTGNController;
use App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga\KondisiVacantAimsPTGNController;
use App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga\MandatoryCertificationPTGNController;
use App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga\PelatihanAimsPTGNController;
use App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga\PlanMandatoryCertificationPTGNController;
use App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga\RealisasiAnggaranAiPTGNController;
use App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga\RealisasiProgressFisikAiPTGNController;
use App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga\RencanaPemeliharaanPTGNController;
use App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga\SistemInformasiAimsPTGNController;
use App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga\StatusAssetAiPTGNController;
use App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga\StatusPloPTGNController;
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
use App\Http\Controllers\SHG\InputDataMonev\PgnGlsm\AirBudgetTaggingGlsmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnGlsm\RealisasiAnggaranAiGlsmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnGlsm\RealisasiProgressFisikAiGlsmController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\AirBudgetTaggingPLIController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\AssetBreakdownPliController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\AvailabilityPLIController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\KondisiVacantAimsPliController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\MandatoryCertificationPliController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\PelatihanAimsPliController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\RealisasiAnggaranAiPLIController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\RealisasiProgressFisikAiPLIController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\RencanaPemeliharaanPliController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\SistemInformasiAimsPliController;
use App\Http\Controllers\SHG\InputDataMonev\pgnlngindonesia\StatusAssetAIPLIController;
use App\Http\Controllers\SHG\InputDataMonev\pgnLngIndonesia\StatusPloPliController;
use App\Http\Controllers\SHG\InputDataMonev\PgnOmm\AirBudgetTaggingOmmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnOmm\AssetBreakdownOmmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnOmm\AvailabilityOmmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnOmm\KondisiVacantAimsOmmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnOmm\MandatoryCertificationOmmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnOmm\PelatihanAimsOmmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnOmm\RealisasiAnggaranAiOmmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnOmm\RealisasiProgressFisikAiOmmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnOmm\ReliabilityOmmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnOmm\RencanaPemeliharaanOmmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnOmm\SapAssetOmmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnOmm\SistemInformasiAimsOmmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnOmm\StatusAssetAiOmmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnOmm\StatusPloOmmController;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor1\AirBudgetTaggingSOR1Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor1\AssetBreakdownSOR1Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor1\AvailabilitySOR1Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor1\KondisiVacantAimsSOR1Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor1\MandatoryCertificationSOR1Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor1\PelatihanAimsSOR1Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor1\RealisasiAnggaranAiSOR1Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor1\RealisasiProgressFisikAiSOR1Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor1\ReliabilitySOR1Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor1\RencanaPemeliharaanSOR1Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor1\SistemInformasiAimsSOR1Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor1\StatusAssetAiSOR1Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor1\StatusPloSOR1Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor2\AssetBreakdownSOR2Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor2\KondisiVacantAimsSOR2Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor2\MandatoryCertificationSOR2Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor2\PelatihanAimsSOR2Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor2\SistemInformasiAimsSOR2Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor2\StatusAssetAiSOR2Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor2\StatusPloSOR2Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor2\RencanaPemeliharaanSOR2Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor2\ReliabilitySOR2Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor2\AvailabilitySOR2Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor2\RealisasiAnggaranAiSOR2Controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor2\RealisasiProgressAiSOR2controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor2\AirBudgetTaggingSOR2controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor3\AirBudgetTaggingSOR3controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor3\AssetBreakdownSOR3controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor3\KondisiVacantAimsSOR3controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor3\MandatoryCertificationSOR3controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor3\PelatihanAimsSOR3controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor3\RealisasiAnggaranAimsSOR3controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor3\RealisasiProgressFisikAiSOR3controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor3\ReliabilitySOR3controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor3\RencanaPemeliharaanSOR3controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor3\SistemInformasiAimsSOR3controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor3\StatusAssetAiSOR3controller;
use App\Http\Controllers\SHG\InputDataMonev\PgnSor3\StatusPloSOR3controller;
use App\Http\Controllers\SHG\InputDataMonev\SakaEnergi\AirBudgetTaggingSakaController;
use App\Http\Controllers\SHG\InputDataMonev\SakaEnergi\AssetBreakdownSakaController;
use App\Http\Controllers\SHG\InputDataMonev\SakaEnergi\AvailabilitySakaController;
use App\Http\Controllers\SHG\InputDataMonev\SakaEnergi\KondisiVacantAimsSakaController;
use App\Http\Controllers\SHG\InputDataMonev\SakaEnergi\MandatoryCertificationSakaController;
use App\Http\Controllers\SHG\InputDataMonev\SakaEnergi\PelatihanAimsSakaController;
use App\Http\Controllers\SHG\InputDataMonev\SakaEnergi\RealisasiAnggaranAiSakaController;
use App\Http\Controllers\SHG\InputDataMonev\SakaEnergi\RealisasiProgressFisikAiSakaController;
use App\Http\Controllers\SHG\InputDataMonev\SakaEnergi\RencanaPemeliharaanSakaController;
use App\Http\Controllers\SHG\InputDataMonev\SakaEnergi\SistemInformasiAimsSakaController;
use App\Http\Controllers\SHG\InputDataMonev\SakaEnergi\StatusAssetAiSakaController;
use App\Http\Controllers\SHG\InputDataMonev\SakaEnergi\StatusPloSakaController;
use App\Http\Controllers\SHG\InputDataMonev\TransportasiGas\AirBudgetTaggingTGIController;
use App\Http\Controllers\SHG\InputDataMonev\TransportasiGas\AssetBreakdownTGIController;
use App\Http\Controllers\SHG\InputDataMonev\TransportasiGas\AvailabilityTGIController;
use App\Http\Controllers\SHG\InputDataMonev\TransportasiGas\KondisiVacantAimsTGIController;
use App\Http\Controllers\SHG\InputDataMonev\TransportasiGas\MandatoryCertificationTGIController;
use App\Http\Controllers\SHG\InputDataMonev\TransportasiGas\PelatihanAimsTGIController;
use App\Http\Controllers\SHG\InputDataMonev\TransportasiGas\RealisasiAnggaranAiTGIController;
use App\Http\Controllers\SHG\InputDataMonev\TransportasiGas\RealisasiProgressFisikAiTGIController;
use App\Http\Controllers\SHG\InputDataMonev\TransportasiGas\RencanaPemeliharaanTGIController;
use App\Http\Controllers\SHG\InputDataMonev\TransportasiGas\SistemInformasiAimsTGIController;
use App\Http\Controllers\SHG\InputDataMonev\TransportasiGas\StatusAssetAiTGIController;
use App\Http\Controllers\SHG\InputDataMonev\TransportasiGas\StatusPloTGIController;
use App\Http\Controllers\SHG\InputDataMonev\widarMandripa\AirBudetTaggingWmnController;
use App\Http\Controllers\SHG\InputDataMonev\WidarMandripa\AssetBreakdownController;
use App\Http\Controllers\SHG\InputDataMonev\widarMandripa\AvailabilityWmnController;
use App\Http\Controllers\SHG\InputDataMonev\widarMandripa\KondisiVacantAimsWmnController;
use App\Http\Controllers\SHG\InputDataMonev\WidarMandripa\MandatoryCertificationController;
use App\Http\Controllers\SHG\InputDataMonev\WidarMandripa\PelatihanAimsWmnController;
use App\Http\Controllers\SHG\InputDataMonev\WidarMandripa\PlanMandatoryCertificationController;
use App\Http\Controllers\SHG\InputDataMonev\widarMandripa\RealisasiAnggaranAiWmnController;
use App\Http\Controllers\SHG\InputDataMonev\widarMandripa\RealisasiProgressFisikAiWmnController;
use App\Http\Controllers\SHG\InputDataMonev\widarMandripa\RencanaPemeliharaanWmnController;
use App\Http\Controllers\SHG\InputDataMonev\widarMandripa\SisteminformasiAimsWmnController;
use App\Http\Controllers\SHG\InputDataMonev\widarMandripa\StatusAssetAiMwnController;
use App\Http\Controllers\SHG\InputDataMonev\WidarMandripa\StatusPloController;
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
    Route::put('/{id}', [MandatoryCertificationPtgController::class, 'update'])->name('mandatory-certification-ptg.update');
    Route::delete('/{id}', [MandatoryCertificationPtgController::class, 'destroy'])->name('mandatory-certification-ptg.destroy');
});

// SAP Asset PTG
Route::prefix('monev/shg/input-data/sap-asset-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SapAssetPtgController::class, 'index'])->name('sap-asset-ptg');
    Route::post('/', [SapAssetPtgController::class, 'store'])->name('sap-asset-ptg.store');
    Route::get('/data', [SapAssetPtgController::class, 'data'])->name('sap-asset-ptg.data');
    Route::put('/{id}', [SapAssetPtgController::class, 'update'])->name('sap-asset-ptg.update');
    Route::delete('/{id}', [SapAssetPtgController::class, 'destroy'])->name('sap-asset-ptg.destroy');
});

// Status PLO PTG
Route::prefix('monev/shg/input-data/status-plo-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloPtgController::class, 'index'])->name('status-plo-ptg');
    Route::post('/', [StatusPloPtgController::class, 'store'])->name('status-plo-ptg.store');
    Route::get('/data', [StatusPloPtgController::class, 'data'])->name('status-plo-ptg.data');
    Route::put('/{id}', [StatusPloPtgController::class, 'update'])->name('status-plo-ptg.update');
    Route::delete('/{id}', [StatusPloPtgController::class, 'destroy'])->name('status-plo-ptg.destroy');
});

// Asset Breakdown PTG
Route::prefix('monev/shg/input-data/asset-breakdown-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakDownPtgController::class, 'index'])->name('asset-breakdown-ptg');
    Route::post('/', [AssetBreakdownPtgController::class, 'store'])->name('asset-breakdown-ptg.store');
    Route::get('/data', [AssetBreakdownPtgController::class, 'data'])->name('asset-breakdown-ptg.data');
    Route::put('/{id}', [AssetBreakdownPtgController::class, 'update'])->name('asset-breakdown-ptg.update');
    Route::delete('/{id}', [AssetBreakdownPtgController::class, 'destroy'])->name('asset-breakdown-ptg.destroy');
});

// Kondisi Vacant Fungsi Aims PTG
Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAIMSPtgController::class, 'index'])->name('kondisi-vacant-fungsi-aims-ptg');
    Route::post('/', [KondisiVacantAIMSPtgController::class, 'store'])->name('kondisi-vacant-fungsi-aims-ptg.store');
    Route::get('/data', [KondisiVacantAIMSPtgController::class, 'data'])->name('kondisi-vacant-fungsi-aims-ptg.data');
    Route::put('/{id}', [KondisiVacantAIMSPtgController::class, 'update'])->name('kondisi-vacant-fungsi-aims-ptg.update');
    Route::delete('/{id}', [KondisiVacantAIMSPtgController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-ptg.destroy');
});

// Rencana Pemeliharaan Besar AIMS PTG
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-besar-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanBesarPtgController::class, 'index'])->name('rencana-pemeliharaan-besar-ptg');
    Route::post('/', [RencanaPemeliharaanBesarPtgController::class, 'store'])->name('rencana-pemeliharaan-besar-ptg.store');
    Route::get('/data', [RencanaPemeliharaanBesarPtgController::class, 'data'])->name('rencana-pemeliharaan-besar-ptg.data');
    Route::put('/{id}', [RencanaPemeliharaanBesarPtgController::class, 'update'])->name('rencana-pemeliharaan-besar-ptg.update');
    Route::delete('/{id}', [RencanaPemeliharaanBesarPtgController::class, 'destroy'])->name('rencana-pemeliharaan-besar-ptg.destroy');
});

// Sistem Informasi AIMS PTG
Route::prefix('monev/shg/input-data/sistem-informasi-aims-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsPtgController::class, 'index'])->name('sistem-informasi-aims-ptg');
    Route::post('/', [SistemInformasiAimsPtgController::class, 'store'])->name('sistem-informasi-aims-ptg.store');
    Route::get('/data', [SistemInformasiAimsPtgController::class, 'data'])->name('sistem-informasi-aims-ptg.data');
    Route::put('/{id}', [SistemInformasiAimsPtgController::class, 'update'])->name('sistem-informasi-aims-ptg.update');
    Route::delete('/{id}', [SistemInformasiAimsPtgController::class, 'destroy'])->name('sistem-informasi-aims-ptg.destroy');
});

// Pelatihan Aims PTG
Route::prefix('monev/shg/input-data/pelatihan-aims-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAIMSPtgController::class, 'index'])->name('pelatihan-aims-ptg');
    Route::post('/', [PelatihanAimsPtgController::class, 'store'])->name('pelatihan-aims-ptg.store');
    Route::get('/data', [PelatihanAimsPtgController::class, 'data'])->name('pelatihan-aims-ptg.data');
    Route::put('/{id}', [PelatihanAimsPtgController::class, 'update'])->name('pelatihan-aims-ptg.update');
    Route::delete('/{id}', [PelatihanAimsPtgController::class, 'destroy'])->name('pelatihan-aims-ptg.destroy');
});

// Realisasi Anggaran AI PTG
Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAIPtg2025Controller::class, 'index'])->name('realisasi-anggaran-ai-ptg');
    Route::post('/', [RealisasiAnggaranAIPtg2025Controller::class, 'store'])->name('realisasi-anggaran-ai-ptg.store');
    Route::get('/data', [RealisasiAnggaranAIPtg2025Controller::class, 'data'])->name('realisasi-anggaran-ai-ptg.data');
    Route::put('/{id}', [RealisasiAnggaranAIPtg2025Controller::class, 'update'])->name('realisasi-anggaran-ai-ptg.update');
    Route::delete('/{id}', [RealisasiAnggaranAIPtg2025Controller::class, 'destroy'])->name('realisasi-anggaran-ai-ptg.destroy');
});

// Realisasi Progress Fisik AI 2025 PTG
Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAI2025PtgController::class, 'index'])->name('realisasi-progress-fisik-ai-ptg');
    Route::post('/', [RealisasiProgressFisikAi2025PtgController::class, 'store'])->name('realisasi-progress-fisik-ai-ptg.store');
    Route::get('/data', [RealisasiProgressFisikAi2025PtgController::class, 'data'])->name('realisasi-progress-fisik-ai-ptg.data');
    Route::put('/{id}', [RealisasiProgressFisikAi2025PtgController::class, 'update'])->name('realisasi-progress-fisik-ai-ptg.update');
    Route::delete('/{id}', [RealisasiProgressFisikAi2025PtgController::class, 'destroy'])->name('realisasi-progress-fisik-ai-ptg.destroy');
});

// Availability PTG
Route::prefix('monev/shg/input-data/availability-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilityPtgController::class, 'index'])->name('availability-ptg');
    Route::post('/', [AvailabilityPtgController::class, 'store'])->name('availability-ptg.store');
    Route::get('/data', [AvailabilityPtgController::class, 'data'])->name('availability-ptg.data');
    Route::put('/{id}', [AvailabilityPtgController::class, 'update'])->name('availability-ptg.update');
    Route::delete('/{id}', [AvailabilityPtgController::class, 'destroy'])->name('availability-ptg.destroy');
});

// Air Budget Tagging PTG
Route::prefix('monev/shg/input-data/air-budget-tagging-ptg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingPtgController::class, 'index'])->name('air-budget-tagging-ptg');
    Route::post('/', [AirBudgetTaggingPtgController::class, 'store'])->name('air-budget-tagging-ptg.store');
    Route::get('/data', [AirBudgetTaggingPtgController::class, 'data'])->name('air-budget-tagging-ptg.data');
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
    Route::put('/{id}', [MandatoryCertificationKjgController::class, 'update'])->name('mandatory-certification-kjg.update');
    Route::delete('/{id}', [MandatoryCertificationKjgController::class, 'destroy'])->name('mandatory-certification-kjg.destroy');
});

Route::prefix('monev/shg/input-data/asset-breakdown-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownKjgController::class, 'index'])->name('asset-breakdown-kjg');
    Route::post('/', [AssetBreakdownKjgController::class, 'store'])->name('asset-breakdown-kjg.store');
    Route::get('/data', [AssetBreakdownKjgController::class, 'data'])->name('asset-breakdown-kjg.data');
    Route::put('/{id}', [AssetBreakdownKjgController::class, 'update'])->name('asset-breakdown-kjg.update');
    Route::delete('/{id}', [AssetBreakDownKjgController::class, 'destroy'])->name('asset-breakdown-kjg.destroy');
});

// Status PLO KJG
Route::prefix('monev/shg/input-data/status-plo-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloKjgController::class, 'index'])->name('status-plo-kjg');
    Route::post('/', [StatusPloKjgController::class, 'store'])->name('status-plo-kjg.store');
    Route::get('/data', [StatusPloKjgController::class, 'data'])->name('status-plo-kjg.data');
    Route::put('/{id}', [StatusPloKjgController::class, 'update'])->name('status-plo-kjg.update');
    Route::delete('/{id}', [StatusPloKjgController::class, 'destroy'])->name('status-plo-kjg.destroy');
});

Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAIMSKjgController::class, 'index'])->name('kondisi-vacant-fungsi-aims-kjg');
    Route::post('/', [KondisiVacantAIMSKjgController::class, 'store'])->name('kondisi-vacant-fungsi-aims-kjg.store');
    Route::get('/data', [KondisiVacantAIMSKjgController::class, 'data'])->name('kondisi-vacant-fungsi-aims-kjg.data');
    Route::put('/{id}', [KondisiVacantAIMSKjgController::class, 'update'])->name('kondisi-vacant-fungsi-aims-kjg.update');
    Route::delete('/{id}', [KondisiVacantAIMSKjgController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-kjg.destroy');
});

// Pelatihan Aims KJG
Route::prefix('monev/shg/input-data/pelatihan-aims-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsKjgController::class, 'index'])->name('pelatihan-aims-kjg');
    Route::post('/', [PelatihanAimsKjgController::class, 'store'])->name('pelatihan-aims-kjg.store');
    Route::get('/data', [PelatihanAimsKjgController::class, 'data'])->name('pelatihan-aims-kjg.data');
    Route::put('/{id}', [PelatihanAimsKjgController::class, 'update'])->name('pelatihan-aims-kjg.update');
    Route::delete('/{id}', [PelatihanAimsKjgController::class, 'destroy'])->name('pelatihan-aims-kjg.destroy');
});

// Sistem Informasi Aims KJG
Route::prefix('monev/shg/input-data/sistem-informasi-aims-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsKjgController::class, 'index'])->name('sistem-informasi-aims-kjg');
    Route::post('/', [SistemInformasiAimsKjgController::class, 'store'])->name('sistem-informasi-aims-kjg.store');
    Route::get('/data', [SistemInformasiAimsKjgController::class, 'data'])->name('sistem-informasi-aims-kjg.data');
    Route::put('/{id}', [SistemInformasiAimsKjgController::class, 'update'])->name('sistem-informasi-aims-kjg.update');
    Route::delete('/{id}', [SistemInformasiAimsKjgController::class, 'destroy'])->name('sistem-informasi-aims-kjg.destroy');
});

// Rencana Pemeliharaan Besar AIMS KJG
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-besar-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanBesarKjgController::class, 'index'])->name('rencana-pemeliharaan-besar-kjg');
    Route::post('/', [RencanaPemeliharaanBesarKjgController::class, 'store'])->name('rencana-pemeliharaan-besar-kjg.store');
    Route::get('/data', [RencanaPemeliharaanBesarKjgController::class, 'data'])->name('rencana-pemeliharaan-besar-kjg.data');
    Route::put('/{id}', [RencanaPemeliharaanBesarKjgController::class, 'update'])->name('rencana-pemeliharaan-besar-kjg.update');
    Route::delete('/{id}', [RencanaPemeliharaanBesarKjgController::class, 'destroy'])->name('rencana-pemeliharaan-besar-kjg.destroy');
});

// Realisasi Anggaran AI KJG
Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiKjg2025Controller::class, 'index'])->name('realisasi-anggaran-ai-kjg');
    Route::post('/', [RealisasiAnggaranAiKjg2025Controller::class, 'store'])->name('realisasi-anggaran-ai-kjg.store');
    Route::get('/data', [RealisasiAnggaranAiKjg2025Controller::class, 'data'])->name('realisasi-anggaran-ai-kjg.data');
    Route::put('/{id}', [RealisasiAnggaranAiKjg2025Controller::class, 'update'])->name('realisasi-anggaran-ai-kjg.update');
    Route::delete('/{id}', [RealisasiAnggaranAiKjg2025Controller::class, 'destroy'])->name('realisasi-anggaran-ai-kjg.destroy');
});

// Realisasi Progress Fisik AI KJG
Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAI2025KjgController::class, 'index'])->name('realisasi-progress-fisik-ai-kjg');
    Route::post('/', [RealisasiProgressFisikAI2025KjgController::class, 'store'])->name('realisasi-progress-fisik-ai-kjg.store');
    Route::get('/data', [RealisasiProgressFisikAI2025KjgController::class, 'data'])->name('realisasi-progress-fisik-ai-kjg.data');
    Route::put('/{id}', [RealisasiProgressFisikAI2025KjgController::class, 'update'])->name('realisasi-progress-fisik-ai-kjg.update');
    Route::delete('/{id}', [RealisasiProgressFisikAI2025KjgController::class, 'destroy'])->name('realisasi-progress-fisik-ai-kjg.destroy');
});

// Availability KJG
Route::prefix('monev/shg/input-data/availability-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilityKjgController::class, 'index'])->name('availability-kjg');
    Route::post('/', [AvailabilityKjgController::class, 'store'])->name('availability-kjg.store');
    Route::get('/data', [AvailabilityKjgController::class, 'data'])->name('availability-kjg.data');
    Route::put('/{id}', [AvailabilityKjgController::class, 'update'])->name('availability-kjg.update');
    Route::delete('/{id}', [AvailabilityKjgController::class, 'destroy'])->name('availability-kjg.destroy');
});

Route::prefix('monev/shg/input-data/air-budget-tagging-kjg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingKJGController::class, 'index'])->name('air-budget-tagging-kjg');
    Route::post('/', [AirBudgetTaggingKjgController::class, 'store'])->name('air-budget-tagging-kjg.store');
    Route::get('/data', [AirBudgetTaggingKjgController::class, 'data'])->name('air-budget-tagging-kjg.data');
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
    Route::put('/{id}', [MandatoryCertificationPtsgController::class, 'update'])->name('mandatory-certification-ptsg.update');
    Route::delete('/{id}', [MandatoryCertificationPtsgController::class, 'destroy'])->name('mandatory-certification-ptsg.destroy');
});

// Asset Breakdown PTSG
Route::prefix('monev/shg/input-data/asset-breakdown-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownPtsgController::class, 'index'])->name('asset-breakdown-ptsg');
    Route::post('/', [AssetBreakdownPtsgController::class, 'store'])->name('asset-breakdown-ptsg.store');
    Route::get('/data', [AssetBreakdownPtsgController::class, 'data'])->name('asset-breakdown-ptsg.data');
    Route::put('/{id}', [AssetBreakdownPtsgController::class, 'update'])->name('asset-breakdown-ptsg.update');
    Route::delete('/{id}', [AssetBreakdownPtsgController::class, 'destroy'])->name('asset-breakdown-ptsg.destroy');
});
// Kondisi Vacant Fungsi AIMS PTSG
Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAimsPtsgController::class, 'index'])->name('kondisi-vacant-fungsi-aims-ptsg');
    Route::post('/', [KondisiVacantAimsPtsgController::class, 'store'])->name('kondisi-vacant-fungsi-aims-ptsg.store');
    Route::get('/data', [KondisiVacantAimsPtsgController::class, 'data'])->name('kondisi-vacant-fungsi-aims-ptsg.data');
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
    Route::put('/{id}', [PelatihanAimsPtsgController::class, 'update'])->name('pelatihan-aims-ptsg.update');
    Route::delete('/{id}', [PelatihanAimsPtsgController::class, 'destroy'])->name('pelatihan-aims-ptsg.destroy');
});

// Sistem Informasi Aims PTSG
Route::prefix('monev/shg/input-data/sistem-informasi-aims-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsPtsgController::class, 'index'])->name('sistem-informasi-aims-ptsg');
    Route::post('/', [SistemInformasiAimsPtsgController::class, 'store'])->name('sistem-informasi-aims-ptsg.store');
    Route::get('/data', [SistemInformasiAimsPtsgController::class, 'data'])->name('sistem-informasi-aims-ptsg.data');
    Route::put('/{id}', [SistemInformasiAimsPtsgController::class, 'update'])->name('sistem-informasi-aims-ptsg.update');
    Route::delete('/{id}', [SistemInformasiAimsPtsgController::class, 'destroy'])->name('sistem-informasi-aims-ptsg.destroy');
});

// Rencana Pemeliharaan Besar PTSG
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-besar-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanPtsgController::class, 'index'])->name('rencana-pemeliharaan-besar-ptsg');
    Route::post('/', [RencanaPemeliharaanPtsgController::class, 'store'])->name('rencana-pemeliharaan-besar-ptsg.store');
    Route::get('/data', [RencanaPemeliharaanPtsgController::class, 'data'])->name('rencana-pemeliharaan-besar-ptsg.data');
    Route::put('/{id}', [RencanaPemeliharaanPtsgController::class, 'update'])->name('rencana-pemeliharaan-besar-ptsg.update');
    Route::delete('/{id}', [RencanaPemeliharaanPtsgController::class, 'destroy'])->name('rencana-pemeliharaan-besar-ptsg.destroy');
});

// Availability PTSG
Route::prefix('monev/shg/input-data/availability-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilityPtsgController::class, 'index'])->name('availability-ptsg');
    Route::post('/', [AvailabilityPtsgController::class, 'store'])->name('availability-ptsg.store');
    Route::get('/data', [AvailabilityPtsgController::class, 'data'])->name('availability-ptsg.data');
    Route::put('/{id}', [AvailabilityPtsgController::class, 'update'])->name('availability-ptsg.update');
    Route::delete('/{id}', [AvailabilityPtsgController::class, 'destroy'])->name('availability-ptsg.destroy');
});

// Realisasi Anggaran AI PTSG
Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiPtsgController::class, 'index'])->name('realisasi-anggaran-ai-ptsg');
    Route::post('/', [RealisasiAnggaranAiPtsgController::class, 'store'])->name('realisasi-anggaran-ai-ptsg.store');
    Route::get('/data', [RealisasiAnggaranAiPtsgController::class, 'data'])->name('realisasi-anggaran-ai-ptsg.data');
    Route::put('/{id}', [RealisasiAnggaranAiPtsgController::class, 'update'])->name('realisasi-anggaran-ai-ptsg.update');
    Route::delete('/{id}', [RealisasiAnggaranAiPtsgController::class, 'destroy'])->name('realisasi-anggaran-ai-ptsg.destroy');
});

// Realisasi Progress Fisik AI PTSG
Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-ptsg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAiPtsgController::class, 'index'])->name('realisasi-progress-fisik-ai-ptsg');
    Route::post('/', [RealisasiProgressFisikAiPtsgController::class, 'store'])->name('realisasi-progress-fisik-ai-ptsg.store');
    Route::get('/data', [RealisasiProgressFisikAiPtsgController::class, 'data'])->name('realisasi-progress-fisik-ai-ptsg.data');
    Route::put('/{id}', [RealisasiProgressFisikAiPtsgController::class, 'update'])->name('realisasi-progress-fisik-ai-ptsg.update');
    Route::delete('/{id}', [RealisasiProgressFisikAiPtsgController::class, 'destroy'])->name('realisasi-progress-fisik-ai-ptsg.destroy');
});

// PGN LNG Indonesia
Route::prefix('monev/shg/input-data/pgn-lng-indonesia')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusAssetAIPLIController::class, 'index'])->name('pgn-lng-indonesia');
    Route::post('/', [StatusAssetAIPLIController::class, 'store'])->name('pgn-lng-indonesia.store');
    Route::get('/data', [StatusAssetAIPLIController::class, 'data'])->name('pgn-lng-indonesia.data');
    Route::put('/{id}', [StatusAssetAIPLIController::class, 'update'])->name('pgn-lng-indonesia.update');
    Route::delete('/{id}', [StatusAssetAIPLIController::class, 'destroy'])->name('pgn-lng-indonesia.destroy');
});

// Status PLO PLI
Route::prefix('monev/shg/input-data/status-plo-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloPliController::class, 'index'])->name('status-plo-pli');
    Route::post('/', [StatusPloPLIController::class, 'store'])->name('status-plo-pli.store');
    Route::get('/data', [StatusPloPLIController::class, 'data'])->name('status-plo-pli.data');
    Route::put('/{id}', [StatusPloPLIController::class, 'update'])->name('status-plo-pli.update');
    Route::delete('/{id}', [StatusPloPLIController::class, 'destroy'])->name('status-plo-pli.destroy');
});

Route::prefix('monev/shg/input-data/mandatory-certification-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationPliController::class, 'index'])->name('mandatory-certification-pli');
    Route::post('/', [MandatoryCertificationPliController::class, 'store'])->name('mandatory-certification-pli.store');
    Route::get('/data', [MandatoryCertificationPliController::class, 'data'])->name('mandatory-certification-pli.data');
    Route::put('/{id}', [MandatoryCertificationPliController::class, 'update'])->name('mandatory-certification-pli.update');
    Route::delete('/{id}', [MandatoryCertificationPliController::class, 'destroy'])->name('mandatory-certification-pli.destroy');
});

Route::prefix('monev/shg/input-data/asset-breakdown-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownPliController::class, 'index'])->name('asset-breakdown-pli');
    Route::post('/', [AssetBreakdownPliController::class, 'store'])->name('asset-breakdown-pli.store');
    Route::get('/data', [AssetBreakdownPliController::class, 'data'])->name('asset-breakdown-pli.data');
    Route::put('/{id}', [AssetBreakdownPliController::class, 'update'])->name('asset-breakdown-pli.update');
    Route::delete('/{id}', [AssetBreakdownPliController::class, 'destroy'])->name('asset-breakdown-pli.destroy');
});

Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAimsPliController::class, 'index'])->name('kondisi-vacant-fungsi-aims-pli');
    Route::post('/', [KondisiVacantAIMSPliController::class, 'store'])->name('kondisi-vacant-fungsi-aims-pli.store');
    Route::get('/data', [KondisiVacantAIMSPliController::class, 'data'])->name('kondisi-vacant-fungsi-aims-pli.data');
    Route::put('/{id}', [KondisiVacantAIMSPliController::class, 'update'])->name('kondisi-vacant-fungsi-aims-pli.update');
    Route::delete('/{id}', [KondisiVacantAIMSPliController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-pli.destroy');
});
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-besar-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanPliController::class, 'index'])->name('rencana-pemeliharaan-besar-pli');
    Route::post('/', [RencanaPemeliharaanPliController::class, 'store'])->name('rencana-pemeliharaan-besar-pli.store');
    Route::get('/data', [RencanaPemeliharaanPliController::class, 'data'])->name('rencana-pemeliharaan-besar-pli.data');
    Route::put('/{id}', [RencanaPemeliharaanPliController::class, 'update'])->name('rencana-pemeliharaan-besar-pli.update');
    Route::delete('/{id}', [RencanaPemeliharaanPliController::class, 'destroy'])->name('rencana-pemeliharaan-besar-pli.destroy');
});

Route::prefix('monev/shg/input-data/sistem-informasi-aims-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsPliController::class, 'index'])->name('sistem-informasi-aims-pli');
    Route::post('/', [SistemInformasiAimsPliController::class, 'store'])->name('sistem-informasi-aims-pli.store');
    Route::get('/data', [SistemInformasiAimsPliController::class, 'data'])->name('sistem-informasi-aims-pli.data');
    Route::put('/{id}', [SistemInformasiAimsPliController::class, 'update'])->name('sistem-informasi-aims-pli.update');
    Route::delete('/{id}', [SistemInformasiAimsPliController::class, 'destroy'])->name('sistem-informasi-aims-pli.destroy');
});

Route::prefix('monev/shg/input-data/pelatihan-aims-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsPliController::class, 'index'])->name('pelatihan-aims-pli');
    Route::post('/', [PelatihanAimsPliController::class, 'store'])->name('pelatihan-aims-pli.store');
    Route::get('/data', [PelatihanAimsPliController::class, 'data'])->name('pelatihan-aims-pli.data');
    Route::put('/{id}', [PelatihanAimsPliController::class, 'update'])->name('pelatihan-aims-pli.update');
    Route::delete('/{id}', [PelatihanAimsPliController::class, 'destroy'])->name('pelatihan-aims-pli.destroy');
});

Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiPLIController::class, 'index'])->name('realisasi-anggaran-ai-pli');
    Route::post('/', [RealisasiAnggaranAiPLIController::class, 'store'])->name('realisasi-anggaran-ai-pli.store');
    Route::get('/data', [RealisasiAnggaranAiPLIController::class, 'data'])->name('realisasi-anggaran-ai-pli.data');
    Route::put('/{id}', [RealisasiAnggaranAiPLIController::class, 'update'])->name('realisasi-anggaran-ai-pli.update');
    Route::delete('/{id}', [RealisasiAnggaranAiPLIController::class, 'destroy'])->name('realisasi-anggaran-ai-pli.destroy');
});

Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAiPLIController::class, 'index'])->name('realisasi-progress-fisik-ai-pli');
    Route::post('/', [RealisasiProgressFisikAiPLIController::class, 'store'])->name('realisasi-progress-fisik-ai-pli.store');
    Route::get('/data', [RealisasiProgressFisikAiPLIController::class, 'data'])->name('realisasi-progress-fisik-ai-pli.data');
    Route::put('/{id}', [RealisasiProgressFisikAiPLIController::class, 'update'])->name('realisasi-progress-fisik-ai-pli.update');
    Route::delete('/{id}', [RealisasiProgressFisikAiPLIController::class, 'destroy'])->name('realisasi-progress-fisik-ai-pli.destroy');
});
Route::prefix('monev/shg/input-data/availability-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilityPLIController::class, 'index'])->name('availability-pli');
    Route::post('/', [AvailabilityPliController::class, 'store'])->name('availability-pli.store');
    Route::get('/data', [AvailabilityPliController::class, 'data'])->name('availability-pli.data');
    Route::put('/{id}', [AvailabilityPliController::class, 'update'])->name('availability-pli.update');
    Route::delete('/{id}', [AvailabilityPliController::class, 'destroy'])->name('availability-pli.destroy');
});
Route::prefix('monev/shg/input-data/air-budget-tagging-pli')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingPLIController::class, 'index'])->name('air-budget-tagging-pli');
    Route::post('/', [AirBudgetTaggingPliController::class, 'store'])->name('air-budget-tagging-pli.store');
    Route::get('/data', [AirBudgetTaggingPliController::class, 'data'])->name('air-budget-tagging-pli.data');
    Route::put('/{id}', [AirBudgetTaggingPliController::class, 'update'])->name('air-budget-tagging-pli.update');
    Route::delete('/{id}', [AirBudgetTaggingPliController::class, 'destroy'])->name('air-budget-tagging-pli.destroy');
});

Route::prefix('monev/shg/input-data/widar-mandripa-nusantara')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusAssetAiMwnController::class, 'index'])->name('widar-mandripa-nusantara');
    Route::post('/', [StatusAssetAiMwnController::class, 'store'])->name('widar-mandripa-nusantara.store');
    Route::get('/data', [StatusAssetAiMwnController::class, 'data'])->name('widar-mandripa-nusantara.data');
    Route::put('/{id}', [StatusAssetAiMwnController::class, 'update'])->name('widar-mandripa-nusantara.update');
    Route::delete('/{id}', [StatusAssetAiMwnController::class, 'destroy'])->name('widar-mandripa-nusantara.destroy');
});

Route::prefix('monev/shg/input-data/plan-mandatory-certification')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PlanMandatoryCertificationController::class, 'index'])->name('plan-mandatory-certification');
    Route::post('/', [PlanMandatoryCertificationController::class, 'store'])->name('plan-mandatory-certification.store');
    Route::get('/data', [PlanMandatoryCertificationController::class, 'data'])->name('plan-mandatory-certification.data');
    Route::put('/{id}', [PlanMandatoryCertificationController::class, 'update'])->name('plan-mandatory-certification.update');
    Route::delete('/{id}', [PlanMandatoryCertificationController::class, 'destroy'])->name('plan-mandatory-certification.destroy');
});

Route::prefix('monev/shg/input-data/mandatory-certification-wmn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationController::class, 'index'])->name('mandatory-certification-wmn');
    Route::post('/', [MandatoryCertificationController::class, 'store'])->name('mandatory-certification-wmn.store');
    Route::get('/data', [MandatoryCertificationController::class, 'data'])->name('mandatory-certification-wmn.data');
    Route::put('/{id}', [MandatoryCertificationController::class, 'update'])->name('mandatory-certification-wmn.update');
    Route::delete('/{id}', [MandatoryCertificationController::class, 'destroy'])->name('mandatory-certification-wmn.destroy');
});
Route::prefix('monev/shg/input-data/asset-breakdown-wmn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownController::class, 'index'])->name('asset-breakdown-wmn');
    Route::post('/', [AssetBreakdownController::class, 'store'])->name('asset-breakdown-wmn.store');
    Route::get('/data', [AssetBreakdownController::class, 'data'])->name('asset-breakdown-wmn.data');
    Route::put('/{id}', [AssetBreakdownController::class, 'update'])->name('asset-breakdown-wmn.update');
    Route::delete('/{id}', [AssetBreakdownController::class, 'destroy'])->name('asset-breakdown-wmn.destroy');
});

Route::prefix('monev/shg/input-data/status-plo-wmn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloController::class, 'index'])->name('status-plo-wmn');
    Route::post('/', [StatusPloController::class, 'store'])->name('status-plo-wmn.store');
    Route::get('/data', [StatusPloController::class, 'data'])->name('status-plo-wmn.data');
    Route::put('/{id}', [StatusPloController::class, 'update'])->name('status-plo-wmn.update');
    Route::delete('/{id}', [StatusPloController::class, 'destroy'])->name('status-plo-wmn.destroy');
});
Route::prefix('monev/shg/input-data/pelatihan-aims-wmn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsWmnController::class, 'index'])->name('pelatihan-aims-wmn');
    Route::post('/', [PelatihanAimsWmnController::class, 'store'])->name('pelatihan-aims-wmn.store');
    Route::get('/data', [PelatihanAimsWmnController::class, 'data'])->name('pelatihan-aims-wmn.data');
    Route::put('/{id}', [PelatihanAimsWmnController::class, 'update'])->name('pelatihan-aims-wmn.update');
    Route::delete('/{id}', [PelatihanAimsWmnController::class, 'destroy'])->name('pelatihan-aims-wmn.destroy');
});
Route::prefix('monev/shg/input-data/kondisi-vacant-aims-wmn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAimsWmnController::class, 'index'])->name('kondisi-vacant-aims-wmn');
    Route::post('/', [KondisiVacantAimsWmnController::class, 'store'])->name('kondisi-vacant-aims-wmn.store');
    Route::get('/data', [KondisiVacantAimsWmnController::class, 'data'])->name('kondisi-vacant-aims-wmn.data');
    Route::put('/{id}', [KondisiVacantAimsWmnController::class, 'update'])->name('kondisi-vacant-aims-wmn.update');
    Route::delete('/{id}', [KondisiVacantAimsWmnController::class, 'destroy'])->name('kondisi-vacant-aims-wmn.destroy');
});
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-wmn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanWmnController::class, 'index'])->name('rencana-pemeliharaan-wmn');
    Route::post('/', [RencanaPemeliharaanWmnController::class, 'store'])->name('rencana-pemeliharaan-wmn.store');
    Route::get('/data', [RencanaPemeliharaanWmnController::class, 'data'])->name('rencana-pemeliharaan-wmn.data');
    Route::put('/{id}', [RencanaPemeliharaanWmnController::class, 'update'])->name('rencana-pemeliharaan-wmn.update');
    Route::delete('/{id}', [RencanaPemeliharaanWmnController::class, 'destroy'])->name('rencana-pemeliharaan-wmn.destroy');
});

Route::prefix('monev/shg/input-data/sistem-informasi-aims-wmn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsWmnController::class, 'index'])->name('sistem-informasi-aims-wmn');
    Route::post('/', [SistemInformasiAimsWmnController::class, 'store'])->name('sistem-informasi-aims-wmn.store');
    Route::get('/data', [SistemInformasiAimsWmnController::class, 'data'])->name('sistem-informasi-aims-wmn.data');
    Route::put('/{id}', [SistemInformasiAimsWmnController::class, 'update'])->name('sistem-informasi-aims-wmn.update');
    Route::delete('/{id}', [SisteminformasiAimsWmnController::class, 'destroy'])->name('sistem-informasi-aims-wmn.destroy');
});
Route::prefix('monev/shg/input-data/availability-wmn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilityWmnController::class, 'index'])->name('availability-wmn');
    Route::post('/', [AvailabilityWmnController::class, 'store'])->name('availability-wmn.store');
    Route::get('/data', [AvailabilityWmnController::class, 'data'])->name('availability-wmn.data');
    Route::put('/{id}', [AvailabilityWmnController::class, 'update'])->name('availability-wmn.update');
    Route::delete('/{id}', [AvailabilityWmnController::class, 'destroy'])->name('availability-wmn.destroy');
});
Route::prefix('monev/shg/input-data/air-budget-tagging-wmn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudetTaggingWmnController::class, 'index'])->name('air-budget-tagging-wmn');
    Route::post('/', [AirBudetTaggingWmnController::class, 'store'])->name('air-budget-tagging-wmn.store');
    Route::get('/data', [AirBudetTaggingWmnController::class, 'data'])->name('air-budget-tagging-wmn.data');
    Route::put('/{id}', [AirBudetTaggingWmnController::class, 'update'])->name('air-budget-tagging-wmn.update');
    Route::delete('/{id}', [AirBudetTaggingWmnController::class, 'destroy'])->name('air-budget-tagging-wmn.destroy');
});

Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-wmn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiWmnController::class, 'index'])->name('realisasi-anggaran-ai-wmn');
    Route::post('/', [RealisasiAnggaranAiWmnController::class, 'store'])->name('realisasi-anggaran-ai-wmn.store');
    Route::get('/data', [RealisasiAnggaranAiWmnController::class, 'data'])->name('realisasi-anggaran-ai-wmn.data');
    Route::put('/{id}', [RealisasiAnggaranAiWmnController::class, 'update'])->name('realisasi-anggaran-ai-wmn.update');
    Route::delete('/{id}', [RealisasiAnggaranAiWmnController::class, 'destroy'])->name('realisasi-anggaran-ai-wmn.destroy');
});
Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-wmn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAiWmnController::class, 'index'])->name('realisasi-progress-fisik-ai-wmn');
    Route::post('/', [RealisasiProgressFisikAiWmnController::class, 'store'])->name('realisasi-progress-fisik-ai-wmn.store');
    Route::get('/data', [RealisasiProgressFisikAiWmnController::class, 'data'])->name('realisasi-progress-fisik-ai-wmn.data');
    Route::put('/{id}', [RealisasiProgressFisikAiWmnController::class, 'update'])->name('realisasi-progress-fisik-ai-wmn.update');
    Route::delete('/{id}', [RealisasiProgressFisikAiWmnController::class, 'destroy'])->name('realisasi-progress-fisik-ai-wmn.destroy');
});


Route::prefix('monev/shg/input-data/perta-arun-gas')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusAssetAiPAGController::class, 'index'])->name('perta-arun-gas');
    Route::post('/', [StatusAssetAiPagController::class, 'store'])->name('perta-arun-gas.store');
    Route::get('/data', [StatusAssetAiPagController::class, 'data'])->name('perta-arun-gas.data');
    Route::put('/{id}', [StatusAssetAiPagController::class, 'update'])->name('perta-arun-gas.update');
    Route::delete('/{id}', [StatusAssetAiPagController::class, 'destroy'])->name('perta-arun-gas.destroy');
});
Route::prefix('monev/shg/input-data/mandatory-certification-pag')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationPagController::class, 'index'])->name('mandatory-certification-pag');
    Route::post('/', [MandatoryCertificationPagController::class, 'store'])->name('mandatory-certification-pag.store');
    Route::get('/data', [MandatoryCertificationPagController::class, 'data'])->name('mandatory-certification-pag.data');
    Route::put('/{id}', [MandatoryCertificationPagController::class, 'update'])->name('mandatory-certification-pag.update');
    Route::delete('/{id}', [MandatoryCertificationPAGController::class, 'destroy'])->name('mandatory-certification-pag.destroy');
});
Route::prefix('monev/shg/input-data/asset-breakdown-pag')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownPAGController::class, 'index'])->name('asset-breakdown-pag');
    Route::post('/', [AssetBreakdownPagController::class, 'store'])->name('asset-breakdown-pag.store');
    Route::get('/data', [AssetBreakdownPagController::class, 'data'])->name('asset-breakdown-pag.data');
    Route::put('/{id}', [AssetBreakdownPagController::class, 'update'])->name('asset-breakdown-pag.update');
    Route::delete('/{id}', [AssetBreakdownPagController::class, 'destroy'])->name('asset-breakdown-pag.destroy');
});

Route::prefix('monev/shg/input-data/status-plo-pag')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloPagController::class, 'index'])->name('status-plo-pag');
    Route::post('/', [StatusPloPAGController::class, 'store'])->name('status-plo-pag.store');
    Route::get('/data', [StatusPloPagController::class, 'data'])->name('status-plo-pag.data');
    Route::put('/{id}', [StatusPloPagController::class, 'update'])->name('status-plo-pag.update');
    Route::delete('/{id}', [StatusPloPagController::class, 'destroy'])->name('status-plo-pag.destroy');
});
Route::prefix('monev/shg/input-data/kondisi-vacant-aims-pag')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAimsPAGController::class, 'index'])->name('kondisi-vacant-aims-pag');
    Route::post('/', [KondisiVacantAimsPAGController::class, 'store'])->name('kondisi-vacant-aims-pag.store');
    Route::get('/data', [KondisiVacantAimsPAGController::class, 'data'])->name('kondisi-vacant-aims-pag.data');
    Route::put('/{id}', [KondisiVacantAimsPAGController::class, 'update'])->name('kondisi-vacant-aims-pag.update');
    Route::delete('/{id}', [KondisiVacantAimsPAGController::class, 'destroy'])->name('kondisi-vacant-aims-pag.destroy');
});

Route::prefix('monev/shg/input-data/pelatihan-aims-pag')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsPAGController::class, 'index'])->name('pelatihan-aims-pag');
    Route::post('/', [PelatihanAimsPAGController::class, 'store'])->name('pelatihan-aims-pag.store');
    Route::get('/data', [PelatihanAimsPAGController::class, 'data'])->name('pelatihan-aims-pag.data');
    Route::put('/{id}', [PelatihanAimsPAGController::class, 'update'])->name('pelatihan-aims-pag.update');
    Route::delete('/{id}', [PelatihanAimsPAGController::class, 'destroy'])->name('pelatihan-aims-pag.destroy');
});

Route::prefix('monev/shg/input-data/sistem-informasi-aims-pag')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsPAGController::class, 'index'])->name('sistem-informasi-aims-pag');
    Route::post('/', [SistemInformasiAimsPAGController::class, 'store'])->name('sistem-informasi-aims-pag.store');
    Route::get('/data', [SistemInformasiAimsPAGController::class, 'data'])->name('sistem-informasi-aims-pag.data');
    Route::put('/{id}', [SistemInformasiAimsPAGController::class, 'update'])->name('sistem-informasi-aims-pag.update');
    Route::delete('/{id}', [SistemInformasiAimsPAGController::class, 'destroy'])->name('sistem-informasi-aims-pag.destroy');
});

Route::prefix('monev/shg/input-data/rencana-pemeliharaan-pag')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanPAGController::class, 'index'])->name('rencana-pemeliharaan-pag');
    Route::post('/', [RencanaPemeliharaanPAGController::class, 'store'])->name('rencana-pemeliharaan-pag.store');
    Route::get('/data', [RencanaPemeliharaanPAGController::class, 'data'])->name('rencana-pemeliharaan-pag.data');
    Route::put('/{id}', [RencanaPemeliharaanPAGController::class, 'update'])->name('rencana-pemeliharaan-pag.update');
    Route::delete('/{id}', [RencanaPemeliharaanPAGController::class, 'destroy'])->name('rencana-pemeliharaan-pag.destroy');
});
Route::prefix('monev/shg/input-data/availability-pag')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilityPAGController::class, 'index'])->name('availability-pag');
    Route::post('/', [AvailabilityPAGController::class, 'store'])->name('availability-pag.store');
    Route::get('/data', [AvailabilityPAGController::class, 'data'])->name('availability-pag.data');
    Route::put('/{id}', [AvailabilityPAGController::class, 'update'])->name('availability-pag.update');
    Route::delete('/{id}', [AvailabilityPAGController::class, 'destroy'])->name('availability-pag.destroy');
});
Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-pag')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiPagController::class, 'index'])->name('realisasi-anggaran-ai-pag');
    Route::post('/', [RealisasiAnggaranAiPagController::class, 'store'])->name('realisasi-anggaran-ai-pag.store');
    Route::get('/data', [RealisasiAnggaranAiPagController::class, 'data'])->name('realisasi-anggaran-ai-pag.data');
    Route::put('/{id}', [RealisasiAnggaranAiPagController::class, 'update'])->name('realisasi-anggaran-ai-pag.update');
    Route::delete('/{id}', [RealisasiAnggaranAiPAGController::class, 'destroy'])->name('realisasi-anggaran-ai-pag.destroy');
});

Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-pag')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAiPAGController::class, 'index'])->name('realisasi-progress-fisik-ai-pag');
    Route::post('/', [RealisasiProgressFisikAiPagController::class, 'store'])->name('realisasi-progress-fisik-ai-pag.store');
    Route::get('/data', [RealisasiProgressFisikAiPagController::class, 'data'])->name('realisasi-progress-fisik-ai-pag.data');
    Route::put('/{id}', [RealisasiProgressFisikAiPagController::class, 'update'])->name('realisasi-progress-fisik-ai-pag.update');
    Route::delete('/{id}', [RealisasiProgressFisikAiPagController::class, 'destroy'])->name('realisasi-progress-fisik-ai-pag.destroy');
});

Route::prefix('monev/shg/input-data/air-budget-tagging-pag')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingPAGController::class, 'index'])->name('air-budget-tagging-pag');
    Route::post('/', [AirBudgetTaggingPAGController::class, 'store'])->name('air-budget-tagging-pag.store');
    Route::get('/data', [AirBudgetTaggingPAGController::class, 'data'])->name('air-budget-tagging-pag.data');
    Route::put('/{id}', [AirBudgetTaggingPAGController::class, 'update'])->name('air-budget-tagging-pag.update');
    Route::delete('/{id}', [AirBudgetTaggingPAGController::class, 'destroy'])->name('air-budget-tagging-pag.destroy');
});

// Perta Daya Gas
Route::prefix('monev/shg/input-data/perta-daya-gas')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusAssetAiPDGController::class, 'index'])->name('perta-daya-gas');
    Route::post('/', [StatusAssetAiPDGController::class, 'store'])->name('perta-daya-gas.store');
    Route::get('/data', [StatusAssetAiPDGController::class, 'data'])->name('perta-daya-gas.data');
    Route::put('/{id}', [StatusAssetAiPDGController::class, 'update'])->name('perta-daya-gas.update');
    Route::delete('/{id}', [StatusAssetAiPDGController::class, 'destroy'])->name('perta-daya-gas.destroy');
});

Route::prefix('monev/shg/input-data/mandatory-certification-pdg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationPDGController::class, 'index'])->name('mandatory-certification-pdg');
    Route::post('/', [MandatoryCertificationPdgController::class, 'store'])->name('mandatory-certification-pdg.store');
    Route::get('/data', [MandatoryCertificationPdgController::class, 'data'])->name('mandatory-certification-pdg.data');
    Route::put('/{id}', [MandatoryCertificationPdgController::class, 'update'])->name('mandatory-certification-pdg.update');
    Route::delete('/{id}', [MandatoryCertificationPdgController::class, 'destroy'])->name('mandatory-certification-pdg.destroy');
});

Route::prefix('monev/shg/input-data/status-plo-pdg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloPDGController::class, 'index'])->name('status-plo-pdg');
    Route::post('/', [StatusPloPDGController::class, 'store'])->name('status-plo-pdg.store');
    Route::get('/data', [StatusPloPdgController::class, 'data'])->name('status-plo-pdg.data');
    Route::put('/{id}', [StatusPloPdgController::class, 'update'])->name('status-plo-pdg.update');
    Route::delete('/{id}', [StatusPloPdgController::class, 'destroy'])->name('status-plo-pdg.destroy');
});
Route::prefix('monev/shg/input-data/asset-breakdown-pdg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownPDGController::class, 'index'])->name('asset-breakdown-pdg');
    Route::post('/', [AssetBreakdownPDGController::class, 'store'])->name('asset-breakdown-pdg.store');
    Route::get('/data', [AssetBreakdownPDGController::class, 'data'])->name('asset-breakdown-pdg.data');
    Route::put('/{id}', [AssetBreakdownPDGController::class, 'update'])->name('asset-breakdown-pdg.update');
    Route::delete('/{id}', [AssetBreakdownPDGController::class, 'destroy'])->name('asset-breakdown-pdg.destroy');
});

Route::prefix('monev/shg/input-data/pelatihan-aims-pdg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsPDGController::class, 'index'])->name('pelatihan-aims-pdg');
    Route::post('/', [PelatihanAimsPDGController::class, 'store'])->name('pelatihan-aims-pdg.store');
    Route::get('/data', [PelatihanAimsPDGController::class, 'data'])->name('pelatihan-aims-pdg.data');
    Route::put('/{id}', [PelatihanAimsPDGController::class, 'update'])->name('pelatihan-aims-pdg.update');
    Route::delete('/{id}', [PelatihanAimsPDGController::class, 'destroy'])->name('pelatihan-aims-pdg.destroy');
});

Route::prefix('monev/shg/input-data/kondisi-vacant-aims-pdg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAimsPDGController::class, 'index'])->name('kondisi-vacant-aims-pdg');
    Route::post('/', [KondisiVacantAimsPDGController::class, 'store'])->name('kondisi-vacant-aims-pdg.store');
    Route::get('/data', [KondisiVacantAimsPDGController::class, 'data'])->name('kondisi-vacant-aims-pdg.data');
    Route::put('/{id}', [KondisiVacantAimsPDGController::class, 'update'])->name('kondisi-vacant-aims-pdg.update');
    Route::delete('/{id}', [KondisiVacantAimsPDGController::class, 'destroy'])->name('kondisi-vacant-aims-pdg.destroy');
});

Route::prefix('monev/shg/input-data/availability-pdg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilityPdgController::class, 'index'])->name('availability-pdg');
    Route::post('/', [AvailabilityPDGController::class, 'store'])->name('availability-pdg.store');
    Route::get('/data', [AvailabilityPdgController::class, 'data'])->name('availability-pdg.data');
    Route::put('/{id}', [AvailabilityPdgController::class, 'update'])->name('availability-pdg.update');
    Route::delete('/{id}', [AvailabilityPdgController::class, 'destroy'])->name('availability-pdg.destroy');
});
Route::prefix('monev/shg/input-data/sistem-informasi-aims-pdg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsPDGController::class, 'index'])->name('sistem-informasi-aims-pdg');
    Route::post('/', [SistemInformasiAimsPdgController::class, 'store'])->name('sistem-informasi-aims-pdg.store');
    Route::get('/data', [SistemInformasiAimsPdgController::class, 'data'])->name('sistem-informasi-aims-pdg.data');
    Route::put('/{id}', [SistemInformasiAimsPdgController::class, 'update'])->name('sistem-informasi-aims-pdg.update');
    Route::delete('/{id}', [SistemInformasiAimsPdgController::class, 'destroy'])->name('sistem-informasi-aims-pdg.destroy');
});

Route::prefix('monev/shg/input-data/rencana-pemeliharaan-pdg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanPDGController::class, 'index'])->name('rencana-pemeliharaan-pdg');
    Route::post('/', [RencanaPemeliharaanPdgController::class, 'store'])->name('rencana-pemeliharaan-pdg.store');
    Route::get('/data', [RencanaPemeliharaanPdgController::class, 'data'])->name('rencana-pemeliharaan-pdg.data');
    Route::put('/{id}', [RencanaPemeliharaanPdgController::class, 'update'])->name('rencana-pemeliharaan-pdg.update');
    Route::delete('/{id}', [RencanaPemeliharaanPdgController::class, 'destroy'])->name('rencana-pemeliharaan-pdg.destroy');
});

Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-pdg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiPDGController::class, 'index'])->name('realisasi-anggaran-ai-pdg');
    Route::post('/', [RealisasiAnggaranAIPDGController::class, 'store'])->name('realisasi-anggaran-ai-pdg.store');
    Route::get('/data', [RealisasiAnggaranAIPDGController::class, 'data'])->name('realisasi-anggaran-ai-pdg.data');
    Route::put('/{id}', [RealisasiAnggaranAIPDGController::class, 'update'])->name('realisasi-anggaran-ai-pdg.update');
    Route::delete('/{id}', [RealisasiAnggaranAIPDGController::class, 'destroy'])->name('realisasi-anggaran-ai-pdg.destroy');
});
Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-pdg')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAiPDGController::class, 'index'])->name('realisasi-progress-fisik-ai-pdg');
    Route::post('/', [RealisasiProgressFisikAiPdgController::class, 'store'])->name('realisasi-progress-fisik-ai-pdg.store');
    Route::get('/data', [RealisasiProgressFisikAiPdgController::class, 'data'])->name('realisasi-progress-fisik-ai-pdg.data');
    Route::put('/{id}', [RealisasiProgressFisikAiPdgController::class, 'update'])->name('realisasi-progress-fisik-ai-pdg.update');
    Route::delete('/{id}', [RealisasiProgressFisikAiPdgController::class, 'destroy'])->name('realisasi-progress-fisik-ai-pdg.destroy');
});

// Pertagas Niaga
Route::prefix('monev/shg/input-data/pertagas-niaga')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusAssetAiPTGNController::class, 'index'])->name('pertagas-niaga');
    Route::post('/', [StatusAssetAiPTGNController::class, 'store'])->name('pertagas-niaga.store');
    Route::get('/data', [StatusAssetAiPTGNController::class, 'data'])->name('pertagas-niaga.data');
    Route::put('/{id}', [StatusAssetAiPTGNController::class, 'update'])->name('pertagas-niaga.update');
    Route::delete('/{id}', [StatusAssetAiPTGNController::class, 'destroy'])->name('pertagas-niaga.destroy');
});
Route::prefix('monev/shg/input-data/plan-mandatory-certification-ptgn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PlanMandatoryCertificationPTGNController::class, 'index'])->name('plan-mandatory-certification-ptgn');
    Route::post('/', [PlanMandatoryCertificationPtgnController::class, 'store'])->name('plan-mandatory-certification-ptgn.store');
    Route::get('/data', [PlanMandatoryCertificationPtgnController::class, 'data'])->name('plan-mandatory-certification-ptgn.data');
    Route::put('/{id}', [PlanMandatoryCertificationPtgnController::class, 'update'])->name('plan-mandatory-certification-ptgn.update');
    Route::delete('/{id}', [PlanMandatoryCertificationPtgnController::class, 'destroy'])->name('plan-mandatory-certification-ptgn.destroy');
});

Route::prefix('monev/shg/input-data/mandatory-certification-ptgn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationPTGNController::class, 'index'])->name('mandatory-certification-ptgn');
    Route::post('/', [MandatoryCertificationPtgnController::class, 'store'])->name('mandatory-certification-ptgn.store');
    Route::get('/data', [MandatoryCertificationPtgnController::class, 'data'])->name('mandatory-certification-ptgn.data');
    Route::put('/{id}', [MandatoryCertificationPtgnController::class, 'update'])->name('mandatory-certification-ptgn.update');
    Route::delete('/{id}', [MandatoryCertificationPtgnController::class, 'destroy'])->name('mandatory-certification-ptgn.destroy');
});

Route::prefix('monev/shg/input-data/asset-breakdown-ptgn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownPTGNController::class, 'index'])->name('asset-breakdown-ptgn');
    Route::post('/', [AssetBreakdownPtgnController::class, 'store'])->name('asset-breakdown-ptgn.store');
    Route::get('/data', [AssetBreakdownPtgnController::class, 'data'])->name('asset-breakdown-ptgn.data');
    Route::put('/{id}', [AssetBreakdownPtgnController::class, 'update'])->name('asset-breakdown-ptgn.update');
    Route::delete('/{id}', [AssetBreakdownPtgnController::class, 'destroy'])->name('asset-breakdown-ptgn.destroy');
});
Route::prefix('monev/shg/input-data/status-plo-ptgn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloPTGNController::class, 'index'])->name('status-plo-ptgn');
    Route::post('/', [StatusPloPtgnController::class, 'store'])->name('status-plo-ptgn.store');
    Route::get('/data', [StatusPloPtgnController::class, 'data'])->name('status-plo-ptgn.data');
    Route::put('/{id}', [StatusPloPtgnController::class, 'update'])->name('status-plo-ptgn.update');
    Route::delete('/{id}', [StatusPloPtgnController::class, 'destroy'])->name('status-plo-ptgn.destroy');
});
Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-ptgn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAimsPTGNController::class, 'index'])->name('kondisi-vacant-fungsi-aims-ptgn');
    Route::post('/', [KondisiVacantAimsPtgnController::class, 'store'])->name('kondisi-vacant-fungsi-aims-ptgn.store');
    Route::get('/data', [KondisiVacantAimsPtgnController::class, 'data'])->name('kondisi-vacant-fungsi-aims-ptgn.data');
    Route::put('/{id}', [KondisiVacantAimsPtgnController::class, 'update'])->name('kondisi-vacant-fungsi-aims-ptgn.update');
    Route::delete('/{id}', [KondisiVacantAimsPtgnController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-ptgn.destroy');
});
Route::prefix('monev/shg/input-data/sistem-informasi-aims-ptgn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsPTGNController::class, 'index'])->name('sistem-informasi-aims-ptgn');
    Route::post('/', [SistemInformasiAimsPTGNController::class, 'store'])->name('sistem-informasi-aims-ptgn.store');
    Route::get('/data', [SistemInformasiAimsPTGNController::class, 'data'])->name('sistem-informasi-aims-ptgn.data');
    Route::put('/{id}', [SistemInformasiAimsPTGNController::class, 'update'])->name('sistem-informasi-aims-ptgn.update');
    Route::delete('/{id}', [SistemInformasiAimsPTGNController::class, 'destroy'])->name('sistem-informasi-aims-ptgn.destroy');
});
Route::prefix('monev/shg/input-data/pelatihan-aims-ptgn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsPTGNController::class, 'index'])->name('pelatihan-aims-ptgn');
    Route::post('/', [PelatihanAimsPTGNController::class, 'store'])->name('pelatihan-aims-ptgn.store');
    Route::get('/data', [PelatihanAimsPTGNController::class, 'data'])->name('pelatihan-aims-ptgn.data');
    Route::put('/{id}', [PelatihanAimsPTGNController::class, 'update'])->name('pelatihan-aims-ptgn.update');
    Route::delete('/{id}', [PelatihanAimsPTGNController::class, 'destroy'])->name('pelatihan-aims-ptgn.destroy');
});
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-ptgn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanPTGNController::class, 'index'])->name('rencana-pemeliharaan-ptgn');
    Route::post('/', [RencanaPemeliharaanPtgnController::class, 'store'])->name('rencana-pemeliharaan-ptgn.store');
    Route::get('/data', [RencanaPemeliharaanPtgnController::class, 'data'])->name('rencana-pemeliharaan-ptgn.data');
    Route::put('/{id}', [RencanaPemeliharaanPtgnController::class, 'update'])->name('rencana-pemeliharaan-ptgn.update');
    Route::delete('/{id}', [RencanaPemeliharaanPtgnController::class, 'destroy'])->name('rencana-pemeliharaan-ptgn.destroy');
});
Route::prefix('monev/shg/input-data/availability-ptgn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilityPTGNController::class, 'index'])->name('availability-ptgn');
    Route::post('/', [AvailabilityPTGNController::class, 'store'])->name('availability-ptgn.store');
    Route::get('/data', [AvailabilityPTGNController::class, 'data'])->name('availability-ptgn.data');
    Route::put('/{id}', [AvailabilityPTGNController::class, 'update'])->name('availability-ptgn.update');
    Route::delete('/{id}', [AvailabilityPTGNController::class, 'destroy'])->name('availability-ptgn.destroy');
});
Route::prefix('monev/shg/input-data/air-budget-tagging-ptgn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingPTGNController::class, 'index'])->name('air-budget-tagging-ptgn');
    Route::post('/', [AirBudgetTaggingPTGNController::class, 'store'])->name('air-budget-tagging-ptgn.store');
    Route::get('/data', [AirBudgetTaggingPTGNController::class, 'data'])->name('air-budget-tagging-ptgn.data');
    Route::put('/{id}', [AirBudgetTaggingPTGNController::class, 'update'])->name('air-budget-tagging-ptgn.update');
    Route::delete('/{id}', [AirBudgetTaggingPTGNController::class, 'destroy'])->name('air-budget-tagging-ptgn.destroy');
});

Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-ptgn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiPTGNController::class, 'index'])->name('realisasi-anggaran-ai-ptgn');
    Route::post('/', [RealisasiAnggaranAiPTGNController::class, 'store'])->name('realisasi-anggaran-ai-ptgn.store');
    Route::get('/data', [RealisasiAnggaranAiPTGNController::class, 'data'])->name('realisasi-anggaran-ai-ptgn.data');
    Route::put('/{id}', [RealisasiAnggaranAiPTGNController::class, 'update'])->name('realisasi-anggaran-ai-ptgn.update');
    Route::delete('/{id}', [RealisasiAnggaranAiPTGNController::class, 'destroy'])->name('realisasi-anggaran-ai-ptgn.destroy');
});

Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-ptgn')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAiPTGNController::class, 'index'])->name('realisasi-progress-fisik-ai-ptgn');
    Route::post('/', [RealisasiProgressFisikAiPTGNController::class, 'store'])->name('realisasi-progress-fisik-ai-ptgn.store');
    Route::get('/data', [RealisasiProgressFisikAiPTGNController::class, 'data'])->name('realisasi-progress-fisik-ai-ptgn.data');
    Route::put('/{id}', [RealisasiProgressFisikAiPTGNController::class, 'update'])->name('realisasi-progress-fisik-ai-ptgn.update');
    Route::delete('/{id}', [RealisasiProgressFisikAiPTGNController::class, 'destroy'])->name('realisasi-progress-fisik-ai-ptgn.destroy');
});

// PT GAGAS ENERGI INDONESIA
Route::prefix('monev/shg/input-data/gagas-energi-indonesia')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusAssetAiGEIController::class, 'index'])->name('gagas-energi-indonesia');
    Route::post('/', [StatusAssetAiGEIController::class, 'store'])->name('gagas-energi-indonesia.store');
    Route::get('/data', [StatusAssetAiGEIController::class, 'data'])->name('gagas-energi-indonesia.data');
    Route::put('/{id}', [StatusAssetAiGEIController::class, 'update'])->name('gagas-energi-indonesia.update');
    Route::delete('/{id}', [StatusAssetAiGEIController::class, 'destroy'])->name('gagas-energi-indonesia.destroy');
});

Route::prefix('monev/shg/input-data/mandatory-certification-gei')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationGEIController::class, 'index'])->name('mandatory-certification-gei');
    Route::post('/', [MandatoryCertificationGEIController::class, 'store'])->name('mandatory-certification-gei.store');
    Route::get('/data', [MandatoryCertificationGEIController::class, 'data'])->name('mandatory-certification-gei.data');
    Route::put('/{id}', [MandatoryCertificationGEIController::class, 'update'])->name('mandatory-certification-gei.update');
    Route::delete('/{id}', [MandatoryCertificationGEIController::class, 'destroy'])->name('mandatory-certification-gei.destroy');
});
Route::prefix('monev/shg/input-data/asset-breakdown-gei')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownGEIController::class, 'index'])->name('asset-breakdown-gei');
    Route::post('/', [AssetBreakdownGEIController::class, 'store'])->name('asset-breakdown-gei.store');
    Route::get('/data', [AssetBreakdownGEIController::class, 'data'])->name('asset-breakdown-gei.data');
    Route::put('/{id}', [AssetBreakdownGEIController::class, 'update'])->name('asset-breakdown-gei.update');
    Route::delete('/{id}', [AssetBreakdownGEIController::class, 'destroy'])->name('asset-breakdown-gei.destroy');
});

Route::prefix('monev/shg/input-data/sistem-informasi-aims-gei')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsGEIController::class, 'index'])->name('sistem-informasi-aims-gei');
    Route::post('/', [SistemInformasiAimsGEIController::class, 'store'])->name('sistem-informasi-aims-gei.store');
    Route::get('/data', [SistemInformasiAimsGEIController::class, 'data'])->name('sistem-informasi-aims-gei.data');
    Route::put('/{id}', [SistemInformasiAimsGEIController::class, 'update'])->name('sistem-informasi-aims-gei.update');
    Route::delete('/{id}', [SistemInformasiAimsGEIController::class, 'destroy'])->name('sistem-informasi-aims-gei.destroy');
});
Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-gei')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAimsGEIController::class, 'index'])->name('kondisi-vacant-fungsi-aims-gei');
    Route::post('/', [KondisiVacantAimsGEIController::class, 'store'])->name('kondisi-vacant-fungsi-aims-gei.store');
    Route::get('/data', [KondisiVacantAimsGEIController::class, 'data'])->name('kondisi-vacant-fungsi-aims-gei.data');
    Route::put('/{id}', [KondisiVacantAimsGEIController::class, 'update'])->name('kondisi-vacant-fungsi-aims-gei.update');
    Route::delete('/{id}', [KondisiVacantAimsGEIController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-gei.destroy');
});
Route::prefix('monev/shg/input-data/status-plo-gei')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloGEIController::class, 'index'])->name('status-plo-gei');
    Route::post('/', [StatusPloGEIController::class, 'store'])->name('status-plo-gei.store');
    Route::get('/data', [StatusPloGEIController::class, 'data'])->name('status-plo-gei.data');
    Route::put('/{id}', [StatusPloGEIController::class, 'update'])->name('status-plo-gei.update');
    Route::delete('/{id}', [StatusPloGEIController::class, 'destroy'])->name('status-plo-gei.destroy');
});
Route::prefix('monev/shg/input-data/pelatihan-aims-gei')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsGEIController::class, 'index'])->name('pelatihan-aims-gei');
    Route::post('/', [PelatihanAimsGEIController::class, 'store'])->name('pelatihan-aims-gei.store');
    Route::get('/data', [PelatihanAimsGEIController::class, 'data'])->name('pelatihan-aims-gei.data');
    Route::put('/{id}', [PelatihanAimsGEIController::class, 'update'])->name('pelatihan-aims-gei.update');
    Route::delete('/{id}', [PelatihanAimsGEIController::class, 'destroy'])->name('pelatihan-aims-gei.destroy');
});
Route::prefix('monev/shg/input-data/availability-gei')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilityGEIController::class, 'index'])->name('availability-gei');
    Route::post('/', [AvailabilityGEIController::class, 'store'])->name('availability-gei.store');
    Route::get('/data', [AvailabilityGEIController::class, 'data'])->name('availability-gei.data');
    Route::put('/{id}', [AvailabilityGEIController::class, 'update'])->name('availability-gei.update');
    Route::delete('/{id}', [AvailabilityGEIController::class, 'destroy'])->name('availability-gei.destroy');
});
Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-gei')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiGEIController::class, 'index'])->name('realisasi-anggaran-ai-gei');
    Route::post('/', [RealisasiAnggaranAiGEIController::class, 'store'])->name('realisasi-anggaran-ai-gei.store');
    Route::get('/data', [RealisasiAnggaranAiGEIController::class, 'data'])->name('realisasi-anggaran-ai-gei.data');
    Route::put('/{id}', [RealisasiAnggaranAiGEIController::class, 'update'])->name('realisasi-anggaran-ai-gei.update');
    Route::delete('/{id}', [RealisasiAnggaranAiGEIController::class, 'destroy'])->name('realisasi-anggaran-ai-gei.destroy');
});
Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-gei')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAiGEIController::class, 'index'])->name('realisasi-progress-fisik-ai-gei');
    Route::post('/', [RealisasiProgressFisikAiGEIController::class, 'store'])->name('realisasi-progress-fisik-ai-gei.store');
    Route::get('/data', [RealisasiProgressFisikAiGEIController::class, 'data'])->name('realisasi-progress-fisik-ai-gei.data');
    Route::put('/{id}', [RealisasiProgressFisikAiGEIController::class, 'update'])->name('realisasi-progress-fisik-ai-gei.update');
    Route::delete('/{id}', [RealisasiProgressFisikAiGEIController::class, 'destroy'])->name('realisasi-progress-fisik-ai-gei.destroy');
});
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-gei')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanGEIController::class, 'index'])->name('rencana-pemeliharaan-gei');
    Route::post('/', [RencanaPemeliharaanGEIController::class, 'store'])->name('rencana-pemeliharaan-gei.store');
    Route::get('/data', [RencanaPemeliharaanGEIController::class, 'data'])->name('rencana-pemeliharaan-gei.data');
    Route::put('/{id}', [RencanaPemeliharaanGEIController::class, 'update'])->name('rencana-pemeliharaan-gei.update');
    Route::delete('/{id}', [RencanaPemeliharaanGEIController::class, 'destroy'])->name('rencana-pemeliharaan-gei.destroy');
});
Route::prefix('monev/shg/input-data/air-budget-tagging-gei')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingGEIController::class, 'index'])->name('air-budget-tagging-gei');
    Route::post('/', [AirBudgetTaggingGEIController::class, 'store'])->name('air-budget-tagging-gei.store');
    Route::get('/data', [AirBudgetTaggingGEIController::class, 'data'])->name('air-budget-tagging-gei.data');
    Route::put('/{id}', [AirBudgetTaggingGEIController::class, 'update'])->name('air-budget-tagging-gei.update');
    Route::delete('/{id}', [AirBudgetTaggingGEIController::class, 'destroy'])->name('air-budget-tagging-gei.destroy');
});

Route::prefix('monev/shg/input-data/saka-energi-indonesia')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusAssetAiSakaController::class, 'index'])->name('saka-energi-indonesia');
    Route::post('/', [StatusAssetAiSakaController::class, 'store'])->name('saka-energi-indonesia.store');
    Route::get('/data', [StatusAssetAiSakaController::class, 'data'])->name('saka-energi-indonesia.data');
    Route::put('/{id}', [StatusAssetAiSakaController::class, 'update'])->name('saka-energi-indonesia.update');
    Route::delete('/{id}', [StatusAssetAiSakaController::class, 'destroy'])->name('saka-energi-indonesia.destroy');
});
Route::prefix('monev/shg/input-data/asset-breakdown-saka')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownSakaController::class, 'index'])->name('asset-breakdown-saka');
    Route::post('/', [AssetBreakdownSakaController::class, 'store'])->name('asset-breakdown-saka.store');
    Route::get('/data', [AssetBreakdownSakaController::class, 'data'])->name('asset-breakdown-saka.data');
    Route::put('/{id}', [AssetBreakdownSakaController::class, 'update'])->name('asset-breakdown-saka.update');
    Route::delete('/{id}', [AssetBreakdownSakaController::class, 'destroy'])->name('asset-breakdown-saka.destroy');
});
Route::prefix('monev/shg/input-data/status-plo-saka')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloSakaController::class, 'index'])->name('status-plo-saka');
    Route::post('/', [StatusPloSakaController::class, 'store'])->name('status-plo-saka.store');
    Route::get('/data', [StatusPloSakaController::class, 'data'])->name('status-plo-saka.data');
    Route::put('/{id}', [StatusPloSakaController::class, 'update'])->name('status-plo-saka.update');
    Route::delete('/{id}', [StatusPloSakaController::class, 'destroy'])->name('status-plo-saka.destroy');
});
Route::prefix('monev/shg/input-data/mandatory-certification-saka')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationSakaController::class, 'index'])->name('mandatory-certification-saka');
    Route::post('/', [MandatoryCertificationSakaController::class, 'store'])->name('mandatory-certification-saka.store');
    Route::get('/data', [MandatoryCertificationSakaController::class, 'data'])->name('mandatory-certification-saka.data');
    Route::put('/{id}', [MandatoryCertificationSakaController::class, 'update'])->name('mandatory-certification-saka.update');
    Route::delete('/{id}', [MandatoryCertificationSakaController::class, 'destroy'])->name('mandatory-certification-saka.destroy');
});
Route::prefix('monev/shg/input-data/kondisi-vacant-aims-saka')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAimsSakaController::class, 'index'])->name('kondisi-vacant-aims-saka');
    Route::post('/', [KondisiVacantAIMSSakaController::class, 'store'])->name('kondisi-vacant-aims-saka.store');
    Route::get('/data', [KondisiVacantAIMSSakaController::class, 'data'])->name('kondisi-vacant-aims-saka.data');
    Route::put('/{id}', [KondisiVacantAIMSSakaController::class, 'update'])->name('kondisi-vacant-aims-saka.update');
    Route::delete('/{id}', [KondisiVacantAIMSSakaController::class, 'destroy'])->name('kondisi-vacant-aims-saka.destroy');
});
Route::prefix('monev/shg/input-data/pelatihan-aims-saka')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsSakaController::class, 'index'])->name('pelatihan-aims-saka');
    Route::post('/', [PelatihanAimsSakaController::class, 'store'])->name('pelatihan-aims-saka.store');
    Route::get('/data', [PelatihanAimsSakaController::class, 'data'])->name('pelatihan-aims-saka.data');
    Route::put('/{id}', [PelatihanAimsSakaController::class, 'update'])->name('pelatihan-aims-saka.update');
    Route::delete('/{id}', [PelatihanAimsSakaController::class, 'destroy'])->name('pelatihan-aims-saka.destroy');
});
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-saka')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanSakaController::class, 'index'])->name('rencana-pemeliharaan-saka');
    Route::post('/', [RencanaPemeliharaanSakaController::class, 'store'])->name('rencana-pemeliharaan-saka.store');
    Route::get('/data', [RencanaPemeliharaanSakaController::class, 'data'])->name('rencana-pemeliharaan-saka.data');
    Route::put('/{id}', [RencanaPemeliharaanSakaController::class, 'update'])->name('rencana-pemeliharaan-saka.update');
    Route::delete('/{id}', [RencanaPemeliharaanSakaController::class, 'destroy'])->name('rencana-pemeliharaan-saka.destroy');
});

Route::prefix('monev/shg/input-data/sistem-informasi-aims-saka')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsSakaController::class, 'index'])->name('sistem-informasi-aims-saka');
    Route::post('/', [SistemInformasiAimsSakaController::class, 'store'])->name('sistem-informasi-aims-saka.store');
    Route::get('/data', [SistemInformasiAimsSakaController::class, 'data'])->name('sistem-informasi-aims-saka.data');
    Route::put('/{id}', [SistemInformasiAimsSakaController::class, 'update'])->name('sistem-informasi-aims-saka.update');
    Route::delete('/{id}', [SistemInformasiAimsSakaController::class, 'destroy'])->name('sistem-informasi-aims-saka.destroy');
});
Route::prefix('monev/shg/input-data/availability-saka')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilitySakaController::class, 'index'])->name('availability-saka');
    Route::post('/', [AvailabilitySakaController::class, 'store'])->name('availability-saka.store');
    Route::get('/data', [AvailabilitySakaController::class, 'data'])->name('availability-saka.data');
    Route::put('/{id}', [AvailabilitySakaController::class, 'update'])->name('availability-saka.update');
    Route::delete('/{id}', [AvailabilitySakaController::class, 'destroy'])->name('availability-saka.destroy');
});
Route::prefix('monev/shg/input-data/air-budget-tagging-saka')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingSakaController::class, 'index'])->name('air-budget-tagging-saka');
    Route::post('/', [AirBudgetTaggingSakaController::class, 'store'])->name('air-budget-tagging-saka.store');
    Route::get('/data', [AirBudgetTaggingSakaController::class, 'data'])->name('air-budget-tagging-saka.data');
    Route::put('/{id}', [AirBudgetTaggingSakaController::class, 'update'])->name('air-budget-tagging-saka.update');
    Route::delete('/{id}', [AirBudgetTaggingSakaController::class, 'destroy'])->name('air-budget-tagging-saka.destroy');
});
Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-saka')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiSakaController::class, 'index'])->name('realisasi-anggaran-ai-saka');
    Route::post('/', [RealisasiAnggaranAiSakaController::class, 'store'])->name('realisasi-anggaran-ai-saka.store');
    Route::get('/data', [RealisasiAnggaranAiSakaController::class, 'data'])->name('realisasi-anggaran-ai-saka.data');
    Route::put('/{id}', [RealisasiAnggaranAiSakaController::class, 'update'])->name('realisasi-anggaran-ai-saka.update');
    Route::delete('/{id}', [RealisasiAnggaranAiSakaController::class, 'destroy'])->name('realisasi-anggaran-ai-saka.destroy');
});
Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-saka')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAiSakaController::class, 'index'])->name('realisasi-progress-fisik-ai-saka');
    Route::post('/', [RealisasiProgressFisikAiSakaController::class, 'store'])->name('realisasi-progress-fisik-ai-saka.store');
    Route::get('/data', [RealisasiProgressFisikAiSakaController::class, 'data'])->name('realisasi-progress-fisik-ai-saka.data');
    Route::put('/{id}', [RealisasiProgressFisikAiSakaController::class, 'update'])->name('realisasi-progress-fisik-ai-saka.update');
    Route::delete('/{id}', [RealisasiProgressFisikAiSakaController::class, 'destroy'])->name('realisasi-progress-fisik-ai-saka.destroy');
});


// Nusantara Regas NR
Route::prefix('monev/shg/input-data/nusantara-regas')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusAssetAiNRController::class, 'index'])->name('nusantara-regas');
    Route::post('/', [StatusAssetAiNRController::class, 'store'])->name('nusantara-regas.store');
    Route::get('/data', [StatusAssetAiNRController::class, 'data'])->name('nusantara-regas.data');
    Route::put('/{id}', [StatusAssetAiNRController::class, 'update'])->name('nusantara-regas.update');
    Route::delete('/{id}', [StatusAssetAiNRController::class, 'destroy'])->name('nusantara-regas.destroy');
});
Route::prefix('monev/shg/input-data/mandatory-certification-nr')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationNRController::class, 'index'])->name('mandatory-certification-nr');
    Route::post('/', [MandatoryCertificationNRController::class, 'store'])->name('mandatory-certification-nr.store');
    Route::get('/data', [MandatoryCertificationNRController::class, 'data'])->name('mandatory-certification-nr.data');
    Route::put('/{id}', [MandatoryCertificationNRController::class, 'update'])->name('mandatory-certification-nr.update');
    Route::delete('/{id}', [MandatoryCertificationNRController::class, 'destroy'])->name('mandatory-certification-nr.destroy');
});

Route::prefix('monev/shg/input-data/asset-breakdown-nr')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownNRController::class, 'index'])->name('asset-breakdown-nr');
    Route::post('/', [AssetBreakdownNRController::class, 'store'])->name('asset-breakdown-nr.store');
    Route::get('/data', [AssetBreakdownNRController::class, 'data'])->name('asset-breakdown-nr.data');
    Route::put('/{id}', [AssetBreakdownNRController::class, 'update'])->name('asset-breakdown-nr.update');
    Route::delete('/{id}', [AssetBreakdownNRController::class, 'destroy'])->name('asset-breakdown-nr.destroy');
});
Route::prefix('monev/shg/input-data/status-plo-nr')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloNRController::class, 'index'])->name('status-plo-nr');
    Route::post('/', [StatusPloNRController::class, 'store'])->name('status-plo-nr.store');
    Route::get('/data', [StatusPloNRController::class, 'data'])->name('status-plo-nr.data');
    Route::put('/{id}', [StatusPloNRController::class, 'update'])->name('status-plo-nr.update');
    Route::delete('/{id}', [StatusPloNRController::class, 'destroy'])->name('status-plo-nr.destroy');
});
Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-nr')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantNRController::class, 'index'])->name('kondisi-vacant-fungsi-aims-nr');
    Route::post('/', [KondisiVacantNRController::class, 'store'])->name('kondisi-vacant-fungsi-aims-nr.store');
    Route::get('/data', [KondisiVacantNRController::class, 'data'])->name('kondisi-vacant-fungsi-aims-nr.data');
    Route::put('/{id}', [KondisiVacantNRController::class, 'update'])->name('kondisi-vacant-fungsi-aims-nr.update');
    Route::delete('/{id}', [KondisiVacantNRController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-nr.destroy');
});
Route::prefix('monev/shg/input-data/pelatihan-aims-nr')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsNRController::class, 'index'])->name('pelatihan-aims-nr');
    Route::post('/', [PelatihanAimsNRController::class, 'store'])->name('pelatihan-aims-nr.store');
    Route::get('/data', [PelatihanAimsNRController::class, 'data'])->name('pelatihan-aims-nr.data');
    Route::put('/{id}', [PelatihanAimsNRController::class, 'update'])->name('pelatihan-aims-nr.update');
    Route::delete('/{id}', [PelatihanAimsNRController::class, 'destroy'])->name('pelatihan-aims-nr.destroy');
});
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-nr')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanNRController::class, 'index'])->name('rencana-pemeliharaan-nr');
    Route::post('/', [RencanaPemeliharaanNRController::class, 'store'])->name('rencana-pemeliharaan-nr.store');
    Route::get('/data', [RencanaPemeliharaanNRController::class, 'data'])->name('rencana-pemeliharaan-nr.data');
    Route::put('/{id}', [RencanaPemeliharaanNRController::class, 'update'])->name('rencana-pemeliharaan-nr.update');
    Route::delete('/{id}', [RencanaPemeliharaanNRController::class, 'destroy'])->name('rencana-pemeliharaan-nr.destroy');
});
Route::prefix('monev/shg/input-data/sistem-informasi-aims-nr')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsNRController::class, 'index'])->name('sistem-informasi-aims-nr');
    Route::post('/', [SistemInformasiAimsNRController::class, 'store'])->name('sistem-informasi-aims-nr.store');
    Route::get('/data', [SistemInformasiAimsNRController::class, 'data'])->name('sistem-informasi-aims-nr.data');
    Route::put('/{id}', [SistemInformasiAimsNRController::class, 'update'])->name('sistem-informasi-aims-nr.update');
    Route::delete('/{id}', [SistemInformasiAimsNRController::class, 'destroy'])->name('sistem-informasi-aims-nr.destroy');
});
Route::prefix('monev/shg/input-data/availability-nr')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilityNRController::class, 'index'])->name('availability-nr');
    Route::post('/', [AvailabilityNRController::class, 'store'])->name('availability-nr.store');
    Route::get('/data', [AvailabilityNRController::class, 'data'])->name('availability-nr.data');
    Route::put('/{id}', [AvailabilityNRController::class, 'update'])->name('availability-nr.update');
    Route::delete('/{id}', [AvailabilityNRController::class, 'destroy'])->name('availability-nr.destroy');
});
Route::prefix('monev/shg/input-data/air-budget-tagging-nr')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingNRController::class, 'index'])->name('air-budget-tagging-nr');
    Route::post('/', [AirBudgetTaggingNRController::class, 'store'])->name('air-budget-tagging-nr.store');
    Route::get('/data', [AirBudgetTaggingNRController::class, 'data'])->name('air-budget-tagging-nr.data');
    Route::put('/{id}', [AirBudgetTaggingNRController::class, 'update'])->name('air-budget-tagging-nr.update');
    Route::delete('/{id}', [AirBudgetTaggingNRController::class, 'destroy'])->name('air-budget-tagging-nr.destroy');
});

// Tranportasi Gas Indonesia
Route::prefix('monev/shg/input-data/transportasi-gas-indonesia')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusAssetAiTGIController::class, 'index'])->name('transportasi-gas-indonesia');
    Route::post('/', [StatusAssetAiTGIController::class, 'store'])->name('transportasi-gas-indonesia.store');
    Route::get('/data', [StatusAssetAiTGIController::class, 'data'])->name('transportasi-gas-indonesia.data');
    Route::put('/{id}', [StatusAssetAiTGIController::class, 'update'])->name('transportasi-gas-indonesia.update');
    Route::delete('/{id}', [StatusAssetAiTGIController::class, 'destroy'])->name('transportasi-gas-indonesia.destroy');
});
Route::prefix('monev/shg/input-data/mandatory-certification-tgi')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationTGIController::class, 'index'])->name('mandatory-certification-tgi');
    Route::post('/', [MandatoryCertificationTGIController::class, 'store'])->name('mandatory-certification-tgi.store');
    Route::get('/data', [MandatoryCertificationTGIController::class, 'data'])->name('mandatory-certification-tgi.data');
    Route::put('/{id}', [MandatoryCertificationTGIController::class, 'update'])->name('mandatory-certification-tgi.update');
    Route::delete('/{id}', [MandatoryCertificationTGIController::class, 'destroy'])->name('mandatory-certification-tgi.destroy');
});
Route::prefix('monev/shg/input-data/asset-breakdown-tgi')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownTGIController::class, 'index'])->name('asset-breakdown-tgi');
    Route::post('/', [AssetBreakdownTGIController::class, 'store'])->name('asset-breakdown-tgi.store');
    Route::get('/data', [AssetBreakdownTGIController::class, 'data'])->name('asset-breakdown-tgi.data');
    Route::put('/{id}', [AssetBreakdownTGIController::class, 'update'])->name('asset-breakdown-tgi.update');
    Route::delete('/{id}', [AssetBreakdownTGIController::class, 'destroy'])->name('asset-breakdown-tgi.destroy');
});
Route::prefix('monev/shg/input-data/sistem-informasi-aims-tgi')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsTGIController::class, 'index'])->name('sistem-informasi-aims-tgi');
    Route::post('/', [SistemInformasiAimsTGIController::class, 'store'])->name('sistem-informasi-aims-tgi.store');
    Route::get('/data', [SistemInformasiAimsTGIController::class, 'data'])->name('sistem-informasi-aims-tgi.data');
    Route::put('/{id}', [SistemInformasiAimsTGIController::class, 'update'])->name('sistem-informasi-aims-tgi.update');
    Route::delete('/{id}', [SistemInformasiAimsTGIController::class, 'destroy'])->name('sistem-informasi-aims-tgi.destroy');
});
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-tgi')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanTGIController::class, 'index'])->name('rencana-pemeliharaan-tgi');
    Route::post('/', [RencanaPemeliharaanTGIController::class, 'store'])->name('rencana-pemeliharaan-tgi.store');
    Route::get('/data', [RencanaPemeliharaanTGIController::class, 'data'])->name('rencana-pemeliharaan-tgi.data');
    Route::put('/{id}', [RencanaPemeliharaanTGIController::class, 'update'])->name('rencana-pemeliharaan-tgi.update');
    Route::delete('/{id}', [RencanaPemeliharaanTGIController::class, 'destroy'])->name('rencana-pemeliharaan-tgi.destroy');
});
Route::prefix('monev/shg/input-data/status-plo-tgi')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloTGIController::class, 'index'])->name('status-plo-tgi');
    Route::post('/', [StatusPloTGIController::class, 'store'])->name('status-plo-tgi.store');
    Route::get('/data', [StatusPloTGIController::class, 'data'])->name('status-plo-tgi.data');
    Route::put('/{id}', [StatusPloTGIController::class, 'update'])->name('status-plo-tgi.update');
    Route::delete('/{id}', [StatusPloTGIController::class, 'destroy'])->name('status-plo-tgi.destroy');
});
Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-tgi')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAimsTGIController::class, 'index'])->name('kondisi-vacant-fungsi-aims-tgi');
    Route::post('/', [KondisiVacantAimsTGIController::class, 'store'])->name('kondisi-vacant-fungsi-aims-tgi.store');
    Route::get('/data', [KondisiVacantAimsTGIController::class, 'data'])->name('kondisi-vacant-fungsi-aims-tgi.data');
    Route::put('/{id}', [KondisiVacantAimsTGIController::class, 'update'])->name('kondisi-vacant-fungsi-aims-tgi.update');
    Route::delete('/{id}', [KondisiVacantAimsTGIController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-tgi.destroy');
});
Route::prefix('monev/shg/input-data/pelatihan-aims-tgi')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsTGIController::class, 'index'])->name('pelatihan-aims-tgi');
    Route::post('/', [PelatihanAimsTGIController::class, 'store'])->name('pelatihan-aims-tgi.store');
    Route::get('/data', [PelatihanAimsTGIController::class, 'data'])->name('pelatihan-aims-tgi.data');
    Route::put('/{id}', [PelatihanAimsTGIController::class, 'update'])->name('pelatihan-aims-tgi.update');
    Route::delete('/{id}', [PelatihanAimsTGIController::class, 'destroy'])->name('pelatihan-aims-tgi.destroy');
});
Route::prefix('monev/shg/input-data/air-budget-tagging-tgi')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingTGIController::class, 'index'])->name('air-budget-tagging-tgi');
    Route::post('/', [AirBudgetTaggingTGIController::class, 'store'])->name('air-budget-tagging-tgi.store');
    Route::get('/data', [AirBudgetTaggingTGIController::class, 'data'])->name('air-budget-tagging-tgi.data');
    Route::put('/{id}', [AirBudgetTaggingTGIController::class, 'update'])->name('air-budget-tagging-tgi.update');
    Route::delete('/{id}', [AirBudgetTaggingTGIController::class, 'destroy'])->name('air-budget-tagging-tgi.destroy');
});
Route::prefix('monev/shg/input-data/availability-tgi')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilityTGIController::class, 'index'])->name('availability-tgi');
    Route::post('/', [AvailabilityTGIController::class, 'store'])->name('availability-tgi.store');
    Route::get('/data', [AvailabilityTGIController::class, 'data'])->name('availability-tgi.data');
    Route::put('/{id}', [AvailabilityTGIController::class, 'update'])->name('availability-tgi.update');
    Route::delete('/{id}', [AvailabilityTGIController::class, 'destroy'])->name('availability-tgi.destroy');
});
Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-tgi')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiTGIController::class, 'index'])->name('realisasi-anggaran-ai-tgi');
    Route::post('/', [RealisasiAnggaranAiTGIController::class, 'store'])->name('realisasi-anggaran-ai-tgi.store');
    Route::get('/data', [RealisasiAnggaranAiTGIController::class, 'data'])->name('realisasi-anggaran-ai-tgi.data');
    Route::put('/{id}', [RealisasiAnggaranAiTGIController::class, 'update'])->name('realisasi-anggaran-ai-tgi.update');
    Route::delete('/{id}', [RealisasiAnggaranAiTGIController::class, 'destroy'])->name('realisasi-anggaran-ai-tgi.destroy');
});
Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-tgi')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAiTGIController::class, 'index'])->name('realisasi-progress-fisik-ai-tgi');
    Route::post('/', [RealisasiProgressFisikAiTGIController::class, 'store'])->name('realisasi-progress-fisik-ai-tgi.store');
    Route::get('/data', [RealisasiProgressFisikAiTGIController::class, 'data'])->name('realisasi-progress-fisik-ai-tgi.data');
    Route::put('/{id}', [RealisasiProgressFisikAiTGIController::class, 'update'])->name('realisasi-progress-fisik-ai-tgi.update');
    Route::delete('/{id}', [RealisasiProgressFisikAiTGIController::class, 'destroy'])->name('realisasi-progress-fisik-ai-tgi.destroy');
});


// PGN OMM
Route::prefix('monev/shg/input-data/pgn-omm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusAssetAiOmmController::class, 'index'])->name('pgn-omm');
    Route::post('/', [StatusAssetAiOmmController::class, 'store'])->name('pgn-omm.store');
    Route::get('/data', [StatusAssetAiOmmController::class, 'data'])->name('pgn-omm.data');
    Route::put('/{id}', [StatusAssetAiOmmController::class, 'update'])->name('pgn-omm.update');
    Route::delete('/{id}', [StatusAssetAiOmmController::class, 'destroy'])->name('pgn-omm.destroy');
});
Route::prefix('monev/shg/input-data/mandatory-certification-omm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationOmmController::class, 'index'])->name('mandatory-certification-omm');
    Route::post('/', [MandatoryCertificationOmmController::class, 'store'])->name('mandatory-certification-omm.store');
    Route::get('/data', [MandatoryCertificationOmmController::class, 'data'])->name('mandatory-certification-omm.data');
    Route::put('/{id}', [MandatoryCertificationOmmController::class, 'update'])->name('mandatory-certification-omm.update');
    Route::delete('/{id}', [MandatoryCertificationOmmController::class, 'destroy'])->name('mandatory-certification-omm.destroy');
});
Route::prefix('monev/shg/input-data/asset-breakdown-omm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownOmmController::class, 'index'])->name('asset-breakdown-omm');
    Route::post('/', [AssetBreakdownOmmController::class, 'store'])->name('asset-breakdown-omm.store');
    Route::get('/data', [AssetBreakdownOmmController::class, 'data'])->name('asset-breakdown-omm.data');
    Route::put('/{id}', [AssetBreakdownOmmController::class, 'update'])->name('asset-breakdown-omm.update');
    Route::delete('/{id}', [AssetBreakdownOmmController::class, 'destroy'])->name('asset-breakdown-omm.destroy');
});
Route::prefix('monev/shg/input-data/status-plo-omm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloOmmController::class, 'index'])->name('status-plo-omm');
    Route::post('/', [StatusPloOmmController::class, 'store'])->name('status-plo-omm.store');
    Route::get('/data', [StatusPloOmmController::class, 'data'])->name('status-plo-omm.data');
    Route::put('/{id}', [StatusPloOmmController::class, 'update'])->name('status-plo-omm.update');
    Route::delete('/{id}', [StatusPloOmmController::class, 'destroy'])->name('status-plo-omm.destroy');
});
Route::prefix('monev/shg/input-data/kondisi-vacant-aims-omm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAimsOmmController::class, 'index'])->name('kondisi-vacant-aims-omm');
    Route::post('/', [KondisiVacantAimsOmmController::class, 'store'])->name('kondisi-vacant-aims-omm.store');
    Route::get('/data', [KondisiVacantAimsOmmController::class, 'data'])->name('kondisi-vacant-aims-omm.data');
    Route::put('/{id}', [KondisiVacantAimsOmmController::class, 'update'])->name('kondisi-vacant-aims-omm.update');
    Route::delete('/{id}', [KondisiVacantAimsOmmController::class, 'destroy'])->name('kondisi-vacant-aims-omm.destroy');
});
Route::prefix('monev/shg/input-data/sap-asset-omm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SapAssetOmmController::class, 'index'])->name('sap-asset-omm');
    Route::post('/', [SapAssetOmmController::class, 'store'])->name('sap-asset-omm.store');
    Route::get('/data', [SapAssetOmmController::class, 'data'])->name('sap-asset-omm.data');
    Route::put('/{id}', [SapAssetOmmController::class, 'update'])->name('sap-asset-omm.update');
    Route::delete('/{id}', [SapAssetOmmController::class, 'destroy'])->name('sap-asset-omm.destroy');
});
Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-omm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiOmmController::class, 'index'])->name('realisasi-anggaran-ai-omm');
    Route::post('/', [RealisasiAnggaranAiOmmController::class, 'store'])->name('realisasi-anggaran-ai-omm.store');
    Route::get('/data', [RealisasiAnggaranAiOmmController::class, 'data'])->name('realisasi-anggaran-ai-omm.data');
    Route::put('/{id}', [RealisasiAnggaranAiOmmController::class, 'update'])->name('realisasi-anggaran-ai-omm.update');
    Route::delete('/{id}', [RealisasiAnggaranAiOmmController::class, 'destroy'])->name('realisasi-anggaran-ai-omm.destroy');
});
Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-omm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAiOMMController::class, 'index'])->name('realisasi-progress-fisik-ai-omm');
    Route::post('/', [RealisasiProgressFisikAiOMMController::class, 'store'])->name('realisasi-progress-fisik-ai-omm.store');
    Route::get('/data', [RealisasiProgressFisikAiOMMController::class, 'data'])->name('realisasi-progress-fisik-ai-omm.data');
    Route::put('/{id}', [RealisasiProgressFisikAiOMMController::class, 'update'])->name('realisasi-progress-fisik-ai-omm.update');
    Route::delete('/{id}', [RealisasiProgressFisikAiOmmController::class, 'destroy'])->name('realisasi-progress-fisik-ai-omm.destroy');
});
Route::prefix('monev/shg/input-data/pelatihan-aims-omm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsOmmController::class, 'index'])->name('pelatihan-aims-omm');
    Route::post('/', [PelatihanAimsOmmController::class, 'store'])->name('pelatihan-aims-omm.store');
    Route::get('/data', [PelatihanAimsOmmController::class, 'data'])->name('pelatihan-aims-omm.data');
    Route::put('/{id}', [PelatihanAimsOmmController::class, 'update'])->name('pelatihan-aims-omm.update');
    Route::delete('/{id}', [PelatihanAimsOmmController::class, 'destroy'])->name('pelatihan-aims-omm.destroy');
});
Route::prefix('monev/shg/input-data/sistem-informasi-aims-omm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsOmmController::class, 'index'])->name('sistem-informasi-aims-omm');
    Route::post('/', [SistemInformasiAimsOmmController::class, 'store'])->name('sistem-informasi-aims-omm.store');
    Route::get('/data', [SistemInformasiAimsOmmController::class, 'data'])->name('sistem-informasi-aims-omm.data');
    Route::put('/{id}', [SistemInformasiAimsOmmController::class, 'update'])->name('sistem-informasi-aims-omm.update');
    Route::delete('/{id}', [SistemInformasiAimsOmmController::class, 'destroy'])->name('sistem-informasi-aims-omm.destroy');
});
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-omm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanOmmController::class, 'index'])->name('rencana-pemeliharaan-omm');
    Route::post('/', [RencanaPemeliharaanOmmController::class, 'store'])->name('rencana-pemeliharaan-omm.store');
    Route::get('/data', [RencanaPemeliharaanOmmController::class, 'data'])->name('rencana-pemeliharaan-omm.data');
    Route::put('/{id}', [RencanaPemeliharaanOmmController::class, 'update'])->name('rencana-pemeliharaan-omm.update');
    Route::delete('/{id}', [RencanaPemeliharaanOmmController::class, 'destroy'])->name('rencana-pemeliharaan-omm.destroy');
});
Route::prefix('monev/shg/input-data/reliability-omm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [ReliabilityOmmController::class, 'index'])->name('reliability-omm');
    Route::post('/', [ReliabilityOmmController::class, 'store'])->name('reliability-omm.store');
    Route::get('/data', [ReliabilityOmmController::class, 'data'])->name('reliability-omm.data');
    Route::put('/{id}', [ReliabilityOmmController::class, 'update'])->name('reliability-omm.update');
    Route::delete('/{id}', [ReliabilityOmmController::class, 'destroy'])->name('reliability-omm.destroy');
});
Route::prefix('monev/shg/input-data/availability-omm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilityOmmController::class, 'index'])->name('availability-omm');
    Route::post('/', [AvailabilityOmmController::class, 'store'])->name('availability-omm.store');
    Route::get('/data', [AvailabilityOmmController::class, 'data'])->name('availability-omm.data');
    Route::put('/{id}', [AvailabilityOmmController::class, 'update'])->name('availability-omm.update');
    Route::delete('/{id}', [AvailabilityOmmController::class, 'destroy'])->name('availability-omm.destroy');
});
Route::prefix('monev/shg/input-data/air-budget-tagging-omm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingOmmController::class, 'index'])->name('air-budget-tagging-omm');
    Route::post('/', [AirBudgetTaggingOmmController::class, 'store'])->name('air-budget-tagging-omm.store');
    Route::get('/data', [AirBudgetTaggingOmmController::class, 'data'])->name('air-budget-tagging-omm.data');
    Route::put('/{id}', [AirBudgetTaggingOmmController::class, 'update'])->name('air-budget-tagging-omm.update');
    Route::delete('/{id}', [AirBudgetTaggingOmmController::class, 'destroy'])->name('air-budget-tagging-omm.destroy');
});


// PGN SOR 1
Route::prefix('monev/shg/input-data/pgn-sor1')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusAssetAiSOR1Controller::class, 'index'])->name('pgn-sor1');
    Route::post('/', [StatusAssetAiSOR1Controller::class, 'store'])->name('pgn-sor1.store');
    Route::get('/data', [StatusAssetAiSOR1Controller::class, 'data'])->name('pgn-sor1.data');
    Route::put('/{id}', [StatusAssetAiSOR1Controller::class, 'update'])->name('pgn-sor1.update');
    Route::delete('/{id}', [StatusAssetAiSOR1Controller::class, 'destroy'])->name('pgn-sor1.destroy');
});
Route::prefix('monev/shg/input-data/mandatory-certification-sor1')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationSOR1Controller::class, 'index'])->name('mandatory-certification-sor1');
    Route::post('/', [MandatoryCertificationSOR1Controller::class, 'store'])->name('mandatory-certification-sor1.store');
    Route::get('/data', [MandatoryCertificationSOR1Controller::class, 'data'])->name('mandatory-certification-sor1.data');
    Route::put('/{id}', [MandatoryCertificationSOR1Controller::class, 'update'])->name('mandatory-certification-sor1.update');
    Route::delete('/{id}', [MandatoryCertificationSOR1Controller::class, 'destroy'])->name('mandatory-certification-sor1.destroy');
});
Route::prefix('monev/shg/input-data/asset-breakdown-sor1')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownSOR1Controller::class, 'index'])->name('asset-breakdown-sor1');
    Route::post('/', [AssetBreakdownSOR1Controller::class, 'store'])->name('asset-breakdown-sor1.store');
    Route::get('/data', [AssetBreakdownSOR1Controller::class, 'data'])->name('asset-breakdown-sor1.data');
    Route::put('/{id}', [AssetBreakdownSOR1Controller::class, 'update'])->name('asset-breakdown-sor1.update');
    Route::delete('/{id}', [AssetBreakdownSOR1Controller::class, 'destroy'])->name('asset-breakdown-sor1.destroy');
});
Route::prefix('monev/shg/input-data/status-plo-sor1')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloSOR1Controller::class, 'index'])->name('status-plo-sor1');
    Route::post('/', [StatusPloSOR1Controller::class, 'store'])->name('status-plo-sor1.store');
    Route::get('/data', [StatusPloSOR1Controller::class, 'data'])->name('status-plo-sor1.data');
    Route::put('/{id}', [StatusPloSOR1Controller::class, 'update'])->name('status-plo-sor1.update');
    Route::delete('/{id}', [StatusPloSOR1Controller::class, 'destroy'])->name('status-plo-sor1.destroy');
});
Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-sor1')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAimsSOR1Controller::class, 'index'])->name('kondisi-vacant-fungsi-aims-sor1');
    Route::post('/', [KondisiVacantAimsSOR1Controller::class, 'store'])->name('kondisi-vacant-fungsi-aims-sor1.store');
    Route::get('/data', [KondisiVacantAimsSOR1Controller::class, 'data'])->name('kondisi-vacant-fungsi-aims-sor1.data');
    Route::put('/{id}', [KondisiVacantAimsSOR1Controller::class, 'update'])->name('kondisi-vacant-fungsi-aims-sor1.update');
    Route::delete('/{id}', [KondisiVacantAimsSOR1Controller::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-sor1.destroy');
});
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-sor1')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanSOR1Controller::class, 'index'])->name('rencana-pemeliharaan-sor1');
    Route::post('/', [RencanaPemeliharaanSOR1Controller::class, 'store'])->name('rencana-pemeliharaan-sor1.store');
    Route::get('/data', [RencanaPemeliharaanSOR1Controller::class, 'data'])->name('rencana-pemeliharaan-sor1.data');
    Route::put('/{id}', [RencanaPemeliharaanSOR1Controller::class, 'update'])->name('rencana-pemeliharaan-sor1.update');
    Route::delete('/{id}', [RencanaPemeliharaanSOR1Controller::class, 'destroy'])->name('rencana-pemeliharaan-sor1.destroy');
});
Route::prefix('monev/shg/input-data/sistem-informasi-aims-sor1')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsSOR1Controller::class, 'index'])->name('sistem-informasi-aims-sor1');
    Route::post('/', [SistemInformasiAimsSOR1Controller::class, 'store'])->name('sistem-informasi-aims-sor1.store');
    Route::get('/data', [SistemInformasiAimsSOR1Controller::class, 'data'])->name('sistem-informasi-aims-sor1.data');
    Route::put('/{id}', [SistemInformasiAimsSOR1Controller::class, 'update'])->name('sistem-informasi-aims-sor1.update');
    Route::delete('/{id}', [SistemInformasiAimsSOR1Controller::class, 'destroy'])->name('sistem-informasi-aims-sor1.destroy');
});
Route::prefix('monev/shg/input-data/pelatihan-aims-sor1')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsSOR1Controller::class, 'index'])->name('pelatihan-aims-sor1');
    Route::post('/', [PelatihanAimsSOR1Controller::class, 'store'])->name('pelatihan-aims-sor1.store');
    Route::get('/data', [PelatihanAimsSOR1Controller::class, 'data'])->name('pelatihan-aims-sor1.data');
    Route::put('/{id}', [PelatihanAimsSOR1Controller::class, 'update'])->name('pelatihan-aims-sor1.update');
    Route::delete('/{id}', [PelatihanAimsSOR1Controller::class, 'destroy'])->name('pelatihan-aims-sor1.destroy');
});
Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-sor1')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiSOR1Controller::class, 'index'])->name('realisasi-anggaran-ai-sor1');
    Route::post('/', [RealisasiAnggaranAISOR1Controller::class, 'store'])->name('realisasi-anggaran-ai-sor1.store');
    Route::get('/data', [RealisasiAnggaranAISOR1Controller::class, 'data'])->name('realisasi-anggaran-ai-sor1.data');
    Route::put('/{id}', [RealisasiAnggaranAISOR1Controller::class, 'update'])->name('realisasi-anggaran-ai-sor1.update');
    Route::delete('/{id}', [RealisasiAnggaranAISOR1Controller::class, 'destroy'])->name('realisasi-anggaran-ai-sor1.destroy');
});
Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-sor1')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAiSOR1Controller::class, 'index'])->name('realisasi-progress-fisik-ai-sor1');
    Route::post('/', [RealisasiProgressFisikAiSOR1Controller::class, 'store'])->name('realisasi-progress-fisik-ai-sor1.store');
    Route::get('/data', [RealisasiProgressFisikAiSOR1Controller::class, 'data'])->name('realisasi-progress-fisik-ai-sor1.data');
    Route::put('/{id}', [RealisasiProgressFisikAiSOR1Controller::class, 'update'])->name('realisasi-progress-fisik-ai-sor1.update');
    Route::delete('/{id}', [RealisasiProgressFisikAiSOR1Controller::class, 'destroy'])->name('realisasi-progress-fisik-ai-sor1.destroy');
});
Route::prefix('monev/shg/input-data/availability-sor1')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilitySOR1Controller::class, 'index'])->name('availability-sor1');
    Route::post('/', [AvailabilitySOR1Controller::class, 'store'])->name('availability-sor1.store');
    Route::get('/data', [AvailabilitySOR1Controller::class, 'data'])->name('availability-sor1.data');
    Route::put('/{id}', [AvailabilitySOR1Controller::class, 'update'])->name('availability-sor1.update');
    Route::delete('/{id}', [AvailabilitySOR1Controller::class, 'destroy'])->name('availability-sor1.destroy');
});
Route::prefix('monev/shg/input-data/reliability-sor1')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [ReliabilitySOR1Controller::class, 'index'])->name('reliability-sor1');
    Route::post('/', [ReliabilitySOR1Controller::class, 'store'])->name('reliability-sor1.store');
    Route::get('/data', [ReliabilitySOR1Controller::class, 'data'])->name('reliability-sor1.data');
    Route::put('/{id}', [ReliabilitySOR1Controller::class, 'update'])->name('reliability-sor1.update');
    Route::delete('/{id}', [ReliabilitySOR1Controller::class, 'destroy'])->name('reliability-sor1.destroy');
});
Route::prefix('monev/shg/input-data/air-budget-tagging-sor1')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingSOR1Controller::class, 'index'])->name('air-budget-tagging-sor1');
    Route::post('/', [AirBudgetTaggingSOR1Controller::class, 'store'])->name('air-budget-tagging-sor1.store');
    Route::get('/data', [AirBudgetTaggingSOR1Controller::class, 'data'])->name('air-budget-tagging-sor1.data');
    Route::put('/{id}', [AirBudgetTaggingSOR1Controller::class, 'update'])->name('air-budget-tagging-sor1.update');
    Route::delete('/{id}', [AirBudgetTaggingSOR1Controller::class, 'destroy'])->name('air-budget-tagging-sor1.destroy');
});

// PGN SOR 2
Route::prefix('monev/shg/input-data/pgn-sor2')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusAssetAiSOR2Controller::class, 'index'])->name('pgn-sor2');
    Route::post('/', [StatusAssetAiSOR2Controller::class, 'store'])->name('pgn-sor2.store');
    Route::get('/data', [StatusAssetAiSOR2Controller::class, 'data'])->name('pgn-sor2.data');
    Route::put('/{id}', [StatusAssetAiSOR2Controller::class, 'update'])->name('pgn-sor2.update');
    Route::delete('/{id}', [StatusAssetAiSOR2Controller::class, 'destroy'])->name('pgn-sor2.destroy');
});
Route::prefix('monev/shg/input-data/asset-breakdown-sor2')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownSOR2Controller::class, 'index'])->name('asset-breakdown-sor2');
    Route::post('/', [AssetBreakdownSOR2Controller::class, 'store'])->name('asset-breakdown-sor2.store');
    Route::get('/data', [AssetBreakdownSOR2Controller::class, 'data'])->name('asset-breakdown-sor2.data');
    Route::put('/{id}', [AssetBreakdownSOR2Controller::class, 'update'])->name('asset-breakdown-sor2.update');
    Route::delete('/{id}', [AssetBreakdownSOR2Controller::class, 'destroy'])->name('asset-breakdown-sor2.destroy');
});
Route::prefix('monev/shg/input-data/status-plo-sor2')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloSOR2Controller::class, 'index'])->name('status-plo-sor2');
    Route::post('/', [StatusPloSOR2Controller::class, 'store'])->name('status-plo-sor2.store');
    Route::get('/data', [StatusPloSOR2Controller::class, 'data'])->name('status-plo-sor2.data');
    Route::put('/{id}', [StatusPloSOR2Controller::class, 'update'])->name('status-plo-sor2.update');
    Route::delete('/{id}', [StatusPloSOR2Controller::class, 'destroy'])->name('status-plo-sor2.destroy');
});
Route::prefix('monev/shg/input-data/pelatihan-aims-sor2')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsSOR2Controller::class, 'index'])->name('pelatihan-aims-sor2');
    Route::post('/', [PelatihanAimsSOR2Controller::class, 'store'])->name('pelatihan-aims-sor2.store');
    Route::get('/data', [PelatihanAimsSOR2Controller::class, 'data'])->name('pelatihan-aims-sor2.data');
    Route::put('/{id}', [PelatihanAimsSOR2Controller::class, 'update'])->name('pelatihan-aims-sor2.update');
    Route::delete('/{id}', [PelatihanAimsSOR2Controller::class, 'destroy'])->name('pelatihan-aims-sor2.destroy');
});
Route::prefix('monev/shg/input-data/mandatory-certification-sor2')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationSOR2Controller::class, 'index'])->name('mandatory-certification-sor2');
    Route::post('/', [MandatoryCertificationSOR2Controller::class, 'store'])->name('mandatory-certification-sor2.store');
    Route::get('/data', [MandatoryCertificationSOR2Controller::class, 'data'])->name('mandatory-certification-sor2.data');
    Route::put('/{id}', [MandatoryCertificationSOR2Controller::class, 'update'])->name('mandatory-certification-sor2.update');
    Route::delete('/{id}', [MandatoryCertificationSOR2Controller::class, 'destroy'])->name('mandatory-certification-sor2.destroy');
});
Route::prefix('monev/shg/input-data/kondisi-vacant-aims-sor2')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAimsSOR2Controller::class, 'index'])->name('kondisi-vacant-aims-sor2');
    Route::post('/', [KondisiVacantAimsSOR2Controller::class, 'store'])->name('kondisi-vacant-aims-sor2.store');
    Route::get('/data', [KondisiVacantAimsSOR2Controller::class, 'data'])->name('kondisi-vacant-aims-sor2.data');
    Route::put('/{id}', [KondisiVacantAimsSOR2Controller::class, 'update'])->name('kondisi-vacant-aims-sor2.update');
    Route::delete('/{id}', [KondisiVacantAimsSOR2Controller::class, 'destroy'])->name('kondisi-vacant-aims-sor2.destroy');
});
Route::prefix('monev/shg/input-data/sistem-informasi-aims-sor2')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsSOR2Controller::class, 'index'])->name('sistem-informasi-aims-sor2');
    Route::post('/', [SistemInformasiAimsSOR2Controller::class, 'store'])->name('sistem-informasi-aims-sor2.store');
    Route::get('/data', [SistemInformasiAimsSOR2Controller::class, 'data'])->name('sistem-informasi-aims-sor2.data');
    Route::put('/{id}', [SistemInformasiAimsSOR2Controller::class, 'update'])->name('sistem-informasi-aims-sor2.update');
    Route::delete('/{id}', [SistemInformasiAimsSOR2Controller::class, 'destroy'])->name('sistem-informasi-aims-sor2.destroy');
});
Route::prefix('monev/shg/input-data/rencana-pemeliharaan-sor2')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanSOR2Controller::class, 'index'])->name('rencana-pemeliharaan-sor2');
    Route::post('/', [RencanaPemeliharaanSOR2Controller::class, 'store'])->name('rencana-pemeliharaan-sor2.store');
    Route::get('/data', [RencanaPemeliharaanSOR2Controller::class, 'data'])->name('rencana-pemeliharaan-sor2.data');
    Route::put('/{id}', [RencanaPemeliharaanSOR2Controller::class, 'update'])->name('rencana-pemeliharaan-sor2.update');
    Route::delete('/{id}', [RencanaPemeliharaanSOR2Controller::class, 'destroy'])->name('rencana-pemeliharaan-sor2.destroy');
});
Route::prefix('monev/shg/input-data/reliability-sor2')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [ReliabilitySOR2Controller::class, 'index'])->name('reliability-sor2');
    Route::post('/', [ReliabilitySOR2Controller::class, 'store'])->name('reliability-sor2.store');
    Route::get('/data', [ReliabilitySOR2Controller::class, 'data'])->name('reliability-sor2.data');
    Route::put('/{id}', [ReliabilitySOR2Controller::class, 'update'])->name('reliability-sor2.update');
    Route::delete('/{id}', [ReliabilitySOR2Controller::class, 'destroy'])->name('reliability-sor2.destroy');
});
Route::prefix('monev/shg/input-data/availability-sor2')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AvailabilitySOR2Controller::class, 'index'])->name('availability-sor2');
    Route::post('/', [AvailabilitySOR2Controller::class, 'store'])->name('availability-sor2.store');
    Route::get('/data', [AvailabilitySOR2Controller::class, 'data'])->name('availability-sor2.data');
    Route::put('/{id}', [AvailabilitySOR2Controller::class, 'update'])->name('availability-sor2.update');
    Route::delete('/{id}', [AvailabilitySOR2Controller::class, 'destroy'])->name('availability-sor2.destroy');
});
Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-sor2')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiSOR2Controller::class, 'index'])->name('realisasi-anggaran-ai-sor2');
    Route::post('/', [RealisasiAnggaranAiSOR2Controller::class, 'store'])->name('realisasi-anggaran-ai-sor2.store');
    Route::get('/data', [RealisasiAnggaranAiSOR2Controller::class, 'data'])->name('realisasi-anggaran-ai-sor2.data');
    Route::put('/{id}', [RealisasiAnggaranAiSOR2Controller::class, 'update'])->name('realisasi-anggaran-ai-sor2.update');
    Route::delete('/{id}', [RealisasiAnggaranAiSOR2Controller::class, 'destroy'])->name('realisasi-anggaran-ai-sor2.destroy');
});
Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-sor2')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressAiSOR2controller::class, 'index'])->name('realisasi-progress-fisik-ai-sor2');
    Route::post('/', [RealisasiProgressAiSOR2controller::class, 'store'])->name('realisasi-progress-fisik-ai-sor2.store');
    Route::get('/data', [RealisasiProgressAiSOR2controller::class, 'data'])->name('realisasi-progress-fisik-ai-sor2.data');
    Route::put('/{id}', [RealisasiProgressAiSOR2controller::class, 'update'])->name('realisasi-progress-fisik-ai-sor2.update');
    Route::delete('/{id}', [RealisasiProgressAiSOR2controller::class, 'destroy'])->name('realisasi-progress-fisik-ai-sor2.destroy');
});
Route::prefix('monev/shg/input-data/air-budget-tagging-sor2')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingSOR2Controller::class, 'index'])->name('air-budget-tagging-sor2');
    Route::post('/', [AirBudgetTaggingSOR2Controller::class, 'store'])->name('air-budget-tagging-sor2.store');
    Route::get('/data', [AirBudgetTaggingSOR2Controller::class, 'data'])->name('air-budget-tagging-sor2.data');
    Route::put('/{id}', [AirBudgetTaggingSOR2Controller::class, 'update'])->name('air-budget-tagging-sor2.update');
    Route::delete('/{id}', [AirBudgetTaggingSOR2Controller::class, 'destroy'])->name('air-budget-tagging-sor2.destroy');
});


// PGN SOR 3
Route::prefix('monev/shg/input-data/pgn-sor3')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusAssetAiSOR3Controller::class, 'index'])->name('pgn-sor3');
    Route::post('/', [StatusAssetAiSOR3Controller::class, 'store'])->name('pgn-sor3.store');
    Route::get('/data', [StatusAssetAiSOR3Controller::class, 'data'])->name('pgn-sor3.data');
    Route::put('/{id}', [StatusAssetAiSOR3Controller::class, 'update'])->name('pgn-sor3.update');
    Route::delete('/{id}', [StatusAssetAiSOR3controller::class, 'destroy'])->name('pgn-sor3.destroy');
});

Route::prefix('monev/shg/input-data/asset-breakdown-sor3')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AssetBreakdownSOR3Controller::class, 'index'])->name('asset-breakdown-sor3');
    Route::post('/', [AssetBreakdownSOR3Controller::class, 'store'])->name('asset-breakdown-sor3.store');
    Route::get('/data', [AssetBreakdownSOR3Controller::class, 'data'])->name('asset-breakdown-sor3.data');
    Route::put('/{id}', [AssetBreakdownSOR3Controller::class, 'update'])->name('asset-breakdown-sor3.update');
    Route::delete('/{id}', [AssetBreakdownSOR3controller::class, 'destroy'])->name('asset-breakdown-sor3.destroy');
});

Route::prefix('monev/shg/input-data/status-plo-sor3')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [StatusPloSOR3Controller::class, 'index'])->name('status-plo-sor3');
    Route::post('/', [StatusPloSOR3Controller::class, 'store'])->name('status-plo-sor3.store');
    Route::get('/data', [StatusPloSOR3Controller::class, 'data'])->name('status-plo-sor3.data');
    Route::put('/{id}', [StatusPloSOR3Controller::class, 'update'])->name('status-plo-sor3.update');
    Route::delete('/{id}', [StatusPloSOR3controller::class, 'destroy'])->name('status-plo-sor3.destroy');
});

Route::prefix('monev/shg/input-data/pelatihan-aims-sor3')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [PelatihanAimsSOR3Controller::class, 'index'])->name('pelatihan-aims-sor3');
    Route::post('/', [PelatihanAimsSOR3Controller::class, 'store'])->name('pelatihan-aims-sor3.store');
    Route::get('/data', [PelatihanAimsSOR3Controller::class, 'data'])->name('pelatihan-aims-sor3.data');
    Route::put('/{id}', [PelatihanAimsSOR3Controller::class, 'update'])->name('pelatihan-aims-sor3.update');
    Route::delete('/{id}', [PelatihanAimsSOR3controller::class, 'destroy'])->name('pelatihan-aims-sor3.destroy');
});

Route::prefix('monev/shg/input-data/mandatory-certification-sor3')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [MandatoryCertificationSOR3Controller::class, 'index'])->name('mandatory-certification-sor3');
    Route::post('/', [MandatoryCertificationSOR3Controller::class, 'store'])->name('mandatory-certification-sor3.store');
    Route::get('/data', [MandatoryCertificationSOR3Controller::class, 'data'])->name('mandatory-certification-sor3.data');
    Route::put('/{id}', [MandatoryCertificationSOR3Controller::class, 'update'])->name('mandatory-certification-sor3.update');
    Route::delete('/{id}', [MandatoryCertificationSOR3controller::class, 'destroy'])->name('mandatory-certification-sor3.destroy');
});

Route::prefix('monev/shg/input-data/kondisi-vacant-aims-sor3')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [KondisiVacantAimsSOR3Controller::class, 'index'])->name('kondisi-vacant-aims-sor3');
    Route::post('/', [KondisiVacantAimsSOR3Controller::class, 'store'])->name('kondisi-vacant-aims-sor3.store');
    Route::get('/data', [KondisiVacantAimsSOR3Controller::class, 'data'])->name('kondisi-vacant-aims-sor3.data');
    Route::put('/{id}', [KondisiVacantAimsSOR3Controller::class, 'update'])->name('kondisi-vacant-aims-sor3.update');
    Route::delete('/{id}', [KondisiVacantAimsSOR3controller::class, 'destroy'])->name('kondisi-vacant-aims-sor3.destroy');
});

Route::prefix('monev/shg/input-data/sistem-informasi-aims-sor3')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [SistemInformasiAimsSOR3Controller::class, 'index'])->name('sistem-informasi-aims-sor3');
    Route::post('/', [SistemInformasiAimsSOR3Controller::class, 'store'])->name('sistem-informasi-aims-sor3.store');
    Route::get('/data', [SistemInformasiAimsSOR3Controller::class, 'data'])->name('sistem-informasi-aims-sor3.data');
    Route::put('/{id}', [SistemInformasiAimsSOR3Controller::class, 'update'])->name('sistem-informasi-aims-sor3.update');
    Route::delete('/{id}', [SistemInformasiAimsSOR3controller::class, 'destroy'])->name('sistem-informasi-aims-sor3.destroy');
});

Route::prefix('monev/shg/input-data/rencana-pemeliharaan-sor3')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RencanaPemeliharaanSOR3Controller::class, 'index'])->name('rencana-pemeliharaan-sor3');
    Route::post('/', [RencanaPemeliharaanSOR3Controller::class, 'store'])->name('rencana-pemeliharaan-sor3.store');
    Route::get('/data', [RencanaPemeliharaanSOR3Controller::class, 'data'])->name('rencana-pemeliharaan-sor3.data');
    Route::put('/{id}', [RencanaPemeliharaanSOR3Controller::class, 'update'])->name('rencana-pemeliharaan-sor3.update');
    Route::delete('/{id}', [RencanaPemeliharaanSOR3controller::class, 'destroy'])->name('rencana-pemeliharaan-sor3.destroy');
});

Route::prefix('monev/shg/input-data/reliability-sor3')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [ReliabilitySOR3Controller::class, 'index'])->name('reliability-sor3');
    Route::post('/', [ReliabilitySOR3Controller::class, 'store'])->name('reliability-sor3.store');
    Route::get('/data', [ReliabilitySOR3Controller::class, 'data'])->name('reliability-sor3.data');
    Route::put('/{id}', [ReliabilitySOR3Controller::class, 'update'])->name('reliability-sor3.update');
    Route::delete('/{id}', [ReliabilitySOR3controller::class, 'destroy'])->name('reliability-sor3.destroy');
});

Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-sor3')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAimsSOR3controller::class, 'index'])->name('realisasi-anggaran-ai-sor3');
    Route::post('/', [RealisasiAnggaranAimsSOR3controller::class, 'store'])->name('realisasi-anggaran-ai-sor3.store');
    Route::get('/data', [RealisasiAnggaranAimsSOR3controller::class, 'data'])->name('realisasi-anggaran-ai-sor3.data');
    Route::put('/{id}', [RealisasiAnggaranAimsSOR3controller::class, 'update'])->name('realisasi-anggaran-ai-sor3.update');
    Route::delete('/{id}', [RealisasiAnggaranAimsSOR3controller::class, 'destroy'])->name('realisasi-anggaran-ai-sor3.destroy');
});

Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-sor3')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAiSOR3Controller::class, 'index'])->name('realisasi-progress-fisik-ai-sor3');
    Route::post('/', [RealisasiProgressFisikAiSOR3Controller::class, 'store'])->name('realisasi-progress-fisik-ai-sor3.store');
    Route::get('/data', [RealisasiProgressFisikAiSOR3Controller::class, 'data'])->name('realisasi-progress-fisik-ai-sor3.data');
    Route::put('/{id}', [RealisasiProgressFisikAiSOR3Controller::class, 'update'])->name('realisasi-progress-fisik-ai-sor3.update');
    Route::delete('/{id}', [RealisasiProgressFisikAiSOR3controller::class, 'destroy'])->name('realisasi-progress-fisik-ai-sor3.destroy');
});

Route::prefix('monev/shg/input-data/air-budget-tagging-sor3')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingSOR3Controller::class, 'index'])->name('air-budget-tagging-sor3');
    Route::post('/', [AirBudgetTaggingSOR3Controller::class, 'store'])->name('air-budget-tagging-sor3.store');
    Route::get('/data', [AirBudgetTaggingSOR3Controller::class, 'data'])->name('air-budget-tagging-sor3.data');
    Route::put('/{id}', [AirBudgetTaggingSOR3Controller::class, 'update'])->name('air-budget-tagging-sor3.update');
    Route::delete('/{id}', [AirBudgetTaggingSOR3controller::class, 'destroy'])->name('air-budget-tagging-sor3.destroy');
});



// PGN GLSM
Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-glsm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiAnggaranAiGlsmController::class, 'index'])->name('realisasi-anggaran-ai-glsm');
    Route::post('/', [RealisasiAnggaranAiGlsmController::class, 'store'])->name('realisasi-anggaran-ai-glsm.store');
    Route::get('/data', [RealisasiAnggaranAiGlsmController::class, 'data'])->name('realisasi-anggaran-ai-glsm.data');
    Route::put('/{id}', [RealisasiAnggaranAiGlsmController::class, 'update'])->name('realisasi-anggaran-ai-glsm.update');
    Route::delete('/{id}', [RealisasiAnggaranAiGlsmController::class, 'destroy'])->name('realisasi-anggaran-ai-glsm.destroy');
});

Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-glsm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [RealisasiProgressFisikAiGlsmController::class, 'index'])->name('realisasi-progress-fisik-ai-glsm');
    Route::post('/', [RealisasiProgressFisikAiGlsmController::class, 'store'])->name('realisasi-progress-fisik-ai-glsm.store');
    Route::get('/data', [RealisasiProgressFisikAiGlsmController::class, 'data'])->name('realisasi-progress-fisik-ai-glsm.data');
    Route::put('/{id}', [RealisasiProgressFisikAiGlsmController::class, 'update'])->name('realisasi-progress-fisik-ai-glsm.update');
    Route::delete('/{id}', [RealisasiProgressFisikAiGlsmController::class, 'destroy'])->name('realisasi-progress-fisik-ai-glsm.destroy');
});

Route::prefix('monev/shg/input-data/air-budget-tagging-glsm')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/', [AirBudgetTaggingGlsmController::class, 'index'])->name('air-budget-tagging-glsm');
    Route::post('/', [AirBudgetTaggingGlsmController::class, 'store'])->name('air-budget-tagging-glsm.store');
    Route::get('/data', [AirBudgetTaggingGlsmController::class, 'data'])->name('air-budget-tagging-glsm.data');
    Route::put('/{id}', [AirBudgetTaggingGlsmController::class, 'update'])->name('air-budget-tagging-glsm.update');
    Route::delete('/{id}', [AirBudgetTaggingGlsmController::class, 'destroy'])->name('air-budget-tagging-glsm.destroy');
});


Route::middleware(['auth'])->group(function () {
    Route::redirect('   ettings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
});


require __DIR__ . '/auth.php';
