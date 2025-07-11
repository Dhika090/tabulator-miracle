<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\MonevAimController;
use App\Http\Controllers\SHCNT\InputDataMonev\AssetBreakdown\Region1AssetBreakdownController;
use App\Http\Controllers\SHCNT\InputDataMonev\AssetBreakdown\Region2AssetBreakdownController;
use App\Http\Controllers\SHCNT\InputDataMonev\AssetBreakdown\Region3AssetBreakdownController;
use App\Http\Controllers\SHCNT\InputDataMonev\AssetBreakdown\Region4AssetBreakdownController;
use App\Http\Controllers\SHCNT\InputDataMonev\AssetBreakdown\Region5AssetBreakdownController;
use App\Http\Controllers\SHCNT\InputDataMonev\AssetBreakdown\Region6AssetBreakdownController;
use App\Http\Controllers\SHCNT\InputDataMonev\AssetBreakdown\Region7AssetBreakdownController;
use App\Http\Controllers\SHCNT\InputDataMonev\AssetBreakdown\Region8AssetBreakdownController;
use App\Http\Controllers\SHCNT\InputDataMonev\Availability\Region1AvailabilityController;
use App\Http\Controllers\SHCNT\InputDataMonev\Availability\Region2AvailabilityController;
use App\Http\Controllers\SHCNT\InputDataMonev\Availability\Region3AvailabilityController;
use App\Http\Controllers\SHCNT\InputDataMonev\Availability\Region4AvailabilityController;
use App\Http\Controllers\SHCNT\InputDataMonev\Availability\Region5AvailabilityController;
use App\Http\Controllers\SHCNT\InputDataMonev\Availability\Region6AvailabilityController;
use App\Http\Controllers\SHCNT\InputDataMonev\Availability\Region7AvailabilityController;
use App\Http\Controllers\SHCNT\InputDataMonev\Availability\Region8AvailabilityController;
use App\Http\Controllers\SHCNT\InputDataMonev\KondisiVacantAims\Region1KondisiVacantAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\KondisiVacantAims\Region2KondisiVacantAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\KondisiVacantAims\Region3KondisiVacantAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\KondisiVacantAims\Region4KondisiVacantAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\KondisiVacantAims\Region5KondisiVacantAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\KondisiVacantAims\Region6KondisiVacantAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\KondisiVacantAims\Region7KondisiVacantAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\KondisiVacantAims\Region8KondisiVacantAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\MandatoryCerti\Region1MandatoryCertiController;
use App\Http\Controllers\SHCNT\InputDataMonev\MandatoryCerti\Region2MandatoryCertiController;
use App\Http\Controllers\SHCNT\InputDataMonev\MandatoryCerti\Region3MandatoryCertiController;
use App\Http\Controllers\SHCNT\InputDataMonev\MandatoryCerti\Region4MandatoryCertiController;
use App\Http\Controllers\SHCNT\InputDataMonev\MandatoryCerti\Region5MandatoryCertiController;
use App\Http\Controllers\SHCNT\InputDataMonev\MandatoryCerti\Region6MandatoryCertiController;
use App\Http\Controllers\SHCNT\InputDataMonev\MandatoryCerti\Region7MandatoryCertiController;
use App\Http\Controllers\SHCNT\InputDataMonev\MandatoryCerti\Region8MandatoryCertiController;
use App\Http\Controllers\SHCNT\InputDataMonev\PelatihanAims\Region1PelatihanAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\PelatihanAims\Region2PelatihanAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\PelatihanAims\Region3PelatihanAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\PelatihanAims\Region4PelatihanAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\PelatihanAims\Region5PelatihanAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\PelatihanAims\Region6PelatihanAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\PelatihanAims\Region7PelatihanAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\PelatihanAims\Region8PelatihanAimsController;
use App\Http\Controllers\SHCNT\InputDataMonev\RencanaPemeliharaan\Region1RencanaPemeliharaanController;
use App\Http\Controllers\SHCNT\InputDataMonev\RencanaPemeliharaan\Region2RencanaPemeliharaanController;
use App\Http\Controllers\SHCNT\InputDataMonev\RencanaPemeliharaan\Region3RencanaPemeliharaanController;
use App\Http\Controllers\SHCNT\InputDataMonev\RencanaPemeliharaan\Region4RencanaPemeliharaanController;
use App\Http\Controllers\SHCNT\InputDataMonev\RencanaPemeliharaan\Region5RencanaPemeliharaanController;
use App\Http\Controllers\SHCNT\InputDataMonev\RencanaPemeliharaan\Region6RencanaPemeliharaanController;
use App\Http\Controllers\SHCNT\InputDataMonev\RencanaPemeliharaan\Region7RencanaPemeliharaanController;
use App\Http\Controllers\SHCNT\InputDataMonev\RencanaPemeliharaan\Region8RencanaPemeliharaanController;
use App\Http\Controllers\SHCNT\InputDataMonev\SistemInformasi\Region1SistemInformasiController;
use App\Http\Controllers\SHCNT\InputDataMonev\SistemInformasi\Region2SistemInformasiController;
use App\Http\Controllers\SHCNT\InputDataMonev\SistemInformasi\Region3SistemInformasiController;
use App\Http\Controllers\SHCNT\InputDataMonev\SistemInformasi\Region4SistemInformasiController;
use App\Http\Controllers\SHCNT\InputDataMonev\SistemInformasi\Region5SistemInformasiController;
use App\Http\Controllers\SHCNT\InputDataMonev\SistemInformasi\Region6SistemInformasiController;
use App\Http\Controllers\SHCNT\InputDataMonev\SistemInformasi\Region7SistemInformasiController;
use App\Http\Controllers\SHCNT\InputDataMonev\SistemInformasi\Region8SistemInformasiController;
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
use App\Http\Controllers\SHG\InputDataMonev\PgnSor3\AvailabilitySOR3Controller;
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
use App\Http\Controllers\SHG\InputTargetKinerja\KinerjaKpiPemnhnPloShgController;
use App\Http\Controllers\SHG\InputTargetKinerja\KinerjaKpiStatusAiShgController;
use App\Http\Controllers\SHG\InputTargetKinerja\KpiMandatoryCertiSummaryShgController;
use App\Http\Controllers\SHG\InputTargetKinerja\KumulatifStatusPloShgController;
use App\Http\Controllers\SHG\InputTargetKinerja\PrognosaStatusAiShgController;
use App\Http\Controllers\SHG\InputTargetKinerja\PrognosaStatusPloShgController;
use App\Http\Controllers\SHG\InputTargetKinerja\StatusAssetInteregrityController;
use App\Http\Controllers\SHG\InputTArgetKinerja\Target2025KPIController;
use App\Http\Controllers\SHG\InputTargetKinerja\TargetKpi2025AiAiShgController;
use App\Http\Controllers\SHG\InputTargetKinerja\TargetPenurunanPloShgController;
use App\Http\Controllers\SHG\InputTargetKinerja\TargetSAPController;
use App\Http\Controllers\SHG\InputTargetKinerja\TargetStatusAssetController;
use App\Http\Controllers\SHG\InputTargetKinerja\Tl\HasilMonevTlController;
use App\Http\Controllers\SHG\InputTargetKinerja\Tl\HighligtInformasiDomainTlController;
use App\Http\Controllers\SHG\InputTargetKinerja\Tl\HighligtMandatoryCertificationTlController;
use App\Http\Controllers\SHG\InputTargetKinerja\Tl\HighligtRealisasiAimsTlController;
use App\Http\Controllers\SHG\InputTargetKinerja\Tl\HighligtStatusaiTlController;
use App\Http\Controllers\SHG\InputTargetKinerja\Tl\HighligtStatusPloTlController;
use App\Http\Controllers\SHG\KpiAssetIntegrityController;
use App\Http\Controllers\SHG\TargetMandatoryCertificationController;
use App\Http\Controllers\SHG\TargetSapAssetController;
use App\Http\Controllers\SHG\TargetStatusPLOController;
use App\Http\Controllers\SHPNRE\InputDataMonev\LumutBalai\AssetBreakdownLbController;
use App\Http\Controllers\SHPNRE\InputDataMonev\LumutBalai\StatusAssetAiController;
use App\Http\Controllers\SHPNRE\InputDataMonev\LumutBalai\SummaryPloLbController;
use App\Http\Controllers\SHPNRE\InputDataMonev\LumutBalai\KondisiVacantAimsLbController;
use App\Http\Controllers\SHPNRE\InputDataMonev\LumutBalai\PelatihanAimsLbController;
use App\Http\Controllers\SHPNRE\InputDataMonev\LumutBalai\RencanaPemeliharaanLbController;
use App\Http\Controllers\SHPNRE\InputDataMonev\LumutBalai\MandatoryCertificationLbController;
use App\Http\Controllers\SHPNRE\InputDataMonev\LumutBalai\RealAnggaranAiLbController;
use App\Http\Controllers\SHPNRE\InputDataMonev\LumutBalai\RealAnggaranFigureLbController;
use App\Http\Controllers\SHPNRE\InputDataMonev\LumutBalai\RealProgFisikAiLbController;
use App\Http\Controllers\SHPNRE\InputDataMonev\LumutBalai\SistemInformasiLbController;
use App\Http\Controllers\SHPNRE\InputDataMonev\LumutBalai\AvailabilityLbController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Lahendong\SummaryPloLahendongController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Lahendong\StatusAssetAiLahendongController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Lahendong\SistemInformasiAimsLahendongController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Lahendong\RencanaPemeliharaanLahendongController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Lahendong\RealProgFisikAiLahendongController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Lahendong\RealAnggaranFigureLahendongController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Lahendong\RealAnggaranAiLahendongController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Lahendong\PelatihanAimsLahendongController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Lahendong\MandatoryCertificationLahendongController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Lahendong\KondisiVacantAimsLahendongController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Lahendong\AvailabilityLahendongController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Lahendong\AssetBreakdownLahendongController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Karaha\AssetBreakDownKarahaController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Karaha\AvailabilityKarahaController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Karaha\MandatoryCertificationKarahaController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Karaha\PelatihanAimsKarahaController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Karaha\RealAnggaranAiKarahaController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Karaha\RealAnggaranFigureKarahaController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Karaha\RealProgFisikAiKarahaController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Karaha\RencanaPemeliharaanKarahaController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Karaha\SistemInformasiAimsKarahaController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Karaha\StatusAssetAiKarahaController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Karaha\SummaryPloKarahaController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Karaha\KondisiVacantAimsKarahaController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Kamojang\AssetBreakdownKamojangController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Kamojang\AvailabilityKamojangController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Kamojang\KondisiVacantAimsKamojangController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Kamojang\MandatoryCertificationKamojangController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Kamojang\RealAnggaranAiKamojangController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Kamojang\RealAnggaranFigureKamojangController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Kamojang\RealProgFisikAiKamojangController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Kamojang\RencanaPemeliharaanKamojangController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Kamojang\SistemInformasiAimsKamojangController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Kamojang\StatusAssetAiKamojangController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Kamojang\SummaryploKamojangController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Kamojang\PelatihanAimsKamojangController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Kamojang\SapAssetKamojangController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Ulubelu\AssetBreakdownUlubeluController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Ulubelu\AvailabilityUlubeluController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Ulubelu\KondisiVacantAimsUlubeluController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Ulubelu\MandatoryCertificationUlubeluController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Ulubelu\PelatihanAimsUlubeluController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Ulubelu\RealAnggaranAiUlubeluController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Ulubelu\RealAnggaranFigureUlubeluController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Ulubelu\RealProgFisikAiUlubeluController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Ulubelu\RencanaPemeliharaanUlubeluController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Ulubelu\SapAssetUlubeluController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Ulubelu\SistemInformasiAimsUlubeluController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Ulubelu\StatusAssetAiUlubeluController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Ulubelu\SummaryPloUlubeluController;
use App\Http\Controllers\SHPNRE\InputDataMonev\PPI\AssetBreakdownPPIController;
use App\Http\Controllers\SHPNRE\InputDataMonev\PPI\AvailabilityPPIController;
use App\Http\Controllers\SHPNRE\InputDataMonev\PPI\KondisiVacantAimsPPIController;
use App\Http\Controllers\SHPNRE\InputDataMonev\PPI\MandatoryCertificationPPIController;
use App\Http\Controllers\SHPNRE\InputDataMonev\PPI\PelatihanAimsPPIController;
use App\Http\Controllers\SHPNRE\InputDataMonev\PPI\RealAnggaranAiPPIController;
use App\Http\Controllers\SHPNRE\InputDataMonev\PPI\RealAnggaranFigurePPIController;
use App\Http\Controllers\SHPNRE\InputDataMonev\PPI\RealProgFisikAiPPIController;
use App\Http\Controllers\SHPNRE\InputDataMonev\PPI\RencanaPemeliharaanPPIController;
use App\Http\Controllers\SHPNRE\InputDataMonev\PPI\SistemInformasiAimsPPIController;
use App\Http\Controllers\SHPNRE\InputDataMonev\PPI\StatusAssetAiPPIController;
use App\Http\Controllers\SHPNRE\InputDataMonev\PPI\SummaryPloPPIController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Regas\AssetBreakdownJawa1RegasController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Regas\AvailabilityJawa1RegasController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Regas\KondisiVacantAimsJawa1RegasController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Regas\MandatoryCertificationJawa1RegasController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Regas\PelatihanAimsJawa1RegasController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Regas\RealAnggaranAiJawa1RegasController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Regas\RealAnggaranFigureJawa1RegasController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Regas\RealProgFisikAiJawa1RegasController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Regas\RencanaPemeliharaanJawa1RegasController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Regas\SistemInformasiAimsJawa1RegasController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Regas\StatusAssetAiJawa1RegasController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Regas\SummaryPloJawa1RegasController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Power\AssetBreakdownJawa1PowerController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Power\AvailabilityJawa1PowerController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Power\KondisiVacantAimsJawa1PowerController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Power\MandatoryCertificationJawa1PowerController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Power\PelatihanAimsJawa1PowerController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Power\RealAnggaranAiJawa1PowerController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Power\RealAnggaranFigureJawa1PowerController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Power\RealProgFisikAiJawa1PowerController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Power\RencanaPemeliharaanJawa1PowerController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Power\SistemInformasiAimsJawa1PowerController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Power\StatusAssetAiJawa1PowerController;
use App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Power\SummaryPloJawa1PowerController;
use App\Http\Controllers\SHIML\InputDataMonev\Pis\AssetBreakdownPisController;
use App\Http\Controllers\SHIML\InputDataMonev\Pis\AvailabilityPisController;
use App\Http\Controllers\SHIML\InputDataMonev\Pis\KondisiVacantAimsPisController;
use App\Http\Controllers\SHIML\InputDataMonev\Pis\MandatoryCertificationPisController;
use App\Http\Controllers\SHIML\InputDataMonev\Pis\PelatihanAimsPisController;
use App\Http\Controllers\SHIML\InputDataMonev\Pis\RealAnggaranAiPisController;
use App\Http\Controllers\SHIML\InputDataMonev\Pis\RealAnggaranFigurePisController;
use App\Http\Controllers\SHIML\InputDataMonev\Pis\RealProgFisikAiPisController;
use App\Http\Controllers\SHIML\InputDataMonev\Pis\RencanaPemeliharaanPisController;
use App\Http\Controllers\SHIML\InputDataMonev\Pis\SapAssetPisController;
use App\Http\Controllers\SHIML\InputDataMonev\Pis\SistemInformasiAimsPisController;
use App\Http\Controllers\SHIML\InputDataMonev\Pis\StatusAssetAiPisController;
use App\Http\Controllers\SHIML\InputDataMonev\Pis\StatusPloPisController;
use App\Http\Controllers\SHIML\InputDataMonev\Pet\AssetBreakdownPetController;
use App\Http\Controllers\SHIML\InputDataMonev\Pet\AvailabilityPetController;
use App\Http\Controllers\SHIML\InputDataMonev\Pet\KondisiVacantAimsPetController;
use App\Http\Controllers\SHIML\InputDataMonev\Pet\MandatoryCertificationPetController;
use App\Http\Controllers\SHIML\InputDataMonev\Pet\PelatihanAimsPetController;
use App\Http\Controllers\SHIML\InputDataMonev\Pet\RealAnggaranAiPetController;
use App\Http\Controllers\SHIML\InputDataMonev\Pet\RealAnggaranFigurePetController;
use App\Http\Controllers\SHIML\InputDataMonev\Pet\RealProgFisikAiPetController;
use App\Http\Controllers\SHIML\InputDataMonev\Pet\RencanaPemeliharaanPetController;
use App\Http\Controllers\SHIML\InputDataMonev\Pet\SapAssetPetController;
use App\Http\Controllers\SHIML\InputDataMonev\Pet\SistemInformasiAimsPetController;
use App\Http\Controllers\SHIML\InputDataMonev\Pet\StatusAsseAiPetController;
use App\Http\Controllers\SHIML\InputDataMonev\Pet\StatusPloPetController;
use App\Http\Controllers\SHIML\InputDataMonev\PTK\AssetBreakdownPtkController;
use App\Http\Controllers\SHIML\InputDataMonev\PTK\AvailabilityPtkController;
use App\Http\Controllers\SHIML\InputDataMonev\PTK\KondisiVacantAimsPtkController;
use App\Http\Controllers\SHIML\InputDataMonev\PTK\MandatoryCertificationPtkController;
use App\Http\Controllers\SHIML\InputDataMonev\PTK\PelatihanAimsPtkController;
use App\Http\Controllers\SHIML\InputDataMonev\PTK\RealAnggaranAiPtkController;
use App\Http\Controllers\SHIML\InputDataMonev\PTK\RealAnggaranFigurePtkController;
use App\Http\Controllers\SHIML\InputDataMonev\PTK\RealProgFisikAiPtkController;
use App\Http\Controllers\SHIML\InputDataMonev\PTK\RencanaPemeliharaanPtkController;
use App\Http\Controllers\SHIML\InputDataMonev\PTK\SapAssetPtkController;
use App\Http\Controllers\SHIML\InputDataMonev\PTK\SistemInformasiAimsPtkController;
use App\Http\Controllers\SHIML\InputDataMonev\PTK\StatusAssetAiPtkController;
use App\Http\Controllers\SHIML\InputDataMonev\PTK\StatusPloPtkController;
use App\Http\Controllers\SHPNRE\TargetKinerja\StatusPlo\KumulatifStatusPloSHPNREController;
use App\Http\Controllers\SHPNRE\TargetKinerja\StatusPlo\PrognosaStatusPloSHPNREController;
use App\Http\Controllers\SHPNRE\TargetKinerja\StatusPlo\TargetPenurunanPloSHPNREController;
use App\Http\Controllers\SHPNRE\TargetKinerja\TargetMandatoryCertficationShpnreController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan\AssetBreakdownBalikpapanController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan\AvailabilityBalikpapanController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan\KondisiVacantAimsBalikpapanController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan\MandatoryCertificationBalikpapanController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan\PelatihanAimsBalikpapanController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan\RealAnggaranAiBalikpapanController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan\RealAnggaranFigureBalikpapanController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan\RealProgFisikAiBalikpapanController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan\RencanaPemeliharaanBalikpapanController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan\SapAssetBalikpapanController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan\SistemInformasiAimsBalikpapanController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan\StatusAssetAiBalikpapanController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan\StatusPloBalikpapanController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balongan\AssetBreakdownBalonganController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balongan\AvailabilityBalonganController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balongan\KondisiVacantAimsBalonganController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balongan\MandatoryCertificationBalonganController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balongan\PelatihanAimsBalonganController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balongan\RealisasiAnggaranAiBalonganController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balongan\RealisasiAnggaranFigureBalonganController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balongan\RealisasiProgFisikAiBalonganController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balongan\RencanaPemeliharaanBalonganController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balongan\SapAssetBalonganController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balongan\SistemInformasiAimsBalonganController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balongan\StatusAssetAiBalonganController;
use App\Http\Controllers\SHRNP\InputDataMonev\Balongan\StatusPloBalonganController;
use App\Http\Controllers\SHRNP\InputDataMonev\Cilacap\StatusAssetAiCilacapController;
use App\Http\Controllers\SHRNP\InputDataMonev\RuDumai\AssetBreakdownRuDumaiController;
use App\Http\Controllers\SHRNP\InputDataMonev\RuDumai\AvailabilityRuDumaiController;
use App\Http\Controllers\SHRNP\InputDataMonev\RuDumai\KondisiVacantAimsRuDumaiController;
use App\Http\Controllers\SHRNP\InputDataMonev\RuDumai\MandatoryCertificationRuDumaiController;
use App\Http\Controllers\SHRNP\InputDataMonev\RuDumai\PelatihanAimsRuDumaiController;
use App\Http\Controllers\SHRNP\InputDataMonev\RuDumai\RealAnggaranAiRuDumaiController;
use App\Http\Controllers\SHRNP\InputDataMonev\RuDumai\RealAnggaranFigureRuDumaiController;
use App\Http\Controllers\SHRNP\InputDataMonev\RuDumai\RealProgFisikAiRuDumaiController;
use App\Http\Controllers\SHRNP\InputDataMonev\RuDumai\RencanaPemeliharaanRuDumaiController;
use App\Http\Controllers\SHRNP\InputDataMonev\RuDumai\SistemInformasiAimsRuDumaiController;
use App\Http\Controllers\SHRNP\InputDataMonev\RuDumai\StatusAssetAiRuDumaiController;
use App\Http\Controllers\SHRNP\InputDataMonev\RuDumai\StatusPloRuDumaiController;
use App\Http\Controllers\SHRNP\InputDataMonev\RuDumai\SapAssetRuDumaiController;
use App\Http\Controllers\SHRNP\InputDataMonev\Plaju\AssetBreakdownPlajuController;
use App\Http\Controllers\SHRNP\InputDataMonev\Plaju\AvailabilityPlajuController;
use App\Http\Controllers\SHRNP\InputDataMonev\Plaju\KondisiVacantAimsPlajuController;
use App\Http\Controllers\SHRNP\InputDataMonev\Plaju\MandatoryCertificationPlajuController;
use App\Http\Controllers\SHRNP\InputDataMonev\Plaju\PelatihanAimsPlajuController;
use App\Http\Controllers\SHRNP\InputDataMonev\Plaju\RealAnggaranAiPlajuController;
use App\Http\Controllers\SHRNP\InputDataMonev\Plaju\RealAnggaranFigurePlajuController;
use App\Http\Controllers\SHRNP\InputDataMonev\Plaju\RealProgFisikPlajuController;
use App\Http\Controllers\SHRNP\InputDataMonev\Plaju\RencanaPemeliharaanPlajuController;
use App\Http\Controllers\SHRNP\InputDataMonev\Plaju\SapAssetPlajuController;
use App\Http\Controllers\SHRNP\InputDataMonev\Plaju\SistemInformasiAimsPlajuController;
use App\Http\Controllers\SHRNP\InputDataMonev\Plaju\StatusAssetAiPlajuController;
use App\Http\Controllers\SHRNP\InputDataMonev\Plaju\StatusPloPlajuController;
use App\Http\Controllers\SHRNP\InputDataMonev\Cilacap\AssetBreakdownCilacapController;
use App\Http\Controllers\SHRNP\InputDataMonev\Cilacap\AvailabilityCilacapController;
use App\Http\Controllers\SHRNP\InputDataMonev\Cilacap\KondisiVacantAimsCilacapController;
use App\Http\Controllers\SHRNP\InputDataMonev\Cilacap\MandatoryCertificationCilacapController;
use App\Http\Controllers\SHRNP\InputDataMonev\Cilacap\PelatihanAimsCilacapController;
use App\Http\Controllers\SHRNP\InputDataMonev\Cilacap\RealAnggaranAiCilacapController;
use App\Http\Controllers\SHRNP\InputDataMonev\Cilacap\RealAnggaranFigureCilacapController;
use App\Http\Controllers\SHRNP\InputDataMonev\Cilacap\RealProgFisikAiCilacapController;
use App\Http\Controllers\SHRNP\InputDataMonev\Cilacap\RencanaPemeliharaanCilacapController;
use App\Http\Controllers\SHRNP\InputDataMonev\Cilacap\SapAssetCilacapController;
use App\Http\Controllers\SHRNP\InputDataMonev\Cilacap\SistemInformasiAimsCilacapController;
use App\Http\Controllers\SHRNP\InputDataMonev\Cilacap\StatusPloCilacapController;
use App\Http\Controllers\SHRNP\InputDataMonev\Kasim\AssetBreakdownKasimController;
use App\Http\Controllers\SHRNP\InputDataMonev\Kasim\AvailabilityKasimController;
use App\Http\Controllers\SHRNP\InputDataMonev\Kasim\KondisiVacantAimsKasimController;
use App\Http\Controllers\SHRNP\InputDataMonev\Kasim\MandatoryCertificationKasimController;
use App\Http\Controllers\SHRNP\InputDataMonev\Kasim\PelatihanAimsKasimController;
use App\Http\Controllers\SHRNP\InputDataMonev\Kasim\RealAnggaranAiKasimController;
use App\Http\Controllers\SHRNP\InputDataMonev\Kasim\RealAnggaranFigureKasimController;
use App\Http\Controllers\SHRNP\InputDataMonev\Kasim\RealProgFisikAiKasimController;
use App\Http\Controllers\SHRNP\InputDataMonev\Kasim\RencanaPemeliharaanKasimController;
use App\Http\Controllers\SHRNP\InputDataMonev\Kasim\SapAssetKasimController;
use App\Http\Controllers\SHRNP\InputDataMonev\Kasim\SistemInformasiAimsKasimController;
use App\Http\Controllers\SHRNP\InputDataMonev\Kasim\StatusAssetAiKasimController;
use App\Http\Controllers\SHRNP\InputDataMonev\Kasim\StatusPloKasimController;
use App\Http\Controllers\SHU\InputDataMonev\AssetBreakdown\Regional1AssetBreakdownController;
use App\Http\Controllers\SHU\InputDataMonev\AssetBreakdown\Regional2AssetBreakdownController;
use App\Http\Controllers\SHU\InputDataMonev\AssetBreakdown\Regional3AssetBreakdownController;
use App\Http\Controllers\SHU\InputDataMonev\AssetBreakdown\Regional4AssetBreakdownController;

use App\Http\Controllers\SHU\InputDataMonev\Availability\Regional1AvailabilityController;
use App\Http\Controllers\SHU\InputDataMonev\Availability\Regional2AvailabilityController;
use App\Http\Controllers\SHU\InputDataMonev\Availability\Regional3AvailabilityController;
use App\Http\Controllers\SHU\InputDataMonev\Availability\Regional4AvailabilityController;
use App\Http\Controllers\SHU\InputDataMonev\KondisiVacantAims\Regional1KondisiVacantAimsController;
use App\Http\Controllers\SHU\InputDataMonev\KondisiVacantAims\Regional2KondisiVacantAimsController;
use App\Http\Controllers\SHU\InputDataMonev\KondisiVacantAims\Regional3KondisiVacantAimsController;
use App\Http\Controllers\SHU\InputDataMonev\KondisiVacantAims\Regional4KondisiVacantAimsController;
use App\Http\Controllers\SHU\InputDataMonev\MandatoryCertification\Regional1MandatoryCertificationController;
use App\Http\Controllers\SHU\InputDataMonev\MandatoryCertification\Regional2MandatoryCertificationController;
use App\Http\Controllers\SHU\InputDataMonev\MandatoryCertification\Regional3MandatoryCertificationController;
use App\Http\Controllers\SHU\InputDataMonev\MandatoryCertification\Regional4MandatoryCertificationController;
use App\Http\Controllers\SHU\InputDataMonev\PelatihanAims\Regional1PelatihanAimsController;
use App\Http\Controllers\SHU\InputDataMonev\PelatihanAims\Regional2PelatihanAimsController;
use App\Http\Controllers\SHU\InputDataMonev\PelatihanAims\Regional3PelatihanAimsController;
use App\Http\Controllers\SHU\InputDataMonev\PelatihanAims\Regional4PelatihanAimsController;
use App\Http\Controllers\SHU\InputDataMonev\RealisasiAnggaranAi\Regional1RealisasiAnggaranAiController;
use App\Http\Controllers\SHU\InputDataMonev\RealisasiAnggaranAi\Regional2RealisasiAnggaranAiController;
use App\Http\Controllers\SHU\InputDataMonev\RealisasiAnggaranAi\Regional3RealisasiAnggaranAiController;
use App\Http\Controllers\SHU\InputDataMonev\RealisasiAnggaranAi\Regional4RealisasiAnggaranAiController;
use App\Http\Controllers\SHU\InputDataMonev\RealisasiAnggaranFigure\Regional1RealisasiAnggaranFigureController;
use App\Http\Controllers\SHU\InputDataMonev\RealisasiAnggaranFigure\Regional2RealisasiAnggaranFigureController;
use App\Http\Controllers\SHU\InputDataMonev\RealisasiAnggaranFigure\Regional3RealisasiAnggaranFigureController;
use App\Http\Controllers\SHU\InputDataMonev\RealisasiAnggaranFigure\Regional4RealisasiAnggaranFigureController;
use App\Http\Controllers\SHU\InputDataMonev\RealisasiProgressFisikAi\Regional1RealisasiProgresFisikAiController;
use App\Http\Controllers\SHU\InputDataMonev\RealisasiProgressFisikAi\Regional2RealisasiProgresFisikAiController;
use App\Http\Controllers\SHU\InputDataMonev\RealisasiProgressFisikAi\Regional3RealisasiProgresFisikAiController;
use App\Http\Controllers\SHU\InputDataMonev\RealisasiProgressFisikAi\Regional4RealisasiProgresFisikAiController;
use App\Http\Controllers\SHU\InputDataMonev\RencanaPemeliharaan\Regional1RencanaPemeliharaanController;
use App\Http\Controllers\SHU\InputDataMonev\RencanaPemeliharaan\Regional2RencanaPemeliharaanController;
use App\Http\Controllers\SHU\InputDataMonev\RencanaPemeliharaan\Regional3RencanaPemeliharaanController;
use App\Http\Controllers\SHU\InputDataMonev\RencanaPemeliharaan\Regional4RencanaPemeliharaanController;
use App\Http\Controllers\SHU\InputDataMonev\SapAsset\Regional1SapAssetController;
use App\Http\Controllers\SHU\InputDataMonev\SapAsset\Regional2SapAssetController;
use App\Http\Controllers\SHU\InputDataMonev\SapAsset\Regional3SapAssetController;
use App\Http\Controllers\SHU\InputDataMonev\SapAsset\Regional4SapAssetController;
use App\Http\Controllers\SHU\InputDataMonev\SistemInformasi\Regional1SistemInformasiController;
use App\Http\Controllers\SHU\InputDataMonev\SistemInformasi\Regional2SistemInformasiController;
use App\Http\Controllers\SHU\InputDataMonev\SistemInformasi\Regional3SistemInformasiController;
use App\Http\Controllers\SHU\InputDataMonev\SistemInformasi\Regional4SistemInformasiController;
use App\Http\Controllers\SHU\InputDataMonev\StatusAi\Regional1StatusAiController;
use App\Http\Controllers\SHU\InputDataMonev\StatusAi\Regional2StatusAiController;
use App\Http\Controllers\SHU\InputDataMonev\StatusAi\Regional3StatusAiController;
use App\Http\Controllers\SHU\InputDataMonev\StatusAi\Regional4StatusAiController;
use App\Http\Controllers\SHU\InputDataMonev\StatusPlo\Regional1StatusPloController;
use App\Http\Controllers\SHU\InputDataMonev\StatusPlo\Regional2StatusPloController;
use App\Http\Controllers\SHU\InputDataMonev\StatusPlo\Regional3StatusPloController;
use App\Http\Controllers\SHU\InputDataMonev\StatusPlo\Regional4StatusPloController;
use App\Http\Controllers\SHU\TargetKinerja\KinerjaKpiAssetIntegrity\KinerjaKpiPemnhnPloShuController;
use App\Http\Controllers\SHU\TargetKinerja\KinerjaKpiAssetIntegrity\KinerjaKpiStatusAiShuController;
use App\Http\Controllers\SHU\TargetKinerja\KinerjaKpiAssetIntegrity\KinerjaMandatoryCertiSummaryShuController;
use App\Http\Controllers\SHU\TargetKinerja\PrognosaStatusAiShuController;
use App\Http\Controllers\SHU\TargetKinerja\StatusPlo\KumulatifStatusPloController;
use App\Http\Controllers\SHU\TargetKinerja\StatusPlo\PrognosaStatusPloController;
use App\Http\Controllers\SHU\TargetKinerja\StatusPlo\TargetPenurunanPloController;
use App\Http\Controllers\SHU\TargetKinerja\TargetKpiAiShuController;
use App\Http\Controllers\SHU\TargetKinerja\TargetMandatoryCertificationShuController;
use App\Http\Controllers\SHU\TargetKinerja\TargetSapAssetShuController;
use App\Http\Controllers\SHU\TargetKinerja\TindakLanjutMonev\HasilMonevShuController;
use App\Http\Controllers\SHU\TargetKinerja\TindakLanjutMonev\HighlightInformasiDomainShuController;
use App\Http\Controllers\SHU\TargetKinerja\TindakLanjutMonev\HighlightMandatoryCertificationShuController;
use App\Http\Controllers\SHU\TargetKinerja\TindakLanjutMonev\HighlightRealisasiAimsShuController;
use App\Http\Controllers\SHU\TargetKinerja\TindakLanjutMonev\HighlightStatusAiShuController;
use App\Http\Controllers\SHU\TargetKinerja\TindakLanjutMonev\HighlightStatusPloShuController;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use Illuminate\Support\Facades\App;

// Route::get('login', function () {
//     return view('auth.login');
// })->name('login');

// Route::post('/auth/digio-token-login', [AuthController::class, 'loginWithDigioToken']);
Route::post('/auth/digio-jwt-login', [AuthController::class, 'loginFromDigioToken']);


Route::get('monev-aim', [MonevAimController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('monev.aim');

Route::middleware([\App\Http\Middleware\CorsMiddleware::class])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::view('dashboard', 'dashboard')->name('dashboard');

    // SHG Target KPI 2025 AI AI
    Route::prefix('monev/shg/kinerja/shg-target-kpi-2025-ai')->group(function () {
        Route::get('/', [TargetKpi2025AiAiShgController::class, 'index'])->name('shg-target-kpi-2025-ai');
        Route::post('/', [TargetKpi2025AiAiShgController::class, 'store'])->name('shg-target-kpi-2025-ai.store');
        Route::get('/data', [TargetKpi2025AiAiShgController::class, 'data'])->name('shg-target-kpi-2025-ai.data');
        Route::get('/{id}/edit', [TargetKpi2025AiAiShgController::class, 'edit'])->name('shg-target-kpi-2025-ai.edit');
        Route::put('/{id}', [TargetKpi2025AiAiShgController::class, 'update'])->name('shg-target-kpi-2025-ai.update');
        Route::delete('/{id}', [TargetKpi2025AiAiShgController::class, 'destroy'])->name('shg-target-kpi-2025-ai.destroy');
    });

    // SHG Prognosa Status AI
    Route::prefix('monev/shg/kinerja/shg-prognosa-status-ai')->group(function () {
        Route::get('/', [PrognosaStatusAiShgController::class, 'index'])->name('shg-prognosa-status-ai');
        Route::post('/', [PrognosaStatusAiShgController::class, 'store'])->name('shg-prognosa-status-ai.store');
        Route::get('/data', [PrognosaStatusAiShgController::class, 'data'])->name('shg-prognosa-status-ai.data');
        Route::get('/{id}/edit', [PrognosaStatusAiShgController::class, 'edit'])->name('shg-prognosa-status-ai.edit');
        Route::put('/{id}', [PrognosaStatusAiShgController::class, 'update'])->name('shg-prognosa-status-ai.update');
        Route::delete('/{id}', [PrognosaStatusAiShgController::class, 'destroy'])->name('shg-prognosa-status-ai.destroy');
    });

    // SHG Status Asset Intergity
    Route::prefix('monev/shg/kinerja/status-asset-integrity')->group(function () {
        Route::get('/', [StatusAssetInteregrityController::class, 'index'])->name('');
        Route::post('/', [StatusAssetInteregrityController::class, 'store'])->name('status-asset-integrity');
        Route::get('/data', [StatusAssetInteregrityController::class, 'getData'])->name('status-asset-integrity.data');
    });

    // SHG Target Status
    Route::prefix('monev/shg/kinerja/target-status-asset')->group(function () {
        Route::get('/', [TargetStatusAssetController::class, 'index'])->name('target-status-asset');
        Route::post('/', [TargetStatusAssetController::class, 'store'])->name('target-status-asset');
        Route::get('/data', [TargetStatusAssetController::class, 'data'])->name('target-status-asset.data');
    });

    // SHG Target SAP
    Route::prefix('monev/shg/kinerja/target-sap')->group(function () {
        Route::get('/', [TargetSAPController::class, 'index'])->name('target-sap');
        Route::post('/', [TargetSAPController::class, 'store'])->name('target-sap');
        Route::get('/data', [TargetSAPController::class, 'data'])->name('target-sap.data');
        Route::put('/{id}', [TargetSAPController::class, 'update'])->name('target-sap.update');
        Route::delete('/{id}', [TargetSAPController::class, 'destroy'])->name('target-sap.destroy');
    });

    // SHG Target 2025 AI
    Route::prefix('monev/shg/kinerja/target-2025-ai')->group(function () {
        Route::get('/', [Target2025KPIController::class, 'index'])->name('target-2025-ai');
        Route::post('/', [Target2025KPIController::class, 'store'])->name('target-2025-ai');
        Route::get('/data', [Target2025KPIController::class, 'data'])->name('target-2025-ai.data');
        Route::get('/{id}/edit', [Target2025KPIController::class, 'edit'])->name('target-2025-ai.edit');
        Route::put('/{id}', [Target2025KPIController::class, 'update'])->name('target-2025-ai.update');
        Route::delete('/{id}', [Target2025KPIController::class, 'destroy'])->name('target-2025-ai.destroy');
    });

    // target-status-plo
    // Prognosa Status PLO SHG
    Route::prefix('monev/shg/kinerja/shg-prognosa-status-plo')->group(function () {
        Route::get('/', [PrognosaStatusPloShgController::class, 'index'])->name('shg-prognosa-status-plo');
        Route::post('/', [PrognosaStatusPloShgController::class, 'store'])->name('shg-prognosa-status-plo.store');
        Route::get('/data', [PrognosaStatusPloShgController::class, 'data'])->name('shg-prognosa-status-plo.data');
        Route::put('/{id}', [PrognosaStatusPloShgController::class, 'update'])->name('shg-prognosa-status-plo.update');
        Route::delete('/{id}', [PrognosaStatusPloShgController::class, 'destroy'])->name('shg-prognosa-status-plo.destroy');
    });

    // Target Penurunan PLO SHG
    Route::prefix('monev/shg/kinerja/shg-target-penurunan-plo')->group(function () {
        Route::get('/', [TargetPenurunanPloShgController::class, 'index'])->name('shg-target-penurunan-plo');
        Route::post('/', [TargetPenurunanPloShgController::class, 'store'])->name('shg-target-penurunan-plo.store');
        Route::get('/data', [TargetPenurunanPloShgController::class, 'data'])->name('shg-target-penurunan-plo.data');
        Route::put('/{id}', [TargetPenurunanPloShgController::class, 'update'])->name('shg-target-penurunan-plo.update');
        Route::delete('/{id}', [TargetPenurunanPloShgController::class, 'destroy'])->name('shg-target-penurunan-plo.destroy');
    });

    // Kumulatif Status PLO SHG
    Route::prefix('monev/shg/kinerja/shg-kumulatif-status-plo')->group(function () {
        Route::get('/', [KumulatifStatusPloShgController::class, 'index'])->name('shg-kumulatif-status-plo');
        Route::post('/', [KumulatifStatusPloShgController::class, 'store'])->name('shg-kumulatif-status-plo.store');
        Route::get('/data', [KumulatifStatusPloShgController::class, 'data'])->name('shg-kumulatif-status-plo.data');
        Route::put('/{id}', [KumulatifStatusPloShgController::class, 'update'])->name('shg-kumulatif-status-plo.update');
        Route::delete('/{id}', [KumulatifStatusPloShgController::class, 'destroy'])->name('shg-kumulatif-status-plo.destroy');
    });

    // Route::prefix('monev/shg/kinerja/target-status-plo')->group(function () {
    //     Route::get('/', [TargetStatusPLOController::class, 'index'])->name('target-status-plo');
    //     Route::post('/', [TargetStatusPLOController::class, 'store'])->name('target-status-plo');
    //     Route::get('/data', [TargetStatusPLOController::class, 'getData'])->name('target-status-plo.data');
    // });

    // Tindak Lanjut Hasil Monev
    Route::prefix('monev/shg/kinerja/hasil-monev')->group(function () {
        Route::get('/', [HasilMonevController::class, 'index'])->name('hasil-monev');
        Route::post('/', [HasilMonevController::class, 'store'])->name('hasil-monev');
        Route::get('/data', [HasilMonevController::class, 'getData'])->name('hasil-monev.data');
    });

    // Kinerja KPI Pemnhn PLO SHG
    Route::prefix('monev/shg/kinerja/shg-kinerja-kpi-pemnhn-plo')->group(function () {
        Route::get('/', [KinerjaKpiPemnhnPloShgController::class, 'index'])->name('shg-kinerja-kpi-pemnhn-plo');
        Route::post('/', [KinerjaKpiPemnhnPloShgController::class, 'store'])->name('shg-kinerja-kpi-pemnhn-plo.store');
        Route::get('/data', [KinerjaKpiPemnhnPloShgController::class, 'data'])->name('shg-kinerja-kpi-pemnhn-plo.data');
        Route::put('/{id}', [KinerjaKpiPemnhnPloShgController::class, 'update'])->name('shg-kinerja-kpi-pemnhn-plo.update');
        Route::delete('/{id}', [KinerjaKpiPemnhnPloShgController::class, 'destroy'])->name('shg-kinerja-kpi-pemnhn-plo.destroy');
    });

    // Kinerja KPI Status AI SHG
    Route::prefix('monev/shg/kinerja/shg-kinerja-kpi-status-ai')->group(function () {
        Route::get('/', [KinerjaKpiStatusAiShgController::class, 'index'])->name('shg-kinerja-kpi-status-ai');
        Route::post('/', [KinerjaKpiStatusAiShgController::class, 'store'])->name('shg-kinerja-kpi-status-ai.store');
        Route::get('/data', [KinerjaKpiStatusAiShgController::class, 'data'])->name('shg-kinerja-kpi-status-ai.data');
        Route::put('/{id}', [KinerjaKpiStatusAiShgController::class, 'update'])->name('shg-kinerja-kpi-status-ai.update');
        Route::delete('/{id}', [KinerjaKpiStatusAiShgController::class, 'destroy'])->name('shg-kinerja-kpi-status-ai.destroy');
    });

    // KPI Mandatory Certi Summary SHG
    Route::prefix('monev/shg/kinerja/shg-kpi-mandatory-certi-summary')->group(function () {
        Route::get('/', [KpiMandatoryCertiSummaryShgController::class, 'index'])->name('shg-kpi-mandatory-certi-summary');
        Route::post('/', [KpiMandatoryCertiSummaryShgController::class, 'store'])->name('shg-kpi-mandatory-certi-summary.store');
        Route::get('/data', [KpiMandatoryCertiSummaryShgController::class, 'data'])->name('shg-kpi-mandatory-certi-summary.data');
        Route::put('/{id}', [KpiMandatoryCertiSummaryShgController::class, 'update'])->name('shg-kpi-mandatory-certi-summary.update');
        Route::delete('/{id}', [KpiMandatoryCertiSummaryShgController::class, 'destroy'])->name('shg-kpi-mandatory-certi-summary.destroy');
    });

    Route::prefix('monev/shg/kinerja/target-sap-asset')->group(function () {
        Route::get('/', [TargetSapAssetController::class, 'index'])->name('target-sap-asset');
        Route::post('/', [TargetSapAssetController::class, 'store'])->name('target-sap-asset.store');
        Route::get('/data', [TargetSapAssetController::class, 'data'])->name('target-sap-asset.data');
        Route::put('/{id}', [TargetSapAssetController::class, 'update'])->name('target-sap-asset.update');
        Route::delete('/{id}', [TargetSapAssetController::class, 'destroy'])->name('target-sap-asset.destroy');
    });

    Route::prefix('monev/shg/kinerja/mandatory-certification')->group(function () {
        Route::get('/', [TargetMandatoryCertificationController::class, 'index'])->name('mandatory-certification');
        Route::post('/', [TargetMandatoryCertificationController::class, 'store'])->name('mandatory-certification.store');
        Route::get('/data', [TargetMandatoryCertificationController::class, 'data'])->name('mandatory-certification.data');
        Route::put('/{id}', [TargetMandatoryCertificationController::class, 'update'])->name('mandatory-certification.update');
        Route::delete('/{id}', [TargetMandatoryCertificationController::class, 'destroy'])->name('mandatory-certification.destroy');
    });

    // Input Data Monev
    // Pertamina Gas Status Asset 2025 AI PTG
    Route::prefix('monev/shg/input-data/pertamina-gas')->group(function () {
        Route::get('/', [PertaminaGasController::class, 'index'])->name('pertamina-gas');
        Route::post('/', [PertaminaGasController::class, 'store'])->name('pertamina-gas.store');
        Route::get('/data', [PertaminaGasController::class, 'data'])->name('pertamina-gas.data');
        Route::get('/{id}', [PertaminaGasController::class, 'show'])->name('pertamina-gas.show');
        Route::put('/{id}', [PertaminaGasController::class, 'update'])->name('pertamina-gas.update');
        Route::delete('/{id}', [PertaminaGasController::class, 'destroy'])->name('pertamina-gas.destroy');
    });

    // SHG Mandatory Certification PTG
    Route::prefix('monev/shg/input-data/mandatory-certification-ptg')->group(function () {
        Route::get('/', [MandatoryCertificationPtgController::class, 'index'])->name('mandatory-certification-ptg');
        Route::post('/', [MandatoryCertificationPtgController::class, 'store'])->name('mandatory-certification-ptg');
        Route::get('/data', [MandatoryCertificationPtgController::class, 'data'])->name('mandatory-certification-ptg.data');
        Route::put('/{id}', [MandatoryCertificationPtgController::class, 'update'])->name('mandatory-certification-ptg.update');
        Route::delete('/{id}', [MandatoryCertificationPtgController::class, 'destroy'])->name('mandatory-certification-ptg.destroy');
    });

    // SAP Asset PTG
    Route::prefix('monev/shg/input-data/sap-asset-ptg')->group(function () {
        Route::get('/', [SapAssetPtgController::class, 'index'])->name('sap-asset-ptg');
        Route::post('/', [SapAssetPtgController::class, 'store'])->name('sap-asset-ptg.store');
        Route::get('/data', [SapAssetPtgController::class, 'data'])->name('sap-asset-ptg.data');
        Route::put('/{id}', [SapAssetPtgController::class, 'update'])->name('sap-asset-ptg.update');
        Route::delete('/{id}', [SapAssetPtgController::class, 'destroy'])->name('sap-asset-ptg.destroy');
    });

    // Status PLO PTG
    Route::prefix('monev/shg/input-data/status-plo-ptg')->group(function () {
        Route::get('/', [StatusPloPtgController::class, 'index'])->name('status-plo-ptg');
        Route::post('/', [StatusPloPtgController::class, 'store'])->name('status-plo-ptg.store');
        Route::get('/data', [StatusPloPtgController::class, 'data'])->name('status-plo-ptg.data');
        Route::put('/{id}', [StatusPloPtgController::class, 'update'])->name('status-plo-ptg.update');
        Route::delete('/{id}', [StatusPloPtgController::class, 'destroy'])->name('status-plo-ptg.destroy');
    });

    // Asset Breakdown PTG
    Route::prefix('monev/shg/input-data/asset-breakdown-ptg')->group(function () {
        Route::get('/', [AssetBreakDownPtgController::class, 'index'])->name('asset-breakdown-ptg');
        Route::post('/', [AssetBreakdownPtgController::class, 'store'])->name('asset-breakdown-ptg.store');
        Route::get('/data', [AssetBreakdownPtgController::class, 'data'])->name('asset-breakdown-ptg.data');
        Route::put('/{id}', [AssetBreakdownPtgController::class, 'update'])->name('asset-breakdown-ptg.update');
        Route::delete('/{id}', [AssetBreakdownPtgController::class, 'destroy'])->name('asset-breakdown-ptg.destroy');
    });

    // Kondisi Vacant Fungsi Aims PTG
    Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-ptg')->group(function () {
        Route::get('/', [KondisiVacantAIMSPtgController::class, 'index'])->name('kondisi-vacant-fungsi-aims-ptg');
        Route::post('/', [KondisiVacantAIMSPtgController::class, 'store'])->name('kondisi-vacant-fungsi-aims-ptg.store');
        Route::get('/data', [KondisiVacantAIMSPtgController::class, 'data'])->name('kondisi-vacant-fungsi-aims-ptg.data');
        Route::put('/{id}', [KondisiVacantAIMSPtgController::class, 'update'])->name('kondisi-vacant-fungsi-aims-ptg.update');
        Route::delete('/{id}', [KondisiVacantAIMSPtgController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-ptg.destroy');
    });

    // Rencana Pemeliharaan Besar AIMS PTG
    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-besar-ptg')->group(function () {
        Route::get('/', [RencanaPemeliharaanBesarPtgController::class, 'index'])->name('rencana-pemeliharaan-besar-ptg');
        Route::post('/', [RencanaPemeliharaanBesarPtgController::class, 'store'])->name('rencana-pemeliharaan-besar-ptg.store');
        Route::get('/data', [RencanaPemeliharaanBesarPtgController::class, 'data'])->name('rencana-pemeliharaan-besar-ptg.data');
        Route::put('/{id}', [RencanaPemeliharaanBesarPtgController::class, 'update'])->name('rencana-pemeliharaan-besar-ptg.update');
        Route::delete('/{id}', [RencanaPemeliharaanBesarPtgController::class, 'destroy'])->name('rencana-pemeliharaan-besar-ptg.destroy');
    });

    // Sistem Informasi AIMS PTG
    Route::prefix('monev/shg/input-data/sistem-informasi-aims-ptg')->group(function () {
        Route::get('/', [SistemInformasiAimsPtgController::class, 'index'])->name('sistem-informasi-aims-ptg');
        Route::post('/', [SistemInformasiAimsPtgController::class, 'store'])->name('sistem-informasi-aims-ptg.store');
        Route::get('/data', [SistemInformasiAimsPtgController::class, 'data'])->name('sistem-informasi-aims-ptg.data');
        Route::put('/{id}', [SistemInformasiAimsPtgController::class, 'update'])->name('sistem-informasi-aims-ptg.update');
        Route::delete('/{id}', [SistemInformasiAimsPtgController::class, 'destroy'])->name('sistem-informasi-aims-ptg.destroy');
    });

    // Pelatihan Aims PTG
    Route::prefix('monev/shg/input-data/pelatihan-aims-ptg')->group(function () {
        Route::get('/', [PelatihanAIMSPtgController::class, 'index'])->name('pelatihan-aims-ptg');
        Route::post('/', [PelatihanAimsPtgController::class, 'store'])->name('pelatihan-aims-ptg.store');
        Route::get('/data', [PelatihanAimsPtgController::class, 'data'])->name('pelatihan-aims-ptg.data');
        Route::put('/{id}', [PelatihanAimsPtgController::class, 'update'])->name('pelatihan-aims-ptg.update');
        Route::delete('/{id}', [PelatihanAimsPtgController::class, 'destroy'])->name('pelatihan-aims-ptg.destroy');
    });

    // Realisasi Anggaran AI PTG
    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-ptg')->group(function () {
        Route::get('/', [RealisasiAnggaranAIPtg2025Controller::class, 'index'])->name('realisasi-anggaran-ai-ptg');
        Route::post('/', [RealisasiAnggaranAIPtg2025Controller::class, 'store'])->name('realisasi-anggaran-ai-ptg.store');
        Route::get('/data', [RealisasiAnggaranAIPtg2025Controller::class, 'data'])->name('realisasi-anggaran-ai-ptg.data');
        Route::put('/{id}', [RealisasiAnggaranAIPtg2025Controller::class, 'update'])->name('realisasi-anggaran-ai-ptg.update');
        Route::delete('/{id}', [RealisasiAnggaranAIPtg2025Controller::class, 'destroy'])->name('realisasi-anggaran-ai-ptg.destroy');
    });

    // Realisasi Progress Fisik AI 2025 PTG
    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-ptg')->group(function () {
        Route::get('/', [RealisasiProgressFisikAI2025PtgController::class, 'index'])->name('realisasi-progress-fisik-ai-ptg');
        Route::post('/', [RealisasiProgressFisikAi2025PtgController::class, 'store'])->name('realisasi-progress-fisik-ai-ptg.store');
        Route::get('/data', [RealisasiProgressFisikAi2025PtgController::class, 'data'])->name('realisasi-progress-fisik-ai-ptg.data');
        Route::put('/{id}', [RealisasiProgressFisikAi2025PtgController::class, 'update'])->name('realisasi-progress-fisik-ai-ptg.update');
        Route::delete('/{id}', [RealisasiProgressFisikAi2025PtgController::class, 'destroy'])->name('realisasi-progress-fisik-ai-ptg.destroy');
    });

    // Availability PTG
    Route::prefix('monev/shg/input-data/availability-ptg')->group(function () {
        Route::get('/', [AvailabilityPtgController::class, 'index'])->name('availability-ptg');
        Route::post('/', [AvailabilityPtgController::class, 'store'])->name('availability-ptg.store');
        Route::get('/data', [AvailabilityPtgController::class, 'data'])->name('availability-ptg.data');
        Route::put('/{id}', [AvailabilityPtgController::class, 'update'])->name('availability-ptg.update');
        Route::delete('/{id}', [AvailabilityPtgController::class, 'destroy'])->name('availability-ptg.destroy');
    });

    // Air Budget Tagging PTG
    Route::prefix('monev/shg/input-data/air-budget-tagging-ptg')->group(function () {
        Route::get('/', [AirBudgetTaggingPtgController::class, 'index'])->name('air-budget-tagging-ptg');
        Route::post('/', [AirBudgetTaggingPtgController::class, 'store'])->name('air-budget-tagging-ptg.store');
        Route::get('/data', [AirBudgetTaggingPtgController::class, 'data'])->name('air-budget-tagging-ptg.data');
        Route::put('/{id}', [AirBudgetTaggingPtgController::class, 'update'])->name('air-budget-tagging-ptg.update');
        Route::delete('/{id}', [AirBudgetTaggingPtgController::class, 'destroy'])->name('air-budget-tagging-ptg.destroy');
    });


    // SHG
    // Kalimantan Jawa Gas
    Route::prefix('monev/shg/input-data/kalimantan-jawa-gas')->group(function () {
        Route::get('/', [KalimantanJawaGasController::class, 'index'])->name('kalimantan-jawa-gas');
        Route::post('/', [KalimantanJawaGasController::class, 'store'])->name('kalimantan-jawa-gas');
        Route::get('/data', [KalimantanJawaGasController::class, 'data'])->name('kalimantan-jawa-gas.data');
        Route::put('/{id}', [KalimantanJawaGasController::class, 'update'])->name('kalimantan-jawa-gas.update');
        Route::delete('/{id}', [KalimantanJawaGasController::class, 'destroy'])->name('kalimantan-jawa-gas.destroy');
    });

    Route::prefix('monev/shg/input-data/mandatory-certification-kjg')->group(function () {
        Route::get('/', [MandatoryCertificationKjgController::class, 'index'])->name('mandatory-certification-kjg');
        Route::post('/', [MandatoryCertificationKjgController::class, 'store'])->name('mandatory-certification-kjg.store');
        Route::get('/data', [MandatoryCertificationKjgController::class, 'data'])->name('mandatory-certification-kjg.data');
        Route::put('/{id}', [MandatoryCertificationKjgController::class, 'update'])->name('mandatory-certification-kjg.update');
        Route::delete('/{id}', [MandatoryCertificationKjgController::class, 'destroy'])->name('mandatory-certification-kjg.destroy');
    });

    Route::prefix('monev/shg/input-data/asset-breakdown-kjg')->group(function () {
        Route::get('/', [AssetBreakdownKjgController::class, 'index'])->name('asset-breakdown-kjg');
        Route::post('/', [AssetBreakdownKjgController::class, 'store'])->name('asset-breakdown-kjg.store');
        Route::get('/data', [AssetBreakdownKjgController::class, 'data'])->name('asset-breakdown-kjg.data');
        Route::put('/{id}', [AssetBreakdownKjgController::class, 'update'])->name('asset-breakdown-kjg.update');
        Route::delete('/{id}', [AssetBreakDownKjgController::class, 'destroy'])->name('asset-breakdown-kjg.destroy');
    });

    // Status PLO KJG
    Route::prefix('monev/shg/input-data/status-plo-kjg')->group(function () {
        Route::get('/', [StatusPloKjgController::class, 'index'])->name('status-plo-kjg');
        Route::post('/', [StatusPloKjgController::class, 'store'])->name('status-plo-kjg.store');
        Route::get('/data', [StatusPloKjgController::class, 'data'])->name('status-plo-kjg.data');
        Route::put('/{id}', [StatusPloKjgController::class, 'update'])->name('status-plo-kjg.update');
        Route::delete('/{id}', [StatusPloKjgController::class, 'destroy'])->name('status-plo-kjg.destroy');
    });

    Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-kjg')->group(function () {
        Route::get('/', [KondisiVacantAIMSKjgController::class, 'index'])->name('kondisi-vacant-fungsi-aims-kjg');
        Route::post('/', [KondisiVacantAIMSKjgController::class, 'store'])->name('kondisi-vacant-fungsi-aims-kjg.store');
        Route::get('/data', [KondisiVacantAIMSKjgController::class, 'data'])->name('kondisi-vacant-fungsi-aims-kjg.data');
        Route::put('/{id}', [KondisiVacantAIMSKjgController::class, 'update'])->name('kondisi-vacant-fungsi-aims-kjg.update');
        Route::delete('/{id}', [KondisiVacantAIMSKjgController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-kjg.destroy');
    });

    // Pelatihan Aims KJG
    Route::prefix('monev/shg/input-data/pelatihan-aims-kjg')->group(function () {
        Route::get('/', [PelatihanAimsKjgController::class, 'index'])->name('pelatihan-aims-kjg');
        Route::post('/', [PelatihanAimsKjgController::class, 'store'])->name('pelatihan-aims-kjg.store');
        Route::get('/data', [PelatihanAimsKjgController::class, 'data'])->name('pelatihan-aims-kjg.data');
        Route::put('/{id}', [PelatihanAimsKjgController::class, 'update'])->name('pelatihan-aims-kjg.update');
        Route::delete('/{id}', [PelatihanAimsKjgController::class, 'destroy'])->name('pelatihan-aims-kjg.destroy');
    });

    // Sistem Informasi Aims KJG
    Route::prefix('monev/shg/input-data/sistem-informasi-aims-kjg')->group(function () {
        Route::get('/', [SistemInformasiAimsKjgController::class, 'index'])->name('sistem-informasi-aims-kjg');
        Route::post('/', [SistemInformasiAimsKjgController::class, 'store'])->name('sistem-informasi-aims-kjg.store');
        Route::get('/data', [SistemInformasiAimsKjgController::class, 'data'])->name('sistem-informasi-aims-kjg.data');
        Route::put('/{id}', [SistemInformasiAimsKjgController::class, 'update'])->name('sistem-informasi-aims-kjg.update');
        Route::delete('/{id}', [SistemInformasiAimsKjgController::class, 'destroy'])->name('sistem-informasi-aims-kjg.destroy');
    });

    // Rencana Pemeliharaan Besar AIMS KJG
    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-besar-kjg')->group(function () {
        Route::get('/', [RencanaPemeliharaanBesarKjgController::class, 'index'])->name('rencana-pemeliharaan-besar-kjg');
        Route::post('/', [RencanaPemeliharaanBesarKjgController::class, 'store'])->name('rencana-pemeliharaan-besar-kjg.store');
        Route::get('/data', [RencanaPemeliharaanBesarKjgController::class, 'data'])->name('rencana-pemeliharaan-besar-kjg.data');
        Route::put('/{id}', [RencanaPemeliharaanBesarKjgController::class, 'update'])->name('rencana-pemeliharaan-besar-kjg.update');
        Route::delete('/{id}', [RencanaPemeliharaanBesarKjgController::class, 'destroy'])->name('rencana-pemeliharaan-besar-kjg.destroy');
    });

    // Realisasi Anggaran AI KJG
    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-kjg')->group(function () {
        Route::get('/', [RealisasiAnggaranAiKjg2025Controller::class, 'index'])->name('realisasi-anggaran-ai-kjg');
        Route::post('/', [RealisasiAnggaranAiKjg2025Controller::class, 'store'])->name('realisasi-anggaran-ai-kjg.store');
        Route::get('/data', [RealisasiAnggaranAiKjg2025Controller::class, 'data'])->name('realisasi-anggaran-ai-kjg.data');
        Route::put('/{id}', [RealisasiAnggaranAiKjg2025Controller::class, 'update'])->name('realisasi-anggaran-ai-kjg.update');
        Route::delete('/{id}', [RealisasiAnggaranAiKjg2025Controller::class, 'destroy'])->name('realisasi-anggaran-ai-kjg.destroy');
    });

    // Realisasi Progress Fisik AI KJG
    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-kjg')->group(function () {
        Route::get('/', [RealisasiProgressFisikAI2025KjgController::class, 'index'])->name('realisasi-progress-fisik-ai-kjg');
        Route::post('/', [RealisasiProgressFisikAI2025KjgController::class, 'store'])->name('realisasi-progress-fisik-ai-kjg.store');
        Route::get('/data', [RealisasiProgressFisikAI2025KjgController::class, 'data'])->name('realisasi-progress-fisik-ai-kjg.data');
        Route::put('/{id}', [RealisasiProgressFisikAI2025KjgController::class, 'update'])->name('realisasi-progress-fisik-ai-kjg.update');
        Route::delete('/{id}', [RealisasiProgressFisikAI2025KjgController::class, 'destroy'])->name('realisasi-progress-fisik-ai-kjg.destroy');
    });

    // Availability KJG
    Route::prefix('monev/shg/input-data/availability-kjg')->group(function () {
        Route::get('/', [AvailabilityKjgController::class, 'index'])->name('availability-kjg');
        Route::post('/', [AvailabilityKjgController::class, 'store'])->name('availability-kjg.store');
        Route::get('/data', [AvailabilityKjgController::class, 'data'])->name('availability-kjg.data');
        Route::put('/{id}', [AvailabilityKjgController::class, 'update'])->name('availability-kjg.update');
        Route::delete('/{id}', [AvailabilityKjgController::class, 'destroy'])->name('availability-kjg.destroy');
    });

    Route::prefix('monev/shg/input-data/air-budget-tagging-kjg')->group(function () {
        Route::get('/', [AirBudgetTaggingKJGController::class, 'index'])->name('air-budget-tagging-kjg');
        Route::post('/', [AirBudgetTaggingKjgController::class, 'store'])->name('air-budget-tagging-kjg.store');
        Route::get('/data', [AirBudgetTaggingKjgController::class, 'data'])->name('air-budget-tagging-kjg.data');
        Route::put('/{id}', [AirBudgetTaggingKjgController::class, 'update'])->name('air-budget-tagging-kjg.update');
        Route::delete('/{id}', [AirBudgetTaggingKjgController::class, 'destroy'])->name('air-budget-tagging-kjg.destroy');
    });

    // PT. Perta Samtan Gas
    Route::prefix('monev/shg/input-data/perta-samtan-gas')->group(function () {
        Route::get('/', [PertaSamtanGasController::class, 'index'])->name('perta-samtan-gas');
        Route::post('/', [PertaSamtanGasController::class, 'store'])->name('perta-samtan-gas');
        Route::get('/data', [PertaSamtanGasController::class, 'data'])->name('perta-samtan-gas.data');
        Route::put('/{id}', [PertaSamtanGasController::class, 'update'])->name('perta-samtan-gas.update');
        Route::delete('/{id}', [PertaSamtanGasController::class, 'destroy'])->name('perta-samtan-gas.destroy');
    });

    // Mandatory Certification PTSG
    Route::prefix('monev/shg/input-data/mandatory-certification-ptsg')->group(function () {
        Route::get('/', [MandatoryCertificationPtsgController::class, 'index'])->name('mandatory-certification-ptsg');
        Route::post('/', [MandatoryCertificationPtsgController::class, 'store'])->name('mandatory-certification-ptsg.store');
        Route::get('/data', [MandatoryCertificationPtsgController::class, 'data'])->name('mandatory-certification-ptsg.data');
        Route::put('/{id}', [MandatoryCertificationPtsgController::class, 'update'])->name('mandatory-certification-ptsg.update');
        Route::delete('/{id}', [MandatoryCertificationPtsgController::class, 'destroy'])->name('mandatory-certification-ptsg.destroy');
    });

    // Asset Breakdown PTSG
    Route::prefix('monev/shg/input-data/asset-breakdown-ptsg')->group(function () {
        Route::get('/', [AssetBreakdownPtsgController::class, 'index'])->name('asset-breakdown-ptsg');
        Route::post('/', [AssetBreakdownPtsgController::class, 'store'])->name('asset-breakdown-ptsg.store');
        Route::get('/data', [AssetBreakdownPtsgController::class, 'data'])->name('asset-breakdown-ptsg.data');
        Route::put('/{id}', [AssetBreakdownPtsgController::class, 'update'])->name('asset-breakdown-ptsg.update');
        Route::delete('/{id}', [AssetBreakdownPtsgController::class, 'destroy'])->name('asset-breakdown-ptsg.destroy');
    });
    // Kondisi Vacant Fungsi AIMS PTSG
    Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-ptsg')->group(function () {
        Route::get('/', [KondisiVacantAimsPtsgController::class, 'index'])->name('kondisi-vacant-fungsi-aims-ptsg');
        Route::post('/', [KondisiVacantAimsPtsgController::class, 'store'])->name('kondisi-vacant-fungsi-aims-ptsg.store');
        Route::get('/data', [KondisiVacantAimsPtsgController::class, 'data'])->name('kondisi-vacant-fungsi-aims-ptsg.data');
        Route::put('/{id}', [KondisiVacantAimsPtsgController::class, 'update'])->name('kondisi-vacant-fungsi-aims-ptsg.update');
        Route::delete('/{id}', [KondisiVacantAimsPtsgController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-ptsg.destroy');
    });


    Route::prefix('monev/shg/input-data/status-plo-ptsg')->group(function () {
        Route::get('/', [StatusPloPtsgController::class, 'index'])->name('status-plo-ptsg');
        Route::post('/', [StatusPloPtsgController::class, 'store'])->name('status-plo-ptsg.store');
        Route::get('/data', [StatusPloPtsgController::class, 'data'])->name('status-plo-ptsg.data');
        Route::put('/{id}', [StatusPloPtsgController::class, 'update'])->name('status-plo-ptsg.update');
        Route::delete('/{id}', [StatusPloPtsgController::class, 'destroy'])->name('status-plo-ptsg.destroy');
    });

    Route::prefix('monev/shg/input-data/pelatihan-aims-ptsg')->group(function () {
        Route::get('/', [PelatihanAimsPtsgController::class, 'index'])->name('pelatihan-aims-ptsg');
        Route::post('/', [PelatihanAimsPtsgController::class, 'store'])->name('pelatihan-aims-ptsg.store');
        Route::get('/data', [PelatihanAimsPtsgController::class, 'data'])->name('pelatihan-aims-ptsg.data');
        Route::put('/{id}', [PelatihanAimsPtsgController::class, 'update'])->name('pelatihan-aims-ptsg.update');
        Route::delete('/{id}', [PelatihanAimsPtsgController::class, 'destroy'])->name('pelatihan-aims-ptsg.destroy');
    });

    // Sistem Informasi Aims PTSG
    Route::prefix('monev/shg/input-data/sistem-informasi-aims-ptsg')->group(function () {
        Route::get('/', [SistemInformasiAimsPtsgController::class, 'index'])->name('sistem-informasi-aims-ptsg');
        Route::post('/', [SistemInformasiAimsPtsgController::class, 'store'])->name('sistem-informasi-aims-ptsg.store');
        Route::get('/data', [SistemInformasiAimsPtsgController::class, 'data'])->name('sistem-informasi-aims-ptsg.data');
        Route::put('/{id}', [SistemInformasiAimsPtsgController::class, 'update'])->name('sistem-informasi-aims-ptsg.update');
        Route::delete('/{id}', [SistemInformasiAimsPtsgController::class, 'destroy'])->name('sistem-informasi-aims-ptsg.destroy');
    });

    // Rencana Pemeliharaan Besar PTSG
    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-besar-ptsg')->group(function () {
        Route::get('/', [RencanaPemeliharaanPtsgController::class, 'index'])->name('rencana-pemeliharaan-besar-ptsg');
        Route::post('/', [RencanaPemeliharaanPtsgController::class, 'store'])->name('rencana-pemeliharaan-besar-ptsg.store');
        Route::get('/data', [RencanaPemeliharaanPtsgController::class, 'data'])->name('rencana-pemeliharaan-besar-ptsg.data');
        Route::put('/{id}', [RencanaPemeliharaanPtsgController::class, 'update'])->name('rencana-pemeliharaan-besar-ptsg.update');
        Route::delete('/{id}', [RencanaPemeliharaanPtsgController::class, 'destroy'])->name('rencana-pemeliharaan-besar-ptsg.destroy');
    });

    // Availability PTSG
    Route::prefix('monev/shg/input-data/availability-ptsg')->group(function () {
        Route::get('/', [AvailabilityPtsgController::class, 'index'])->name('availability-ptsg');
        Route::post('/', [AvailabilityPtsgController::class, 'store'])->name('availability-ptsg.store');
        Route::get('/data', [AvailabilityPtsgController::class, 'data'])->name('availability-ptsg.data');
        Route::put('/{id}', [AvailabilityPtsgController::class, 'update'])->name('availability-ptsg.update');
        Route::delete('/{id}', [AvailabilityPtsgController::class, 'destroy'])->name('availability-ptsg.destroy');
    });

    // Realisasi Anggaran AI PTSG
    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-ptsg')->group(function () {
        Route::get('/', [RealisasiAnggaranAiPtsgController::class, 'index'])->name('realisasi-anggaran-ai-ptsg');
        Route::post('/', [RealisasiAnggaranAiPtsgController::class, 'store'])->name('realisasi-anggaran-ai-ptsg.store');
        Route::get('/data', [RealisasiAnggaranAiPtsgController::class, 'data'])->name('realisasi-anggaran-ai-ptsg.data');
        Route::put('/{id}', [RealisasiAnggaranAiPtsgController::class, 'update'])->name('realisasi-anggaran-ai-ptsg.update');
        Route::delete('/{id}', [RealisasiAnggaranAiPtsgController::class, 'destroy'])->name('realisasi-anggaran-ai-ptsg.destroy');
    });

    // Realisasi Progress Fisik AI PTSG
    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-ptsg')->group(function () {
        Route::get('/', [RealisasiProgressFisikAiPtsgController::class, 'index'])->name('realisasi-progress-fisik-ai-ptsg');
        Route::post('/', [RealisasiProgressFisikAiPtsgController::class, 'store'])->name('realisasi-progress-fisik-ai-ptsg.store');
        Route::get('/data', [RealisasiProgressFisikAiPtsgController::class, 'data'])->name('realisasi-progress-fisik-ai-ptsg.data');
        Route::put('/{id}', [RealisasiProgressFisikAiPtsgController::class, 'update'])->name('realisasi-progress-fisik-ai-ptsg.update');
        Route::delete('/{id}', [RealisasiProgressFisikAiPtsgController::class, 'destroy'])->name('realisasi-progress-fisik-ai-ptsg.destroy');
    });

    // PGN LNG Indonesia
    Route::prefix('monev/shg/input-data/pgn-lng-indonesia')->group(function () {
        Route::get('/', [StatusAssetAIPLIController::class, 'index'])->name('pgn-lng-indonesia');
        Route::post('/', [StatusAssetAIPLIController::class, 'store'])->name('pgn-lng-indonesia.store');
        Route::get('/data', [StatusAssetAIPLIController::class, 'data'])->name('pgn-lng-indonesia.data');
        Route::put('/{id}', [StatusAssetAIPLIController::class, 'update'])->name('pgn-lng-indonesia.update');
        Route::delete('/{id}', [StatusAssetAIPLIController::class, 'destroy'])->name('pgn-lng-indonesia.destroy');
    });

    // Status PLO PLI
    Route::prefix('monev/shg/input-data/status-plo-pli')->group(function () {
        Route::get('/', [StatusPloPliController::class, 'index'])->name('status-plo-pli');
        Route::post('/', [StatusPloPLIController::class, 'store'])->name('status-plo-pli.store');
        Route::get('/data', [StatusPloPLIController::class, 'data'])->name('status-plo-pli.data');
        Route::put('/{id}', [StatusPloPLIController::class, 'update'])->name('status-plo-pli.update');
        Route::delete('/{id}', [StatusPloPLIController::class, 'destroy'])->name('status-plo-pli.destroy');
    });

    Route::prefix('monev/shg/input-data/mandatory-certification-pli')->group(function () {
        Route::get('/', [MandatoryCertificationPliController::class, 'index'])->name('mandatory-certification-pli');
        Route::post('/', [MandatoryCertificationPliController::class, 'store'])->name('mandatory-certification-pli.store');
        Route::get('/data', [MandatoryCertificationPliController::class, 'data'])->name('mandatory-certification-pli.data');
        Route::put('/{id}', [MandatoryCertificationPliController::class, 'update'])->name('mandatory-certification-pli.update');
        Route::delete('/{id}', [MandatoryCertificationPliController::class, 'destroy'])->name('mandatory-certification-pli.destroy');
    });

    Route::prefix('monev/shg/input-data/asset-breakdown-pli')->group(function () {
        Route::get('/', [AssetBreakdownPliController::class, 'index'])->name('asset-breakdown-pli');
        Route::post('/', [AssetBreakdownPliController::class, 'store'])->name('asset-breakdown-pli.store');
        Route::get('/data', [AssetBreakdownPliController::class, 'data'])->name('asset-breakdown-pli.data');
        Route::put('/{id}', [AssetBreakdownPliController::class, 'update'])->name('asset-breakdown-pli.update');
        Route::delete('/{id}', [AssetBreakdownPliController::class, 'destroy'])->name('asset-breakdown-pli.destroy');
    });

    Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-pli')->group(function () {
        Route::get('/', [KondisiVacantAimsPliController::class, 'index'])->name('kondisi-vacant-fungsi-aims-pli');
        Route::post('/', [KondisiVacantAIMSPliController::class, 'store'])->name('kondisi-vacant-fungsi-aims-pli.store');
        Route::get('/data', [KondisiVacantAIMSPliController::class, 'data'])->name('kondisi-vacant-fungsi-aims-pli.data');
        Route::put('/{id}', [KondisiVacantAIMSPliController::class, 'update'])->name('kondisi-vacant-fungsi-aims-pli.update');
        Route::delete('/{id}', [KondisiVacantAIMSPliController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-pli.destroy');
    });
    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-besar-pli')->group(function () {
        Route::get('/', [RencanaPemeliharaanPliController::class, 'index'])->name('rencana-pemeliharaan-besar-pli');
        Route::post('/', [RencanaPemeliharaanPliController::class, 'store'])->name('rencana-pemeliharaan-besar-pli.store');
        Route::get('/data', [RencanaPemeliharaanPliController::class, 'data'])->name('rencana-pemeliharaan-besar-pli.data');
        Route::put('/{id}', [RencanaPemeliharaanPliController::class, 'update'])->name('rencana-pemeliharaan-besar-pli.update');
        Route::delete('/{id}', [RencanaPemeliharaanPliController::class, 'destroy'])->name('rencana-pemeliharaan-besar-pli.destroy');
    });

    Route::prefix('monev/shg/input-data/sistem-informasi-aims-pli')->group(function () {
        Route::get('/', [SistemInformasiAimsPliController::class, 'index'])->name('sistem-informasi-aims-pli');
        Route::post('/', [SistemInformasiAimsPliController::class, 'store'])->name('sistem-informasi-aims-pli.store');
        Route::get('/data', [SistemInformasiAimsPliController::class, 'data'])->name('sistem-informasi-aims-pli.data');
        Route::put('/{id}', [SistemInformasiAimsPliController::class, 'update'])->name('sistem-informasi-aims-pli.update');
        Route::delete('/{id}', [SistemInformasiAimsPliController::class, 'destroy'])->name('sistem-informasi-aims-pli.destroy');
    });

    Route::prefix('monev/shg/input-data/pelatihan-aims-pli')->group(function () {
        Route::get('/', [PelatihanAimsPliController::class, 'index'])->name('pelatihan-aims-pli');
        Route::post('/', [PelatihanAimsPliController::class, 'store'])->name('pelatihan-aims-pli.store');
        Route::get('/data', [PelatihanAimsPliController::class, 'data'])->name('pelatihan-aims-pli.data');
        Route::put('/{id}', [PelatihanAimsPliController::class, 'update'])->name('pelatihan-aims-pli.update');
        Route::delete('/{id}', [PelatihanAimsPliController::class, 'destroy'])->name('pelatihan-aims-pli.destroy');
    });

    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-pli')->group(function () {
        Route::get('/', [RealisasiAnggaranAiPLIController::class, 'index'])->name('realisasi-anggaran-ai-pli');
        Route::post('/', [RealisasiAnggaranAiPLIController::class, 'store'])->name('realisasi-anggaran-ai-pli.store');
        Route::get('/data', [RealisasiAnggaranAiPLIController::class, 'data'])->name('realisasi-anggaran-ai-pli.data');
        Route::put('/{id}', [RealisasiAnggaranAiPLIController::class, 'update'])->name('realisasi-anggaran-ai-pli.update');
        Route::delete('/{id}', [RealisasiAnggaranAiPLIController::class, 'destroy'])->name('realisasi-anggaran-ai-pli.destroy');
    });

    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-pli')->group(function () {
        Route::get('/', [RealisasiProgressFisikAiPLIController::class, 'index'])->name('realisasi-progress-fisik-ai-pli');
        Route::post('/', [RealisasiProgressFisikAiPLIController::class, 'store'])->name('realisasi-progress-fisik-ai-pli.store');
        Route::get('/data', [RealisasiProgressFisikAiPLIController::class, 'data'])->name('realisasi-progress-fisik-ai-pli.data');
        Route::put('/{id}', [RealisasiProgressFisikAiPLIController::class, 'update'])->name('realisasi-progress-fisik-ai-pli.update');
        Route::delete('/{id}', [RealisasiProgressFisikAiPLIController::class, 'destroy'])->name('realisasi-progress-fisik-ai-pli.destroy');
    });
    Route::prefix('monev/shg/input-data/availability-pli')->group(function () {
        Route::get('/', [AvailabilityPLIController::class, 'index'])->name('availability-pli');
        Route::post('/', [AvailabilityPliController::class, 'store'])->name('availability-pli.store');
        Route::get('/data', [AvailabilityPliController::class, 'data'])->name('availability-pli.data');
        Route::put('/{id}', [AvailabilityPliController::class, 'update'])->name('availability-pli.update');
        Route::delete('/{id}', [AvailabilityPliController::class, 'destroy'])->name('availability-pli.destroy');
    });
    Route::prefix('monev/shg/input-data/air-budget-tagging-pli')->group(function () {
        Route::get('/', [AirBudgetTaggingPLIController::class, 'index'])->name('air-budget-tagging-pli');
        Route::post('/', [AirBudgetTaggingPliController::class, 'store'])->name('air-budget-tagging-pli.store');
        Route::get('/data', [AirBudgetTaggingPliController::class, 'data'])->name('air-budget-tagging-pli.data');
        Route::put('/{id}', [AirBudgetTaggingPliController::class, 'update'])->name('air-budget-tagging-pli.update');
        Route::delete('/{id}', [AirBudgetTaggingPliController::class, 'destroy'])->name('air-budget-tagging-pli.destroy');
    });

    Route::prefix('monev/shg/input-data/widar-mandripa-nusantara')->group(function () {
        Route::get('/', [StatusAssetAiMwnController::class, 'index'])->name('widar-mandripa-nusantara');
        Route::post('/', [StatusAssetAiMwnController::class, 'store'])->name('widar-mandripa-nusantara.store');
        Route::get('/data', [StatusAssetAiMwnController::class, 'data'])->name('widar-mandripa-nusantara.data');
        Route::put('/{id}', [StatusAssetAiMwnController::class, 'update'])->name('widar-mandripa-nusantara.update');
        Route::delete('/{id}', [StatusAssetAiMwnController::class, 'destroy'])->name('widar-mandripa-nusantara.destroy');
    });

    Route::prefix('monev/shg/input-data/plan-mandatory-certification')->group(function () {
        Route::get('/', [PlanMandatoryCertificationController::class, 'index'])->name('plan-mandatory-certification');
        Route::post('/', [PlanMandatoryCertificationController::class, 'store'])->name('plan-mandatory-certification.store');
        Route::get('/data', [PlanMandatoryCertificationController::class, 'data'])->name('plan-mandatory-certification.data');
        Route::put('/{id}', [PlanMandatoryCertificationController::class, 'update'])->name('plan-mandatory-certification.update');
        Route::delete('/{id}', [PlanMandatoryCertificationController::class, 'destroy'])->name('plan-mandatory-certification.destroy');
    });

    Route::prefix('monev/shg/input-data/mandatory-certification-wmn')->group(function () {
        Route::get('/', [MandatoryCertificationController::class, 'index'])->name('mandatory-certification-wmn');
        Route::post('/', [MandatoryCertificationController::class, 'store'])->name('mandatory-certification-wmn.store');
        Route::get('/data', [MandatoryCertificationController::class, 'data'])->name('mandatory-certification-wmn.data');
        Route::put('/{id}', [MandatoryCertificationController::class, 'update'])->name('mandatory-certification-wmn.update');
        Route::delete('/{id}', [MandatoryCertificationController::class, 'destroy'])->name('mandatory-certification-wmn.destroy');
    });
    Route::prefix('monev/shg/input-data/asset-breakdown-wmn')->group(function () {
        Route::get('/', [AssetBreakdownController::class, 'index'])->name('asset-breakdown-wmn');
        Route::post('/', [AssetBreakdownController::class, 'store'])->name('asset-breakdown-wmn.store');
        Route::get('/data', [AssetBreakdownController::class, 'data'])->name('asset-breakdown-wmn.data');
        Route::put('/{id}', [AssetBreakdownController::class, 'update'])->name('asset-breakdown-wmn.update');
        Route::delete('/{id}', [AssetBreakdownController::class, 'destroy'])->name('asset-breakdown-wmn.destroy');
    });

    Route::prefix('monev/shg/input-data/status-plo-wmn')->group(function () {
        Route::get('/', [StatusPloController::class, 'index'])->name('status-plo-wmn');
        Route::post('/', [StatusPloController::class, 'store'])->name('status-plo-wmn.store');
        Route::get('/data', [StatusPloController::class, 'data'])->name('status-plo-wmn.data');
        Route::put('/{id}', [StatusPloController::class, 'update'])->name('status-plo-wmn.update');
        Route::delete('/{id}', [StatusPloController::class, 'destroy'])->name('status-plo-wmn.destroy');
    });
    Route::prefix('monev/shg/input-data/pelatihan-aims-wmn')->group(function () {
        Route::get('/', [PelatihanAimsWmnController::class, 'index'])->name('pelatihan-aims-wmn');
        Route::post('/', [PelatihanAimsWmnController::class, 'store'])->name('pelatihan-aims-wmn.store');
        Route::get('/data', [PelatihanAimsWmnController::class, 'data'])->name('pelatihan-aims-wmn.data');
        Route::put('/{id}', [PelatihanAimsWmnController::class, 'update'])->name('pelatihan-aims-wmn.update');
        Route::delete('/{id}', [PelatihanAimsWmnController::class, 'destroy'])->name('pelatihan-aims-wmn.destroy');
    });
    Route::prefix('monev/shg/input-data/kondisi-vacant-aims-wmn')->group(function () {
        Route::get('/', [KondisiVacantAimsWmnController::class, 'index'])->name('kondisi-vacant-aims-wmn');
        Route::post('/', [KondisiVacantAimsWmnController::class, 'store'])->name('kondisi-vacant-aims-wmn.store');
        Route::get('/data', [KondisiVacantAimsWmnController::class, 'data'])->name('kondisi-vacant-aims-wmn.data');
        Route::put('/{id}', [KondisiVacantAimsWmnController::class, 'update'])->name('kondisi-vacant-aims-wmn.update');
        Route::delete('/{id}', [KondisiVacantAimsWmnController::class, 'destroy'])->name('kondisi-vacant-aims-wmn.destroy');
    });
    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-wmn')->group(function () {
        Route::get('/', [RencanaPemeliharaanWmnController::class, 'index'])->name('rencana-pemeliharaan-wmn');
        Route::post('/', [RencanaPemeliharaanWmnController::class, 'store'])->name('rencana-pemeliharaan-wmn.store');
        Route::get('/data', [RencanaPemeliharaanWmnController::class, 'data'])->name('rencana-pemeliharaan-wmn.data');
        Route::put('/{id}', [RencanaPemeliharaanWmnController::class, 'update'])->name('rencana-pemeliharaan-wmn.update');
        Route::delete('/{id}', [RencanaPemeliharaanWmnController::class, 'destroy'])->name('rencana-pemeliharaan-wmn.destroy');
    });

    Route::prefix('monev/shg/input-data/sistem-informasi-aims-wmn')->group(function () {
        Route::get('/', [SistemInformasiAimsWmnController::class, 'index'])->name('sistem-informasi-aims-wmn');
        Route::post('/', [SistemInformasiAimsWmnController::class, 'store'])->name('sistem-informasi-aims-wmn.store');
        Route::get('/data', [SistemInformasiAimsWmnController::class, 'data'])->name('sistem-informasi-aims-wmn.data');
        Route::put('/{id}', [SistemInformasiAimsWmnController::class, 'update'])->name('sistem-informasi-aims-wmn.update');
        Route::delete('/{id}', [SisteminformasiAimsWmnController::class, 'destroy'])->name('sistem-informasi-aims-wmn.destroy');
    });
    Route::prefix('monev/shg/input-data/availability-wmn')->group(function () {
        Route::get('/', [AvailabilityWmnController::class, 'index'])->name('availability-wmn');
        Route::post('/', [AvailabilityWmnController::class, 'store'])->name('availability-wmn.store');
        Route::get('/data', [AvailabilityWmnController::class, 'data'])->name('availability-wmn.data');
        Route::put('/{id}', [AvailabilityWmnController::class, 'update'])->name('availability-wmn.update');
        Route::delete('/{id}', [AvailabilityWmnController::class, 'destroy'])->name('availability-wmn.destroy');
    });
    Route::prefix('monev/shg/input-data/air-budget-tagging-wmn')->group(function () {
        Route::get('/', [AirBudetTaggingWmnController::class, 'index'])->name('air-budget-tagging-wmn');
        Route::post('/', [AirBudetTaggingWmnController::class, 'store'])->name('air-budget-tagging-wmn.store');
        Route::get('/data', [AirBudetTaggingWmnController::class, 'data'])->name('air-budget-tagging-wmn.data');
        Route::put('/{id}', [AirBudetTaggingWmnController::class, 'update'])->name('air-budget-tagging-wmn.update');
        Route::delete('/{id}', [AirBudetTaggingWmnController::class, 'destroy'])->name('air-budget-tagging-wmn.destroy');
    });

    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-wmn')->group(function () {
        Route::get('/', [RealisasiAnggaranAiWmnController::class, 'index'])->name('realisasi-anggaran-ai-wmn');
        Route::post('/', [RealisasiAnggaranAiWmnController::class, 'store'])->name('realisasi-anggaran-ai-wmn.store');
        Route::get('/data', [RealisasiAnggaranAiWmnController::class, 'data'])->name('realisasi-anggaran-ai-wmn.data');
        Route::put('/{id}', [RealisasiAnggaranAiWmnController::class, 'update'])->name('realisasi-anggaran-ai-wmn.update');
        Route::delete('/{id}', [RealisasiAnggaranAiWmnController::class, 'destroy'])->name('realisasi-anggaran-ai-wmn.destroy');
    });
    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-wmn')->group(function () {
        Route::get('/', [RealisasiProgressFisikAiWmnController::class, 'index'])->name('realisasi-progress-fisik-ai-wmn');
        Route::post('/', [RealisasiProgressFisikAiWmnController::class, 'store'])->name('realisasi-progress-fisik-ai-wmn.store');
        Route::get('/data', [RealisasiProgressFisikAiWmnController::class, 'data'])->name('realisasi-progress-fisik-ai-wmn.data');
        Route::put('/{id}', [RealisasiProgressFisikAiWmnController::class, 'update'])->name('realisasi-progress-fisik-ai-wmn.update');
        Route::delete('/{id}', [RealisasiProgressFisikAiWmnController::class, 'destroy'])->name('realisasi-progress-fisik-ai-wmn.destroy');
    });


    Route::prefix('monev/shg/input-data/perta-arun-gas')->group(function () {
        Route::get('/', [StatusAssetAiPAGController::class, 'index'])->name('perta-arun-gas');
        Route::post('/', [StatusAssetAiPagController::class, 'store'])->name('perta-arun-gas.store');
        Route::get('/data', [StatusAssetAiPagController::class, 'data'])->name('perta-arun-gas.data');
        Route::put('/{id}', [StatusAssetAiPagController::class, 'update'])->name('perta-arun-gas.update');
        Route::delete('/{id}', [StatusAssetAiPagController::class, 'destroy'])->name('perta-arun-gas.destroy');
    });
    Route::prefix('monev/shg/input-data/mandatory-certification-pag')->group(function () {
        Route::get('/', [MandatoryCertificationPagController::class, 'index'])->name('mandatory-certification-pag');
        Route::post('/', [MandatoryCertificationPagController::class, 'store'])->name('mandatory-certification-pag.store');
        Route::get('/data', [MandatoryCertificationPagController::class, 'data'])->name('mandatory-certification-pag.data');
        Route::put('/{id}', [MandatoryCertificationPagController::class, 'update'])->name('mandatory-certification-pag.update');
        Route::delete('/{id}', [MandatoryCertificationPAGController::class, 'destroy'])->name('mandatory-certification-pag.destroy');
    });
    Route::prefix('monev/shg/input-data/asset-breakdown-pag')->group(function () {
        Route::get('/', [AssetBreakdownPAGController::class, 'index'])->name('asset-breakdown-pag');
        Route::post('/', [AssetBreakdownPagController::class, 'store'])->name('asset-breakdown-pag.store');
        Route::get('/data', [AssetBreakdownPagController::class, 'data'])->name('asset-breakdown-pag.data');
        Route::put('/{id}', [AssetBreakdownPagController::class, 'update'])->name('asset-breakdown-pag.update');
        Route::delete('/{id}', [AssetBreakdownPagController::class, 'destroy'])->name('asset-breakdown-pag.destroy');
    });

    Route::prefix('monev/shg/input-data/status-plo-pag')->group(function () {
        Route::get('/', [StatusPloPagController::class, 'index'])->name('status-plo-pag');
        Route::post('/', [StatusPloPAGController::class, 'store'])->name('status-plo-pag.store');
        Route::get('/data', [StatusPloPagController::class, 'data'])->name('status-plo-pag.data');
        Route::put('/{id}', [StatusPloPagController::class, 'update'])->name('status-plo-pag.update');
        Route::delete('/{id}', [StatusPloPagController::class, 'destroy'])->name('status-plo-pag.destroy');
    });
    Route::prefix('monev/shg/input-data/kondisi-vacant-aims-pag')->group(function () {
        Route::get('/', [KondisiVacantAimsPAGController::class, 'index'])->name('kondisi-vacant-aims-pag');
        Route::post('/', [KondisiVacantAimsPAGController::class, 'store'])->name('kondisi-vacant-aims-pag.store');
        Route::get('/data', [KondisiVacantAimsPAGController::class, 'data'])->name('kondisi-vacant-aims-pag.data');
        Route::put('/{id}', [KondisiVacantAimsPAGController::class, 'update'])->name('kondisi-vacant-aims-pag.update');
        Route::delete('/{id}', [KondisiVacantAimsPAGController::class, 'destroy'])->name('kondisi-vacant-aims-pag.destroy');
    });

    Route::prefix('monev/shg/input-data/pelatihan-aims-pag')->group(function () {
        Route::get('/', [PelatihanAimsPAGController::class, 'index'])->name('pelatihan-aims-pag');
        Route::post('/', [PelatihanAimsPAGController::class, 'store'])->name('pelatihan-aims-pag.store');
        Route::get('/data', [PelatihanAimsPAGController::class, 'data'])->name('pelatihan-aims-pag.data');
        Route::put('/{id}', [PelatihanAimsPAGController::class, 'update'])->name('pelatihan-aims-pag.update');
        Route::delete('/{id}', [PelatihanAimsPAGController::class, 'destroy'])->name('pelatihan-aims-pag.destroy');
    });

    Route::prefix('monev/shg/input-data/sistem-informasi-aims-pag')->group(function () {
        Route::get('/', [SistemInformasiAimsPAGController::class, 'index'])->name('sistem-informasi-aims-pag');
        Route::post('/', [SistemInformasiAimsPAGController::class, 'store'])->name('sistem-informasi-aims-pag.store');
        Route::get('/data', [SistemInformasiAimsPAGController::class, 'data'])->name('sistem-informasi-aims-pag.data');
        Route::put('/{id}', [SistemInformasiAimsPAGController::class, 'update'])->name('sistem-informasi-aims-pag.update');
        Route::delete('/{id}', [SistemInformasiAimsPAGController::class, 'destroy'])->name('sistem-informasi-aims-pag.destroy');
    });

    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-pag')->group(function () {
        Route::get('/', [RencanaPemeliharaanPAGController::class, 'index'])->name('rencana-pemeliharaan-pag');
        Route::post('/', [RencanaPemeliharaanPAGController::class, 'store'])->name('rencana-pemeliharaan-pag.store');
        Route::get('/data', [RencanaPemeliharaanPAGController::class, 'data'])->name('rencana-pemeliharaan-pag.data');
        Route::put('/{id}', [RencanaPemeliharaanPAGController::class, 'update'])->name('rencana-pemeliharaan-pag.update');
        Route::delete('/{id}', [RencanaPemeliharaanPAGController::class, 'destroy'])->name('rencana-pemeliharaan-pag.destroy');
    });
    Route::prefix('monev/shg/input-data/availability-pag')->group(function () {
        Route::get('/', [AvailabilityPAGController::class, 'index'])->name('availability-pag');
        Route::post('/', [AvailabilityPAGController::class, 'store'])->name('availability-pag.store');
        Route::get('/data', [AvailabilityPAGController::class, 'data'])->name('availability-pag.data');
        Route::put('/{id}', [AvailabilityPAGController::class, 'update'])->name('availability-pag.update');
        Route::delete('/{id}', [AvailabilityPAGController::class, 'destroy'])->name('availability-pag.destroy');
    });
    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-pag')->group(function () {
        Route::get('/', [RealisasiAnggaranAiPagController::class, 'index'])->name('realisasi-anggaran-ai-pag');
        Route::post('/', [RealisasiAnggaranAiPagController::class, 'store'])->name('realisasi-anggaran-ai-pag.store');
        Route::get('/data', [RealisasiAnggaranAiPagController::class, 'data'])->name('realisasi-anggaran-ai-pag.data');
        Route::put('/{id}', [RealisasiAnggaranAiPagController::class, 'update'])->name('realisasi-anggaran-ai-pag.update');
        Route::delete('/{id}', [RealisasiAnggaranAiPAGController::class, 'destroy'])->name('realisasi-anggaran-ai-pag.destroy');
    });

    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-pag')->group(function () {
        Route::get('/', [RealisasiProgressFisikAiPAGController::class, 'index'])->name('realisasi-progress-fisik-ai-pag');
        Route::post('/', [RealisasiProgressFisikAiPagController::class, 'store'])->name('realisasi-progress-fisik-ai-pag.store');
        Route::get('/data', [RealisasiProgressFisikAiPagController::class, 'data'])->name('realisasi-progress-fisik-ai-pag.data');
        Route::put('/{id}', [RealisasiProgressFisikAiPagController::class, 'update'])->name('realisasi-progress-fisik-ai-pag.update');
        Route::delete('/{id}', [RealisasiProgressFisikAiPagController::class, 'destroy'])->name('realisasi-progress-fisik-ai-pag.destroy');
    });

    Route::prefix('monev/shg/input-data/air-budget-tagging-pag')->group(function () {
        Route::get('/', [AirBudgetTaggingPAGController::class, 'index'])->name('air-budget-tagging-pag');
        Route::post('/', [AirBudgetTaggingPAGController::class, 'store'])->name('air-budget-tagging-pag.store');
        Route::get('/data', [AirBudgetTaggingPAGController::class, 'data'])->name('air-budget-tagging-pag.data');
        Route::put('/{id}', [AirBudgetTaggingPAGController::class, 'update'])->name('air-budget-tagging-pag.update');
        Route::delete('/{id}', [AirBudgetTaggingPAGController::class, 'destroy'])->name('air-budget-tagging-pag.destroy');
    });

    // Perta Daya Gas
    Route::prefix('monev/shg/input-data/perta-daya-gas')->group(function () {
        Route::get('/', [StatusAssetAiPDGController::class, 'index'])->name('perta-daya-gas');
        Route::post('/', [StatusAssetAiPDGController::class, 'store'])->name('perta-daya-gas.store');
        Route::get('/data', [StatusAssetAiPDGController::class, 'data'])->name('perta-daya-gas.data');
        Route::put('/{id}', [StatusAssetAiPDGController::class, 'update'])->name('perta-daya-gas.update');
        Route::delete('/{id}', [StatusAssetAiPDGController::class, 'destroy'])->name('perta-daya-gas.destroy');
    });

    Route::prefix('monev/shg/input-data/mandatory-certification-pdg')->group(function () {
        Route::get('/', [MandatoryCertificationPDGController::class, 'index'])->name('mandatory-certification-pdg');
        Route::post('/', [MandatoryCertificationPdgController::class, 'store'])->name('mandatory-certification-pdg.store');
        Route::get('/data', [MandatoryCertificationPdgController::class, 'data'])->name('mandatory-certification-pdg.data');
        Route::put('/{id}', [MandatoryCertificationPdgController::class, 'update'])->name('mandatory-certification-pdg.update');
        Route::delete('/{id}', [MandatoryCertificationPdgController::class, 'destroy'])->name('mandatory-certification-pdg.destroy');
    });

    Route::prefix('monev/shg/input-data/status-plo-pdg')->group(function () {
        Route::get('/', [StatusPloPDGController::class, 'index'])->name('status-plo-pdg');
        Route::post('/', [StatusPloPDGController::class, 'store'])->name('status-plo-pdg.store');
        Route::get('/data', [StatusPloPdgController::class, 'data'])->name('status-plo-pdg.data');
        Route::put('/{id}', [StatusPloPdgController::class, 'update'])->name('status-plo-pdg.update');
        Route::delete('/{id}', [StatusPloPdgController::class, 'destroy'])->name('status-plo-pdg.destroy');
    });
    Route::prefix('monev/shg/input-data/asset-breakdown-pdg')->group(function () {
        Route::get('/', [AssetBreakdownPDGController::class, 'index'])->name('asset-breakdown-pdg');
        Route::post('/', [AssetBreakdownPDGController::class, 'store'])->name('asset-breakdown-pdg.store');
        Route::get('/data', [AssetBreakdownPDGController::class, 'data'])->name('asset-breakdown-pdg.data');
        Route::put('/{id}', [AssetBreakdownPDGController::class, 'update'])->name('asset-breakdown-pdg.update');
        Route::delete('/{id}', [AssetBreakdownPDGController::class, 'destroy'])->name('asset-breakdown-pdg.destroy');
    });

    Route::prefix('monev/shg/input-data/pelatihan-aims-pdg')->group(function () {
        Route::get('/', [PelatihanAimsPDGController::class, 'index'])->name('pelatihan-aims-pdg');
        Route::post('/', [PelatihanAimsPDGController::class, 'store'])->name('pelatihan-aims-pdg.store');
        Route::get('/data', [PelatihanAimsPDGController::class, 'data'])->name('pelatihan-aims-pdg.data');
        Route::put('/{id}', [PelatihanAimsPDGController::class, 'update'])->name('pelatihan-aims-pdg.update');
        Route::delete('/{id}', [PelatihanAimsPDGController::class, 'destroy'])->name('pelatihan-aims-pdg.destroy');
    });

    Route::prefix('monev/shg/input-data/kondisi-vacant-aims-pdg')->group(function () {
        Route::get('/', [KondisiVacantAimsPDGController::class, 'index'])->name('kondisi-vacant-aims-pdg');
        Route::post('/', [KondisiVacantAimsPDGController::class, 'store'])->name('kondisi-vacant-aims-pdg.store');
        Route::get('/data', [KondisiVacantAimsPDGController::class, 'data'])->name('kondisi-vacant-aims-pdg.data');
        Route::put('/{id}', [KondisiVacantAimsPDGController::class, 'update'])->name('kondisi-vacant-aims-pdg.update');
        Route::delete('/{id}', [KondisiVacantAimsPDGController::class, 'destroy'])->name('kondisi-vacant-aims-pdg.destroy');
    });

    Route::prefix('monev/shg/input-data/availability-pdg')->group(function () {
        Route::get('/', [AvailabilityPdgController::class, 'index'])->name('availability-pdg');
        Route::post('/', [AvailabilityPDGController::class, 'store'])->name('availability-pdg.store');
        Route::get('/data', [AvailabilityPdgController::class, 'data'])->name('availability-pdg.data');
        Route::put('/{id}', [AvailabilityPdgController::class, 'update'])->name('availability-pdg.update');
        Route::delete('/{id}', [AvailabilityPdgController::class, 'destroy'])->name('availability-pdg.destroy');
    });
    Route::prefix('monev/shg/input-data/sistem-informasi-aims-pdg')->group(function () {
        Route::get('/', [SistemInformasiAimsPDGController::class, 'index'])->name('sistem-informasi-aims-pdg');
        Route::post('/', [SistemInformasiAimsPdgController::class, 'store'])->name('sistem-informasi-aims-pdg.store');
        Route::get('/data', [SistemInformasiAimsPdgController::class, 'data'])->name('sistem-informasi-aims-pdg.data');
        Route::put('/{id}', [SistemInformasiAimsPdgController::class, 'update'])->name('sistem-informasi-aims-pdg.update');
        Route::delete('/{id}', [SistemInformasiAimsPdgController::class, 'destroy'])->name('sistem-informasi-aims-pdg.destroy');
    });

    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-pdg')->group(function () {
        Route::get('/', [RencanaPemeliharaanPDGController::class, 'index'])->name('rencana-pemeliharaan-pdg');
        Route::post('/', [RencanaPemeliharaanPdgController::class, 'store'])->name('rencana-pemeliharaan-pdg.store');
        Route::get('/data', [RencanaPemeliharaanPdgController::class, 'data'])->name('rencana-pemeliharaan-pdg.data');
        Route::put('/{id}', [RencanaPemeliharaanPdgController::class, 'update'])->name('rencana-pemeliharaan-pdg.update');
        Route::delete('/{id}', [RencanaPemeliharaanPdgController::class, 'destroy'])->name('rencana-pemeliharaan-pdg.destroy');
    });

    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-pdg')->group(function () {
        Route::get('/', [RealisasiAnggaranAiPDGController::class, 'index'])->name('realisasi-anggaran-ai-pdg');
        Route::post('/', [RealisasiAnggaranAIPDGController::class, 'store'])->name('realisasi-anggaran-ai-pdg.store');
        Route::get('/data', [RealisasiAnggaranAIPDGController::class, 'data'])->name('realisasi-anggaran-ai-pdg.data');
        Route::put('/{id}', [RealisasiAnggaranAIPDGController::class, 'update'])->name('realisasi-anggaran-ai-pdg.update');
        Route::delete('/{id}', [RealisasiAnggaranAIPDGController::class, 'destroy'])->name('realisasi-anggaran-ai-pdg.destroy');
    });
    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-pdg')->group(function () {
        Route::get('/', [RealisasiProgressFisikAiPDGController::class, 'index'])->name('realisasi-progress-fisik-ai-pdg');
        Route::post('/', [RealisasiProgressFisikAiPdgController::class, 'store'])->name('realisasi-progress-fisik-ai-pdg.store');
        Route::get('/data', [RealisasiProgressFisikAiPdgController::class, 'data'])->name('realisasi-progress-fisik-ai-pdg.data');
        Route::put('/{id}', [RealisasiProgressFisikAiPdgController::class, 'update'])->name('realisasi-progress-fisik-ai-pdg.update');
        Route::delete('/{id}', [RealisasiProgressFisikAiPdgController::class, 'destroy'])->name('realisasi-progress-fisik-ai-pdg.destroy');
    });

    // Pertagas Niaga
    Route::prefix('monev/shg/input-data/pertagas-niaga')->group(function () {
        Route::get('/', [StatusAssetAiPTGNController::class, 'index'])->name('pertagas-niaga');
        Route::post('/', [StatusAssetAiPTGNController::class, 'store'])->name('pertagas-niaga.store');
        Route::get('/data', [StatusAssetAiPTGNController::class, 'data'])->name('pertagas-niaga.data');
        Route::put('/{id}', [StatusAssetAiPTGNController::class, 'update'])->name('pertagas-niaga.update');
        Route::delete('/{id}', [StatusAssetAiPTGNController::class, 'destroy'])->name('pertagas-niaga.destroy');
    });

    Route::prefix('monev/shg/input-data/mandatory-certification-ptgn')->group(function () {
        Route::get('/', [MandatoryCertificationPTGNController::class, 'index'])->name('mandatory-certification-ptgn');
        Route::post('/', [MandatoryCertificationPtgnController::class, 'store'])->name('mandatory-certification-ptgn.store');
        Route::get('/data', [MandatoryCertificationPtgnController::class, 'data'])->name('mandatory-certification-ptgn.data');
        Route::put('/{id}', [MandatoryCertificationPtgnController::class, 'update'])->name('mandatory-certification-ptgn.update');
        Route::delete('/{id}', [MandatoryCertificationPtgnController::class, 'destroy'])->name('mandatory-certification-ptgn.destroy');
    });

    Route::prefix('monev/shg/input-data/asset-breakdown-ptgn')->group(function () {
        Route::get('/', [AssetBreakdownPTGNController::class, 'index'])->name('asset-breakdown-ptgn');
        Route::post('/', [AssetBreakdownPtgnController::class, 'store'])->name('asset-breakdown-ptgn.store');
        Route::get('/data', [AssetBreakdownPtgnController::class, 'data'])->name('asset-breakdown-ptgn.data');
        Route::put('/{id}', [AssetBreakdownPtgnController::class, 'update'])->name('asset-breakdown-ptgn.update');
        Route::delete('/{id}', [AssetBreakdownPtgnController::class, 'destroy'])->name('asset-breakdown-ptgn.destroy');
    });
    Route::prefix('monev/shg/input-data/status-plo-ptgn')->group(function () {
        Route::get('/', [StatusPloPTGNController::class, 'index'])->name('status-plo-ptgn');
        Route::post('/', [StatusPloPtgnController::class, 'store'])->name('status-plo-ptgn.store');
        Route::get('/data', [StatusPloPtgnController::class, 'data'])->name('status-plo-ptgn.data');
        Route::put('/{id}', [StatusPloPtgnController::class, 'update'])->name('status-plo-ptgn.update');
        Route::delete('/{id}', [StatusPloPtgnController::class, 'destroy'])->name('status-plo-ptgn.destroy');
    });
    Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-ptgn')->group(function () {
        Route::get('/', [KondisiVacantAimsPTGNController::class, 'index'])->name('kondisi-vacant-fungsi-aims-ptgn');
        Route::post('/', [KondisiVacantAimsPtgnController::class, 'store'])->name('kondisi-vacant-fungsi-aims-ptgn.store');
        Route::get('/data', [KondisiVacantAimsPtgnController::class, 'data'])->name('kondisi-vacant-fungsi-aims-ptgn.data');
        Route::put('/{id}', [KondisiVacantAimsPtgnController::class, 'update'])->name('kondisi-vacant-fungsi-aims-ptgn.update');
        Route::delete('/{id}', [KondisiVacantAimsPtgnController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-ptgn.destroy');
    });
    Route::prefix('monev/shg/input-data/sistem-informasi-aims-ptgn')->group(function () {
        Route::get('/', [SistemInformasiAimsPTGNController::class, 'index'])->name('sistem-informasi-aims-ptgn');
        Route::post('/', [SistemInformasiAimsPTGNController::class, 'store'])->name('sistem-informasi-aims-ptgn.store');
        Route::get('/data', [SistemInformasiAimsPTGNController::class, 'data'])->name('sistem-informasi-aims-ptgn.data');
        Route::put('/{id}', [SistemInformasiAimsPTGNController::class, 'update'])->name('sistem-informasi-aims-ptgn.update');
        Route::delete('/{id}', [SistemInformasiAimsPTGNController::class, 'destroy'])->name('sistem-informasi-aims-ptgn.destroy');
    });
    Route::prefix('monev/shg/input-data/pelatihan-aims-ptgn')->group(function () {
        Route::get('/', [PelatihanAimsPTGNController::class, 'index'])->name('pelatihan-aims-ptgn');
        Route::post('/', [PelatihanAimsPTGNController::class, 'store'])->name('pelatihan-aims-ptgn.store');
        Route::get('/data', [PelatihanAimsPTGNController::class, 'data'])->name('pelatihan-aims-ptgn.data');
        Route::put('/{id}', [PelatihanAimsPTGNController::class, 'update'])->name('pelatihan-aims-ptgn.update');
        Route::delete('/{id}', [PelatihanAimsPTGNController::class, 'destroy'])->name('pelatihan-aims-ptgn.destroy');
    });
    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-ptgn')->group(function () {
        Route::get('/', [RencanaPemeliharaanPTGNController::class, 'index'])->name('rencana-pemeliharaan-ptgn');
        Route::post('/', [RencanaPemeliharaanPtgnController::class, 'store'])->name('rencana-pemeliharaan-ptgn.store');
        Route::get('/data', [RencanaPemeliharaanPtgnController::class, 'data'])->name('rencana-pemeliharaan-ptgn.data');
        Route::put('/{id}', [RencanaPemeliharaanPtgnController::class, 'update'])->name('rencana-pemeliharaan-ptgn.update');
        Route::delete('/{id}', [RencanaPemeliharaanPtgnController::class, 'destroy'])->name('rencana-pemeliharaan-ptgn.destroy');
    });
    Route::prefix('monev/shg/input-data/availability-ptgn')->group(function () {
        Route::get('/', [AvailabilityPTGNController::class, 'index'])->name('availability-ptgn');
        Route::post('/', [AvailabilityPTGNController::class, 'store'])->name('availability-ptgn.store');
        Route::get('/data', [AvailabilityPTGNController::class, 'data'])->name('availability-ptgn.data');
        Route::put('/{id}', [AvailabilityPTGNController::class, 'update'])->name('availability-ptgn.update');
        Route::delete('/{id}', [AvailabilityPTGNController::class, 'destroy'])->name('availability-ptgn.destroy');
    });
    Route::prefix('monev/shg/input-data/air-budget-tagging-ptgn')->group(function () {
        Route::get('/', [AirBudgetTaggingPTGNController::class, 'index'])->name('air-budget-tagging-ptgn');
        Route::post('/', [AirBudgetTaggingPTGNController::class, 'store'])->name('air-budget-tagging-ptgn.store');
        Route::get('/data', [AirBudgetTaggingPTGNController::class, 'data'])->name('air-budget-tagging-ptgn.data');
        Route::put('/{id}', [AirBudgetTaggingPTGNController::class, 'update'])->name('air-budget-tagging-ptgn.update');
        Route::delete('/{id}', [AirBudgetTaggingPTGNController::class, 'destroy'])->name('air-budget-tagging-ptgn.destroy');
    });

    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-ptgn')->group(function () {
        Route::get('/', [RealisasiAnggaranAiPTGNController::class, 'index'])->name('realisasi-anggaran-ai-ptgn');
        Route::post('/', [RealisasiAnggaranAiPTGNController::class, 'store'])->name('realisasi-anggaran-ai-ptgn.store');
        Route::get('/data', [RealisasiAnggaranAiPTGNController::class, 'data'])->name('realisasi-anggaran-ai-ptgn.data');
        Route::put('/{id}', [RealisasiAnggaranAiPTGNController::class, 'update'])->name('realisasi-anggaran-ai-ptgn.update');
        Route::delete('/{id}', [RealisasiAnggaranAiPTGNController::class, 'destroy'])->name('realisasi-anggaran-ai-ptgn.destroy');
    });

    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-ptgn')->group(function () {
        Route::get('/', [RealisasiProgressFisikAiPTGNController::class, 'index'])->name('realisasi-progress-fisik-ai-ptgn');
        Route::post('/', [RealisasiProgressFisikAiPTGNController::class, 'store'])->name('realisasi-progress-fisik-ai-ptgn.store');
        Route::get('/data', [RealisasiProgressFisikAiPTGNController::class, 'data'])->name('realisasi-progress-fisik-ai-ptgn.data');
        Route::put('/{id}', [RealisasiProgressFisikAiPTGNController::class, 'update'])->name('realisasi-progress-fisik-ai-ptgn.update');
        Route::delete('/{id}', [RealisasiProgressFisikAiPTGNController::class, 'destroy'])->name('realisasi-progress-fisik-ai-ptgn.destroy');
    });

    // PT GAGAS ENERGI INDONESIA
    Route::prefix('monev/shg/input-data/gagas-energi-indonesia')->group(function () {
        Route::get('/', [StatusAssetAiGEIController::class, 'index'])->name('gagas-energi-indonesia');
        Route::post('/', [StatusAssetAiGEIController::class, 'store'])->name('gagas-energi-indonesia.store');
        Route::get('/data', [StatusAssetAiGEIController::class, 'data'])->name('gagas-energi-indonesia.data');
        Route::put('/{id}', [StatusAssetAiGEIController::class, 'update'])->name('gagas-energi-indonesia.update');
        Route::delete('/{id}', [StatusAssetAiGEIController::class, 'destroy'])->name('gagas-energi-indonesia.destroy');
    });

    Route::prefix('monev/shg/input-data/mandatory-certification-gei')->group(function () {
        Route::get('/', [MandatoryCertificationGEIController::class, 'index'])->name('mandatory-certification-gei');
        Route::post('/', [MandatoryCertificationGEIController::class, 'store'])->name('mandatory-certification-gei.store');
        Route::get('/data', [MandatoryCertificationGEIController::class, 'data'])->name('mandatory-certification-gei.data');
        Route::put('/{id}', [MandatoryCertificationGEIController::class, 'update'])->name('mandatory-certification-gei.update');
        Route::delete('/{id}', [MandatoryCertificationGEIController::class, 'destroy'])->name('mandatory-certification-gei.destroy');
    });
    Route::prefix('monev/shg/input-data/asset-breakdown-gei')->group(function () {
        Route::get('/', [AssetBreakdownGEIController::class, 'index'])->name('asset-breakdown-gei');
        Route::post('/', [AssetBreakdownGEIController::class, 'store'])->name('asset-breakdown-gei.store');
        Route::get('/data', [AssetBreakdownGEIController::class, 'data'])->name('asset-breakdown-gei.data');
        Route::put('/{id}', [AssetBreakdownGEIController::class, 'update'])->name('asset-breakdown-gei.update');
        Route::delete('/{id}', [AssetBreakdownGEIController::class, 'destroy'])->name('asset-breakdown-gei.destroy');
    });

    Route::prefix('monev/shg/input-data/sistem-informasi-aims-gei')->group(function () {
        Route::get('/', [SistemInformasiAimsGEIController::class, 'index'])->name('sistem-informasi-aims-gei');
        Route::post('/', [SistemInformasiAimsGEIController::class, 'store'])->name('sistem-informasi-aims-gei.store');
        Route::get('/data', [SistemInformasiAimsGEIController::class, 'data'])->name('sistem-informasi-aims-gei.data');
        Route::put('/{id}', [SistemInformasiAimsGEIController::class, 'update'])->name('sistem-informasi-aims-gei.update');
        Route::delete('/{id}', [SistemInformasiAimsGEIController::class, 'destroy'])->name('sistem-informasi-aims-gei.destroy');
    });
    Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-gei')->group(function () {
        Route::get('/', [KondisiVacantAimsGEIController::class, 'index'])->name('kondisi-vacant-fungsi-aims-gei');
        Route::post('/', [KondisiVacantAimsGEIController::class, 'store'])->name('kondisi-vacant-fungsi-aims-gei.store');
        Route::get('/data', [KondisiVacantAimsGEIController::class, 'data'])->name('kondisi-vacant-fungsi-aims-gei.data');
        Route::put('/{id}', [KondisiVacantAimsGEIController::class, 'update'])->name('kondisi-vacant-fungsi-aims-gei.update');
        Route::delete('/{id}', [KondisiVacantAimsGEIController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-gei.destroy');
    });
    Route::prefix('monev/shg/input-data/status-plo-gei')->group(function () {
        Route::get('/', [StatusPloGEIController::class, 'index'])->name('status-plo-gei');
        Route::post('/', [StatusPloGEIController::class, 'store'])->name('status-plo-gei.store');
        Route::get('/data', [StatusPloGEIController::class, 'data'])->name('status-plo-gei.data');
        Route::put('/{id}', [StatusPloGEIController::class, 'update'])->name('status-plo-gei.update');
        Route::delete('/{id}', [StatusPloGEIController::class, 'destroy'])->name('status-plo-gei.destroy');
    });
    Route::prefix('monev/shg/input-data/pelatihan-aims-gei')->group(function () {
        Route::get('/', [PelatihanAimsGEIController::class, 'index'])->name('pelatihan-aims-gei');
        Route::post('/', [PelatihanAimsGEIController::class, 'store'])->name('pelatihan-aims-gei.store');
        Route::get('/data', [PelatihanAimsGEIController::class, 'data'])->name('pelatihan-aims-gei.data');
        Route::put('/{id}', [PelatihanAimsGEIController::class, 'update'])->name('pelatihan-aims-gei.update');
        Route::delete('/{id}', [PelatihanAimsGEIController::class, 'destroy'])->name('pelatihan-aims-gei.destroy');
    });
    Route::prefix('monev/shg/input-data/availability-gei')->group(function () {
        Route::get('/', [AvailabilityGEIController::class, 'index'])->name('availability-gei');
        Route::post('/', [AvailabilityGEIController::class, 'store'])->name('availability-gei.store');
        Route::get('/data', [AvailabilityGEIController::class, 'data'])->name('availability-gei.data');
        Route::put('/{id}', [AvailabilityGEIController::class, 'update'])->name('availability-gei.update');
        Route::delete('/{id}', [AvailabilityGEIController::class, 'destroy'])->name('availability-gei.destroy');
    });
    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-gei')->group(function () {
        Route::get('/', [RealisasiAnggaranAiGEIController::class, 'index'])->name('realisasi-anggaran-ai-gei');
        Route::post('/', [RealisasiAnggaranAiGEIController::class, 'store'])->name('realisasi-anggaran-ai-gei.store');
        Route::get('/data', [RealisasiAnggaranAiGEIController::class, 'data'])->name('realisasi-anggaran-ai-gei.data');
        Route::put('/{id}', [RealisasiAnggaranAiGEIController::class, 'update'])->name('realisasi-anggaran-ai-gei.update');
        Route::delete('/{id}', [RealisasiAnggaranAiGEIController::class, 'destroy'])->name('realisasi-anggaran-ai-gei.destroy');
    });
    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-gei')->group(function () {
        Route::get('/', [RealisasiProgressFisikAiGEIController::class, 'index'])->name('realisasi-progress-fisik-ai-gei');
        Route::post('/', [RealisasiProgressFisikAiGEIController::class, 'store'])->name('realisasi-progress-fisik-ai-gei.store');
        Route::get('/data', [RealisasiProgressFisikAiGEIController::class, 'data'])->name('realisasi-progress-fisik-ai-gei.data');
        Route::put('/{id}', [RealisasiProgressFisikAiGEIController::class, 'update'])->name('realisasi-progress-fisik-ai-gei.update');
        Route::delete('/{id}', [RealisasiProgressFisikAiGEIController::class, 'destroy'])->name('realisasi-progress-fisik-ai-gei.destroy');
    });
    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-gei')->group(function () {
        Route::get('/', [RencanaPemeliharaanGEIController::class, 'index'])->name('rencana-pemeliharaan-gei');
        Route::post('/', [RencanaPemeliharaanGEIController::class, 'store'])->name('rencana-pemeliharaan-gei.store');
        Route::get('/data', [RencanaPemeliharaanGEIController::class, 'data'])->name('rencana-pemeliharaan-gei.data');
        Route::put('/{id}', [RencanaPemeliharaanGEIController::class, 'update'])->name('rencana-pemeliharaan-gei.update');
        Route::delete('/{id}', [RencanaPemeliharaanGEIController::class, 'destroy'])->name('rencana-pemeliharaan-gei.destroy');
    });
    Route::prefix('monev/shg/input-data/air-budget-tagging-gei')->group(function () {
        Route::get('/', [AirBudgetTaggingGEIController::class, 'index'])->name('air-budget-tagging-gei');
        Route::post('/', [AirBudgetTaggingGEIController::class, 'store'])->name('air-budget-tagging-gei.store');
        Route::get('/data', [AirBudgetTaggingGEIController::class, 'data'])->name('air-budget-tagging-gei.data');
        Route::put('/{id}', [AirBudgetTaggingGEIController::class, 'update'])->name('air-budget-tagging-gei.update');
        Route::delete('/{id}', [AirBudgetTaggingGEIController::class, 'destroy'])->name('air-budget-tagging-gei.destroy');
    });

    Route::prefix('monev/shg/input-data/saka-energi-indonesia')->group(function () {
        Route::get('/', [StatusAssetAiSakaController::class, 'index'])->name('saka-energi-indonesia');
        Route::post('/', [StatusAssetAiSakaController::class, 'store'])->name('saka-energi-indonesia.store');
        Route::get('/data', [StatusAssetAiSakaController::class, 'data'])->name('saka-energi-indonesia.data');
        Route::put('/{id}', [StatusAssetAiSakaController::class, 'update'])->name('saka-energi-indonesia.update');
        Route::delete('/{id}', [StatusAssetAiSakaController::class, 'destroy'])->name('saka-energi-indonesia.destroy');
    });
    Route::prefix('monev/shg/input-data/asset-breakdown-saka')->group(function () {
        Route::get('/', [AssetBreakdownSakaController::class, 'index'])->name('asset-breakdown-saka');
        Route::post('/', [AssetBreakdownSakaController::class, 'store'])->name('asset-breakdown-saka.store');
        Route::get('/data', [AssetBreakdownSakaController::class, 'data'])->name('asset-breakdown-saka.data');
        Route::put('/{id}', [AssetBreakdownSakaController::class, 'update'])->name('asset-breakdown-saka.update');
        Route::delete('/{id}', [AssetBreakdownSakaController::class, 'destroy'])->name('asset-breakdown-saka.destroy');
    });
    Route::prefix('monev/shg/input-data/status-plo-saka')->group(function () {
        Route::get('/', [StatusPloSakaController::class, 'index'])->name('status-plo-saka');
        Route::post('/', [StatusPloSakaController::class, 'store'])->name('status-plo-saka.store');
        Route::get('/data', [StatusPloSakaController::class, 'data'])->name('status-plo-saka.data');
        Route::put('/{id}', [StatusPloSakaController::class, 'update'])->name('status-plo-saka.update');
        Route::delete('/{id}', [StatusPloSakaController::class, 'destroy'])->name('status-plo-saka.destroy');
    });
    Route::prefix('monev/shg/input-data/mandatory-certification-saka')->group(function () {
        Route::get('/', [MandatoryCertificationSakaController::class, 'index'])->name('mandatory-certification-saka');
        Route::post('/', [MandatoryCertificationSakaController::class, 'store'])->name('mandatory-certification-saka.store');
        Route::get('/data', [MandatoryCertificationSakaController::class, 'data'])->name('mandatory-certification-saka.data');
        Route::put('/{id}', [MandatoryCertificationSakaController::class, 'update'])->name('mandatory-certification-saka.update');
        Route::delete('/{id}', [MandatoryCertificationSakaController::class, 'destroy'])->name('mandatory-certification-saka.destroy');
    });
    Route::prefix('monev/shg/input-data/kondisi-vacant-aims-saka')->group(function () {
        Route::get('/', [KondisiVacantAimsSakaController::class, 'index'])->name('kondisi-vacant-aims-saka');
        Route::post('/', [KondisiVacantAIMSSakaController::class, 'store'])->name('kondisi-vacant-aims-saka.store');
        Route::get('/data', [KondisiVacantAIMSSakaController::class, 'data'])->name('kondisi-vacant-aims-saka.data');
        Route::put('/{id}', [KondisiVacantAIMSSakaController::class, 'update'])->name('kondisi-vacant-aims-saka.update');
        Route::delete('/{id}', [KondisiVacantAIMSSakaController::class, 'destroy'])->name('kondisi-vacant-aims-saka.destroy');
    });
    Route::prefix('monev/shg/input-data/pelatihan-aims-saka')->group(function () {
        Route::get('/', [PelatihanAimsSakaController::class, 'index'])->name('pelatihan-aims-saka');
        Route::post('/', [PelatihanAimsSakaController::class, 'store'])->name('pelatihan-aims-saka.store');
        Route::get('/data', [PelatihanAimsSakaController::class, 'data'])->name('pelatihan-aims-saka.data');
        Route::put('/{id}', [PelatihanAimsSakaController::class, 'update'])->name('pelatihan-aims-saka.update');
        Route::delete('/{id}', [PelatihanAimsSakaController::class, 'destroy'])->name('pelatihan-aims-saka.destroy');
    });
    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-saka')->group(function () {
        Route::get('/', [RencanaPemeliharaanSakaController::class, 'index'])->name('rencana-pemeliharaan-saka');
        Route::post('/', [RencanaPemeliharaanSakaController::class, 'store'])->name('rencana-pemeliharaan-saka.store');
        Route::get('/data', [RencanaPemeliharaanSakaController::class, 'data'])->name('rencana-pemeliharaan-saka.data');
        Route::put('/{id}', [RencanaPemeliharaanSakaController::class, 'update'])->name('rencana-pemeliharaan-saka.update');
        Route::delete('/{id}', [RencanaPemeliharaanSakaController::class, 'destroy'])->name('rencana-pemeliharaan-saka.destroy');
    });

    Route::prefix('monev/shg/input-data/sistem-informasi-aims-saka')->group(function () {
        Route::get('/', [SistemInformasiAimsSakaController::class, 'index'])->name('sistem-informasi-aims-saka');
        Route::post('/', [SistemInformasiAimsSakaController::class, 'store'])->name('sistem-informasi-aims-saka.store');
        Route::get('/data', [SistemInformasiAimsSakaController::class, 'data'])->name('sistem-informasi-aims-saka.data');
        Route::put('/{id}', [SistemInformasiAimsSakaController::class, 'update'])->name('sistem-informasi-aims-saka.update');
        Route::delete('/{id}', [SistemInformasiAimsSakaController::class, 'destroy'])->name('sistem-informasi-aims-saka.destroy');
    });
    Route::prefix('monev/shg/input-data/availability-saka')->group(function () {
        Route::get('/', [AvailabilitySakaController::class, 'index'])->name('availability-saka');
        Route::post('/', [AvailabilitySakaController::class, 'store'])->name('availability-saka.store');
        Route::get('/data', [AvailabilitySakaController::class, 'data'])->name('availability-saka.data');
        Route::put('/{id}', [AvailabilitySakaController::class, 'update'])->name('availability-saka.update');
        Route::delete('/{id}', [AvailabilitySakaController::class, 'destroy'])->name('availability-saka.destroy');
    });
    Route::prefix('monev/shg/input-data/air-budget-tagging-saka')->group(function () {
        Route::get('/', [AirBudgetTaggingSakaController::class, 'index'])->name('air-budget-tagging-saka');
        Route::post('/', [AirBudgetTaggingSakaController::class, 'store'])->name('air-budget-tagging-saka.store');
        Route::get('/data', [AirBudgetTaggingSakaController::class, 'data'])->name('air-budget-tagging-saka.data');
        Route::put('/{id}', [AirBudgetTaggingSakaController::class, 'update'])->name('air-budget-tagging-saka.update');
        Route::delete('/{id}', [AirBudgetTaggingSakaController::class, 'destroy'])->name('air-budget-tagging-saka.destroy');
    });
    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-saka')->group(function () {
        Route::get('/', [RealisasiAnggaranAiSakaController::class, 'index'])->name('realisasi-anggaran-ai-saka');
        Route::post('/', [RealisasiAnggaranAiSakaController::class, 'store'])->name('realisasi-anggaran-ai-saka.store');
        Route::get('/data', [RealisasiAnggaranAiSakaController::class, 'data'])->name('realisasi-anggaran-ai-saka.data');
        Route::put('/{id}', [RealisasiAnggaranAiSakaController::class, 'update'])->name('realisasi-anggaran-ai-saka.update');
        Route::delete('/{id}', [RealisasiAnggaranAiSakaController::class, 'destroy'])->name('realisasi-anggaran-ai-saka.destroy');
    });
    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-saka')->group(function () {
        Route::get('/', [RealisasiProgressFisikAiSakaController::class, 'index'])->name('realisasi-progress-fisik-ai-saka');
        Route::post('/', [RealisasiProgressFisikAiSakaController::class, 'store'])->name('realisasi-progress-fisik-ai-saka.store');
        Route::get('/data', [RealisasiProgressFisikAiSakaController::class, 'data'])->name('realisasi-progress-fisik-ai-saka.data');
        Route::put('/{id}', [RealisasiProgressFisikAiSakaController::class, 'update'])->name('realisasi-progress-fisik-ai-saka.update');
        Route::delete('/{id}', [RealisasiProgressFisikAiSakaController::class, 'destroy'])->name('realisasi-progress-fisik-ai-saka.destroy');
    });


    // Nusantara Regas NR
    Route::prefix('monev/shg/input-data/nusantara-regas')->group(function () {
        Route::get('/', [StatusAssetAiNRController::class, 'index'])->name('nusantara-regas');
        Route::post('/', [StatusAssetAiNRController::class, 'store'])->name('nusantara-regas.store');
        Route::get('/data', [StatusAssetAiNRController::class, 'data'])->name('nusantara-regas.data');
        Route::put('/{id}', [StatusAssetAiNRController::class, 'update'])->name('nusantara-regas.update');
        Route::delete('/{id}', [StatusAssetAiNRController::class, 'destroy'])->name('nusantara-regas.destroy');
    });
    Route::prefix('monev/shg/input-data/mandatory-certification-nr')->group(function () {
        Route::get('/', [MandatoryCertificationNRController::class, 'index'])->name('mandatory-certification-nr');
        Route::post('/', [MandatoryCertificationNRController::class, 'store'])->name('mandatory-certification-nr.store');
        Route::get('/data', [MandatoryCertificationNRController::class, 'data'])->name('mandatory-certification-nr.data');
        Route::put('/{id}', [MandatoryCertificationNRController::class, 'update'])->name('mandatory-certification-nr.update');
        Route::delete('/{id}', [MandatoryCertificationNRController::class, 'destroy'])->name('mandatory-certification-nr.destroy');
    });

    Route::prefix('monev/shg/input-data/asset-breakdown-nr')->group(function () {
        Route::get('/', [AssetBreakdownNRController::class, 'index'])->name('asset-breakdown-nr');
        Route::post('/', [AssetBreakdownNRController::class, 'store'])->name('asset-breakdown-nr.store');
        Route::get('/data', [AssetBreakdownNRController::class, 'data'])->name('asset-breakdown-nr.data');
        Route::put('/{id}', [AssetBreakdownNRController::class, 'update'])->name('asset-breakdown-nr.update');
        Route::delete('/{id}', [AssetBreakdownNRController::class, 'destroy'])->name('asset-breakdown-nr.destroy');
    });
    Route::prefix('monev/shg/input-data/status-plo-nr')->group(function () {
        Route::get('/', [StatusPloNRController::class, 'index'])->name('status-plo-nr');
        Route::post('/', [StatusPloNRController::class, 'store'])->name('status-plo-nr.store');
        Route::get('/data', [StatusPloNRController::class, 'data'])->name('status-plo-nr.data');
        Route::put('/{id}', [StatusPloNRController::class, 'update'])->name('status-plo-nr.update');
        Route::delete('/{id}', [StatusPloNRController::class, 'destroy'])->name('status-plo-nr.destroy');
    });
    Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-nr')->group(function () {
        Route::get('/', [KondisiVacantNRController::class, 'index'])->name('kondisi-vacant-fungsi-aims-nr');
        Route::post('/', [KondisiVacantNRController::class, 'store'])->name('kondisi-vacant-fungsi-aims-nr.store');
        Route::get('/data', [KondisiVacantNRController::class, 'data'])->name('kondisi-vacant-fungsi-aims-nr.data');
        Route::put('/{id}', [KondisiVacantNRController::class, 'update'])->name('kondisi-vacant-fungsi-aims-nr.update');
        Route::delete('/{id}', [KondisiVacantNRController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-nr.destroy');
    });
    Route::prefix('monev/shg/input-data/pelatihan-aims-nr')->group(function () {
        Route::get('/', [PelatihanAimsNRController::class, 'index'])->name('pelatihan-aims-nr');
        Route::post('/', [PelatihanAimsNRController::class, 'store'])->name('pelatihan-aims-nr.store');
        Route::get('/data', [PelatihanAimsNRController::class, 'data'])->name('pelatihan-aims-nr.data');
        Route::put('/{id}', [PelatihanAimsNRController::class, 'update'])->name('pelatihan-aims-nr.update');
        Route::delete('/{id}', [PelatihanAimsNRController::class, 'destroy'])->name('pelatihan-aims-nr.destroy');
    });
    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-nr')->group(function () {
        Route::get('/', [RencanaPemeliharaanNRController::class, 'index'])->name('rencana-pemeliharaan-nr');
        Route::post('/', [RencanaPemeliharaanNRController::class, 'store'])->name('rencana-pemeliharaan-nr.store');
        Route::get('/data', [RencanaPemeliharaanNRController::class, 'data'])->name('rencana-pemeliharaan-nr.data');
        Route::put('/{id}', [RencanaPemeliharaanNRController::class, 'update'])->name('rencana-pemeliharaan-nr.update');
        Route::delete('/{id}', [RencanaPemeliharaanNRController::class, 'destroy'])->name('rencana-pemeliharaan-nr.destroy');
    });
    Route::prefix('monev/shg/input-data/sistem-informasi-aims-nr')->group(function () {
        Route::get('/', [SistemInformasiAimsNRController::class, 'index'])->name('sistem-informasi-aims-nr');
        Route::post('/', [SistemInformasiAimsNRController::class, 'store'])->name('sistem-informasi-aims-nr.store');
        Route::get('/data', [SistemInformasiAimsNRController::class, 'data'])->name('sistem-informasi-aims-nr.data');
        Route::put('/{id}', [SistemInformasiAimsNRController::class, 'update'])->name('sistem-informasi-aims-nr.update');
        Route::delete('/{id}', [SistemInformasiAimsNRController::class, 'destroy'])->name('sistem-informasi-aims-nr.destroy');
    });
    Route::prefix('monev/shg/input-data/availability-nr')->group(function () {
        Route::get('/', [AvailabilityNRController::class, 'index'])->name('availability-nr');
        Route::post('/', [AvailabilityNRController::class, 'store'])->name('availability-nr.store');
        Route::get('/data', [AvailabilityNRController::class, 'data'])->name('availability-nr.data');
        Route::put('/{id}', [AvailabilityNRController::class, 'update'])->name('availability-nr.update');
        Route::delete('/{id}', [AvailabilityNRController::class, 'destroy'])->name('availability-nr.destroy');
    });
    Route::prefix('monev/shg/input-data/air-budget-tagging-nr')->group(function () {
        Route::get('/', [AirBudgetTaggingNRController::class, 'index'])->name('air-budget-tagging-nr');
        Route::post('/', [AirBudgetTaggingNRController::class, 'store'])->name('air-budget-tagging-nr.store');
        Route::get('/data', [AirBudgetTaggingNRController::class, 'data'])->name('air-budget-tagging-nr.data');
        Route::put('/{id}', [AirBudgetTaggingNRController::class, 'update'])->name('air-budget-tagging-nr.update');
        Route::delete('/{id}', [AirBudgetTaggingNRController::class, 'destroy'])->name('air-budget-tagging-nr.destroy');
    });

    // Tranportasi Gas Indonesia
    Route::prefix('monev/shg/input-data/transportasi-gas-indonesia')->group(function () {
        Route::get('/', [StatusAssetAiTGIController::class, 'index'])->name('transportasi-gas-indonesia');
        Route::post('/', [StatusAssetAiTGIController::class, 'store'])->name('transportasi-gas-indonesia.store');
        Route::get('/data', [StatusAssetAiTGIController::class, 'data'])->name('transportasi-gas-indonesia.data');
        Route::put('/{id}', [StatusAssetAiTGIController::class, 'update'])->name('transportasi-gas-indonesia.update');
        Route::delete('/{id}', [StatusAssetAiTGIController::class, 'destroy'])->name('transportasi-gas-indonesia.destroy');
    });
    Route::prefix('monev/shg/input-data/mandatory-certification-tgi')->group(function () {
        Route::get('/', [MandatoryCertificationTGIController::class, 'index'])->name('mandatory-certification-tgi');
        Route::post('/', [MandatoryCertificationTGIController::class, 'store'])->name('mandatory-certification-tgi.store');
        Route::get('/data', [MandatoryCertificationTGIController::class, 'data'])->name('mandatory-certification-tgi.data');
        Route::put('/{id}', [MandatoryCertificationTGIController::class, 'update'])->name('mandatory-certification-tgi.update');
        Route::delete('/{id}', [MandatoryCertificationTGIController::class, 'destroy'])->name('mandatory-certification-tgi.destroy');
    });
    Route::prefix('monev/shg/input-data/asset-breakdown-tgi')->group(function () {
        Route::get('/', [AssetBreakdownTGIController::class, 'index'])->name('asset-breakdown-tgi');
        Route::post('/', [AssetBreakdownTGIController::class, 'store'])->name('asset-breakdown-tgi.store');
        Route::get('/data', [AssetBreakdownTGIController::class, 'data'])->name('asset-breakdown-tgi.data');
        Route::put('/{id}', [AssetBreakdownTGIController::class, 'update'])->name('asset-breakdown-tgi.update');
        Route::delete('/{id}', [AssetBreakdownTGIController::class, 'destroy'])->name('asset-breakdown-tgi.destroy');
    });
    Route::prefix('monev/shg/input-data/sistem-informasi-aims-tgi')->group(function () {
        Route::get('/', [SistemInformasiAimsTGIController::class, 'index'])->name('sistem-informasi-aims-tgi');
        Route::post('/', [SistemInformasiAimsTGIController::class, 'store'])->name('sistem-informasi-aims-tgi.store');
        Route::get('/data', [SistemInformasiAimsTGIController::class, 'data'])->name('sistem-informasi-aims-tgi.data');
        Route::put('/{id}', [SistemInformasiAimsTGIController::class, 'update'])->name('sistem-informasi-aims-tgi.update');
        Route::delete('/{id}', [SistemInformasiAimsTGIController::class, 'destroy'])->name('sistem-informasi-aims-tgi.destroy');
    });
    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-tgi')->group(function () {
        Route::get('/', [RencanaPemeliharaanTGIController::class, 'index'])->name('rencana-pemeliharaan-tgi');
        Route::post('/', [RencanaPemeliharaanTGIController::class, 'store'])->name('rencana-pemeliharaan-tgi.store');
        Route::get('/data', [RencanaPemeliharaanTGIController::class, 'data'])->name('rencana-pemeliharaan-tgi.data');
        Route::put('/{id}', [RencanaPemeliharaanTGIController::class, 'update'])->name('rencana-pemeliharaan-tgi.update');
        Route::delete('/{id}', [RencanaPemeliharaanTGIController::class, 'destroy'])->name('rencana-pemeliharaan-tgi.destroy');
    });
    Route::prefix('monev/shg/input-data/status-plo-tgi')->group(function () {
        Route::get('/', [StatusPloTGIController::class, 'index'])->name('status-plo-tgi');
        Route::post('/', [StatusPloTGIController::class, 'store'])->name('status-plo-tgi.store');
        Route::get('/data', [StatusPloTGIController::class, 'data'])->name('status-plo-tgi.data');
        Route::put('/{id}', [StatusPloTGIController::class, 'update'])->name('status-plo-tgi.update');
        Route::delete('/{id}', [StatusPloTGIController::class, 'destroy'])->name('status-plo-tgi.destroy');
    });
    Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-tgi')->group(function () {
        Route::get('/', [KondisiVacantAimsTGIController::class, 'index'])->name('kondisi-vacant-fungsi-aims-tgi');
        Route::post('/', [KondisiVacantAimsTGIController::class, 'store'])->name('kondisi-vacant-fungsi-aims-tgi.store');
        Route::get('/data', [KondisiVacantAimsTGIController::class, 'data'])->name('kondisi-vacant-fungsi-aims-tgi.data');
        Route::put('/{id}', [KondisiVacantAimsTGIController::class, 'update'])->name('kondisi-vacant-fungsi-aims-tgi.update');
        Route::delete('/{id}', [KondisiVacantAimsTGIController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-tgi.destroy');
    });
    Route::prefix('monev/shg/input-data/pelatihan-aims-tgi')->group(function () {
        Route::get('/', [PelatihanAimsTGIController::class, 'index'])->name('pelatihan-aims-tgi');
        Route::post('/', [PelatihanAimsTGIController::class, 'store'])->name('pelatihan-aims-tgi.store');
        Route::get('/data', [PelatihanAimsTGIController::class, 'data'])->name('pelatihan-aims-tgi.data');
        Route::put('/{id}', [PelatihanAimsTGIController::class, 'update'])->name('pelatihan-aims-tgi.update');
        Route::delete('/{id}', [PelatihanAimsTGIController::class, 'destroy'])->name('pelatihan-aims-tgi.destroy');
    });
    Route::prefix('monev/shg/input-data/air-budget-tagging-tgi')->group(function () {
        Route::get('/', [AirBudgetTaggingTGIController::class, 'index'])->name('air-budget-tagging-tgi');
        Route::post('/', [AirBudgetTaggingTGIController::class, 'store'])->name('air-budget-tagging-tgi.store');
        Route::get('/data', [AirBudgetTaggingTGIController::class, 'data'])->name('air-budget-tagging-tgi.data');
        Route::put('/{id}', [AirBudgetTaggingTGIController::class, 'update'])->name('air-budget-tagging-tgi.update');
        Route::delete('/{id}', [AirBudgetTaggingTGIController::class, 'destroy'])->name('air-budget-tagging-tgi.destroy');
    });
    Route::prefix('monev/shg/input-data/availability-tgi')->group(function () {
        Route::get('/', [AvailabilityTGIController::class, 'index'])->name('availability-tgi');
        Route::post('/', [AvailabilityTGIController::class, 'store'])->name('availability-tgi.store');
        Route::get('/data', [AvailabilityTGIController::class, 'data'])->name('availability-tgi.data');
        Route::put('/{id}', [AvailabilityTGIController::class, 'update'])->name('availability-tgi.update');
        Route::delete('/{id}', [AvailabilityTGIController::class, 'destroy'])->name('availability-tgi.destroy');
    });
    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-tgi')->group(function () {
        Route::get('/', [RealisasiAnggaranAiTGIController::class, 'index'])->name('realisasi-anggaran-ai-tgi');
        Route::post('/', [RealisasiAnggaranAiTGIController::class, 'store'])->name('realisasi-anggaran-ai-tgi.store');
        Route::get('/data', [RealisasiAnggaranAiTGIController::class, 'data'])->name('realisasi-anggaran-ai-tgi.data');
        Route::put('/{id}', [RealisasiAnggaranAiTGIController::class, 'update'])->name('realisasi-anggaran-ai-tgi.update');
        Route::delete('/{id}', [RealisasiAnggaranAiTGIController::class, 'destroy'])->name('realisasi-anggaran-ai-tgi.destroy');
    });
    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-tgi')->group(function () {
        Route::get('/', [RealisasiProgressFisikAiTGIController::class, 'index'])->name('realisasi-progress-fisik-ai-tgi');
        Route::post('/', [RealisasiProgressFisikAiTGIController::class, 'store'])->name('realisasi-progress-fisik-ai-tgi.store');
        Route::get('/data', [RealisasiProgressFisikAiTGIController::class, 'data'])->name('realisasi-progress-fisik-ai-tgi.data');
        Route::put('/{id}', [RealisasiProgressFisikAiTGIController::class, 'update'])->name('realisasi-progress-fisik-ai-tgi.update');
        Route::delete('/{id}', [RealisasiProgressFisikAiTGIController::class, 'destroy'])->name('realisasi-progress-fisik-ai-tgi.destroy');
    });


    // PGN OMM
    Route::prefix('monev/shg/input-data/pgn-omm')->group(function () {
        Route::get('/', [StatusAssetAiOmmController::class, 'index'])->name('pgn-omm');
        Route::post('/', [StatusAssetAiOmmController::class, 'store'])->name('pgn-omm.store');
        Route::get('/data', [StatusAssetAiOmmController::class, 'data'])->name('pgn-omm.data');
        Route::put('/{id}', [StatusAssetAiOmmController::class, 'update'])->name('pgn-omm.update');
        Route::delete('/{id}', [StatusAssetAiOmmController::class, 'destroy'])->name('pgn-omm.destroy');
    });
    Route::prefix('monev/shg/input-data/mandatory-certification-omm')->group(function () {
        Route::get('/', [MandatoryCertificationOmmController::class, 'index'])->name('mandatory-certification-omm');
        Route::post('/', [MandatoryCertificationOmmController::class, 'store'])->name('mandatory-certification-omm.store');
        Route::get('/data', [MandatoryCertificationOmmController::class, 'data'])->name('mandatory-certification-omm.data');
        Route::put('/{id}', [MandatoryCertificationOmmController::class, 'update'])->name('mandatory-certification-omm.update');
        Route::delete('/{id}', [MandatoryCertificationOmmController::class, 'destroy'])->name('mandatory-certification-omm.destroy');
    });
    Route::prefix('monev/shg/input-data/asset-breakdown-omm')->group(function () {
        Route::get('/', [AssetBreakdownOmmController::class, 'index'])->name('asset-breakdown-omm');
        Route::post('/', [AssetBreakdownOmmController::class, 'store'])->name('asset-breakdown-omm.store');
        Route::get('/data', [AssetBreakdownOmmController::class, 'data'])->name('asset-breakdown-omm.data');
        Route::put('/{id}', [AssetBreakdownOmmController::class, 'update'])->name('asset-breakdown-omm.update');
        Route::delete('/{id}', [AssetBreakdownOmmController::class, 'destroy'])->name('asset-breakdown-omm.destroy');
    });
    Route::prefix('monev/shg/input-data/status-plo-omm')->group(function () {
        Route::get('/', [StatusPloOmmController::class, 'index'])->name('status-plo-omm');
        Route::post('/', [StatusPloOmmController::class, 'store'])->name('status-plo-omm.store');
        Route::get('/data', [StatusPloOmmController::class, 'data'])->name('status-plo-omm.data');
        Route::put('/{id}', [StatusPloOmmController::class, 'update'])->name('status-plo-omm.update');
        Route::delete('/{id}', [StatusPloOmmController::class, 'destroy'])->name('status-plo-omm.destroy');
    });
    Route::prefix('monev/shg/input-data/kondisi-vacant-aims-omm')->group(function () {
        Route::get('/', [KondisiVacantAimsOmmController::class, 'index'])->name('kondisi-vacant-aims-omm');
        Route::post('/', [KondisiVacantAimsOmmController::class, 'store'])->name('kondisi-vacant-aims-omm.store');
        Route::get('/data', [KondisiVacantAimsOmmController::class, 'data'])->name('kondisi-vacant-aims-omm.data');
        Route::put('/{id}', [KondisiVacantAimsOmmController::class, 'update'])->name('kondisi-vacant-aims-omm.update');
        Route::delete('/{id}', [KondisiVacantAimsOmmController::class, 'destroy'])->name('kondisi-vacant-aims-omm.destroy');
    });
    Route::prefix('monev/shg/input-data/sap-asset-omm')->group(function () {
        Route::get('/', [SapAssetOmmController::class, 'index'])->name('sap-asset-omm');
        Route::post('/', [SapAssetOmmController::class, 'store'])->name('sap-asset-omm.store');
        Route::get('/data', [SapAssetOmmController::class, 'data'])->name('sap-asset-omm.data');
        Route::put('/{id}', [SapAssetOmmController::class, 'update'])->name('sap-asset-omm.update');
        Route::delete('/{id}', [SapAssetOmmController::class, 'destroy'])->name('sap-asset-omm.destroy');
    });
    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-omm')->group(function () {
        Route::get('/', [RealisasiAnggaranAiOmmController::class, 'index'])->name('realisasi-anggaran-ai-omm');
        Route::post('/', [RealisasiAnggaranAiOmmController::class, 'store'])->name('realisasi-anggaran-ai-omm.store');
        Route::get('/data', [RealisasiAnggaranAiOmmController::class, 'data'])->name('realisasi-anggaran-ai-omm.data');
        Route::put('/{id}', [RealisasiAnggaranAiOmmController::class, 'update'])->name('realisasi-anggaran-ai-omm.update');
        Route::delete('/{id}', [RealisasiAnggaranAiOmmController::class, 'destroy'])->name('realisasi-anggaran-ai-omm.destroy');
    });
    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-omm')->group(function () {
        Route::get('/', [RealisasiProgressFisikAiOMMController::class, 'index'])->name('realisasi-progress-fisik-ai-omm');
        Route::post('/', [RealisasiProgressFisikAiOMMController::class, 'store'])->name('realisasi-progress-fisik-ai-omm.store');
        Route::get('/data', [RealisasiProgressFisikAiOMMController::class, 'data'])->name('realisasi-progress-fisik-ai-omm.data');
        Route::put('/{id}', [RealisasiProgressFisikAiOMMController::class, 'update'])->name('realisasi-progress-fisik-ai-omm.update');
        Route::delete('/{id}', [RealisasiProgressFisikAiOmmController::class, 'destroy'])->name('realisasi-progress-fisik-ai-omm.destroy');
    });
    Route::prefix('monev/shg/input-data/pelatihan-aims-omm')->group(function () {
        Route::get('/', [PelatihanAimsOmmController::class, 'index'])->name('pelatihan-aims-omm');
        Route::post('/', [PelatihanAimsOmmController::class, 'store'])->name('pelatihan-aims-omm.store');
        Route::get('/data', [PelatihanAimsOmmController::class, 'data'])->name('pelatihan-aims-omm.data');
        Route::put('/{id}', [PelatihanAimsOmmController::class, 'update'])->name('pelatihan-aims-omm.update');
        Route::delete('/{id}', [PelatihanAimsOmmController::class, 'destroy'])->name('pelatihan-aims-omm.destroy');
    });
    Route::prefix('monev/shg/input-data/sistem-informasi-aims-omm')->group(function () {
        Route::get('/', [SistemInformasiAimsOmmController::class, 'index'])->name('sistem-informasi-aims-omm');
        Route::post('/', [SistemInformasiAimsOmmController::class, 'store'])->name('sistem-informasi-aims-omm.store');
        Route::get('/data', [SistemInformasiAimsOmmController::class, 'data'])->name('sistem-informasi-aims-omm.data');
        Route::put('/{id}', [SistemInformasiAimsOmmController::class, 'update'])->name('sistem-informasi-aims-omm.update');
        Route::delete('/{id}', [SistemInformasiAimsOmmController::class, 'destroy'])->name('sistem-informasi-aims-omm.destroy');
    });
    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-omm')->group(function () {
        Route::get('/', [RencanaPemeliharaanOmmController::class, 'index'])->name('rencana-pemeliharaan-omm');
        Route::post('/', [RencanaPemeliharaanOmmController::class, 'store'])->name('rencana-pemeliharaan-omm.store');
        Route::get('/data', [RencanaPemeliharaanOmmController::class, 'data'])->name('rencana-pemeliharaan-omm.data');
        Route::put('/{id}', [RencanaPemeliharaanOmmController::class, 'update'])->name('rencana-pemeliharaan-omm.update');
        Route::delete('/{id}', [RencanaPemeliharaanOmmController::class, 'destroy'])->name('rencana-pemeliharaan-omm.destroy');
    });
    Route::prefix('monev/shg/input-data/reliability-omm')->group(function () {
        Route::get('/', [ReliabilityOmmController::class, 'index'])->name('reliability-omm');
        Route::post('/', [ReliabilityOmmController::class, 'store'])->name('reliability-omm.store');
        Route::get('/data', [ReliabilityOmmController::class, 'data'])->name('reliability-omm.data');
        Route::put('/{id}', [ReliabilityOmmController::class, 'update'])->name('reliability-omm.update');
        Route::delete('/{id}', [ReliabilityOmmController::class, 'destroy'])->name('reliability-omm.destroy');
    });
    Route::prefix('monev/shg/input-data/availability-omm')->group(function () {
        Route::get('/', [AvailabilityOmmController::class, 'index'])->name('availability-omm');
        Route::post('/', [AvailabilityOmmController::class, 'store'])->name('availability-omm.store');
        Route::get('/data', [AvailabilityOmmController::class, 'data'])->name('availability-omm.data');
        Route::put('/{id}', [AvailabilityOmmController::class, 'update'])->name('availability-omm.update');
        Route::delete('/{id}', [AvailabilityOmmController::class, 'destroy'])->name('availability-omm.destroy');
    });
    Route::prefix('monev/shg/input-data/air-budget-tagging-omm')->group(function () {
        Route::get('/', [AirBudgetTaggingOmmController::class, 'index'])->name('air-budget-tagging-omm');
        Route::post('/', [AirBudgetTaggingOmmController::class, 'store'])->name('air-budget-tagging-omm.store');
        Route::get('/data', [AirBudgetTaggingOmmController::class, 'data'])->name('air-budget-tagging-omm.data');
        Route::put('/{id}', [AirBudgetTaggingOmmController::class, 'update'])->name('air-budget-tagging-omm.update');
        Route::delete('/{id}', [AirBudgetTaggingOmmController::class, 'destroy'])->name('air-budget-tagging-omm.destroy');
    });


    // PGN SOR 1
    Route::prefix('monev/shg/input-data/pgn-sor1')->group(function () {
        Route::get('/', [StatusAssetAiSOR1Controller::class, 'index'])->name('pgn-sor1');
        Route::post('/', [StatusAssetAiSOR1Controller::class, 'store'])->name('pgn-sor1.store');
        Route::get('/data', [StatusAssetAiSOR1Controller::class, 'data'])->name('pgn-sor1.data');
        Route::put('/{id}', [StatusAssetAiSOR1Controller::class, 'update'])->name('pgn-sor1.update');
        Route::delete('/{id}', [StatusAssetAiSOR1Controller::class, 'destroy'])->name('pgn-sor1.destroy');
    });
    Route::prefix('monev/shg/input-data/mandatory-certification-sor1')->group(function () {
        Route::get('/', [MandatoryCertificationSOR1Controller::class, 'index'])->name('mandatory-certification-sor1');
        Route::post('/', [MandatoryCertificationSOR1Controller::class, 'store'])->name('mandatory-certification-sor1.store');
        Route::get('/data', [MandatoryCertificationSOR1Controller::class, 'data'])->name('mandatory-certification-sor1.data');
        Route::put('/{id}', [MandatoryCertificationSOR1Controller::class, 'update'])->name('mandatory-certification-sor1.update');
        Route::delete('/{id}', [MandatoryCertificationSOR1Controller::class, 'destroy'])->name('mandatory-certification-sor1.destroy');
    });
    Route::prefix('monev/shg/input-data/asset-breakdown-sor1')->group(function () {
        Route::get('/', [AssetBreakdownSOR1Controller::class, 'index'])->name('asset-breakdown-sor1');
        Route::post('/', [AssetBreakdownSOR1Controller::class, 'store'])->name('asset-breakdown-sor1.store');
        Route::get('/data', [AssetBreakdownSOR1Controller::class, 'data'])->name('asset-breakdown-sor1.data');
        Route::put('/{id}', [AssetBreakdownSOR1Controller::class, 'update'])->name('asset-breakdown-sor1.update');
        Route::delete('/{id}', [AssetBreakdownSOR1Controller::class, 'destroy'])->name('asset-breakdown-sor1.destroy');
    });
    Route::prefix('monev/shg/input-data/status-plo-sor1')->group(function () {
        Route::get('/', [StatusPloSOR1Controller::class, 'index'])->name('status-plo-sor1');
        Route::post('/', [StatusPloSOR1Controller::class, 'store'])->name('status-plo-sor1.store');
        Route::get('/data', [StatusPloSOR1Controller::class, 'data'])->name('status-plo-sor1.data');
        Route::put('/{id}', [StatusPloSOR1Controller::class, 'update'])->name('status-plo-sor1.update');
        Route::delete('/{id}', [StatusPloSOR1Controller::class, 'destroy'])->name('status-plo-sor1.destroy');
    });
    Route::prefix('monev/shg/input-data/kondisi-vacant-fungsi-aims-sor1')->group(function () {
        Route::get('/', [KondisiVacantAimsSOR1Controller::class, 'index'])->name('kondisi-vacant-fungsi-aims-sor1');
        Route::post('/', [KondisiVacantAimsSOR1Controller::class, 'store'])->name('kondisi-vacant-fungsi-aims-sor1.store');
        Route::get('/data', [KondisiVacantAimsSOR1Controller::class, 'data'])->name('kondisi-vacant-fungsi-aims-sor1.data');
        Route::put('/{id}', [KondisiVacantAimsSOR1Controller::class, 'update'])->name('kondisi-vacant-fungsi-aims-sor1.update');
        Route::delete('/{id}', [KondisiVacantAimsSOR1Controller::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-sor1.destroy');
    });
    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-sor1')->group(function () {
        Route::get('/', [RencanaPemeliharaanSOR1Controller::class, 'index'])->name('rencana-pemeliharaan-sor1');
        Route::post('/', [RencanaPemeliharaanSOR1Controller::class, 'store'])->name('rencana-pemeliharaan-sor1.store');
        Route::get('/data', [RencanaPemeliharaanSOR1Controller::class, 'data'])->name('rencana-pemeliharaan-sor1.data');
        Route::put('/{id}', [RencanaPemeliharaanSOR1Controller::class, 'update'])->name('rencana-pemeliharaan-sor1.update');
        Route::delete('/{id}', [RencanaPemeliharaanSOR1Controller::class, 'destroy'])->name('rencana-pemeliharaan-sor1.destroy');
    });
    Route::prefix('monev/shg/input-data/sistem-informasi-aims-sor1')->group(function () {
        Route::get('/', [SistemInformasiAimsSOR1Controller::class, 'index'])->name('sistem-informasi-aims-sor1');
        Route::post('/', [SistemInformasiAimsSOR1Controller::class, 'store'])->name('sistem-informasi-aims-sor1.store');
        Route::get('/data', [SistemInformasiAimsSOR1Controller::class, 'data'])->name('sistem-informasi-aims-sor1.data');
        Route::put('/{id}', [SistemInformasiAimsSOR1Controller::class, 'update'])->name('sistem-informasi-aims-sor1.update');
        Route::delete('/{id}', [SistemInformasiAimsSOR1Controller::class, 'destroy'])->name('sistem-informasi-aims-sor1.destroy');
    });
    Route::prefix('monev/shg/input-data/pelatihan-aims-sor1')->group(function () {
        Route::get('/', [PelatihanAimsSOR1Controller::class, 'index'])->name('pelatihan-aims-sor1');
        Route::post('/', [PelatihanAimsSOR1Controller::class, 'store'])->name('pelatihan-aims-sor1.store');
        Route::get('/data', [PelatihanAimsSOR1Controller::class, 'data'])->name('pelatihan-aims-sor1.data');
        Route::put('/{id}', [PelatihanAimsSOR1Controller::class, 'update'])->name('pelatihan-aims-sor1.update');
        Route::delete('/{id}', [PelatihanAimsSOR1Controller::class, 'destroy'])->name('pelatihan-aims-sor1.destroy');
    });
    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-sor1')->group(function () {
        Route::get('/', [RealisasiAnggaranAiSOR1Controller::class, 'index'])->name('realisasi-anggaran-ai-sor1');
        Route::post('/', [RealisasiAnggaranAISOR1Controller::class, 'store'])->name('realisasi-anggaran-ai-sor1.store');
        Route::get('/data', [RealisasiAnggaranAISOR1Controller::class, 'data'])->name('realisasi-anggaran-ai-sor1.data');
        Route::put('/{id}', [RealisasiAnggaranAISOR1Controller::class, 'update'])->name('realisasi-anggaran-ai-sor1.update');
        Route::delete('/{id}', [RealisasiAnggaranAISOR1Controller::class, 'destroy'])->name('realisasi-anggaran-ai-sor1.destroy');
    });
    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-sor1')->group(function () {
        Route::get('/', [RealisasiProgressFisikAiSOR1Controller::class, 'index'])->name('realisasi-progress-fisik-ai-sor1');
        Route::post('/', [RealisasiProgressFisikAiSOR1Controller::class, 'store'])->name('realisasi-progress-fisik-ai-sor1.store');
        Route::get('/data', [RealisasiProgressFisikAiSOR1Controller::class, 'data'])->name('realisasi-progress-fisik-ai-sor1.data');
        Route::put('/{id}', [RealisasiProgressFisikAiSOR1Controller::class, 'update'])->name('realisasi-progress-fisik-ai-sor1.update');
        Route::delete('/{id}', [RealisasiProgressFisikAiSOR1Controller::class, 'destroy'])->name('realisasi-progress-fisik-ai-sor1.destroy');
    });
    Route::prefix('monev/shg/input-data/availability-sor1')->group(function () {
        Route::get('/', [AvailabilitySOR1Controller::class, 'index'])->name('availability-sor1');
        Route::post('/', [AvailabilitySOR1Controller::class, 'store'])->name('availability-sor1.store');
        Route::get('/data', [AvailabilitySOR1Controller::class, 'data'])->name('availability-sor1.data');
        Route::put('/{id}', [AvailabilitySOR1Controller::class, 'update'])->name('availability-sor1.update');
        Route::delete('/{id}', [AvailabilitySOR1Controller::class, 'destroy'])->name('availability-sor1.destroy');
    });
    Route::prefix('monev/shg/input-data/reliability-sor1')->group(function () {
        Route::get('/', [ReliabilitySOR1Controller::class, 'index'])->name('reliability-sor1');
        Route::post('/', [ReliabilitySOR1Controller::class, 'store'])->name('reliability-sor1.store');
        Route::get('/data', [ReliabilitySOR1Controller::class, 'data'])->name('reliability-sor1.data');
        Route::put('/{id}', [ReliabilitySOR1Controller::class, 'update'])->name('reliability-sor1.update');
        Route::delete('/{id}', [ReliabilitySOR1Controller::class, 'destroy'])->name('reliability-sor1.destroy');
    });
    Route::prefix('monev/shg/input-data/air-budget-tagging-sor1')->group(function () {
        Route::get('/', [AirBudgetTaggingSOR1Controller::class, 'index'])->name('air-budget-tagging-sor1');
        Route::post('/', [AirBudgetTaggingSOR1Controller::class, 'store'])->name('air-budget-tagging-sor1.store');
        Route::get('/data', [AirBudgetTaggingSOR1Controller::class, 'data'])->name('air-budget-tagging-sor1.data');
        Route::put('/{id}', [AirBudgetTaggingSOR1Controller::class, 'update'])->name('air-budget-tagging-sor1.update');
        Route::delete('/{id}', [AirBudgetTaggingSOR1Controller::class, 'destroy'])->name('air-budget-tagging-sor1.destroy');
    });

    // PGN SOR 2
    Route::prefix('monev/shg/input-data/pgn-sor2')->group(function () {
        Route::get('/', [StatusAssetAiSOR2Controller::class, 'index'])->name('pgn-sor2');
        Route::post('/', [StatusAssetAiSOR2Controller::class, 'store'])->name('pgn-sor2.store');
        Route::get('/data', [StatusAssetAiSOR2Controller::class, 'data'])->name('pgn-sor2.data');
        Route::put('/{id}', [StatusAssetAiSOR2Controller::class, 'update'])->name('pgn-sor2.update');
        Route::delete('/{id}', [StatusAssetAiSOR2Controller::class, 'destroy'])->name('pgn-sor2.destroy');
    });
    Route::prefix('monev/shg/input-data/asset-breakdown-sor2')->group(function () {
        Route::get('/', [AssetBreakdownSOR2Controller::class, 'index'])->name('asset-breakdown-sor2');
        Route::post('/', [AssetBreakdownSOR2Controller::class, 'store'])->name('asset-breakdown-sor2.store');
        Route::get('/data', [AssetBreakdownSOR2Controller::class, 'data'])->name('asset-breakdown-sor2.data');
        Route::put('/{id}', [AssetBreakdownSOR2Controller::class, 'update'])->name('asset-breakdown-sor2.update');
        Route::delete('/{id}', [AssetBreakdownSOR2Controller::class, 'destroy'])->name('asset-breakdown-sor2.destroy');
    });
    Route::prefix('monev/shg/input-data/status-plo-sor2')->group(function () {
        Route::get('/', [StatusPloSOR2Controller::class, 'index'])->name('status-plo-sor2');
        Route::post('/', [StatusPloSOR2Controller::class, 'store'])->name('status-plo-sor2.store');
        Route::get('/data', [StatusPloSOR2Controller::class, 'data'])->name('status-plo-sor2.data');
        Route::put('/{id}', [StatusPloSOR2Controller::class, 'update'])->name('status-plo-sor2.update');
        Route::delete('/{id}', [StatusPloSOR2Controller::class, 'destroy'])->name('status-plo-sor2.destroy');
    });
    Route::prefix('monev/shg/input-data/pelatihan-aims-sor2')->group(function () {
        Route::get('/', [PelatihanAimsSOR2Controller::class, 'index'])->name('pelatihan-aims-sor2');
        Route::post('/', [PelatihanAimsSOR2Controller::class, 'store'])->name('pelatihan-aims-sor2.store');
        Route::get('/data', [PelatihanAimsSOR2Controller::class, 'data'])->name('pelatihan-aims-sor2.data');
        Route::put('/{id}', [PelatihanAimsSOR2Controller::class, 'update'])->name('pelatihan-aims-sor2.update');
        Route::delete('/{id}', [PelatihanAimsSOR2Controller::class, 'destroy'])->name('pelatihan-aims-sor2.destroy');
    });
    Route::prefix('monev/shg/input-data/mandatory-certification-sor2')->group(function () {
        Route::get('/', [MandatoryCertificationSOR2Controller::class, 'index'])->name('mandatory-certification-sor2');
        Route::post('/', [MandatoryCertificationSOR2Controller::class, 'store'])->name('mandatory-certification-sor2.store');
        Route::get('/data', [MandatoryCertificationSOR2Controller::class, 'data'])->name('mandatory-certification-sor2.data');
        Route::put('/{id}', [MandatoryCertificationSOR2Controller::class, 'update'])->name('mandatory-certification-sor2.update');
        Route::delete('/{id}', [MandatoryCertificationSOR2Controller::class, 'destroy'])->name('mandatory-certification-sor2.destroy');
    });
    Route::prefix('monev/shg/input-data/kondisi-vacant-aims-sor2')->group(function () {
        Route::get('/', [KondisiVacantAimsSOR2Controller::class, 'index'])->name('kondisi-vacant-aims-sor2');
        Route::post('/', [KondisiVacantAimsSOR2Controller::class, 'store'])->name('kondisi-vacant-aims-sor2.store');
        Route::get('/data', [KondisiVacantAimsSOR2Controller::class, 'data'])->name('kondisi-vacant-aims-sor2.data');
        Route::put('/{id}', [KondisiVacantAimsSOR2Controller::class, 'update'])->name('kondisi-vacant-aims-sor2.update');
        Route::delete('/{id}', [KondisiVacantAimsSOR2Controller::class, 'destroy'])->name('kondisi-vacant-aims-sor2.destroy');
    });
    Route::prefix('monev/shg/input-data/sistem-informasi-aims-sor2')->group(function () {
        Route::get('/', [SistemInformasiAimsSOR2Controller::class, 'index'])->name('sistem-informasi-aims-sor2');
        Route::post('/', [SistemInformasiAimsSOR2Controller::class, 'store'])->name('sistem-informasi-aims-sor2.store');
        Route::get('/data', [SistemInformasiAimsSOR2Controller::class, 'data'])->name('sistem-informasi-aims-sor2.data');
        Route::put('/{id}', [SistemInformasiAimsSOR2Controller::class, 'update'])->name('sistem-informasi-aims-sor2.update');
        Route::delete('/{id}', [SistemInformasiAimsSOR2Controller::class, 'destroy'])->name('sistem-informasi-aims-sor2.destroy');
    });
    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-sor2')->group(function () {
        Route::get('/', [RencanaPemeliharaanSOR2Controller::class, 'index'])->name('rencana-pemeliharaan-sor2');
        Route::post('/', [RencanaPemeliharaanSOR2Controller::class, 'store'])->name('rencana-pemeliharaan-sor2.store');
        Route::get('/data', [RencanaPemeliharaanSOR2Controller::class, 'data'])->name('rencana-pemeliharaan-sor2.data');
        Route::put('/{id}', [RencanaPemeliharaanSOR2Controller::class, 'update'])->name('rencana-pemeliharaan-sor2.update');
        Route::delete('/{id}', [RencanaPemeliharaanSOR2Controller::class, 'destroy'])->name('rencana-pemeliharaan-sor2.destroy');
    });
    Route::prefix('monev/shg/input-data/reliability-sor2')->group(function () {
        Route::get('/', [ReliabilitySOR2Controller::class, 'index'])->name('reliability-sor2');
        Route::post('/', [ReliabilitySOR2Controller::class, 'store'])->name('reliability-sor2.store');
        Route::get('/data', [ReliabilitySOR2Controller::class, 'data'])->name('reliability-sor2.data');
        Route::put('/{id}', [ReliabilitySOR2Controller::class, 'update'])->name('reliability-sor2.update');
        Route::delete('/{id}', [ReliabilitySOR2Controller::class, 'destroy'])->name('reliability-sor2.destroy');
    });
    Route::prefix('monev/shg/input-data/availability-sor2')->group(function () {
        Route::get('/', [AvailabilitySOR2Controller::class, 'index'])->name('availability-sor2');
        Route::post('/', [AvailabilitySOR2Controller::class, 'store'])->name('availability-sor2.store');
        Route::get('/data', [AvailabilitySOR2Controller::class, 'data'])->name('availability-sor2.data');
        Route::put('/{id}', [AvailabilitySOR2Controller::class, 'update'])->name('availability-sor2.update');
        Route::delete('/{id}', [AvailabilitySOR2Controller::class, 'destroy'])->name('availability-sor2.destroy');
    });
    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-sor2')->group(function () {
        Route::get('/', [RealisasiAnggaranAiSOR2Controller::class, 'index'])->name('realisasi-anggaran-ai-sor2');
        Route::post('/', [RealisasiAnggaranAiSOR2Controller::class, 'store'])->name('realisasi-anggaran-ai-sor2.store');
        Route::get('/data', [RealisasiAnggaranAiSOR2Controller::class, 'data'])->name('realisasi-anggaran-ai-sor2.data');
        Route::put('/{id}', [RealisasiAnggaranAiSOR2Controller::class, 'update'])->name('realisasi-anggaran-ai-sor2.update');
        Route::delete('/{id}', [RealisasiAnggaranAiSOR2Controller::class, 'destroy'])->name('realisasi-anggaran-ai-sor2.destroy');
    });
    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-sor2')->group(function () {
        Route::get('/', [RealisasiProgressAiSOR2controller::class, 'index'])->name('realisasi-progress-fisik-ai-sor2');
        Route::post('/', [RealisasiProgressAiSOR2controller::class, 'store'])->name('realisasi-progress-fisik-ai-sor2.store');
        Route::get('/data', [RealisasiProgressAiSOR2controller::class, 'data'])->name('realisasi-progress-fisik-ai-sor2.data');
        Route::put('/{id}', [RealisasiProgressAiSOR2controller::class, 'update'])->name('realisasi-progress-fisik-ai-sor2.update');
        Route::delete('/{id}', [RealisasiProgressAiSOR2controller::class, 'destroy'])->name('realisasi-progress-fisik-ai-sor2.destroy');
    });
    Route::prefix('monev/shg/input-data/air-budget-tagging-sor2')->group(function () {
        Route::get('/', [AirBudgetTaggingSOR2Controller::class, 'index'])->name('air-budget-tagging-sor2');
        Route::post('/', [AirBudgetTaggingSOR2Controller::class, 'store'])->name('air-budget-tagging-sor2.store');
        Route::get('/data', [AirBudgetTaggingSOR2Controller::class, 'data'])->name('air-budget-tagging-sor2.data');
        Route::put('/{id}', [AirBudgetTaggingSOR2Controller::class, 'update'])->name('air-budget-tagging-sor2.update');
        Route::delete('/{id}', [AirBudgetTaggingSOR2Controller::class, 'destroy'])->name('air-budget-tagging-sor2.destroy');
    });


    // PGN SOR 3
    Route::prefix('monev/shg/input-data/pgn-sor3')->group(function () {
        Route::get('/', [StatusAssetAiSOR3Controller::class, 'index'])->name('pgn-sor3');
        Route::post('/', [StatusAssetAiSOR3Controller::class, 'store'])->name('pgn-sor3.store');
        Route::get('/data', [StatusAssetAiSOR3Controller::class, 'data'])->name('pgn-sor3.data');
        Route::put('/{id}', [StatusAssetAiSOR3Controller::class, 'update'])->name('pgn-sor3.update');
        Route::delete('/{id}', [StatusAssetAiSOR3controller::class, 'destroy'])->name('pgn-sor3.destroy');
    });

    Route::prefix('monev/shg/input-data/asset-breakdown-sor3')->group(function () {
        Route::get('/', [AssetBreakdownSOR3Controller::class, 'index'])->name('asset-breakdown-sor3');
        Route::post('/', [AssetBreakdownSOR3Controller::class, 'store'])->name('asset-breakdown-sor3.store');
        Route::get('/data', [AssetBreakdownSOR3Controller::class, 'data'])->name('asset-breakdown-sor3.data');
        Route::put('/{id}', [AssetBreakdownSOR3Controller::class, 'update'])->name('asset-breakdown-sor3.update');
        Route::delete('/{id}', [AssetBreakdownSOR3controller::class, 'destroy'])->name('asset-breakdown-sor3.destroy');
    });

    Route::prefix('monev/shg/input-data/status-plo-sor3')->group(function () {
        Route::get('/', [StatusPloSOR3Controller::class, 'index'])->name('status-plo-sor3');
        Route::post('/', [StatusPloSOR3Controller::class, 'store'])->name('status-plo-sor3.store');
        Route::get('/data', [StatusPloSOR3Controller::class, 'data'])->name('status-plo-sor3.data');
        Route::put('/{id}', [StatusPloSOR3Controller::class, 'update'])->name('status-plo-sor3.update');
        Route::delete('/{id}', [StatusPloSOR3controller::class, 'destroy'])->name('status-plo-sor3.destroy');
    });

    Route::prefix('monev/shg/input-data/pelatihan-aims-sor3')->group(function () {
        Route::get('/', [PelatihanAimsSOR3Controller::class, 'index'])->name('pelatihan-aims-sor3');
        Route::post('/', [PelatihanAimsSOR3Controller::class, 'store'])->name('pelatihan-aims-sor3.store');
        Route::get('/data', [PelatihanAimsSOR3Controller::class, 'data'])->name('pelatihan-aims-sor3.data');
        Route::put('/{id}', [PelatihanAimsSOR3Controller::class, 'update'])->name('pelatihan-aims-sor3.update');
        Route::delete('/{id}', [PelatihanAimsSOR3controller::class, 'destroy'])->name('pelatihan-aims-sor3.destroy');
    });

    Route::prefix('monev/shg/input-data/mandatory-certification-sor3')->group(function () {
        Route::get('/', [MandatoryCertificationSOR3Controller::class, 'index'])->name('mandatory-certification-sor3');
        Route::post('/', [MandatoryCertificationSOR3Controller::class, 'store'])->name('mandatory-certification-sor3.store');
        Route::get('/data', [MandatoryCertificationSOR3Controller::class, 'data'])->name('mandatory-certification-sor3.data');
        Route::put('/{id}', [MandatoryCertificationSOR3Controller::class, 'update'])->name('mandatory-certification-sor3.update');
        Route::delete('/{id}', [MandatoryCertificationSOR3controller::class, 'destroy'])->name('mandatory-certification-sor3.destroy');
    });

    Route::prefix('monev/shg/input-data/kondisi-vacant-aims-sor3')->group(function () {
        Route::get('/', [KondisiVacantAimsSOR3Controller::class, 'index'])->name('kondisi-vacant-aims-sor3');
        Route::post('/', [KondisiVacantAimsSOR3Controller::class, 'store'])->name('kondisi-vacant-aims-sor3.store');
        Route::get('/data', [KondisiVacantAimsSOR3Controller::class, 'data'])->name('kondisi-vacant-aims-sor3.data');
        Route::put('/{id}', [KondisiVacantAimsSOR3Controller::class, 'update'])->name('kondisi-vacant-aims-sor3.update');
        Route::delete('/{id}', [KondisiVacantAimsSOR3controller::class, 'destroy'])->name('kondisi-vacant-aims-sor3.destroy');
    });

    Route::prefix('monev/shg/input-data/sistem-informasi-aims-sor3')->group(function () {
        Route::get('/', [SistemInformasiAimsSOR3Controller::class, 'index'])->name('sistem-informasi-aims-sor3');
        Route::post('/', [SistemInformasiAimsSOR3Controller::class, 'store'])->name('sistem-informasi-aims-sor3.store');
        Route::get('/data', [SistemInformasiAimsSOR3Controller::class, 'data'])->name('sistem-informasi-aims-sor3.data');
        Route::put('/{id}', [SistemInformasiAimsSOR3Controller::class, 'update'])->name('sistem-informasi-aims-sor3.update');
        Route::delete('/{id}', [SistemInformasiAimsSOR3controller::class, 'destroy'])->name('sistem-informasi-aims-sor3.destroy');
    });

    Route::prefix('monev/shg/input-data/rencana-pemeliharaan-sor3')->group(function () {
        Route::get('/', [RencanaPemeliharaanSOR3Controller::class, 'index'])->name('rencana-pemeliharaan-sor3');
        Route::post('/', [RencanaPemeliharaanSOR3Controller::class, 'store'])->name('rencana-pemeliharaan-sor3.store');
        Route::get('/data', [RencanaPemeliharaanSOR3Controller::class, 'data'])->name('rencana-pemeliharaan-sor3.data');
        Route::put('/{id}', [RencanaPemeliharaanSOR3Controller::class, 'update'])->name('rencana-pemeliharaan-sor3.update');
        Route::delete('/{id}', [RencanaPemeliharaanSOR3controller::class, 'destroy'])->name('rencana-pemeliharaan-sor3.destroy');
    });
    Route::prefix('monev/shg/input-data/availability-sor3')->group(function () {
        Route::get('/', [AvailabilitySOR3Controller::class, 'index'])->name('availability-sor3');
        Route::post('/', [AvailabilitySOR3Controller::class, 'store'])->name('availability-sor3.store');
        Route::get('/data', [AvailabilitySOR3Controller::class, 'data'])->name('availability-sor3.data');
        Route::put('/{id}', [AvailabilitySOR3Controller::class, 'update'])->name('availability-sor3.update');
        Route::delete('/{id}', [AvailabilitySOR3Controller::class, 'destroy'])->name('availability-sor3.destroy');
    });
    Route::prefix('monev/shg/input-data/reliability-sor3')->group(function () {
        Route::get('/', [ReliabilitySOR3Controller::class, 'index'])->name('reliability-sor3');
        Route::post('/', [ReliabilitySOR3Controller::class, 'store'])->name('reliability-sor3.store');
        Route::get('/data', [ReliabilitySOR3Controller::class, 'data'])->name('reliability-sor3.data');
        Route::put('/{id}', [ReliabilitySOR3Controller::class, 'update'])->name('reliability-sor3.update');
        Route::delete('/{id}', [ReliabilitySOR3controller::class, 'destroy'])->name('reliability-sor3.destroy');
    });

    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-sor3')->group(function () {
        Route::get('/', [RealisasiAnggaranAimsSOR3controller::class, 'index'])->name('realisasi-anggaran-ai-sor3');
        Route::post('/', [RealisasiAnggaranAimsSOR3controller::class, 'store'])->name('realisasi-anggaran-ai-sor3.store');
        Route::get('/data', [RealisasiAnggaranAimsSOR3controller::class, 'data'])->name('realisasi-anggaran-ai-sor3.data');
        Route::put('/{id}', [RealisasiAnggaranAimsSOR3controller::class, 'update'])->name('realisasi-anggaran-ai-sor3.update');
        Route::delete('/{id}', [RealisasiAnggaranAimsSOR3controller::class, 'destroy'])->name('realisasi-anggaran-ai-sor3.destroy');
    });

    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-sor3')->group(function () {
        Route::get('/', [RealisasiProgressFisikAiSOR3Controller::class, 'index'])->name('realisasi-progress-fisik-ai-sor3');
        Route::post('/', [RealisasiProgressFisikAiSOR3Controller::class, 'store'])->name('realisasi-progress-fisik-ai-sor3.store');
        Route::get('/data', [RealisasiProgressFisikAiSOR3Controller::class, 'data'])->name('realisasi-progress-fisik-ai-sor3.data');
        Route::put('/{id}', [RealisasiProgressFisikAiSOR3Controller::class, 'update'])->name('realisasi-progress-fisik-ai-sor3.update');
        Route::delete('/{id}', [RealisasiProgressFisikAiSOR3controller::class, 'destroy'])->name('realisasi-progress-fisik-ai-sor3.destroy');
    });

    Route::prefix('monev/shg/input-data/air-budget-tagging-sor3')->group(function () {
        Route::get('/', [AirBudgetTaggingSOR3Controller::class, 'index'])->name('air-budget-tagging-sor3');
        Route::post('/', [AirBudgetTaggingSOR3Controller::class, 'store'])->name('air-budget-tagging-sor3.store');
        Route::get('/data', [AirBudgetTaggingSOR3Controller::class, 'data'])->name('air-budget-tagging-sor3.data');
        Route::put('/{id}', [AirBudgetTaggingSOR3Controller::class, 'update'])->name('air-budget-tagging-sor3.update');
        Route::delete('/{id}', [AirBudgetTaggingSOR3controller::class, 'destroy'])->name('air-budget-tagging-sor3.destroy');
    });


    // PGN GLSM
    Route::prefix('monev/shg/input-data/realisasi-anggaran-ai-glsm')->group(function () {
        Route::get('/', [RealisasiAnggaranAiGlsmController::class, 'index'])->name('realisasi-anggaran-ai-glsm');
        Route::post('/', [RealisasiAnggaranAiGlsmController::class, 'store'])->name('realisasi-anggaran-ai-glsm.store');
        Route::get('/data', [RealisasiAnggaranAiGlsmController::class, 'data'])->name('realisasi-anggaran-ai-glsm.data');
        Route::put('/{id}', [RealisasiAnggaranAiGlsmController::class, 'update'])->name('realisasi-anggaran-ai-glsm.update');
        Route::delete('/{id}', [RealisasiAnggaranAiGlsmController::class, 'destroy'])->name('realisasi-anggaran-ai-glsm.destroy');
    });

    Route::prefix('monev/shg/input-data/realisasi-progress-fisik-ai-glsm')->group(function () {
        Route::get('/', [RealisasiProgressFisikAiGlsmController::class, 'index'])->name('realisasi-progress-fisik-ai-glsm');
        Route::post('/', [RealisasiProgressFisikAiGlsmController::class, 'store'])->name('realisasi-progress-fisik-ai-glsm.store');
        Route::get('/data', [RealisasiProgressFisikAiGlsmController::class, 'data'])->name('realisasi-progress-fisik-ai-glsm.data');
        Route::put('/{id}', [RealisasiProgressFisikAiGlsmController::class, 'update'])->name('realisasi-progress-fisik-ai-glsm.update');
        Route::delete('/{id}', [RealisasiProgressFisikAiGlsmController::class, 'destroy'])->name('realisasi-progress-fisik-ai-glsm.destroy');
    });

    Route::prefix('monev/shg/input-data/air-budget-tagging-glsm')->group(function () {
        Route::get('/', [AirBudgetTaggingGlsmController::class, 'index'])->name('air-budget-tagging-glsm');
        Route::post('/', [AirBudgetTaggingGlsmController::class, 'store'])->name('air-budget-tagging-glsm.store');
        Route::get('/data', [AirBudgetTaggingGlsmController::class, 'data'])->name('air-budget-tagging-glsm.data');
        Route::put('/{id}', [AirBudgetTaggingGlsmController::class, 'update'])->name('air-budget-tagging-glsm.update');
        Route::delete('/{id}', [AirBudgetTaggingGlsmController::class, 'destroy'])->name('air-budget-tagging-glsm.destroy');
    });

    // SHPNRE
    // LUMUT BALAI
    Route::prefix('monev/shpnre/input-data/lumut-balai')->group(function () {
        Route::get('/', [StatusAssetAiController::class, 'index'])->name('lumut-balai');
        Route::post('/', [StatusAssetAiController::class, 'store'])->name('lumut-balai.store');
        Route::get('/data', [StatusAssetAiController::class, 'data'])->name('lumut-balai.data');
        Route::put('/{id}', [StatusAssetAiController::class, 'update'])->name('lumut-balai.update');
        Route::delete('/{id}', [StatusAssetAiController::class, 'destroy'])->name('lumut-balai.destroy');
    });
    Route::prefix('monev/shpnre/input-data/asset-breakdown-lb')->group(function () {
        Route::get('/', [AssetBreakdownLbController::class, 'index'])->name('asset-breakdown-lb');
        Route::post('/', [AssetBreakdownLbController::class, 'store'])->name('asset-breakdown-lb.store');
        Route::get('/data', [AssetBreakdownLbController::class, 'data'])->name('asset-breakdown-lb.data');
        Route::put('/{id}', [AssetBreakdownLbController::class, 'update'])->name('asset-breakdown-lb.update');
        Route::delete('/{id}', [AssetBreakdownLbController::class, 'destroy'])->name('asset-breakdown-lb.destroy');
    });
    Route::prefix('monev/shpnre/input-data/summary-plo-lb')->group(function () {
        Route::get('/', [SummaryPloLbController::class, 'index'])->name('summary-plo-lb');
        Route::post('/', [SummaryPloLbController::class, 'store'])->name('summary-plo-lb.store');
        Route::get('/data', [SummaryPloLbController::class, 'data'])->name('summary-plo-lb.data');
        Route::put('/{id}', [SummaryPloLbController::class, 'update'])->name('summary-plo-lb.update');
        Route::delete('/{id}', [SummaryPloLbController::class, 'destroy'])->name('summary-plo-lb.destroy');
    });
    Route::prefix('monev/shpnre/input-data/kondisi-vacant-aims-lb')->group(function () {
        Route::get('/', [KondisiVacantAimsLbController::class, 'index'])->name('kondisi-vacant-aims-lb');
        Route::post('/', [KondisiVacantAimsLbController::class, 'store'])->name('kondisi-vacant-aims-lb.store');
        Route::get('/data', [KondisiVacantAimsLbController::class, 'data'])->name('kondisi-vacant-aims-lb.data');
        Route::put('/{id}', [KondisiVacantAimsLbController::class, 'update'])->name('kondisi-vacant-aims-lb.update');
        Route::delete('/{id}', [KondisiVacantAimsLbController::class, 'destroy'])->name('kondisi-vacant-aims-lb.destroy');
    });
    Route::prefix('monev/shpnre/input-data/pelatihan-aims-lb')->group(function () {
        Route::get('/', [PelatihanAimsLbController::class, 'index'])->name('pelatihan-aims-lb');
        Route::post('/', [PelatihanAimsLbController::class, 'store'])->name('pelatihan-aims-lb.store');
        Route::get('/data', [PelatihanAimsLbController::class, 'data'])->name('pelatihan-aims-lb.data');
        Route::put('/{id}', [PelatihanAimsLbController::class, 'update'])->name('pelatihan-aims-lb.update');
        Route::delete('/{id}', [PelatihanAimsLbController::class, 'destroy'])->name('pelatihan-aims-lb.destroy');
    });
    Route::prefix('monev/shpnre/input-data/rencana-pemeliharaan-lb')->group(function () {
        Route::get('/', [RencanaPemeliharaanLbController::class, 'index'])->name('rencana-pemeliharaan-lb');
        Route::post('/', [RencanaPemeliharaanLbController::class, 'store'])->name('rencana-pemeliharaan-lb.store');
        Route::get('/data', [RencanaPemeliharaanLbController::class, 'data'])->name('rencana-pemeliharaan-lb.data');
        Route::put('/{id}', [RencanaPemeliharaanLbController::class, 'update'])->name('rencana-pemeliharaan-lb.update');
        Route::delete('/{id}', [RencanaPemeliharaanLbController::class, 'destroy'])->name('rencana-pemeliharaan-lb.destroy');
    });
    Route::prefix('monev/shpnre/input-data/mandatory-certification-lb')->group(function () {
        Route::get('/', [MandatoryCertificationLbController::class, 'index'])->name('mandatory-certification-lb');
        Route::post('/', [MandatoryCertificationLbController::class, 'store'])->name('mandatory-certification-lb.store');
        Route::get('/data', [MandatoryCertificationLbController::class, 'data'])->name('mandatory-certification-lb.data');
        Route::put('/{id}', [MandatoryCertificationLbController::class, 'update'])->name('mandatory-certification-lb.update');
        Route::delete('/{id}', [MandatoryCertificationLbController::class, 'destroy'])->name('mandatory-certification-lb.destroy');
    });
    Route::prefix('monev/shpnre/input-data/real-anggaran-ai-lb')->group(function () {
        Route::get('/', [RealAnggaranAiLbController::class, 'index'])->name('real-anggaran-ai-lb');
        Route::post('/', [RealAnggaranAiLbController::class, 'store'])->name('real-anggaran-ai-lb.store');
        Route::get('/data', [RealAnggaranAiLbController::class, 'data'])->name('real-anggaran-ai-lb.data');
        Route::put('/{id}', [RealAnggaranAiLbController::class, 'update'])->name('real-anggaran-ai-lb.update');
        Route::delete('/{id}', [RealAnggaranAiLbController::class, 'destroy'])->name('real-anggaran-ai-lb.destroy');
    });
    Route::prefix('monev/shpnre/input-data/real-anggaran-figure-lb')->group(function () {
        Route::get('/', [RealAnggaranFigureLbController::class, 'index'])->name('real-anggaran-figure-lb');
        Route::post('/', [RealAnggaranFigureLbController::class, 'store'])->name('real-anggaran-figure-lb.store');
        Route::get('/data', [RealAnggaranFigureLbController::class, 'data'])->name('real-anggaran-figure-lb.data');
        Route::put('/{id}', [RealAnggaranFigureLbController::class, 'update'])->name('real-anggaran-figure-lb.update');
        Route::delete('/{id}', [RealAnggaranFigureLbController::class, 'destroy'])->name('real-anggaran-figure-lb.destroy');
    });
    Route::prefix('monev/shpnre/input-data/real-prog-fisik-ai-lb')->group(function () {
        Route::get('/', [RealProgFisikAiLbController::class, 'index'])->name('real-prog-fisik-ai-lb');
        Route::post('/', [RealProgFisikAiLbController::class, 'store'])->name('real-prog-fisik-ai-lb.store');
        Route::get('/data', [RealProgFisikAiLbController::class, 'data'])->name('real-prog-fisik-ai-lb.data');
        Route::put('/{id}', [RealProgFisikAiLbController::class, 'update'])->name('real-prog-fisik-ai-lb.update');
        Route::delete('/{id}', [RealProgFisikAiLbController::class, 'destroy'])->name('real-prog-fisik-ai-lb.destroy');
    });
    Route::prefix('monev/shpnre/input-data/sistem-informasi-aims-lb')->group(function () {
        Route::get('/', [SistemInformasiLbController::class, 'index'])->name('sistem-informasi-aims-lb');
        Route::post('/', [SistemInformasiLbController::class, 'store'])->name('sistem-informasi-aims-lb.store');
        Route::get('/data', [SistemInformasiLbController::class, 'data'])->name('sistem-informasi-aims-lb.data');
        Route::put('/{id}', [SistemInformasiLbController::class, 'update'])->name('sistem-informasi-aims-lb.update');
        Route::delete('/{id}', [SistemInformasiLbController::class, 'destroy'])->name('sistem-informasi-aims-lb.destroy');
    });
    Route::prefix('monev/shpnre/input-data/availability-lb')->group(function () {
        Route::get('/', [AvailabilityLbController::class, 'index'])->name('availability-lb');
        Route::post('/', [AvailabilityLbController::class, 'store'])->name('availability-lb.store');
        Route::get('/data', [AvailabilityLbController::class, 'data'])->name('availability-lb.data');
        Route::put('/{id}', [AvailabilityLbController::class, 'update'])->name('availability-lb.update');
        Route::delete('/{id}', [AvailabilityLbController::class, 'destroy'])->name('availability-lb.destroy');
    });

    // Lahendong
    // SummaryPloLahendong
    Route::prefix('monev/shpnre/input-data/summary-plo-lahendong')->group(function () {
        Route::get('/', [SummaryPloLahendongController::class, 'index'])->name('summary-plo-lahendong');
        Route::post('/', [SummaryPloLahendongController::class, 'store'])->name('summary-plo-lahendong.store');
        Route::get('/data', [SummaryPloLahendongController::class, 'data'])->name('summary-plo-lahendong.data');
        Route::put('/{id}', [SummaryPloLahendongController::class, 'update'])->name('summary-plo-lahendong.update');
        Route::delete('/{id}', [SummaryPloLahendongController::class, 'destroy'])->name('summary-plo-lahendong.destroy');
    });

    // StatusAssetAiLahendong
    Route::prefix('monev/shpnre/input-data/lahendong')->group(function () {
        Route::get('/', [StatusAssetAiLahendongController::class, 'index'])->name('lahendong');
        Route::post('/', [StatusAssetAiLahendongController::class, 'store'])->name('lahendong.store');
        Route::get('/data', [StatusAssetAiLahendongController::class, 'data'])->name('lahendong.data');
        Route::put('/{id}', [StatusAssetAiLahendongController::class, 'update'])->name('lahendong.update');
        Route::delete('/{id}', [StatusAssetAiLahendongController::class, 'destroy'])->name('lahendong.destroy');
    });

    // SistemInformasiAimsLahendong
    Route::prefix('monev/shpnre/input-data/sistem-informasi-aims-lahendong')->group(function () {
        Route::get('/', [SistemInformasiAimsLahendongController::class, 'index'])->name('sistem-informasi-aims-lahendong');
        Route::post('/', [SistemInformasiAimsLahendongController::class, 'store'])->name('sistem-informasi-aims-lahendong.store');
        Route::get('/data', [SistemInformasiAimsLahendongController::class, 'data'])->name('sistem-informasi-aims-lahendong.data');
        Route::put('/{id}', [SistemInformasiAimsLahendongController::class, 'update'])->name('sistem-informasi-aims-lahendong.update');
        Route::delete('/{id}', [SistemInformasiAimsLahendongController::class, 'destroy'])->name('sistem-informasi-aims-lahendong.destroy');
    });

    // RencanaPemeliharaanLahendong
    Route::prefix('monev/shpnre/input-data/rencana-pemeliharaan-lahendong')->group(function () {
        Route::get('/', [RencanaPemeliharaanLahendongController::class, 'index'])->name('rencana-pemeliharaan-lahendong');
        Route::post('/', [RencanaPemeliharaanLahendongController::class, 'store'])->name('rencana-pemeliharaan-lahendong.store');
        Route::get('/data', [RencanaPemeliharaanLahendongController::class, 'data'])->name('rencana-pemeliharaan-lahendong.data');
        Route::put('/{id}', [RencanaPemeliharaanLahendongController::class, 'update'])->name('rencana-pemeliharaan-lahendong.update');
        Route::delete('/{id}', [RencanaPemeliharaanLahendongController::class, 'destroy'])->name('rencana-pemeliharaan-lahendong.destroy');
    });

    // RealProgFisikAiLahendong
    Route::prefix('monev/shpnre/input-data/realisasi-prog-fisik-lahendong')->group(function () {
        Route::get('/', [RealProgFisikAiLahendongController::class, 'index'])->name('realisasi-prog-fisik-lahendong');
        Route::post('/', [RealProgFisikAiLahendongController::class, 'store'])->name('realisasi-prog-fisik-lahendong.store');
        Route::get('/data', [RealProgFisikAiLahendongController::class, 'data'])->name('realisasi-prog-fisik-lahendong.data');
        Route::put('/{id}', [RealProgFisikAiLahendongController::class, 'update'])->name('realisasi-prog-fisik-lahendong.update');
        Route::delete('/{id}', [RealProgFisikAiLahendongController::class, 'destroy'])->name('realisasi-prog-fisik-lahendong.destroy');
    });

    // RealAnggaranFigureLahendong
    Route::prefix('monev/shpnre/input-data/real-anggaran-figure-lahendong')->group(function () {
        Route::get('/', [RealAnggaranFigureLahendongController::class, 'index'])->name('real-anggaran-figure-lahendong');
        Route::post('/', [RealAnggaranFigureLahendongController::class, 'store'])->name('real-anggaran-figure-lahendong.store');
        Route::get('/data', [RealAnggaranFigureLahendongController::class, 'data'])->name('real-anggaran-figure-lahendong.data');
        Route::put('/{id}', [RealAnggaranFigureLahendongController::class, 'update'])->name('real-anggaran-figure-lahendong.update');
        Route::delete('/{id}', [RealAnggaranFigureLahendongController::class, 'destroy'])->name('real-anggaran-figure-lahendong.destroy');
    });

    // RealAnggaranAiLahendong
    Route::prefix('monev/shpnre/input-data/real-anggaran-ai-lahendong')->group(function () {
        Route::get('/', [RealAnggaranAiLahendongController::class, 'index'])->name('real-anggaran-ai-lahendong');
        Route::post('/', [RealAnggaranAiLahendongController::class, 'store'])->name('real-anggaran-ai-lahendong.store');
        Route::get('/data', [RealAnggaranAiLahendongController::class, 'data'])->name('real-anggaran-ai-lahendong.data');
        Route::put('/{id}', [RealAnggaranAiLahendongController::class, 'update'])->name('real-anggaran-ai-lahendong.update');
        Route::delete('/{id}', [RealAnggaranAiLahendongController::class, 'destroy'])->name('real-anggaran-ai-lahendong.destroy');
    });

    // PelatihanAimsLahendong
    Route::prefix('monev/shpnre/input-data/pelatihan-aims-lahendong')->group(function () {
        Route::get('/', [PelatihanAimsLahendongController::class, 'index'])->name('pelatihan-aims-lahendong');
        Route::post('/', [PelatihanAimsLahendongController::class, 'store'])->name('pelatihan-aims-lahendong.store');
        Route::get('/data', [PelatihanAimsLahendongController::class, 'data'])->name('pelatihan-aims-lahendong.data');
        Route::put('/{id}', [PelatihanAimsLahendongController::class, 'update'])->name('pelatihan-aims-lahendong.update');
        Route::delete('/{id}', [PelatihanAimsLahendongController::class, 'destroy'])->name('pelatihan-aims-lahendong.destroy');
    });

    // MandatoryCertificationLahendong
    Route::prefix('monev/shpnre/input-data/mandatory-certification-lahendong')->group(function () {
        Route::get('/', [MandatoryCertificationLahendongController::class, 'index'])->name('mandatory-certification-lahendong');
        Route::post('/', [MandatoryCertificationLahendongController::class, 'store'])->name('mandatory-certification-lahendong.store');
        Route::get('/data', [MandatoryCertificationLahendongController::class, 'data'])->name('mandatory-certification-lahendong.data');
        Route::put('/{id}', [MandatoryCertificationLahendongController::class, 'update'])->name('mandatory-certification-lahendong.update');
        Route::delete('/{id}', [MandatoryCertificationLahendongController::class, 'destroy'])->name('mandatory-certification-lahendong.destroy');
    });

    // KondisiVacantAimsLahendong
    Route::prefix('monev/shpnre/input-data/kondisi-vacant-aims-lahendong')->group(function () {
        Route::get('/', [KondisiVacantAimsLahendongController::class, 'index'])->name('kondisi-vacant-aims-lahendong');
        Route::post('/', [KondisiVacantAimsLahendongController::class, 'store'])->name('kondisi-vacant-aims-lahendong.store');
        Route::get('/data', [KondisiVacantAimsLahendongController::class, 'data'])->name('kondisi-vacant-aims-lahendong.data');
        Route::put('/{id}', [KondisiVacantAimsLahendongController::class, 'update'])->name('kondisi-vacant-aims-lahendong.update');
        Route::delete('/{id}', [KondisiVacantAimsLahendongController::class, 'destroy'])->name('kondisi-vacant-aims-lahendong.destroy');
    });

    // AvailabilityLahendong
    Route::prefix('monev/shpnre/input-data/availability-lahendong')->group(function () {
        Route::get('/', [AvailabilityLahendongController::class, 'index'])->name('availability-lahendong');
        Route::post('/', [AvailabilityLahendongController::class, 'store'])->name('availability-lahendong.store');
        Route::get('/data', [AvailabilityLahendongController::class, 'data'])->name('availability-lahendong.data');
        Route::put('/{id}', [AvailabilityLahendongController::class, 'update'])->name('availability-lahendong.update');
        Route::delete('/{id}', [AvailabilityLahendongController::class, 'destroy'])->name('availability-lahendong.destroy');
    });

    // AssetBreakdownLahendong
    Route::prefix('monev/shpnre/input-data/asset-breakdown-lahendong')->group(function () {
        Route::get('/', [AssetBreakdownLahendongController::class, 'index'])->name('asset-breakdown-lahendong');
        Route::post('/', [AssetBreakdownLahendongController::class, 'store'])->name('asset-breakdown-lahendong.store');
        Route::get('/data', [AssetBreakdownLahendongController::class, 'data'])->name('asset-breakdown-lahendong.data');
        Route::put('/{id}', [AssetBreakdownLahendongController::class, 'update'])->name('asset-breakdown-lahendong.update');
        Route::delete('/{id}', [AssetBreakdownLahendongController::class, 'destroy'])->name('asset-breakdown-lahendong.destroy');
    });

    // Karaha
    // AssetBreakDownKaraha
    Route::prefix('monev/shpnre/input-data/asset-breakdown-karaha')->group(function () {
        Route::get('/', [AssetBreakDownKarahaController::class, 'index'])->name('asset-breakdown-karaha');
        Route::post('/', [AssetBreakDownKarahaController::class, 'store'])->name('asset-breakdown-karaha.store');
        Route::get('/data', [AssetBreakDownKarahaController::class, 'data'])->name('asset-breakdown-karaha.data');
        Route::put('/{id}', [AssetBreakDownKarahaController::class, 'update'])->name('asset-breakdown-karaha.update');
        Route::delete('/{id}', [AssetBreakDownKarahaController::class, 'destroy'])->name('asset-breakdown-karaha.destroy');
    });

    // AvailabilityKaraha
    Route::prefix('monev/shpnre/input-data/availability-karaha')->group(function () {
        Route::get('/', [AvailabilityKarahaController::class, 'index'])->name('availability-karaha');
        Route::post('/', [AvailabilityKarahaController::class, 'store'])->name('availability-karaha.store');
        Route::get('/data', [AvailabilityKarahaController::class, 'data'])->name('availability-karaha.data');
        Route::put('/{id}', [AvailabilityKarahaController::class, 'update'])->name('availability-karaha.update');
        Route::delete('/{id}', [AvailabilityKarahaController::class, 'destroy'])->name('availability-karaha.destroy');
    });

    // MandatoryCertificationKaraha
    Route::prefix('monev/shpnre/input-data/mandatory-certification-karaha')->group(function () {
        Route::get('/', [MandatoryCertificationKarahaController::class, 'index'])->name('mandatory-certification-karaha');
        Route::post('/', [MandatoryCertificationKarahaController::class, 'store'])->name('mandatory-certification-karaha.store');
        Route::get('/data', [MandatoryCertificationKarahaController::class, 'data'])->name('mandatory-certification-karaha.data');
        Route::put('/{id}', [MandatoryCertificationKarahaController::class, 'update'])->name('mandatory-certification-karaha.update');
        Route::delete('/{id}', [MandatoryCertificationKarahaController::class, 'destroy'])->name('mandatory-certification-karaha.destroy');
    });

    // PelatihanAimsKaraha
    Route::prefix('monev/shpnre/input-data/pelatihan-aims-karaha')->group(function () {
        Route::get('/', [PelatihanAimsKarahaController::class, 'index'])->name('pelatihan-aims-karaha');
        Route::post('/', [PelatihanAimsKarahaController::class, 'store'])->name('pelatihan-aims-karaha.store');
        Route::get('/data', [PelatihanAimsKarahaController::class, 'data'])->name('pelatihan-aims-karaha.data');
        Route::put('/{id}', [PelatihanAimsKarahaController::class, 'update'])->name('pelatihan-aims-karaha.update');
        Route::delete('/{id}', [PelatihanAimsKarahaController::class, 'destroy'])->name('pelatihan-aims-karaha.destroy');
    });

    // RealAnggaranAiKaraha
    Route::prefix('monev/shpnre/input-data/real-anggaran-ai-karaha')->group(function () {
        Route::get('/', [RealAnggaranAiKarahaController::class, 'index'])->name('real-anggaran-ai-karaha');
        Route::post('/', [RealAnggaranAiKarahaController::class, 'store'])->name('real-anggaran-ai-karaha.store');
        Route::get('/data', [RealAnggaranAiKarahaController::class, 'data'])->name('real-anggaran-ai-karaha.data');
        Route::put('/{id}', [RealAnggaranAiKarahaController::class, 'update'])->name('real-anggaran-ai-karaha.update');
        Route::delete('/{id}', [RealAnggaranAiKarahaController::class, 'destroy'])->name('real-anggaran-ai-karaha.destroy');
    });

    // RealAnggaranFigureKaraha
    Route::prefix('monev/shpnre/input-data/real-anggaran-figure-karaha')->group(function () {
        Route::get('/', [RealAnggaranFigureKarahaController::class, 'index'])->name('real-anggaran-figure-karaha');
        Route::post('/', [RealAnggaranFigureKarahaController::class, 'store'])->name('real-anggaran-figure-karaha.store');
        Route::get('/data', [RealAnggaranFigureKarahaController::class, 'data'])->name('real-anggaran-figure-karaha.data');
        Route::put('/{id}', [RealAnggaranFigureKarahaController::class, 'update'])->name('real-anggaran-figure-karaha.update');
        Route::delete('/{id}', [RealAnggaranFigureKarahaController::class, 'destroy'])->name('real-anggaran-figure-karaha.destroy');
    });

    // RealProgFisikAiKaraha
    Route::prefix('monev/shpnre/input-data/real-prog-fisik-karaha')->group(function () {
        Route::get('/', [RealProgFisikAiKarahaController::class, 'index'])->name('real-prog-fisik-karaha');
        Route::post('/', [RealProgFisikAiKarahaController::class, 'store'])->name('real-prog-fisik-karaha.store');
        Route::get('/data', [RealProgFisikAiKarahaController::class, 'data'])->name('real-prog-fisik-karaha.data');
        Route::put('/{id}', [RealProgFisikAiKarahaController::class, 'update'])->name('real-prog-fisik-karaha.update');
        Route::delete('/{id}', [RealProgFisikAiKarahaController::class, 'destroy'])->name('real-prog-fisik-karaha.destroy');
    });

    // RencanaPemeliharaanKaraha
    Route::prefix('monev/shpnre/input-data/rencana-pemeliharaan-karaha')->group(function () {
        Route::get('/', [RencanaPemeliharaanKarahaController::class, 'index'])->name('rencana-pemeliharaan-karaha');
        Route::post('/', [RencanaPemeliharaanKarahaController::class, 'store'])->name('rencana-pemeliharaan-karaha.store');
        Route::get('/data', [RencanaPemeliharaanKarahaController::class, 'data'])->name('rencana-pemeliharaan-karaha.data');
        Route::put('/{id}', [RencanaPemeliharaanKarahaController::class, 'update'])->name('rencana-pemeliharaan-karaha.update');
        Route::delete('/{id}', [RencanaPemeliharaanKarahaController::class, 'destroy'])->name('rencana-pemeliharaan-karaha.destroy');
    });

    // SistemInformasiAimsKaraha
    Route::prefix('monev/shpnre/input-data/sistem-informasi-aims-karaha')->group(function () {
        Route::get('/', [SistemInformasiAimsKarahaController::class, 'index'])->name('sistem-informasi-aims-karaha');
        Route::post('/', [SistemInformasiAimsKarahaController::class, 'store'])->name('sistem-informasi-aims-karaha.store');
        Route::get('/data', [SistemInformasiAimsKarahaController::class, 'data'])->name('sistem-informasi-aims-karaha.data');
        Route::put('/{id}', [SistemInformasiAimsKarahaController::class, 'update'])->name('sistem-informasi-aims-karaha.update');
        Route::delete('/{id}', [SistemInformasiAimsKarahaController::class, 'destroy'])->name('sistem-informasi-aims-karaha.destroy');
    });

    // StatusAssetAiKaraha
    Route::prefix('monev/shpnre/input-data/karaha')->group(function () {
        Route::get('/', [StatusAssetAiKarahaController::class, 'index'])->name('karaha');
        Route::post('/', [StatusAssetAiKarahaController::class, 'store'])->name('karaha.store');
        Route::get('/data', [StatusAssetAiKarahaController::class, 'data'])->name('karaha.data');
        Route::put('/{id}', [StatusAssetAiKarahaController::class, 'update'])->name('karaha.update');
        Route::delete('/{id}', [StatusAssetAiKarahaController::class, 'destroy'])->name('karaha.destroy');
    });

    // SummaryPloKaraha
    Route::prefix('monev/shpnre/input-data/summary-plo-karaha')->group(function () {
        Route::get('/', [SummaryPloKarahaController::class, 'index'])->name('summary-plo-karaha');
        Route::post('/', [SummaryPloKarahaController::class, 'store'])->name('summary-plo-karaha.store');
        Route::get('/data', [SummaryPloKarahaController::class, 'data'])->name('summary-plo-karaha.data');
        Route::put('/{id}', [SummaryPloKarahaController::class, 'update'])->name('summary-plo-karaha.update');
        Route::delete('/{id}', [SummaryPloKarahaController::class, 'destroy'])->name('summary-plo-karaha.destroy');
    });
    // KondisiVacantAimsKaraha
    Route::prefix('monev/shpnre/input-data/kondisi-vacant-aims-karaha')->group(function () {
        Route::get('/', [KondisiVacantAimsKarahaController::class, 'index'])->name('kondisi-vacant-aims-karaha');
        Route::post('/', [KondisiVacantAimsKarahaController::class, 'store'])->name('kondisi-vacant-aims-karaha.store');
        Route::get('/data', [KondisiVacantAimsKarahaController::class, 'data'])->name('kondisi-vacant-aims-karaha.data');
        Route::put('/{id}', [KondisiVacantAimsKarahaController::class, 'update'])->name('kondisi-vacant-aims-karaha.update');
        Route::delete('/{id}', [KondisiVacantAimsKarahaController::class, 'destroy'])->name('kondisi-vacant-aims-karaha.destroy');
    });

    // Kamojang
    // AssetBreakdownKamojang
    Route::prefix('monev/shpnre/input-data/asset-breakdown-kamojang')->group(function () {
        Route::get('/', [AssetBreakdownKamojangController::class, 'index'])->name('asset-breakdown-kamojang');
        Route::post('/', [AssetBreakdownKamojangController::class, 'store'])->name('asset-breakdown-kamojang.store');
        Route::get('/data', [AssetBreakdownKamojangController::class, 'data'])->name('asset-breakdown-kamojang.data');
        Route::put('/{id}', [AssetBreakdownKamojangController::class, 'update'])->name('asset-breakdown-kamojang.update');
        Route::delete('/{id}', [AssetBreakdownKamojangController::class, 'destroy'])->name('asset-breakdown-kamojang.destroy');
    });

    // AvailabilityKamojang
    Route::prefix('monev/shpnre/input-data/availability-kamojang')->group(function () {
        Route::get('/', [AvailabilityKamojangController::class, 'index'])->name('availability-kamojang');
        Route::post('/', [AvailabilityKamojangController::class, 'store'])->name('availability-kamojang.store');
        Route::get('/data', [AvailabilityKamojangController::class, 'data'])->name('availability-kamojang.data');
        Route::put('/{id}', [AvailabilityKamojangController::class, 'update'])->name('availability-kamojang.update');
        Route::delete('/{id}', [AvailabilityKamojangController::class, 'destroy'])->name('availability-kamojang.destroy');
    });

    // KondisiVacantAimsKamojang
    Route::prefix('monev/shpnre/input-data/kondisi-vacant-aims-kamojang')->group(function () {
        Route::get('/', [KondisiVacantAimsKamojangController::class, 'index'])->name('kondisi-vacant-aims-kamojang');
        Route::post('/', [KondisiVacantAimsKamojangController::class, 'store'])->name('kondisi-vacant-aims-kamojang.store');
        Route::get('/data', [KondisiVacantAimsKamojangController::class, 'data'])->name('kondisi-vacant-aims-kamojang.data');
        Route::put('/{id}', [KondisiVacantAimsKamojangController::class, 'update'])->name('kondisi-vacant-aims-kamojang.update');
        Route::delete('/{id}', [KondisiVacantAimsKamojangController::class, 'destroy'])->name('kondisi-vacant-aims-kamojang.destroy');
    });

    // MandatoryCertificationKamojang
    Route::prefix('monev/shpnre/input-data/mandatory-certification-kamojang')->group(function () {
        Route::get('/', [MandatoryCertificationKamojangController::class, 'index'])->name('mandatory-certification-kamojang');
        Route::post('/', [MandatoryCertificationKamojangController::class, 'store'])->name('mandatory-certification-kamojang.store');
        Route::get('/data', [MandatoryCertificationKamojangController::class, 'data'])->name('mandatory-certification-kamojang.data');
        Route::put('/{id}', [MandatoryCertificationKamojangController::class, 'update'])->name('mandatory-certification-kamojang.update');
        Route::delete('/{id}', [MandatoryCertificationKamojangController::class, 'destroy'])->name('mandatory-certification-kamojang.destroy');
    });

    // RealAnggaranAiKamojang
    Route::prefix('monev/shpnre/input-data/real-anggaran-ai-kamojang')->group(function () {
        Route::get('/', [RealAnggaranAiKamojangController::class, 'index'])->name('real-anggaran-ai-kamojang');
        Route::post('/', [RealAnggaranAiKamojangController::class, 'store'])->name('real-anggaran-ai-kamojang.store');
        Route::get('/data', [RealAnggaranAiKamojangController::class, 'data'])->name('real-anggaran-ai-kamojang.data');
        Route::put('/{id}', [RealAnggaranAiKamojangController::class, 'update'])->name('real-anggaran-ai-kamojang.update');
        Route::delete('/{id}', [RealAnggaranAiKamojangController::class, 'destroy'])->name('real-anggaran-ai-kamojang.destroy');
    });

    // RealAnggaranFigureKamojang
    Route::prefix('monev/shpnre/input-data/real-anggaran-figure-kamojang')->group(function () {
        Route::get('/', [RealAnggaranFigureKamojangController::class, 'index'])->name('real-anggaran-figure-kamojang');
        Route::post('/', [RealAnggaranFigureKamojangController::class, 'store'])->name('real-anggaran-figure-kamojang.store');
        Route::get('/data', [RealAnggaranFigureKamojangController::class, 'data'])->name('real-anggaran-figure-kamojang.data');
        Route::put('/{id}', [RealAnggaranFigureKamojangController::class, 'update'])->name('real-anggaran-figure-kamojang.update');
        Route::delete('/{id}', [RealAnggaranFigureKamojangController::class, 'destroy'])->name('real-anggaran-figure-kamojang.destroy');
    });

    // RealProgFisikAiKamojang
    Route::prefix('monev/shpnre/input-data/real-prog-fisik-kamojang')->group(function () {
        Route::get('/', [RealProgFisikAiKamojangController::class, 'index'])->name('real-prog-fisik-kamojang');
        Route::post('/', [RealProgFisikAiKamojangController::class, 'store'])->name('real-prog-fisik-kamojang.store');
        Route::get('/data', [RealProgFisikAiKamojangController::class, 'data'])->name('real-prog-fisik-kamojang.data');
        Route::put('/{id}', [RealProgFisikAiKamojangController::class, 'update'])->name('real-prog-fisik-kamojang.update');
        Route::delete('/{id}', [RealProgFisikAiKamojangController::class, 'destroy'])->name('real-prog-fisik-kamojang.destroy');
    });

    // RencanaPemeliharaanKamojang
    Route::prefix('monev/shpnre/input-data/rencana-pemeliharaan-kamojang')->group(function () {
        Route::get('/', [RencanaPemeliharaanKamojangController::class, 'index'])->name('rencana-pemeliharaan-kamojang');
        Route::post('/', [RencanaPemeliharaanKamojangController::class, 'store'])->name('rencana-pemeliharaan-kamojang.store');
        Route::get('/data', [RencanaPemeliharaanKamojangController::class, 'data'])->name('rencana-pemeliharaan-kamojang.data');
        Route::put('/{id}', [RencanaPemeliharaanKamojangController::class, 'update'])->name('rencana-pemeliharaan-kamojang.update');
        Route::delete('/{id}', [RencanaPemeliharaanKamojangController::class, 'destroy'])->name('rencana-pemeliharaan-kamojang.destroy');
    });

    // SistemInformasiAimsKamojang
    Route::prefix('monev/shpnre/input-data/sistem-informasi-aims-kamojang')->group(function () {
        Route::get('/', [SistemInformasiAimsKamojangController::class, 'index'])->name('sistem-informasi-aims-kamojang');
        Route::post('/', [SistemInformasiAimsKamojangController::class, 'store'])->name('sistem-informasi-aims-kamojang.store');
        Route::get('/data', [SistemInformasiAimsKamojangController::class, 'data'])->name('sistem-informasi-aims-kamojang.data');
        Route::put('/{id}', [SistemInformasiAimsKamojangController::class, 'update'])->name('sistem-informasi-aims-kamojang.update');
        Route::delete('/{id}', [SistemInformasiAimsKamojangController::class, 'destroy'])->name('sistem-informasi-aims-kamojang.destroy');
    });

    // StatusAssetAiKamojang
    Route::prefix('monev/shpnre/input-data/kamojang')->group(function () {
        Route::get('/', [StatusAssetAiKamojangController::class, 'index'])->name('kamojang');
        Route::post('/', [StatusAssetAiKamojangController::class, 'store'])->name('kamojang.store');
        Route::get('/data', [StatusAssetAiKamojangController::class, 'data'])->name('kamojang.data');
        Route::put('/{id}', [StatusAssetAiKamojangController::class, 'update'])->name('kamojang.update');
        Route::delete('/{id}', [StatusAssetAiKamojangController::class, 'destroy'])->name('kamojang.destroy');
    });

    // SummaryploKamojang
    Route::prefix('monev/shpnre/input-data/summary-plo-kamojang')->group(function () {
        Route::get('/', [SummaryploKamojangController::class, 'index'])->name('summary-plo-kamojang');
        Route::post('/', [SummaryploKamojangController::class, 'store'])->name('summary-plo-kamojang.store');
        Route::get('/data', [SummaryploKamojangController::class, 'data'])->name('summary-plo-kamojang.data');
        Route::put('/{id}', [SummaryploKamojangController::class, 'update'])->name('summary-plo-kamojang.update');
        Route::delete('/{id}', [SummaryploKamojangController::class, 'destroy'])->name('summary-plo-kamojang.destroy');
    });

    // PelatihanAimsKamojang
    Route::prefix('monev/shpnre/input-data/pelatihan-aims-kamojang')->group(function () {
        Route::get('/', [PelatihanAimsKamojangController::class, 'index'])->name('pelatihan-aims-kamojang');
        Route::post('/', [PelatihanAimsKamojangController::class, 'store'])->name('pelatihan-aims-kamojang.store');
        Route::get('/data', [PelatihanAimsKamojangController::class, 'data'])->name('pelatihan-aims-kamojang.data');
        Route::put('/{id}', [PelatihanAimsKamojangController::class, 'update'])->name('pelatihan-aims-kamojang.update');
        Route::delete('/{id}', [PelatihanAimsKamojangController::class, 'destroy'])->name('pelatihan-aims-kamojang.destroy');
    });
    // SapAssetKamojang
    Route::prefix('monev/shpnre/input-data/sap-asset-kamojang')->group(function () {
        Route::get('/', [SapAssetKamojangController::class, 'index'])->name('sap-asset-kamojang');
        Route::post('/', [SapAssetKamojangController::class, 'store'])->name('sap-asset-kamojang.store');
        Route::get('/data', [SapAssetKamojangController::class, 'data'])->name('sap-asset-kamojang.data');
        Route::put('/{id}', [SapAssetKamojangController::class, 'update'])->name('sap-asset-kamojang.update');
        Route::delete('/{id}', [SapAssetKamojangController::class, 'destroy'])->name('sap-asset-kamojang.destroy');
    });

    // AssetBreakdownUlubelu
    Route::prefix('monev/shpnre/input-data/asset-breakdown-ulubelu')->group(function () {
        Route::get('/', [AssetBreakdownUlubeluController::class, 'index'])->name('asset-breakdown-ulubelu');
        Route::post('/', [AssetBreakdownUlubeluController::class, 'store'])->name('asset-breakdown-ulubelu.store');
        Route::get('/data', [AssetBreakdownUlubeluController::class, 'data'])->name('asset-breakdown-ulubelu.data');
        Route::put('/{id}', [AssetBreakdownUlubeluController::class, 'update'])->name('asset-breakdown-ulubelu.update');
        Route::delete('/{id}', [AssetBreakdownUlubeluController::class, 'destroy'])->name('asset-breakdown-ulubelu.destroy');
    });

    // AvailabilityUlubelu
    Route::prefix('monev/shpnre/input-data/availability-ulubelu')->group(function () {
        Route::get('/', [AvailabilityUlubeluController::class, 'index'])->name('availability-ulubelu');
        Route::post('/', [AvailabilityUlubeluController::class, 'store'])->name('availability-ulubelu.store');
        Route::get('/data', [AvailabilityUlubeluController::class, 'data'])->name('availability-ulubelu.data');
        Route::put('/{id}', [AvailabilityUlubeluController::class, 'update'])->name('availability-ulubelu.update');
        Route::delete('/{id}', [AvailabilityUlubeluController::class, 'destroy'])->name('availability-ulubelu.destroy');
    });

    // KondisiVacantaimsUlubelu
    Route::prefix('monev/shpnre/input-data/kondisi-vacant-aims-ulubelu')->group(function () {
        Route::get('/', [KondisiVacantaimsUlubeluController::class, 'index'])->name('kondisi-vacant-aims-ulubelu');
        Route::post('/', [KondisiVacantaimsUlubeluController::class, 'store'])->name('kondisi-vacant-aims-ulubelu.store');
        Route::get('/data', [KondisiVacantaimsUlubeluController::class, 'data'])->name('kondisi-vacant-aims-ulubelu.data');
        Route::put('/{id}', [KondisiVacantaimsUlubeluController::class, 'update'])->name('kondisi-vacant-aims-ulubelu.update');
        Route::delete('/{id}', [KondisiVacantaimsUlubeluController::class, 'destroy'])->name('kondisi-vacant-aims-ulubelu.destroy');
    });

    // MandatoryCertificationUlubelu
    Route::prefix('monev/shpnre/input-data/mandatory-certification-ulubelu')->group(function () {
        Route::get('/', [MandatoryCertificationUlubeluController::class, 'index'])->name('mandatory-certification-ulubelu');
        Route::post('/', [MandatoryCertificationUlubeluController::class, 'store'])->name('mandatory-certification-ulubelu.store');
        Route::get('/data', [MandatoryCertificationUlubeluController::class, 'data'])->name('mandatory-certification-ulubelu.data');
        Route::put('/{id}', [MandatoryCertificationUlubeluController::class, 'update'])->name('mandatory-certification-ulubelu.update');
        Route::delete('/{id}', [MandatoryCertificationUlubeluController::class, 'destroy'])->name('mandatory-certification-ulubelu.destroy');
    });

    // PelatihanAimsUlubelu
    Route::prefix('monev/shpnre/input-data/pelatihan-aims-ulubelu')->group(function () {
        Route::get('/', [PelatihanAimsUlubeluController::class, 'index'])->name('pelatihan-aims-ulubelu');
        Route::post('/', [PelatihanAimsUlubeluController::class, 'store'])->name('pelatihan-aims-ulubelu.store');
        Route::get('/data', [PelatihanAimsUlubeluController::class, 'data'])->name('pelatihan-aims-ulubelu.data');
        Route::put('/{id}', [PelatihanAimsUlubeluController::class, 'update'])->name('pelatihan-aims-ulubelu.update');
        Route::delete('/{id}', [PelatihanAimsUlubeluController::class, 'destroy'])->name('pelatihan-aims-ulubelu.destroy');
    });

    // RealAnggaranAiUlubelu
    Route::prefix('monev/shpnre/input-data/real-anggaran-ai-ulubelu')->group(function () {
        Route::get('/', [RealAnggaranAiUlubeluController::class, 'index'])->name('real-anggaran-ai-ulubelu');
        Route::post('/', [RealAnggaranAiUlubeluController::class, 'store'])->name('real-anggaran-ai-ulubelu.store');
        Route::get('/data', [RealAnggaranAiUlubeluController::class, 'data'])->name('real-anggaran-ai-ulubelu.data');
        Route::put('/{id}', [RealAnggaranAiUlubeluController::class, 'update'])->name('real-anggaran-ai-ulubelu.update');
        Route::delete('/{id}', [RealAnggaranAiUlubeluController::class, 'destroy'])->name('real-anggaran-ai-ulubelu.destroy');
    });

    // RealAnggaranFigureUlubelu
    Route::prefix('monev/shpnre/input-data/real-anggaran-figure-ulubelu')->group(function () {
        Route::get('/', [RealAnggaranFigureUlubeluController::class, 'index'])->name('real-anggaran-figure-ulubelu');
        Route::post('/', [RealAnggaranFigureUlubeluController::class, 'store'])->name('real-anggaran-figure-ulubelu.store');
        Route::get('/data', [RealAnggaranFigureUlubeluController::class, 'data'])->name('real-anggaran-figure-ulubelu.data');
        Route::put('/{id}', [RealAnggaranFigureUlubeluController::class, 'update'])->name('real-anggaran-figure-ulubelu.update');
        Route::delete('/{id}', [RealAnggaranFigureUlubeluController::class, 'destroy'])->name('real-anggaran-figure-ulubelu.destroy');
    });

    // RealProgFisikAiUlubelu
    Route::prefix('monev/shpnre/input-data/real-prog-fisik-ulubelu')->group(function () {
        Route::get('/', [RealProgFisikAiUlubeluController::class, 'index'])->name('real-prog-fisik-ulubelu');
        Route::post('/', [RealProgFisikAiUlubeluController::class, 'store'])->name('real-prog-fisik-ulubelu.store');
        Route::get('/data', [RealProgFisikAiUlubeluController::class, 'data'])->name('real-prog-fisik-ulubelu.data');
        Route::put('/{id}', [RealProgFisikAiUlubeluController::class, 'update'])->name('real-prog-fisik-ulubelu.update');
        Route::delete('/{id}', [RealProgFisikAiUlubeluController::class, 'destroy'])->name('real-prog-fisik-ulubelu.destroy');
    });

    // RencanaPemeliharaanUlubelu
    Route::prefix('monev/shpnre/input-data/rencana-pemeliharaan-ulubelu')->group(function () {
        Route::get('/', [RencanaPemeliharaanUlubeluController::class, 'index'])->name('rencana-pemeliharaan-ulubelu');
        Route::post('/', [RencanaPemeliharaanUlubeluController::class, 'store'])->name('rencana-pemeliharaan-ulubelu.store');
        Route::get('/data', [RencanaPemeliharaanUlubeluController::class, 'data'])->name('rencana-pemeliharaan-ulubelu.data');
        Route::put('/{id}', [RencanaPemeliharaanUlubeluController::class, 'update'])->name('rencana-pemeliharaan-ulubelu.update');
        Route::delete('/{id}', [RencanaPemeliharaanUlubeluController::class, 'destroy'])->name('rencana-pemeliharaan-ulubelu.destroy');
    });

    // SapAssetUlubelu
    Route::prefix('monev/shpnre/input-data/sap-asset-ulubelu')->group(function () {
        Route::get('/', [SapAssetUlubeluController::class, 'index'])->name('sap-asset-ulubelu');
        Route::post('/', [SapAssetUlubeluController::class, 'store'])->name('sap-asset-ulubelu.store');
        Route::get('/data', [SapAssetUlubeluController::class, 'data'])->name('sap-asset-ulubelu.data');
        Route::put('/{id}', [SapAssetUlubeluController::class, 'update'])->name('sap-asset-ulubelu.update');
        Route::delete('/{id}', [SapAssetUlubeluController::class, 'destroy'])->name('sap-asset-ulubelu.destroy');
    });

    // SistemInformasiAimsUlubelu
    Route::prefix('monev/shpnre/input-data/sistem-informasi-aims-ulubelu')->group(function () {
        Route::get('/', [SistemInformasiAimsUlubeluController::class, 'index'])->name('sistem-informasi-aims-ulubelu');
        Route::post('/', [SistemInformasiAimsUlubeluController::class, 'store'])->name('sistem-informasi-aims-ulubelu.store');
        Route::get('/data', [SistemInformasiAimsUlubeluController::class, 'data'])->name('sistem-informasi-aims-ulubelu.data');
        Route::put('/{id}', [SistemInformasiAimsUlubeluController::class, 'update'])->name('sistem-informasi-aims-ulubelu.update');
        Route::delete('/{id}', [SistemInformasiAimsUlubeluController::class, 'destroy'])->name('sistem-informasi-aims-ulubelu.destroy');
    });

    // StatusAssetAiUlubelu
    Route::prefix('monev/shpnre/input-data/ulubelu')->group(function () {
        Route::get('/', [StatusAssetAiUlubeluController::class, 'index'])->name('ulubelu');
        Route::post('/', [StatusAssetAiUlubeluController::class, 'store'])->name('ulubelu.store');
        Route::get('/data', [StatusAssetAiUlubeluController::class, 'data'])->name('ulubelu.data');
        Route::put('/{id}', [StatusAssetAiUlubeluController::class, 'update'])->name('ulubelu.update');
        Route::delete('/{id}', [StatusAssetAiUlubeluController::class, 'destroy'])->name('ulubelu.destroy');
    });

    // SummaryPloUlubelu
    Route::prefix('monev/shpnre/input-data/summary-plo-ulubelu')->group(function () {
        Route::get('/', [SummaryPloUlubeluController::class, 'index'])->name('summary-plo-ulubelu');
        Route::post('/', [SummaryPloUlubeluController::class, 'store'])->name('summary-plo-ulubelu.store');
        Route::get('/data', [SummaryPloUlubeluController::class, 'data'])->name('summary-plo-ulubelu.data');
        Route::put('/{id}', [SummaryPloUlubeluController::class, 'update'])->name('summary-plo-ulubelu.update');
        Route::delete('/{id}', [SummaryPloUlubeluController::class, 'destroy'])->name('summary-plo-ulubelu.destroy');
    });

    // PPI
    // AssetBreakdownPPIController
    Route::prefix('monev/shpnre/input-data/asset-breakdown-ppi')->group(function () {
        Route::get('/', [AssetBreakdownPPIController::class, 'index'])->name('asset-breakdown-ppi');
        Route::post('/', [AssetBreakdownPPIController::class, 'store'])->name('asset-breakdown-ppi.store');
        Route::get('/data', [AssetBreakdownPPIController::class, 'data'])->name('asset-breakdown-ppi.data');
        Route::put('/{id}', [AssetBreakdownPPIController::class, 'update'])->name('asset-breakdown-ppi.update');
        Route::delete('/{id}', [AssetBreakdownPPIController::class, 'destroy'])->name('asset-breakdown-ppi.destroy');
    });

    // AvailabilityPPIController
    Route::prefix('monev/shpnre/input-data/availability-ppi')->group(function () {
        Route::get('/', [AvailabilityPPIController::class, 'index'])->name('availability-ppi');
        Route::post('/', [AvailabilityPPIController::class, 'store'])->name('availability-ppi.store');
        Route::get('/data', [AvailabilityPPIController::class, 'data'])->name('availability-ppi.data');
        Route::put('/{id}', [AvailabilityPPIController::class, 'update'])->name('availability-ppi.update');
        Route::delete('/{id}', [AvailabilityPPIController::class, 'destroy'])->name('availability-ppi.destroy');
    });

    // KondisiVacantAimsPPIController
    Route::prefix('monev/shpnre/input-data/kondisi-vacant-aims-ppi')->group(function () {
        Route::get('/', [KondisiVacantAimsPPIController::class, 'index'])->name('kondisi-vacant-aims-ppi');
        Route::post('/', [KondisiVacantAimsPPIController::class, 'store'])->name('kondisi-vacant-aims-ppi.store');
        Route::get('/data', [KondisiVacantAimsPPIController::class, 'data'])->name('kondisi-vacant-aims-ppi.data');
        Route::put('/{id}', [KondisiVacantAimsPPIController::class, 'update'])->name('kondisi-vacant-aims-ppi.update');
        Route::delete('/{id}', [KondisiVacantAimsPPIController::class, 'destroy'])->name('kondisi-vacant-aims-ppi.destroy');
    });

    // MandatoryCertificationPPIController
    Route::prefix('monev/shpnre/input-data/mandatory-certification-ppi')->group(function () {
        Route::get('/', [MandatoryCertificationPPIController::class, 'index'])->name('mandatory-certification-ppi');
        Route::post('/', [MandatoryCertificationPPIController::class, 'store'])->name('mandatory-certification-ppi.store');
        Route::get('/data', [MandatoryCertificationPPIController::class, 'data'])->name('mandatory-certification-ppi.data');
        Route::put('/{id}', [MandatoryCertificationPPIController::class, 'update'])->name('mandatory-certification-ppi.update');
        Route::delete('/{id}', [MandatoryCertificationPPIController::class, 'destroy'])->name('mandatory-certification-ppi.destroy');
    });

    // PelatihanAimsPPIController
    Route::prefix('monev/shpnre/input-data/pelatihan-aims-ppi')->group(function () {
        Route::get('/', [PelatihanAimsPPIController::class, 'index'])->name('pelatihan-aims-ppi');
        Route::post('/', [PelatihanAimsPPIController::class, 'store'])->name('pelatihan-aims-ppi.store');
        Route::get('/data', [PelatihanAimsPPIController::class, 'data'])->name('pelatihan-aims-ppi.data');
        Route::put('/{id}', [PelatihanAimsPPIController::class, 'update'])->name('pelatihan-aims-ppi.update');
        Route::delete('/{id}', [PelatihanAimsPPIController::class, 'destroy'])->name('pelatihan-aims-ppi.destroy');
    });

    // RealAnggaranAiPPIController
    Route::prefix('monev/shpnre/input-data/real-anggaran-ai-ppi')->group(function () {
        Route::get('/', [RealAnggaranAiPPIController::class, 'index'])->name('real-anggaran-ai-ppi');
        Route::post('/', [RealAnggaranAiPPIController::class, 'store'])->name('real-anggaran-ai-ppi.store');
        Route::get('/data', [RealAnggaranAiPPIController::class, 'data'])->name('real-anggaran-ai-ppi.data');
        Route::put('/{id}', [RealAnggaranAiPPIController::class, 'update'])->name('real-anggaran-ai-ppi.update');
        Route::delete('/{id}', [RealAnggaranAiPPIController::class, 'destroy'])->name('real-anggaran-ai-ppi.destroy');
    });

    // RealAnggaranFigurePPIController
    Route::prefix('monev/shpnre/input-data/real-anggaran-figure-ppi')->group(function () {
        Route::get('/', [RealAnggaranFigurePPIController::class, 'index'])->name('real-anggaran-figure-ppi');
        Route::post('/', [RealAnggaranFigurePPIController::class, 'store'])->name('real-anggaran-figure-ppi.store');
        Route::get('/data', [RealAnggaranFigurePPIController::class, 'data'])->name('real-anggaran-figure-ppi.data');
        Route::put('/{id}', [RealAnggaranFigurePPIController::class, 'update'])->name('real-anggaran-figure-ppi.update');
        Route::delete('/{id}', [RealAnggaranFigurePPIController::class, 'destroy'])->name('real-anggaran-figure-ppi.destroy');
    });

    // RealProgFisikAiPPIController
    Route::prefix('monev/shpnre/input-data/real-prog-fisik-ppi')->group(function () {
        Route::get('/', [RealProgFisikAiPPIController::class, 'index'])->name('real-prog-fisik-ppi');
        Route::post('/', [RealProgFisikAiPPIController::class, 'store'])->name('real-prog-fisik-ppi.store');
        Route::get('/data', [RealProgFisikAiPPIController::class, 'data'])->name('real-prog-fisik-ppi.data');
        Route::put('/{id}', [RealProgFisikAiPPIController::class, 'update'])->name('real-prog-fisik-ppi.update');
        Route::delete('/{id}', [RealProgFisikAiPPIController::class, 'destroy'])->name('real-prog-fisik-ppi.destroy');
    });

    // RencanaPemeliharaanPPIController
    Route::prefix('monev/shpnre/input-data/rencana-pemeliharaan-ppi')->group(function () {
        Route::get('/', [RencanaPemeliharaanPPIController::class, 'index'])->name('rencana-pemeliharaan-ppi');
        Route::post('/', [RencanaPemeliharaanPPIController::class, 'store'])->name('rencana-pemeliharaan-ppi.store');
        Route::get('/data', [RencanaPemeliharaanPPIController::class, 'data'])->name('rencana-pemeliharaan-ppi.data');
        Route::put('/{id}', [RencanaPemeliharaanPPIController::class, 'update'])->name('rencana-pemeliharaan-ppi.update');
        Route::delete('/{id}', [RencanaPemeliharaanPPIController::class, 'destroy'])->name('rencana-pemeliharaan-ppi.destroy');
    });

    // StatusAssetAiPPIController
    Route::prefix('monev/shpnre/input-data/ppi')->group(function () {
        Route::get('/', [StatusAssetAiPPIController::class, 'index'])->name('ppi');
        Route::post('/', [StatusAssetAiPPIController::class, 'store'])->name('ppi.store');
        Route::get('/data', [StatusAssetAiPPIController::class, 'data'])->name('ppi.data');
        Route::put('/{id}', [StatusAssetAiPPIController::class, 'update'])->name('ppi.update');
        Route::delete('/{id}', [StatusAssetAiPPIController::class, 'destroy'])->name('ppi.destroy');
    });

    // SummaryPloPPIController
    Route::prefix('monev/shpnre/input-data/summary-plo-ppi')->group(function () {
        Route::get('/', [SummaryPloPPIController::class, 'index'])->name('summary-plo-ppi');
        Route::post('/', [SummaryPloPPIController::class, 'store'])->name('summary-plo-ppi.store');
        Route::get('/data', [SummaryPloPPIController::class, 'data'])->name('summary-plo-ppi.data');
        Route::put('/{id}', [SummaryPloPPIController::class, 'update'])->name('summary-plo-ppi.update');
        Route::delete('/{id}', [SummaryPloPPIController::class, 'destroy'])->name('summary-plo-ppi.destroy');
    });

    // SistemInformasiAimsPPIController
    Route::prefix('monev/shpnre/input-data/sistem-informasi-aims-ppi')->group(function () {
        Route::get('/', [SistemInformasiAimsPPIController::class, 'index'])->name('sistem-informasi-aims-ppi');
        Route::post('/', [SistemInformasiAimsPPIController::class, 'store'])->name('sistem-informasi-aims-ppi.store');
        Route::get('/data', [SistemInformasiAimsPPIController::class, 'data'])->name('sistem-informasi-aims-ppi.data');
        Route::put('/{id}', [SistemInformasiAimsPPIController::class, 'update'])->name('sistem-informasi-aims-ppi.update');
        Route::delete('/{id}', [SistemInformasiAimsPPIController::class, 'destroy'])->name('sistem-informasi-aims-ppi.destroy');
    });

    // Jawa 1 Regas
    // AssetBreakdownJawa1RegasController
    Route::prefix('monev/shpnre/input-data/asset-breakdown-jawa1regas')->group(function () {
        Route::get('/', [AssetBreakdownJawa1RegasController::class, 'index'])->name('asset-breakdown-jawa1regas');
        Route::post('/', [AssetBreakdownJawa1RegasController::class, 'store'])->name('asset-breakdown-jawa1regas.store');
        Route::get('/data', [AssetBreakdownJawa1RegasController::class, 'data'])->name('asset-breakdown-jawa1regas.data');
        Route::put('/{id}', [AssetBreakdownJawa1RegasController::class, 'update'])->name('asset-breakdown-jawa1regas.update');
        Route::delete('/{id}', [AssetBreakdownJawa1RegasController::class, 'destroy'])->name('asset-breakdown-jawa1regas.destroy');
    });

    // AvailabilityJawa1RegasController
    Route::prefix('monev/shpnre/input-data/availability-jawa1regas')->group(function () {
        Route::get('/', [AvailabilityJawa1RegasController::class, 'index'])->name('availability-jawa1regas');
        Route::post('/', [AvailabilityJawa1RegasController::class, 'store'])->name('availability-jawa1regas.store');
        Route::get('/data', [AvailabilityJawa1RegasController::class, 'data'])->name('availability-jawa1regas.data');
        Route::put('/{id}', [AvailabilityJawa1RegasController::class, 'update'])->name('availability-jawa1regas.update');
        Route::delete('/{id}', [AvailabilityJawa1RegasController::class, 'destroy'])->name('availability-jawa1regas.destroy');
    });

    // KondisiVacantAimsJawa1RegasController
    Route::prefix('monev/shpnre/input-data/kondisi-vacant-aims-jawa1regas')->group(function () {
        Route::get('/', [KondisiVacantAimsJawa1RegasController::class, 'index'])->name('kondisi-vacant-aims-jawa1regas');
        Route::post('/', [KondisiVacantAimsJawa1RegasController::class, 'store'])->name('kondisi-vacant-aims-jawa1regas.store');
        Route::get('/data', [KondisiVacantAimsJawa1RegasController::class, 'data'])->name('kondisi-vacant-aims-jawa1regas.data');
        Route::put('/{id}', [KondisiVacantAimsJawa1RegasController::class, 'update'])->name('kondisi-vacant-aims-jawa1regas.update');
        Route::delete('/{id}', [KondisiVacantAimsJawa1RegasController::class, 'destroy'])->name('kondisi-vacant-aims-jawa1regas.destroy');
    });

    // MandatoryCertificationJawa1RegasController
    Route::prefix('monev/shpnre/input-data/mandatory-certification-jawa1regas')->group(function () {
        Route::get('/', [MandatoryCertificationJawa1RegasController::class, 'index'])->name('mandatory-certification-jawa1regas');
        Route::post('/', [MandatoryCertificationJawa1RegasController::class, 'store'])->name('mandatory-certification-jawa1regas.store');
        Route::get('/data', [MandatoryCertificationJawa1RegasController::class, 'data'])->name('mandatory-certification-jawa1regas.data');
        Route::put('/{id}', [MandatoryCertificationJawa1RegasController::class, 'update'])->name('mandatory-certification-jawa1regas.update');
        Route::delete('/{id}', [MandatoryCertificationJawa1RegasController::class, 'destroy'])->name('mandatory-certification-jawa1regas.destroy');
    });

    // PelatihanAimsJawa1RegasController
    Route::prefix('monev/shpnre/input-data/pelatihan-aims-jawa1regas')->group(function () {
        Route::get('/', [PelatihanAimsJawa1RegasController::class, 'index'])->name('pelatihan-aims-jawa1regas');
        Route::post('/', [PelatihanAimsJawa1RegasController::class, 'store'])->name('pelatihan-aims-jawa1regas.store');
        Route::get('/data', [PelatihanAimsJawa1RegasController::class, 'data'])->name('pelatihan-aims-jawa1regas.data');
        Route::put('/{id}', [PelatihanAimsJawa1RegasController::class, 'update'])->name('pelatihan-aims-jawa1regas.update');
        Route::delete('/{id}', [PelatihanAimsJawa1RegasController::class, 'destroy'])->name('pelatihan-aims-jawa1regas.destroy');
    });

    // RealAnggaranAiJawa1RegasController
    Route::prefix('monev/shpnre/input-data/real-anggaran-ai-jawa1regas')->group(function () {
        Route::get('/', [RealAnggaranAiJawa1RegasController::class, 'index'])->name('real-anggaran-ai-jawa1regas');
        Route::post('/', [RealAnggaranAiJawa1RegasController::class, 'store'])->name('real-anggaran-ai-jawa1regas.store');
        Route::get('/data', [RealAnggaranAiJawa1RegasController::class, 'data'])->name('real-anggaran-ai-jawa1regas.data');
        Route::put('/{id}', [RealAnggaranAiJawa1RegasController::class, 'update'])->name('real-anggaran-ai-jawa1regas.update');
        Route::delete('/{id}', [RealAnggaranAiJawa1RegasController::class, 'destroy'])->name('real-anggaran-ai-jawa1regas.destroy');
    });

    // RealAnggaranFigureJawa1RegasController
    Route::prefix('monev/shpnre/input-data/real-anggaran-figure-jawa1regas')->group(function () {
        Route::get('/', [RealAnggaranFigureJawa1RegasController::class, 'index'])->name('real-anggaran-figure-jawa1regas');
        Route::post('/', [RealAnggaranFigureJawa1RegasController::class, 'store'])->name('real-anggaran-figure-jawa1regas.store');
        Route::get('/data', [RealAnggaranFigureJawa1RegasController::class, 'data'])->name('real-anggaran-figure-jawa1regas.data');
        Route::put('/{id}', [RealAnggaranFigureJawa1RegasController::class, 'update'])->name('real-anggaran-figure-jawa1regas.update');
        Route::delete('/{id}', [RealAnggaranFigureJawa1RegasController::class, 'destroy'])->name('real-anggaran-figure-jawa1regas.destroy');
    });

    // RealProgFisikAiJawa1RegasController
    Route::prefix('monev/shpnre/input-data/real-prog-fisik-jawa1regas')->group(function () {
        Route::get('/', [RealProgFisikAiJawa1RegasController::class, 'index'])->name('real-prog-fisik-jawa1regas');
        Route::post('/', [RealProgFisikAiJawa1RegasController::class, 'store'])->name('real-prog-fisik-jawa1regas.store');
        Route::get('/data', [RealProgFisikAiJawa1RegasController::class, 'data'])->name('real-prog-fisik-jawa1regas.data');
        Route::put('/{id}', [RealProgFisikAiJawa1RegasController::class, 'update'])->name('real-prog-fisik-jawa1regas.update');
        Route::delete('/{id}', [RealProgFisikAiJawa1RegasController::class, 'destroy'])->name('real-prog-fisik-jawa1regas.destroy');
    });

    // RencanaPemeliharaanJawa1RegasController
    Route::prefix('monev/shpnre/input-data/rencana-pemeliharaan-jawa1regas')->group(function () {
        Route::get('/', [RencanaPemeliharaanJawa1RegasController::class, 'index'])->name('rencana-pemeliharaan-jawa1regas');
        Route::post('/', [RencanaPemeliharaanJawa1RegasController::class, 'store'])->name('rencana-pemeliharaan-jawa1regas.store');
        Route::get('/data', [RencanaPemeliharaanJawa1RegasController::class, 'data'])->name('rencana-pemeliharaan-jawa1regas.data');
        Route::put('/{id}', [RencanaPemeliharaanJawa1RegasController::class, 'update'])->name('rencana-pemeliharaan-jawa1regas.update');
        Route::delete('/{id}', [RencanaPemeliharaanJawa1RegasController::class, 'destroy'])->name('rencana-pemeliharaan-jawa1regas.destroy');
    });

    // SistemInformasiAimsJawa1RegasController
    Route::prefix('monev/shpnre/input-data/sistem-informasi-aims-jawa1regas')->group(function () {
        Route::get('/', [SistemInformasiAimsJawa1RegasController::class, 'index'])->name('sistem-informasi-aims-jawa1regas');
        Route::post('/', [SistemInformasiAimsJawa1RegasController::class, 'store'])->name('sistem-informasi-aims-jawa1regas.store');
        Route::get('/data', [SistemInformasiAimsJawa1RegasController::class, 'data'])->name('sistem-informasi-aims-jawa1regas.data');
        Route::put('/{id}', [SistemInformasiAimsJawa1RegasController::class, 'update'])->name('sistem-informasi-aims-jawa1regas.update');
        Route::delete('/{id}', [SistemInformasiAimsJawa1RegasController::class, 'destroy'])->name('sistem-informasi-aims-jawa1regas.destroy');
    });

    // StatusAssetAiJawa1RegasController
    Route::prefix('monev/shpnre/input-data/jawa1regas')->group(function () {
        Route::get('/', [StatusAssetAiJawa1RegasController::class, 'index'])->name('jawa1regas');
        Route::post('/', [StatusAssetAiJawa1RegasController::class, 'store'])->name('jawa1regas.store');
        Route::get('/data', [StatusAssetAiJawa1RegasController::class, 'data'])->name('jawa1regas.data');
        Route::put('/{id}', [StatusAssetAiJawa1RegasController::class, 'update'])->name('jawa1regas.update');
        Route::delete('/{id}', [StatusAssetAiJawa1RegasController::class, 'destroy'])->name('jawa1regas.destroy');
    });

    // SummaryPloJawa1RegasController
    Route::prefix('monev/shpnre/input-data/summary-plo-jawa1regas')->group(function () {
        Route::get('/', [SummaryPloJawa1RegasController::class, 'index'])->name('summary-plo-jawa1regas');
        Route::post('/', [SummaryPloJawa1RegasController::class, 'store'])->name('summary-plo-jawa1regas.store');
        Route::get('/data', [SummaryPloJawa1RegasController::class, 'data'])->name('summary-plo-jawa1regas.data');
        Route::put('/{id}', [SummaryPloJawa1RegasController::class, 'update'])->name('summary-plo-jawa1regas.update');
        Route::delete('/{id}', [SummaryPloJawa1RegasController::class, 'destroy'])->name('summary-plo-jawa1regas.destroy');
    });

    // Jawa 1 Power
    // AssetBreakdownJawa1PowerController
    Route::prefix('monev/shpnre/input-data/asset-breakdown-jawa1power')->group(function () {
        Route::get('/', [AssetBreakdownJawa1PowerController::class, 'index'])->name('asset-breakdown-jawa1power');
        Route::post('/', [AssetBreakdownJawa1PowerController::class, 'store'])->name('asset-breakdown-jawa1power.store');
        Route::get('/data', [AssetBreakdownJawa1PowerController::class, 'data'])->name('asset-breakdown-jawa1power.data');
        Route::put('/{id}', [AssetBreakdownJawa1PowerController::class, 'update'])->name('asset-breakdown-jawa1power.update');
        Route::delete('/{id}', [AssetBreakdownJawa1PowerController::class, 'destroy'])->name('asset-breakdown-jawa1power.destroy');
    });

    // AvailabilityJawa1PowerController
    Route::prefix('monev/shpnre/input-data/availability-jawa1power')->group(function () {
        Route::get('/', [AvailabilityJawa1PowerController::class, 'index'])->name('availability-jawa1power');
        Route::post('/', [AvailabilityJawa1PowerController::class, 'store'])->name('availability-jawa1power.store');
        Route::get('/data', [AvailabilityJawa1PowerController::class, 'data'])->name('availability-jawa1power.data');
        Route::put('/{id}', [AvailabilityJawa1PowerController::class, 'update'])->name('availability-jawa1power.update');
        Route::delete('/{id}', [AvailabilityJawa1PowerController::class, 'destroy'])->name('availability-jawa1power.destroy');
    });

    // KondisiVacantAimsJawa1PowerController
    Route::prefix('monev/shpnre/input-data/kondisi-vacant-aims-jawa1power')->group(function () {
        Route::get('/', [KondisiVacantAimsJawa1PowerController::class, 'index'])->name('kondisi-vacant-aims-jawa1power');
        Route::post('/', [KondisiVacantAimsJawa1PowerController::class, 'store'])->name('kondisi-vacant-aims-jawa1power.store');
        Route::get('/data', [KondisiVacantAimsJawa1PowerController::class, 'data'])->name('kondisi-vacant-aims-jawa1power.data');
        Route::put('/{id}', [KondisiVacantAimsJawa1PowerController::class, 'update'])->name('kondisi-vacant-aims-jawa1power.update');
        Route::delete('/{id}', [KondisiVacantAimsJawa1PowerController::class, 'destroy'])->name('kondisi-vacant-aims-jawa1power.destroy');
    });

    // MandatoryCertificationJawa1PowerController
    Route::prefix('monev/shpnre/input-data/mandatory-certification-jawa1power')->group(function () {
        Route::get('/', [MandatoryCertificationJawa1PowerController::class, 'index'])->name('mandatory-certification-jawa1power');
        Route::post('/', [MandatoryCertificationJawa1PowerController::class, 'store'])->name('mandatory-certification-jawa1power.store');
        Route::get('/data', [MandatoryCertificationJawa1PowerController::class, 'data'])->name('mandatory-certification-jawa1power.data');
        Route::put('/{id}', [MandatoryCertificationJawa1PowerController::class, 'update'])->name('mandatory-certification-jawa1power.update');
        Route::delete('/{id}', [MandatoryCertificationJawa1PowerController::class, 'destroy'])->name('mandatory-certification-jawa1power.destroy');
    });

    // PelatihanAimsJawa1PowerController
    Route::prefix('monev/shpnre/input-data/pelatihan-aims-jawa1power')->group(function () {
        Route::get('/', [PelatihanAimsJawa1PowerController::class, 'index'])->name('pelatihan-aims-jawa1power');
        Route::post('/', [PelatihanAimsJawa1PowerController::class, 'store'])->name('pelatihan-aims-jawa1power.store');
        Route::get('/data', [PelatihanAimsJawa1PowerController::class, 'data'])->name('pelatihan-aims-jawa1power.data');
        Route::put('/{id}', [PelatihanAimsJawa1PowerController::class, 'update'])->name('pelatihan-aims-jawa1power.update');
        Route::delete('/{id}', [PelatihanAimsJawa1PowerController::class, 'destroy'])->name('pelatihan-aims-jawa1power.destroy');
    });

    // RealAnggaranAiJawa1PowerController
    Route::prefix('monev/shpnre/input-data/real-anggaran-ai-jawa1power')->group(function () {
        Route::get('/', [RealAnggaranAiJawa1PowerController::class, 'index'])->name('real-anggaran-ai-jawa1power');
        Route::post('/', [RealAnggaranAiJawa1PowerController::class, 'store'])->name('real-anggaran-ai-jawa1power.store');
        Route::get('/data', [RealAnggaranAiJawa1PowerController::class, 'data'])->name('real-anggaran-ai-jawa1power.data');
        Route::put('/{id}', [RealAnggaranAiJawa1PowerController::class, 'update'])->name('real-anggaran-ai-jawa1power.update');
        Route::delete('/{id}', [RealAnggaranAiJawa1PowerController::class, 'destroy'])->name('real-anggaran-ai-jawa1power.destroy');
    });

    // RealAnggaranFigureJawa1PowerController
    Route::prefix('monev/shpnre/input-data/real-anggaran-figure-jawa1power')->group(function () {
        Route::get('/', [RealAnggaranFigureJawa1PowerController::class, 'index'])->name('real-anggaran-figure-jawa1power');
        Route::post('/', [RealAnggaranFigureJawa1PowerController::class, 'store'])->name('real-anggaran-figure-jawa1power.store');
        Route::get('/data', [RealAnggaranFigureJawa1PowerController::class, 'data'])->name('real-anggaran-figure-jawa1power.data');
        Route::put('/{id}', [RealAnggaranFigureJawa1PowerController::class, 'update'])->name('real-anggaran-figure-jawa1power.update');
        Route::delete('/{id}', [RealAnggaranFigureJawa1PowerController::class, 'destroy'])->name('real-anggaran-figure-jawa1power.destroy');
    });

    // RealProgFisikAiJawa1PowerController
    Route::prefix('monev/shpnre/input-data/real-prog-fisik-jawa1power')->group(function () {
        Route::get('/', [RealProgFisikAiJawa1PowerController::class, 'index'])->name('real-prog-fisik-jawa1power');
        Route::post('/', [RealProgFisikAiJawa1PowerController::class, 'store'])->name('real-prog-fisik-jawa1power.store');
        Route::get('/data', [RealProgFisikAiJawa1PowerController::class, 'data'])->name('real-prog-fisik-jawa1power.data');
        Route::put('/{id}', [RealProgFisikAiJawa1PowerController::class, 'update'])->name('real-prog-fisik-jawa1power.update');
        Route::delete('/{id}', [RealProgFisikAiJawa1PowerController::class, 'destroy'])->name('real-prog-fisik-jawa1power.destroy');
    });

    // RencanaPemeliharaanJawa1PowerController
    Route::prefix('monev/shpnre/input-data/rencana-pemeliharaan-jawa1power')->group(function () {
        Route::get('/', [RencanaPemeliharaanJawa1PowerController::class, 'index'])->name('rencana-pemeliharaan-jawa1power');
        Route::post('/', [RencanaPemeliharaanJawa1PowerController::class, 'store'])->name('rencana-pemeliharaan-jawa1power.store');
        Route::get('/data', [RencanaPemeliharaanJawa1PowerController::class, 'data'])->name('rencana-pemeliharaan-jawa1power.data');
        Route::put('/{id}', [RencanaPemeliharaanJawa1PowerController::class, 'update'])->name('rencana-pemeliharaan-jawa1power.update');
        Route::delete('/{id}', [RencanaPemeliharaanJawa1PowerController::class, 'destroy'])->name('rencana-pemeliharaan-jawa1power.destroy');
    });

    // SistemInformasiAimsJawa1PowerController
    Route::prefix('monev/shpnre/input-data/sistem-informasi-aims-jawa1power')->group(function () {
        Route::get('/', [SistemInformasiAimsJawa1PowerController::class, 'index'])->name('sistem-informasi-aims-jawa1power');
        Route::post('/', [SistemInformasiAimsJawa1PowerController::class, 'store'])->name('sistem-informasi-aims-jawa1power.store');
        Route::get('/data', [SistemInformasiAimsJawa1PowerController::class, 'data'])->name('sistem-informasi-aims-jawa1power.data');
        Route::put('/{id}', [SistemInformasiAimsJawa1PowerController::class, 'update'])->name('sistem-informasi-aims-jawa1power.update');
        Route::delete('/{id}', [SistemInformasiAimsJawa1PowerController::class, 'destroy'])->name('sistem-informasi-aims-jawa1power.destroy');
    });

    // StatusAssetAiJawa1PowerController
    Route::prefix('monev/shpnre/input-data/jawa1power')->group(function () {
        Route::get('/', [StatusAssetAiJawa1PowerController::class, 'index'])->name('jawa1power');
        Route::post('/', [StatusAssetAiJawa1PowerController::class, 'store'])->name('jawa1power.store');
        Route::get('/data', [StatusAssetAiJawa1PowerController::class, 'data'])->name('jawa1power.data');
        Route::put('/{id}', [StatusAssetAiJawa1PowerController::class, 'update'])->name('jawa1power.update');
        Route::delete('/{id}', [StatusAssetAiJawa1PowerController::class, 'destroy'])->name('jawa1power.destroy');
    });

    // SummaryPloJawa1PowerController
    Route::prefix('monev/shpnre/input-data/summary-plo-jawa1power')->group(function () {
        Route::get('/', [SummaryPloJawa1PowerController::class, 'index'])->name('summary-plo-jawa1power');
        Route::post('/', [SummaryPloJawa1PowerController::class, 'store'])->name('summary-plo-jawa1power.store');
        Route::get('/data', [SummaryPloJawa1PowerController::class, 'data'])->name('summary-plo-jawa1power.data');
        Route::put('/{id}', [SummaryPloJawa1PowerController::class, 'update'])->name('summary-plo-jawa1power.update');
        Route::delete('/{id}', [SummaryPloJawa1PowerController::class, 'destroy'])->name('summary-plo-jawa1power.destroy');
    });
    // TargetKinerja
    // KumulatifStatusPloSHPNREController
    Route::prefix('monev/shpnre/kinerja/shpnre-kumulatif-status-plo')->group(function () {
        Route::get('/', [KumulatifStatusPloSHPNREController::class, 'index'])->name('shpnre-kumulatif-status-plo');
        Route::post('/', [KumulatifStatusPloSHPNREController::class, 'store'])->name('shpnre-kumulatif-status-plo.store');
        Route::get('/data', [KumulatifStatusPloSHPNREController::class, 'data'])->name('shpnre-kumulatif-status-plo.data');
        Route::put('/{id}', [KumulatifStatusPloSHPNREController::class, 'update'])->name('shpnre-kumulatif-status-plo.update');
        Route::delete('/{id}', [KumulatifStatusPloSHPNREController::class, 'destroy'])->name('shpnre-kumulatif-status-plo.destroy');
    });

    // PrognosaStatusPloSHPNREController
    Route::prefix('monev/shpnre/kinerja/shpnre-prognosa-status-plo')->group(function () {
        Route::get('/', [PrognosaStatusPloSHPNREController::class, 'index'])->name('shpnre-prognosa-status-plo');
        Route::post('/', [PrognosaStatusPloSHPNREController::class, 'store'])->name('shpnre-prognosa-status-plo.store');
        Route::get('/data', [PrognosaStatusPloSHPNREController::class, 'data'])->name('shpnre-prognosa-status-plo.data');
        Route::put('/{id}', [PrognosaStatusPloSHPNREController::class, 'update'])->name('shpnre-prognosa-status-plo.update');
        Route::delete('/{id}', [PrognosaStatusPloSHPNREController::class, 'destroy'])->name('shpnre-prognosa-status-plo.destroy');
    });

    // TargetPenurunanPloSHPNREController
    Route::prefix('monev/shpnre/kinerja/shpnre-target-penurunan-plo')->group(function () {
        Route::get('/', [TargetPenurunanPloSHPNREController::class, 'index'])->name('shpnre-target-penurunan-plo');
        Route::post('/', [TargetPenurunanPloSHPNREController::class, 'store'])->name('shpnre-target-penurunan-plo.store');
        Route::get('/data', [TargetPenurunanPloSHPNREController::class, 'data'])->name('shpnre-target-penurunan-plo.data');
        Route::put('/{id}', [TargetPenurunanPloSHPNREController::class, 'update'])->name('shpnre-target-penurunan-plo.update');
        Route::delete('/{id}', [TargetPenurunanPloSHPNREController::class, 'destroy'])->name('shpnre-target-penurunan-plo.destroy');
    });
    // TargetMandatoryCertficationShpnreController
    Route::prefix('monev/shpnre/kinerja/target-mandatory-certification-shpnre')->group(function () {
        Route::get('/', [TargetMandatoryCertficationShpnreController::class, 'index'])->name('target-mandatory-certification-shpnre');
        Route::post('/', [TargetMandatoryCertficationShpnreController::class, 'store'])->name('target-mandatory-certification-shpnre.store');
        Route::get('/data', [TargetMandatoryCertficationShpnreController::class, 'data'])->name('target-mandatory-certification-shpnre.data');
        Route::put('/{id}', [TargetMandatoryCertficationShpnreController::class, 'update'])->name('target-mandatory-certification-shpnre.update');
        Route::delete('/{id}', [TargetMandatoryCertficationShpnreController::class, 'destroy'])->name('target-mandatory-certification-shpnre.destroy');
    });

    // SHIML
    // AssetBreakdownPisController
    Route::prefix('monev/shiml/input-data/asset-breakdown-pis')->group(function () {
        Route::get('/', [AssetBreakdownPisController::class, 'index'])->name('asset-breakdown-pis');
        Route::post('/', [AssetBreakdownPisController::class, 'store'])->name('asset-breakdown-pis.store');
        Route::get('/data', [AssetBreakdownPisController::class, 'data'])->name('asset-breakdown-pis.data');
        Route::put('/{id}', [AssetBreakdownPisController::class, 'update'])->name('asset-breakdown-pis.update');
        Route::delete('/{id}', [AssetBreakdownPisController::class, 'destroy'])->name('asset-breakdown-pis.destroy');
    });

    // AvailabilityPisController
    Route::prefix('monev/shiml/input-data/availability-pis')->group(function () {
        Route::get('/', [AvailabilityPisController::class, 'index'])->name('availability-pis');
        Route::post('/', [AvailabilityPisController::class, 'store'])->name('availability-pis.store');
        Route::get('/data', [AvailabilityPisController::class, 'data'])->name('availability-pis.data');
        Route::put('/{id}', [AvailabilityPisController::class, 'update'])->name('availability-pis.update');
        Route::delete('/{id}', [AvailabilityPisController::class, 'destroy'])->name('availability-pis.destroy');
    });

    // KondisiVacantAimsPisController
    Route::prefix('monev/shiml/input-data/kondisi-vacant-aims-pis')->group(function () {
        Route::get('/', [KondisiVacantAimsPisController::class, 'index'])->name('kondisi-vacant-aims-pis');
        Route::post('/', [KondisiVacantAimsPisController::class, 'store'])->name('kondisi-vacant-aims-pis.store');
        Route::get('/data', [KondisiVacantAimsPisController::class, 'data'])->name('kondisi-vacant-aims-pis.data');
        Route::put('/{id}', [KondisiVacantAimsPisController::class, 'update'])->name('kondisi-vacant-aims-pis.update');
        Route::delete('/{id}', [KondisiVacantAimsPisController::class, 'destroy'])->name('kondisi-vacant-aims-pis.destroy');
    });

    // MandatoryCertificationPisController
    Route::prefix('monev/shiml/input-data/mandatory-certification-pis')->group(function () {
        Route::get('/', [MandatoryCertificationPisController::class, 'index'])->name('mandatory-certification-pis');
        Route::post('/', [MandatoryCertificationPisController::class, 'store'])->name('mandatory-certification-pis.store');
        Route::get('/data', [MandatoryCertificationPisController::class, 'data'])->name('mandatory-certification-pis.data');
        Route::put('/{id}', [MandatoryCertificationPisController::class, 'update'])->name('mandatory-certification-pis.update');
        Route::delete('/{id}', [MandatoryCertificationPisController::class, 'destroy'])->name('mandatory-certification-pis.destroy');
    });

    // PelatihanAimsPisController
    Route::prefix('monev/shiml/input-data/pelatihan-aims-pis')->group(function () {
        Route::get('/', [PelatihanAimsPisController::class, 'index'])->name('pelatihan-aims-pis');
        Route::post('/', [PelatihanAimsPisController::class, 'store'])->name('pelatihan-aims-pis.store');
        Route::get('/data', [PelatihanAimsPisController::class, 'data'])->name('pelatihan-aims-pis.data');
        Route::put('/{id}', [PelatihanAimsPisController::class, 'update'])->name('pelatihan-aims-pis.update');
        Route::delete('/{id}', [PelatihanAimsPisController::class, 'destroy'])->name('pelatihan-aims-pis.destroy');
    });

    // RealAnggaranAiPisController
    Route::prefix('monev/shiml/input-data/real-anggaran-ai-pis')->group(function () {
        Route::get('/', [RealAnggaranAiPisController::class, 'index'])->name('real-anggaran-ai-pis');
        Route::post('/', [RealAnggaranAiPisController::class, 'store'])->name('real-anggaran-ai-pis.store');
        Route::get('/data', [RealAnggaranAiPisController::class, 'data'])->name('real-anggaran-ai-pis.data');
        Route::put('/{id}', [RealAnggaranAiPisController::class, 'update'])->name('real-anggaran-ai-pis.update');
        Route::delete('/{id}', [RealAnggaranAiPisController::class, 'destroy'])->name('real-anggaran-ai-pis.destroy');
    });

    // RealAnggaranFigurePisController
    Route::prefix('monev/shiml/input-data/real-anggaran-figure-pis')->group(function () {
        Route::get('/', [RealAnggaranFigurePisController::class, 'index'])->name('real-anggaran-figure-pis');
        Route::post('/', [RealAnggaranFigurePisController::class, 'store'])->name('real-anggaran-figure-pis.store');
        Route::get('/data', [RealAnggaranFigurePisController::class, 'data'])->name('real-anggaran-figure-pis.data');
        Route::put('/{id}', [RealAnggaranFigurePisController::class, 'update'])->name('real-anggaran-figure-pis.update');
        Route::delete('/{id}', [RealAnggaranFigurePisController::class, 'destroy'])->name('real-anggaran-figure-pis.destroy');
    });

    // RealProgFisikAiPisController
    Route::prefix('monev/shiml/input-data/real-prog-fisik-pis')->group(function () {
        Route::get('/', [RealProgFisikAiPisController::class, 'index'])->name('real-prog-fisik-pis');
        Route::post('/', [RealProgFisikAiPisController::class, 'store'])->name('real-prog-fisik-pis.store');
        Route::get('/data', [RealProgFisikAiPisController::class, 'data'])->name('real-prog-fisik-pis.data');
        Route::put('/{id}', [RealProgFisikAiPisController::class, 'update'])->name('real-prog-fisik-pis.update');
        Route::delete('/{id}', [RealProgFisikAiPisController::class, 'destroy'])->name('real-prog-fisik-pis.destroy');
    });

    // RencanaPemeliharaanPisController
    Route::prefix('monev/shiml/input-data/rencana-pemeliharaan-pis')->group(function () {
        Route::get('/', [RencanaPemeliharaanPisController::class, 'index'])->name('rencana-pemeliharaan-pis');
        Route::post('/', [RencanaPemeliharaanPisController::class, 'store'])->name('rencana-pemeliharaan-pis.store');
        Route::get('/data', [RencanaPemeliharaanPisController::class, 'data'])->name('rencana-pemeliharaan-pis.data');
        Route::put('/{id}', [RencanaPemeliharaanPisController::class, 'update'])->name('rencana-pemeliharaan-pis.update');
        Route::delete('/{id}', [RencanaPemeliharaanPisController::class, 'destroy'])->name('rencana-pemeliharaan-pis.destroy');
    });

    // SapAssetPisController
    Route::prefix('monev/shiml/input-data/sap-asset-pis')->group(function () {
        Route::get('/', [SapAssetPisController::class, 'index'])->name('sap-asset-pis');
        Route::post('/', [SapAssetPisController::class, 'store'])->name('sap-asset-pis.store');
        Route::get('/data', [SapAssetPisController::class, 'data'])->name('sap-asset-pis.data');
        Route::put('/{id}', [SapAssetPisController::class, 'update'])->name('sap-asset-pis.update');
        Route::delete('/{id}', [SapAssetPisController::class, 'destroy'])->name('sap-asset-pis.destroy');
    });

    // SistemInformasiAimsPisController
    Route::prefix('monev/shiml/input-data/sistem-informasi-aims-pis')->group(function () {
        Route::get('/', [SistemInformasiAimsPisController::class, 'index'])->name('sistem-informasi-aims-pis');
        Route::post('/', [SistemInformasiAimsPisController::class, 'store'])->name('sistem-informasi-aims-pis.store');
        Route::get('/data', [SistemInformasiAimsPisController::class, 'data'])->name('sistem-informasi-aims-pis.data');
        Route::put('/{id}', [SistemInformasiAimsPisController::class, 'update'])->name('sistem-informasi-aims-pis.update');
        Route::delete('/{id}', [SistemInformasiAimsPisController::class, 'destroy'])->name('sistem-informasi-aims-pis.destroy');
    });

    // StatusAssetAiPisController
    Route::prefix('monev/shiml/input-data/pis')->group(function () {
        Route::get('/', [StatusAssetAiPisController::class, 'index'])->name('pis');
        Route::post('/', [StatusAssetAiPisController::class, 'store'])->name('pis.store');
        Route::get('/data', [StatusAssetAiPisController::class, 'data'])->name('pis.data');
        Route::put('/{id}', [StatusAssetAiPisController::class, 'update'])->name('pis.update');
        Route::delete('/{id}', [StatusAssetAiPisController::class, 'destroy'])->name('pis.destroy');
    });

    // StatusPloPisController
    Route::prefix('monev/shiml/input-data/status-plo-pis')->group(function () {
        Route::get('/', [StatusPloPisController::class, 'index'])->name('status-plo-pis');
        Route::post('/', [StatusPloPisController::class, 'store'])->name('status-plo-pis.store');
        Route::get('/data', [StatusPloPisController::class, 'data'])->name('status-plo-pis.data');
        Route::put('/{id}', [StatusPloPisController::class, 'update'])->name('status-plo-pis.update');
        Route::delete('/{id}', [StatusPloPisController::class, 'destroy'])->name('status-plo-pis.destroy');
    });

    // AssetBreakdownPetController
    Route::prefix('monev/shiml/input-data/asset-breakdown-pet')->group(function () {
        Route::get('/', [AssetBreakdownPetController::class, 'index'])->name('asset-breakdown-pet');
        Route::post('/', [AssetBreakdownPetController::class, 'store'])->name('asset-breakdown-pet.store');
        Route::get('/data', [AssetBreakdownPetController::class, 'data'])->name('asset-breakdown-pet.data');
        Route::put('/{id}', [AssetBreakdownPetController::class, 'update'])->name('asset-breakdown-pet.update');
        Route::delete('/{id}', [AssetBreakdownPetController::class, 'destroy'])->name('asset-breakdown-pet.destroy');
    });

    // AvailabilityPetController
    Route::prefix('monev/shiml/input-data/availability-pet')->group(function () {
        Route::get('/', [AvailabilityPetController::class, 'index'])->name('availability-pet');
        Route::post('/', [AvailabilityPetController::class, 'store'])->name('availability-pet.store');
        Route::get('/data', [AvailabilityPetController::class, 'data'])->name('availability-pet.data');
        Route::put('/{id}', [AvailabilityPetController::class, 'update'])->name('availability-pet.update');
        Route::delete('/{id}', [AvailabilityPetController::class, 'destroy'])->name('availability-pet.destroy');
    });

    // KondisiVacantAimsPetController
    Route::prefix('monev/shiml/input-data/kondisi-vacant-aims-pet')->group(function () {
        Route::get('/', [KondisiVacantAimsPetController::class, 'index'])->name('kondisi-vacant-aims-pet');
        Route::post('/', [KondisiVacantAimsPetController::class, 'store'])->name('kondisi-vacant-aims-pet.store');
        Route::get('/data', [KondisiVacantAimsPetController::class, 'data'])->name('kondisi-vacant-aims-pet.data');
        Route::put('/{id}', [KondisiVacantAimsPetController::class, 'update'])->name('kondisi-vacant-aims-pet.update');
        Route::delete('/{id}', [KondisiVacantAimsPetController::class, 'destroy'])->name('kondisi-vacant-aims-pet.destroy');
    });

    // MandatoryCertificationPetController
    Route::prefix('monev/shiml/input-data/mandatory-certification-pet')->group(function () {
        Route::get('/', [MandatoryCertificationPetController::class, 'index'])->name('mandatory-certification-pet');
        Route::post('/', [MandatoryCertificationPetController::class, 'store'])->name('mandatory-certification-pet.store');
        Route::get('/data', [MandatoryCertificationPetController::class, 'data'])->name('mandatory-certification-pet.data');
        Route::put('/{id}', [MandatoryCertificationPetController::class, 'update'])->name('mandatory-certification-pet.update');
        Route::delete('/{id}', [MandatoryCertificationPetController::class, 'destroy'])->name('mandatory-certification-pet.destroy');
    });

    // PelatihanAimsPetController
    Route::prefix('monev/shiml/input-data/pelatihan-aims-pet')->group(function () {
        Route::get('/', [PelatihanAimsPetController::class, 'index'])->name('pelatihan-aims-pet');
        Route::post('/', [PelatihanAimsPetController::class, 'store'])->name('pelatihan-aims-pet.store');
        Route::get('/data', [PelatihanAimsPetController::class, 'data'])->name('pelatihan-aims-pet.data');
        Route::put('/{id}', [PelatihanAimsPetController::class, 'update'])->name('pelatihan-aims-pet.update');
        Route::delete('/{id}', [PelatihanAimsPetController::class, 'destroy'])->name('pelatihan-aims-pet.destroy');
    });

    // RealAnggaranAiPetController
    Route::prefix('monev/shiml/input-data/real-anggaran-ai-pet')->group(function () {
        Route::get('/', [RealAnggaranAiPetController::class, 'index'])->name('real-anggaran-ai-pet');
        Route::post('/', [RealAnggaranAiPetController::class, 'store'])->name('real-anggaran-ai-pet.store');
        Route::get('/data', [RealAnggaranAiPetController::class, 'data'])->name('real-anggaran-ai-pet.data');
        Route::put('/{id}', [RealAnggaranAiPetController::class, 'update'])->name('real-anggaran-ai-pet.update');
        Route::delete('/{id}', [RealAnggaranAiPetController::class, 'destroy'])->name('real-anggaran-ai-pet.destroy');
    });

    // RealAnggaranFigurePetController
    Route::prefix('monev/shiml/input-data/real-anggaran-figure-pet')->group(function () {
        Route::get('/', [RealAnggaranFigurePetController::class, 'index'])->name('real-anggaran-figure-pet');
        Route::post('/', [RealAnggaranFigurePetController::class, 'store'])->name('real-anggaran-figure-pet.store');
        Route::get('/data', [RealAnggaranFigurePetController::class, 'data'])->name('real-anggaran-figure-pet.data');
        Route::put('/{id}', [RealAnggaranFigurePetController::class, 'update'])->name('real-anggaran-figure-pet.update');
        Route::delete('/{id}', [RealAnggaranFigurePetController::class, 'destroy'])->name('real-anggaran-figure-pet.destroy');
    });

    // RealProgFisikAiPetController
    Route::prefix('monev/shiml/input-data/real-prog-fisik-pet')->group(function () {
        Route::get('/', [RealProgFisikAiPetController::class, 'index'])->name('real-prog-fisik-pet');
        Route::post('/', [RealProgFisikAiPetController::class, 'store'])->name('real-prog-fisik-pet.store');
        Route::get('/data', [RealProgFisikAiPetController::class, 'data'])->name('real-prog-fisik-pet.data');
        Route::put('/{id}', [RealProgFisikAiPetController::class, 'update'])->name('real-prog-fisik-pet.update');
        Route::delete('/{id}', [RealProgFisikAiPetController::class, 'destroy'])->name('real-prog-fisik-pet.destroy');
    });

    // RencanaPemeliharaanPetController
    Route::prefix('monev/shiml/input-data/rencana-pemeliharaan-pet')->group(function () {
        Route::get('/', [RencanaPemeliharaanPetController::class, 'index'])->name('rencana-pemeliharaan-pet');
        Route::post('/', [RencanaPemeliharaanPetController::class, 'store'])->name('rencana-pemeliharaan-pet.store');
        Route::get('/data', [RencanaPemeliharaanPetController::class, 'data'])->name('rencana-pemeliharaan-pet.data');
        Route::put('/{id}', [RencanaPemeliharaanPetController::class, 'update'])->name('rencana-pemeliharaan-pet.update');
        Route::delete('/{id}', [RencanaPemeliharaanPetController::class, 'destroy'])->name('rencana-pemeliharaan-pet.destroy');
    });

    // SapAssetPetController
    Route::prefix('monev/shiml/input-data/sap-asset-pet')->group(function () {
        Route::get('/', [SapAssetPetController::class, 'index'])->name('sap-asset-pet');
        Route::post('/', [SapAssetPetController::class, 'store'])->name('sap-asset-pet.store');
        Route::get('/data', [SapAssetPetController::class, 'data'])->name('sap-asset-pet.data');
        Route::put('/{id}', [SapAssetPetController::class, 'update'])->name('sap-asset-pet.update');
        Route::delete('/{id}', [SapAssetPetController::class, 'destroy'])->name('sap-asset-pet.destroy');
    });

    // SistemInformasiAimsPetController
    Route::prefix('monev/shiml/input-data/sistem-informasi-aims-pet')->group(function () {
        Route::get('/', [SistemInformasiAimsPetController::class, 'index'])->name('sistem-informasi-aims-pet');
        Route::post('/', [SistemInformasiAimsPetController::class, 'store'])->name('sistem-informasi-aims-pet.store');
        Route::get('/data', [SistemInformasiAimsPetController::class, 'data'])->name('sistem-informasi-aims-pet.data');
        Route::put('/{id}', [SistemInformasiAimsPetController::class, 'update'])->name('sistem-informasi-aims-pet.update');
        Route::delete('/{id}', [SistemInformasiAimsPetController::class, 'destroy'])->name('sistem-informasi-aims-pet.destroy');
    });

    // StatusAsseAiPetController
    Route::prefix('monev/shiml/input-data/pet')->group(function () {
        Route::get('/', [StatusAsseAiPetController::class, 'index'])->name('pet');
        Route::post('/', [StatusAsseAiPetController::class, 'store'])->name('pet.store');
        Route::get('/data', [StatusAsseAiPetController::class, 'data'])->name('pet.data');
        Route::put('/{id}', [StatusAsseAiPetController::class, 'update'])->name('pet.update');
        Route::delete('/{id}', [StatusAsseAiPetController::class, 'destroy'])->name('pet.destroy');
    });

    // StatusPloPetController
    Route::prefix('monev/shiml/input-data/status-plo-pet')->group(function () {
        Route::get('/', [StatusPloPetController::class, 'index'])->name('status-plo-pet');
        Route::post('/', [StatusPloPetController::class, 'store'])->name('status-plo-pet.store');
        Route::get('/data', [StatusPloPetController::class, 'data'])->name('status-plo-pet.data');
        Route::put('/{id}', [StatusPloPetController::class, 'update'])->name('status-plo-pet.update');
        Route::delete('/{id}', [StatusPloPetController::class, 'destroy'])->name('status-plo-pet.destroy');
    });

    // PTK 
    // AssetBreakdownPtkController
    Route::prefix('monev/shiml/input-data/asset-breakdown-ptk')->group(function () {
        Route::get('/', [AssetBreakdownPtkController::class, 'index'])->name('asset-breakdown-ptk');
        Route::post('/', [AssetBreakdownPtkController::class, 'store'])->name('asset-breakdown-ptk.store');
        Route::get('/data', [AssetBreakdownPtkController::class, 'data'])->name('asset-breakdown-ptk.data');
        Route::put('/{id}', [AssetBreakdownPtkController::class, 'update'])->name('asset-breakdown-ptk.update');
        Route::delete('/{id}', [AssetBreakdownPtkController::class, 'destroy'])->name('asset-breakdown-ptk.destroy');
    });

    // AvailabilityPtkController
    Route::prefix('monev/shiml/input-data/availability-ptk')->group(function () {
        Route::get('/', [AvailabilityPtkController::class, 'index'])->name('availability-ptk');
        Route::post('/', [AvailabilityPtkController::class, 'store'])->name('availability-ptk.store');
        Route::get('/data', [AvailabilityPtkController::class, 'data'])->name('availability-ptk.data');
        Route::put('/{id}', [AvailabilityPtkController::class, 'update'])->name('availability-ptk.update');
        Route::delete('/{id}', [AvailabilityPtkController::class, 'destroy'])->name('availability-ptk.destroy');
    });

    // KondisiVacantAimsPtkController
    Route::prefix('monev/shiml/input-data/kondisi-vacant-aims-ptk')->group(function () {
        Route::get('/', [KondisiVacantAimsPtkController::class, 'index'])->name('kondisi-vacant-aims-ptk');
        Route::post('/', [KondisiVacantAimsPtkController::class, 'store'])->name('kondisi-vacant-aims-ptk.store');
        Route::get('/data', [KondisiVacantAimsPtkController::class, 'data'])->name('kondisi-vacant-aims-ptk.data');
        Route::put('/{id}', [KondisiVacantAimsPtkController::class, 'update'])->name('kondisi-vacant-aims-ptk.update');
        Route::delete('/{id}', [KondisiVacantAimsPtkController::class, 'destroy'])->name('kondisi-vacant-aims-ptk.destroy');
    });

    // MandatoryCertificationPtkController
    Route::prefix('monev/shiml/input-data/mandatory-certification-ptk')->group(function () {
        Route::get('/', [MandatoryCertificationPtkController::class, 'index'])->name('mandatory-certification-ptk');
        Route::post('/', [MandatoryCertificationPtkController::class, 'store'])->name('mandatory-certification-ptk.store');
        Route::get('/data', [MandatoryCertificationPtkController::class, 'data'])->name('mandatory-certification-ptk.data');
        Route::put('/{id}', [MandatoryCertificationPtkController::class, 'update'])->name('mandatory-certification-ptk.update');
        Route::delete('/{id}', [MandatoryCertificationPtkController::class, 'destroy'])->name('mandatory-certification-ptk.destroy');
    });

    // PelatihanAimsPtkController
    Route::prefix('monev/shiml/input-data/pelatihan-aims-ptk')->group(function () {
        Route::get('/', [PelatihanAimsPtkController::class, 'index'])->name('pelatihan-aims-ptk');
        Route::post('/', [PelatihanAimsPtkController::class, 'store'])->name('pelatihan-aims-ptk.store');
        Route::get('/data', [PelatihanAimsPtkController::class, 'data'])->name('pelatihan-aims-ptk.data');
        Route::put('/{id}', [PelatihanAimsPtkController::class, 'update'])->name('pelatihan-aims-ptk.update');
        Route::delete('/{id}', [PelatihanAimsPtkController::class, 'destroy'])->name('pelatihan-aims-ptk.destroy');
    });

    // RealAnggaranAiPtkController
    Route::prefix('monev/shiml/input-data/real-anggaran-ai-ptk')->group(function () {
        Route::get('/', [RealAnggaranAiPtkController::class, 'index'])->name('real-anggaran-ai-ptk');
        Route::post('/', [RealAnggaranAiPtkController::class, 'store'])->name('real-anggaran-ai-ptk.store');
        Route::get('/data', [RealAnggaranAiPtkController::class, 'data'])->name('real-anggaran-ai-ptk.data');
        Route::put('/{id}', [RealAnggaranAiPtkController::class, 'update'])->name('real-anggaran-ai-ptk.update');
        Route::delete('/{id}', [RealAnggaranAiPtkController::class, 'destroy'])->name('real-anggaran-ai-ptk.destroy');
    });

    // RealAnggaranFigurePtkController
    Route::prefix('monev/shiml/input-data/real-anggaran-figure-ptk')->group(function () {
        Route::get('/', [RealAnggaranFigurePtkController::class, 'index'])->name('real-anggaran-figure-ptk');
        Route::post('/', [RealAnggaranFigurePtkController::class, 'store'])->name('real-anggaran-figure-ptk.store');
        Route::get('/data', [RealAnggaranFigurePtkController::class, 'data'])->name('real-anggaran-figure-ptk.data');
        Route::put('/{id}', [RealAnggaranFigurePtkController::class, 'update'])->name('real-anggaran-figure-ptk.update');
        Route::delete('/{id}', [RealAnggaranFigurePtkController::class, 'destroy'])->name('real-anggaran-figure-ptk.destroy');
    });

    // RealProgFisikAiPtkController
    Route::prefix('monev/shiml/input-data/real-prog-fisik-ptk')->group(function () {
        Route::get('/', [RealProgFisikAiPtkController::class, 'index'])->name('real-prog-fisik-ptk');
        Route::post('/', [RealProgFisikAiPtkController::class, 'store'])->name('real-prog-fisik-ptk.store');
        Route::get('/data', [RealProgFisikAiPtkController::class, 'data'])->name('real-prog-fisik-ptk.data');
        Route::put('/{id}', [RealProgFisikAiPtkController::class, 'update'])->name('real-prog-fisik-ptk.update');
        Route::delete('/{id}', [RealProgFisikAiPtkController::class, 'destroy'])->name('real-prog-fisik-ptk.destroy');
    });

    // RencanaPemeliharaanPtkController
    Route::prefix('monev/shiml/input-data/rencana-pemeliharaan-ptk')->group(function () {
        Route::get('/', [RencanaPemeliharaanPtkController::class, 'index'])->name('rencana-pemeliharaan-ptk');
        Route::post('/', [RencanaPemeliharaanPtkController::class, 'store'])->name('rencana-pemeliharaan-ptk.store');
        Route::get('/data', [RencanaPemeliharaanPtkController::class, 'data'])->name('rencana-pemeliharaan-ptk.data');
        Route::put('/{id}', [RencanaPemeliharaanPtkController::class, 'update'])->name('rencana-pemeliharaan-ptk.update');
        Route::delete('/{id}', [RencanaPemeliharaanPtkController::class, 'destroy'])->name('rencana-pemeliharaan-ptk.destroy');
    });

    // SapAssetPtkController
    Route::prefix('monev/shiml/input-data/sap-asset-ptk')->group(function () {
        Route::get('/', [SapAssetPtkController::class, 'index'])->name('sap-asset-ptk');
        Route::post('/', [SapAssetPtkController::class, 'store'])->name('sap-asset-ptk.store');
        Route::get('/data', [SapAssetPtkController::class, 'data'])->name('sap-asset-ptk.data');
        Route::put('/{id}', [SapAssetPtkController::class, 'update'])->name('sap-asset-ptk.update');
        Route::delete('/{id}', [SapAssetPtkController::class, 'destroy'])->name('sap-asset-ptk.destroy');
    });

    // SistemInformasiAimsPtkController
    Route::prefix('monev/shiml/input-data/sistem-informasi-aims-ptk')->group(function () {
        Route::get('/', [SistemInformasiAimsPtkController::class, 'index'])->name('sistem-informasi-aims-ptk');
        Route::post('/', [SistemInformasiAimsPtkController::class, 'store'])->name('sistem-informasi-aims-ptk.store');
        Route::get('/data', [SistemInformasiAimsPtkController::class, 'data'])->name('sistem-informasi-aims-ptk.data');
        Route::put('/{id}', [SistemInformasiAimsPtkController::class, 'update'])->name('sistem-informasi-aims-ptk.update');
        Route::delete('/{id}', [SistemInformasiAimsPtkController::class, 'destroy'])->name('sistem-informasi-aims-ptk.destroy');
    });

    // StatusAssetAiPtkController
    Route::prefix('monev/shiml/input-data/ptk')->group(function () {
        Route::get('/', [StatusAssetAiPtkController::class, 'index'])->name('ptk');
        Route::post('/', [StatusAssetAiPtkController::class, 'store'])->name('ptk.store');
        Route::get('/data', [StatusAssetAiPtkController::class, 'data'])->name('ptk.data');
        Route::put('/{id}', [StatusAssetAiPtkController::class, 'update'])->name('ptk.update');
        Route::delete('/{id}', [StatusAssetAiPtkController::class, 'destroy'])->name('ptk.destroy');
    });

    // StatusPloPtkController
    Route::prefix('monev/shiml/input-data/status-plo-ptk')->group(function () {
        Route::get('/', [StatusPloPtkController::class, 'index'])->name('status-plo-ptk');
        Route::post('/', [StatusPloPtkController::class, 'store'])->name('status-plo-ptk.store');
        Route::get('/data', [StatusPloPtkController::class, 'data'])->name('status-plo-ptk.data');
        Route::put('/{id}', [StatusPloPtkController::class, 'update'])->name('status-plo-ptk.update');
        Route::delete('/{id}', [StatusPloPtkController::class, 'destroy'])->name('status-plo-ptk.destroy');
    });

    // SHRNP
    // AssetBreakdownRuDumaiController
    Route::prefix('monev/shrnp/input-data/asset-breakdown-ru-dumai')->group(function () {
        Route::get('/', [AssetBreakdownRuDumaiController::class, 'index'])->name('asset-breakdown-ru-dumai');
        Route::post('/', [AssetBreakdownRuDumaiController::class, 'store'])->name('asset-breakdown-ru-dumai.store');
        Route::get('/data', [AssetBreakdownRuDumaiController::class, 'data'])->name('asset-breakdown-ru-dumai.data');
        Route::put('/{id}', [AssetBreakdownRuDumaiController::class, 'update'])->name('asset-breakdown-ru-dumai.update');
        Route::delete('/{id}', [AssetBreakdownRuDumaiController::class, 'destroy'])->name('asset-breakdown-ru-dumai.destroy');
    });

    // AvailabilityRuDumaiController
    Route::prefix('monev/shrnp/input-data/availability-ru-dumai')->group(function () {
        Route::get('/', [AvailabilityRuDumaiController::class, 'index'])->name('availability-ru-dumai');
        Route::post('/', [AvailabilityRuDumaiController::class, 'store'])->name('availability-ru-dumai.store');
        Route::get('/data', [AvailabilityRuDumaiController::class, 'data'])->name('availability-ru-dumai.data');
        Route::put('/{id}', [AvailabilityRuDumaiController::class, 'update'])->name('availability-ru-dumai.update');
        Route::delete('/{id}', [AvailabilityRuDumaiController::class, 'destroy'])->name('availability-ru-dumai.destroy');
    });

    // KondisiVacantAimsRuDumaiController
    Route::prefix('monev/shrnp/input-data/kondisi-vacant-aims-ru-dumai')->group(function () {
        Route::get('/', [KondisiVacantAimsRuDumaiController::class, 'index'])->name('kondisi-vacant-aims-ru-dumai');
        Route::post('/', [KondisiVacantAimsRuDumaiController::class, 'store'])->name('kondisi-vacant-aims-ru-dumai.store');
        Route::get('/data', [KondisiVacantAimsRuDumaiController::class, 'data'])->name('kondisi-vacant-aims-ru-dumai.data');
        Route::put('/{id}', [KondisiVacantAimsRuDumaiController::class, 'update'])->name('kondisi-vacant-aims-ru-dumai.update');
        Route::delete('/{id}', [KondisiVacantAimsRuDumaiController::class, 'destroy'])->name('kondisi-vacant-aims-ru-dumai.destroy');
    });

    // MandatoryCertificationRuDumaiController
    Route::prefix('monev/shrnp/input-data/mandatory-certification-ru-dumai')->group(function () {
        Route::get('/', [MandatoryCertificationRuDumaiController::class, 'index'])->name('mandatory-certification-ru-dumai');
        Route::post('/', [MandatoryCertificationRuDumaiController::class, 'store'])->name('mandatory-certification-ru-dumai.store');
        Route::get('/data', [MandatoryCertificationRuDumaiController::class, 'data'])->name('mandatory-certification-ru-dumai.data');
        Route::put('/{id}', [MandatoryCertificationRuDumaiController::class, 'update'])->name('mandatory-certification-ru-dumai.update');
        Route::delete('/{id}', [MandatoryCertificationRuDumaiController::class, 'destroy'])->name('mandatory-certification-ru-dumai.destroy');
    });

    // PelatihanAimsRuDumaiController
    Route::prefix('monev/shrnp/input-data/pelatihan-aims-ru-dumai')->group(function () {
        Route::get('/', [PelatihanAimsRuDumaiController::class, 'index'])->name('pelatihan-aims-ru-dumai');
        Route::post('/', [PelatihanAimsRuDumaiController::class, 'store'])->name('pelatihan-aims-ru-dumai.store');
        Route::get('/data', [PelatihanAimsRuDumaiController::class, 'data'])->name('pelatihan-aims-ru-dumai.data');
        Route::put('/{id}', [PelatihanAimsRuDumaiController::class, 'update'])->name('pelatihan-aims-ru-dumai.update');
        Route::delete('/{id}', [PelatihanAimsRuDumaiController::class, 'destroy'])->name('pelatihan-aims-ru-dumai.destroy');
    });

    // RealAnggaranAiRuDumaiController
    Route::prefix('monev/shrnp/input-data/real-anggaran-ai-ru-dumai')->group(function () {
        Route::get('/', [RealAnggaranAiRuDumaiController::class, 'index'])->name('real-anggaran-ai-ru-dumai');
        Route::post('/', [RealAnggaranAiRuDumaiController::class, 'store'])->name('real-anggaran-ai-ru-dumai.store');
        Route::get('/data', [RealAnggaranAiRuDumaiController::class, 'data'])->name('real-anggaran-ai-ru-dumai.data');
        Route::put('/{id}', [RealAnggaranAiRuDumaiController::class, 'update'])->name('real-anggaran-ai-ru-dumai.update');
        Route::delete('/{id}', [RealAnggaranAiRuDumaiController::class, 'destroy'])->name('real-anggaran-ai-ru-dumai.destroy');
    });

    // RealAnggaranFigureRuDumaiController
    Route::prefix('monev/shrnp/input-data/real-anggaran-figure-ru-dumai')->group(function () {
        Route::get('/', [RealAnggaranFigureRuDumaiController::class, 'index'])->name('real-anggaran-figure-ru-dumai');
        Route::post('/', [RealAnggaranFigureRuDumaiController::class, 'store'])->name('real-anggaran-figure-ru-dumai.store');
        Route::get('/data', [RealAnggaranFigureRuDumaiController::class, 'data'])->name('real-anggaran-figure-ru-dumai.data');
        Route::put('/{id}', [RealAnggaranFigureRuDumaiController::class, 'update'])->name('real-anggaran-figure-ru-dumai.update');
        Route::delete('/{id}', [RealAnggaranFigureRuDumaiController::class, 'destroy'])->name('real-anggaran-figure-ru-dumai.destroy');
    });

    // RealProgFisikAiRuDumaiController
    Route::prefix('monev/shrnp/input-data/real-prog-fisik-ru-dumai')->group(function () {
        Route::get('/', [RealProgFisikAiRuDumaiController::class, 'index'])->name('real-prog-fisik-ru-dumai');
        Route::post('/', [RealProgFisikAiRuDumaiController::class, 'store'])->name('real-prog-fisik-ru-dumai.store');
        Route::get('/data', [RealProgFisikAiRuDumaiController::class, 'data'])->name('real-prog-fisik-ru-dumai.data');
        Route::put('/{id}', [RealProgFisikAiRuDumaiController::class, 'update'])->name('real-prog-fisik-ru-dumai.update');
        Route::delete('/{id}', [RealProgFisikAiRuDumaiController::class, 'destroy'])->name('real-prog-fisik-ru-dumai.destroy');
    });

    // RencanaPemeliharaanRuDumaiController
    Route::prefix('monev/shrnp/input-data/rencana-pemeliharaan-ru-dumai')->group(function () {
        Route::get('/', [RencanaPemeliharaanRuDumaiController::class, 'index'])->name('rencana-pemeliharaan-ru-dumai');
        Route::post('/', [RencanaPemeliharaanRuDumaiController::class, 'store'])->name('rencana-pemeliharaan-ru-dumai.store');
        Route::get('/data', [RencanaPemeliharaanRuDumaiController::class, 'data'])->name('rencana-pemeliharaan-ru-dumai.data');
        Route::put('/{id}', [RencanaPemeliharaanRuDumaiController::class, 'update'])->name('rencana-pemeliharaan-ru-dumai.update');
        Route::delete('/{id}', [RencanaPemeliharaanRuDumaiController::class, 'destroy'])->name('rencana-pemeliharaan-ru-dumai.destroy');
    });

    // SistemInformasiAimsRuDumaiController
    Route::prefix('monev/shrnp/input-data/sistem-informasi-aims-ru-dumai')->group(function () {
        Route::get('/', [SistemInformasiAimsRuDumaiController::class, 'index'])->name('sistem-informasi-aims-ru-dumai');
        Route::post('/', [SistemInformasiAimsRuDumaiController::class, 'store'])->name('sistem-informasi-aims-ru-dumai.store');
        Route::get('/data', [SistemInformasiAimsRuDumaiController::class, 'data'])->name('sistem-informasi-aims-ru-dumai.data');
        Route::put('/{id}', [SistemInformasiAimsRuDumaiController::class, 'update'])->name('sistem-informasi-aims-ru-dumai.update');
        Route::delete('/{id}', [SistemInformasiAimsRuDumaiController::class, 'destroy'])->name('sistem-informasi-aims-ru-dumai.destroy');
    });

    // StatusAssetAiRuDumaiController
    Route::prefix('monev/shrnp/input-data/ru-dumai')->group(function () {
        Route::get('/', [StatusAssetAiRuDumaiController::class, 'index'])->name('ru-dumai');
        Route::post('/', [StatusAssetAiRuDumaiController::class, 'store'])->name('ru-dumai.store');
        Route::get('/data', [StatusAssetAiRuDumaiController::class, 'data'])->name('ru-dumai.data');
        Route::put('/{id}', [StatusAssetAiRuDumaiController::class, 'update'])->name('ru-dumai.update');
        Route::delete('/{id}', [StatusAssetAiRuDumaiController::class, 'destroy'])->name('ru-dumai.destroy');
    });

    // StatusPloRuDumaiController
    Route::prefix('monev/shrnp/input-data/status-plo-ru-dumai')->group(function () {
        Route::get('/', [StatusPloRuDumaiController::class, 'index'])->name('status-plo-ru-dumai');
        Route::post('/', [StatusPloRuDumaiController::class, 'store'])->name('status-plo-ru-dumai.store');
        Route::get('/data', [StatusPloRuDumaiController::class, 'data'])->name('status-plo-ru-dumai.data');
        Route::put('/{id}', [StatusPloRuDumaiController::class, 'update'])->name('status-plo-ru-dumai.update');
        Route::delete('/{id}', [StatusPloRuDumaiController::class, 'destroy'])->name('status-plo-ru-dumai.destroy');
    });

    // SapAssetRuDumaiController
    Route::prefix('monev/shrnp/input-data/sap-asset-ru-dumai')->group(function () {
        Route::get('/', [SapAssetRuDumaiController::class, 'index'])->name('sap-asset-ru-dumai');
        Route::post('/', [SapAssetRuDumaiController::class, 'store'])->name('sap-asset-ru-dumai.store');
        Route::get('/data', [SapAssetRuDumaiController::class, 'data'])->name('sap-asset-ru-dumai.data');
        Route::put('/{id}', [SapAssetRuDumaiController::class, 'update'])->name('sap-asset-ru-dumai.update');
        Route::delete('/{id}', [SapAssetRuDumaiController::class, 'destroy'])->name('sap-asset-ru-dumai.destroy');
    });

    // RU III PLAJU
    // AssetBreakdownPlajuController
    Route::prefix('monev/shrnp/input-data/asset-breakdown-plaju')->group(function () {
        Route::get('/', [AssetBreakdownPlajuController::class, 'index'])->name('asset-breakdown-plaju');
        Route::post('/', [AssetBreakdownPlajuController::class, 'store'])->name('asset-breakdown-plaju.store');
        Route::get('/data', [AssetBreakdownPlajuController::class, 'data'])->name('asset-breakdown-plaju.data');
        Route::put('/{id}', [AssetBreakdownPlajuController::class, 'update'])->name('asset-breakdown-plaju.update');
        Route::delete('/{id}', [AssetBreakdownPlajuController::class, 'destroy'])->name('asset-breakdown-plaju.destroy');
    });

    // AvailabilityPlajuController
    Route::prefix('monev/shrnp/input-data/availability-plaju')->group(function () {
        Route::get('/', [AvailabilityPlajuController::class, 'index'])->name('availability-plaju');
        Route::post('/', [AvailabilityPlajuController::class, 'store'])->name('availability-plaju.store');
        Route::get('/data', [AvailabilityPlajuController::class, 'data'])->name('availability-plaju.data');
        Route::put('/{id}', [AvailabilityPlajuController::class, 'update'])->name('availability-plaju.update');
        Route::delete('/{id}', [AvailabilityPlajuController::class, 'destroy'])->name('availability-plaju.destroy');
    });

    // KondisiVacantAimsPlajuController
    Route::prefix('monev/shrnp/input-data/kondisi-vacant-aims-plaju')->group(function () {
        Route::get('/', [KondisiVacantAimsPlajuController::class, 'index'])->name('kondisi-vacant-aims-plaju');
        Route::post('/', [KondisiVacantAimsPlajuController::class, 'store'])->name('kondisi-vacant-aims-plaju.store');
        Route::get('/data', [KondisiVacantAimsPlajuController::class, 'data'])->name('kondisi-vacant-aims-plaju.data');
        Route::put('/{id}', [KondisiVacantAimsPlajuController::class, 'update'])->name('kondisi-vacant-aims-plaju.update');
        Route::delete('/{id}', [KondisiVacantAimsPlajuController::class, 'destroy'])->name('kondisi-vacant-aims-plaju.destroy');
    });

    // MandatoryCertificationPlajuController
    Route::prefix('monev/shrnp/input-data/mandatory-certification-plaju')->group(function () {
        Route::get('/', [MandatoryCertificationPlajuController::class, 'index'])->name('mandatory-certification-plaju');
        Route::post('/', [MandatoryCertificationPlajuController::class, 'store'])->name('mandatory-certification-plaju.store');
        Route::get('/data', [MandatoryCertificationPlajuController::class, 'data'])->name('mandatory-certification-plaju.data');
        Route::put('/{id}', [MandatoryCertificationPlajuController::class, 'update'])->name('mandatory-certification-plaju.update');
        Route::delete('/{id}', [MandatoryCertificationPlajuController::class, 'destroy'])->name('mandatory-certification-plaju.destroy');
    });

    // PelatihanAimsPlajuController
    Route::prefix('monev/shrnp/input-data/pelatihan-aims-plaju')->group(function () {
        Route::get('/', [PelatihanAimsPlajuController::class, 'index'])->name('pelatihan-aims-plaju');
        Route::post('/', [PelatihanAimsPlajuController::class, 'store'])->name('pelatihan-aims-plaju.store');
        Route::get('/data', [PelatihanAimsPlajuController::class, 'data'])->name('pelatihan-aims-plaju.data');
        Route::put('/{id}', [PelatihanAimsPlajuController::class, 'update'])->name('pelatihan-aims-plaju.update');
        Route::delete('/{id}', [PelatihanAimsPlajuController::class, 'destroy'])->name('pelatihan-aims-plaju.destroy');
    });

    // RealAnggaranAiPlajuController
    Route::prefix('monev/shrnp/input-data/real-anggaran-ai-plaju')->group(function () {
        Route::get('/', [RealAnggaranAiPlajuController::class, 'index'])->name('real-anggaran-ai-plaju');
        Route::post('/', [RealAnggaranAiPlajuController::class, 'store'])->name('real-anggaran-ai-plaju.store');
        Route::get('/data', [RealAnggaranAiPlajuController::class, 'data'])->name('real-anggaran-ai-plaju.data');
        Route::put('/{id}', [RealAnggaranAiPlajuController::class, 'update'])->name('real-anggaran-ai-plaju.update');
        Route::delete('/{id}', [RealAnggaranAiPlajuController::class, 'destroy'])->name('real-anggaran-ai-plaju.destroy');
    });

    // RealAnggaranFigurePlajuController
    Route::prefix('monev/shrnp/input-data/real-anggaran-figure-plaju')->group(function () {
        Route::get('/', [RealAnggaranFigurePlajuController::class, 'index'])->name('real-anggaran-figure-plaju');
        Route::post('/', [RealAnggaranFigurePlajuController::class, 'store'])->name('real-anggaran-figure-plaju.store');
        Route::get('/data', [RealAnggaranFigurePlajuController::class, 'data'])->name('real-anggaran-figure-plaju.data');
        Route::put('/{id}', [RealAnggaranFigurePlajuController::class, 'update'])->name('real-anggaran-figure-plaju.update');
        Route::delete('/{id}', [RealAnggaranFigurePlajuController::class, 'destroy'])->name('real-anggaran-figure-plaju.destroy');
    });

    // RealProgFisikPlajuController
    Route::prefix('monev/shrnp/input-data/real-prog-fisik-plaju')->group(function () {
        Route::get('/', [RealProgFisikPlajuController::class, 'index'])->name('real-prog-fisik-plaju');
        Route::post('/', [RealProgFisikPlajuController::class, 'store'])->name('real-prog-fisik-plaju.store');
        Route::get('/data', [RealProgFisikPlajuController::class, 'data'])->name('real-prog-fisik-plaju.data');
        Route::put('/{id}', [RealProgFisikPlajuController::class, 'update'])->name('real-prog-fisik-plaju.update');
        Route::delete('/{id}', [RealProgFisikPlajuController::class, 'destroy'])->name('real-prog-fisik-plaju.destroy');
    });

    // RencanaPemeliharaanPlajuController
    Route::prefix('monev/shrnp/input-data/rencana-pemeliharaan-plaju')->group(function () {
        Route::get('/', [RencanaPemeliharaanPlajuController::class, 'index'])->name('rencana-pemeliharaan-plaju');
        Route::post('/', [RencanaPemeliharaanPlajuController::class, 'store'])->name('rencana-pemeliharaan-plaju.store');
        Route::get('/data', [RencanaPemeliharaanPlajuController::class, 'data'])->name('rencana-pemeliharaan-plaju.data');
        Route::put('/{id}', [RencanaPemeliharaanPlajuController::class, 'update'])->name('rencana-pemeliharaan-plaju.update');
        Route::delete('/{id}', [RencanaPemeliharaanPlajuController::class, 'destroy'])->name('rencana-pemeliharaan-plaju.destroy');
    });

    // SapAssetPlajuController
    Route::prefix('monev/shrnp/input-data/sap-asset-plaju')->group(function () {
        Route::get('/', [SapAssetPlajuController::class, 'index'])->name('sap-asset-plaju');
        Route::post('/', [SapAssetPlajuController::class, 'store'])->name('sap-asset-plaju.store');
        Route::get('/data', [SapAssetPlajuController::class, 'data'])->name('sap-asset-plaju.data');
        Route::put('/{id}', [SapAssetPlajuController::class, 'update'])->name('sap-asset-plaju.update');
        Route::delete('/{id}', [SapAssetPlajuController::class, 'destroy'])->name('sap-asset-plaju.destroy');
    });

    // SistemInformasiAimsPlajuController
    Route::prefix('monev/shrnp/input-data/sistem-informasi-aims-plaju')->group(function () {
        Route::get('/', [SistemInformasiAimsPlajuController::class, 'index'])->name('sistem-informasi-aims-plaju');
        Route::post('/', [SistemInformasiAimsPlajuController::class, 'store'])->name('sistem-informasi-aims-plaju.store');
        Route::get('/data', [SistemInformasiAimsPlajuController::class, 'data'])->name('sistem-informasi-aims-plaju.data');
        Route::put('/{id}', [SistemInformasiAimsPlajuController::class, 'update'])->name('sistem-informasi-aims-plaju.update');
        Route::delete('/{id}', [SistemInformasiAimsPlajuController::class, 'destroy'])->name('sistem-informasi-aims-plaju.destroy');
    });

    // StatusAssetAiPlajuController
    Route::prefix('monev/shrnp/input-data/plaju')->group(function () {
        Route::get('/', [StatusAssetAiPlajuController::class, 'index'])->name('plaju');
        Route::post('/', [StatusAssetAiPlajuController::class, 'store'])->name('plaju.store');
        Route::get('/data', [StatusAssetAiPlajuController::class, 'data'])->name('plaju.data');
        Route::put('/{id}', [StatusAssetAiPlajuController::class, 'update'])->name('plaju.update');
        Route::delete('/{id}', [StatusAssetAiPlajuController::class, 'destroy'])->name('plaju.destroy');
    });

    // StatusPloPlajuController
    Route::prefix('monev/shrnp/input-data/status-plo-plaju')->group(function () {
        Route::get('/', [StatusPloPlajuController::class, 'index'])->name('status-plo-plaju');
        Route::post('/', [StatusPloPlajuController::class, 'store'])->name('status-plo-plaju.store');
        Route::get('/data', [StatusPloPlajuController::class, 'data'])->name('status-plo-plaju.data');
        Route::put('/{id}', [StatusPloPlajuController::class, 'update'])->name('status-plo-plaju.update');
        Route::delete('/{id}', [StatusPloPlajuController::class, 'destroy'])->name('status-plo-plaju.destroy');
    });

    // Cilacap
    // AssetBreakdownCilacapController
    Route::prefix('monev/shrnp/input-data/asset-breakdown-cilacap')->group(function () {
        Route::get('/', [AssetBreakdownCilacapController::class, 'index'])->name('asset-breakdown-cilacap');
        Route::post('/', [AssetBreakdownCilacapController::class, 'store'])->name('asset-breakdown-cilacap.store');
        Route::get('/data', [AssetBreakdownCilacapController::class, 'data'])->name('asset-breakdown-cilacap.data');
        Route::put('/{id}', [AssetBreakdownCilacapController::class, 'update'])->name('asset-breakdown-cilacap.update');
        Route::delete('/{id}', [AssetBreakdownCilacapController::class, 'destroy'])->name('asset-breakdown-cilacap.destroy');
    });

    // StatusAssetAiCilacapController
    Route::prefix('monev/shrnp/input-data/cilacap')->group(function () {
        Route::get('/', [StatusAssetAiCilacapController::class, 'index'])->name('cilacap');
        Route::post('/', [StatusAssetAiCilacapController::class, 'store'])->name('cilacap.store');
        Route::get('/data', [StatusAssetAiCilacapController::class, 'data'])->name('cilacap.data');
        Route::put('/{id}', [StatusAssetAiCilacapController::class, 'update'])->name('cilacap.update');
        Route::delete('/{id}', [StatusAssetAiCilacapController::class, 'destroy'])->name('cilacap.destroy');
    });
    // AvailabilityCilacapController
    Route::prefix('monev/shrnp/input-data/availability-cilacap')->group(function () {
        Route::get('/', [AvailabilityCilacapController::class, 'index'])->name('availability-cilacap');
        Route::post('/', [AvailabilityCilacapController::class, 'store'])->name('availability-cilacap.store');
        Route::get('/data', [AvailabilityCilacapController::class, 'data'])->name('availability-cilacap.data');
        Route::put('/{id}', [AvailabilityCilacapController::class, 'update'])->name('availability-cilacap.update');
        Route::delete('/{id}', [AvailabilityCilacapController::class, 'destroy'])->name('availability-cilacap.destroy');
    });

    // KondisiVacantAimsCilacapController
    Route::prefix('monev/shrnp/input-data/kondisi-vacant-aims-cilacap')->group(function () {
        Route::get('/', [KondisiVacantAimsCilacapController::class, 'index'])->name('kondisi-vacant-aims-cilacap');
        Route::post('/', [KondisiVacantAimsCilacapController::class, 'store'])->name('kondisi-vacant-aims-cilacap.store');
        Route::get('/data', [KondisiVacantAimsCilacapController::class, 'data'])->name('kondisi-vacant-aims-cilacap.data');
        Route::put('/{id}', [KondisiVacantAimsCilacapController::class, 'update'])->name('kondisi-vacant-aims-cilacap.update');
        Route::delete('/{id}', [KondisiVacantAimsCilacapController::class, 'destroy'])->name('kondisi-vacant-aims-cilacap.destroy');
    });

    // MandatoryCertificationCilacapController
    Route::prefix('monev/shrnp/input-data/mandatory-certification-cilacap')->group(function () {
        Route::get('/', [MandatoryCertificationCilacapController::class, 'index'])->name('mandatory-certification-cilacap');
        Route::post('/', [MandatoryCertificationCilacapController::class, 'store'])->name('mandatory-certification-cilacap.store');
        Route::get('/data', [MandatoryCertificationCilacapController::class, 'data'])->name('mandatory-certification-cilacap.data');
        Route::put('/{id}', [MandatoryCertificationCilacapController::class, 'update'])->name('mandatory-certification-cilacap.update');
        Route::delete('/{id}', [MandatoryCertificationCilacapController::class, 'destroy'])->name('mandatory-certification-cilacap.destroy');
    });

    // PelatihanAimsCilacapController
    Route::prefix('monev/shrnp/input-data/pelatihan-aims-cilacap')->group(function () {
        Route::get('/', [PelatihanAimsCilacapController::class, 'index'])->name('pelatihan-aims-cilacap');
        Route::post('/', [PelatihanAimsCilacapController::class, 'store'])->name('pelatihan-aims-cilacap.store');
        Route::get('/data', [PelatihanAimsCilacapController::class, 'data'])->name('pelatihan-aims-cilacap.data');
        Route::put('/{id}', [PelatihanAimsCilacapController::class, 'update'])->name('pelatihan-aims-cilacap.update');
        Route::delete('/{id}', [PelatihanAimsCilacapController::class, 'destroy'])->name('pelatihan-aims-cilacap.destroy');
    });

    // RealAnggaranAiCilacapController
    Route::prefix('monev/shrnp/input-data/real-anggaran-ai-cilacap')->group(function () {
        Route::get('/', [RealAnggaranAiCilacapController::class, 'index'])->name('real-anggaran-ai-cilacap');
        Route::post('/', [RealAnggaranAiCilacapController::class, 'store'])->name('real-anggaran-ai-cilacap.store');
        Route::get('/data', [RealAnggaranAiCilacapController::class, 'data'])->name('real-anggaran-ai-cilacap.data');
        Route::put('/{id}', [RealAnggaranAiCilacapController::class, 'update'])->name('real-anggaran-ai-cilacap.update');
        Route::delete('/{id}', [RealAnggaranAiCilacapController::class, 'destroy'])->name('real-anggaran-ai-cilacap.destroy');
    });

    // RealAnggaranFigureCilacapController
    Route::prefix('monev/shrnp/input-data/real-anggaran-figure-cilacap')->group(function () {
        Route::get('/', [RealAnggaranFigureCilacapController::class, 'index'])->name('real-anggaran-figure-cilacap');
        Route::post('/', [RealAnggaranFigureCilacapController::class, 'store'])->name('real-anggaran-figure-cilacap.store');
        Route::get('/data', [RealAnggaranFigureCilacapController::class, 'data'])->name('real-anggaran-figure-cilacap.data');
        Route::put('/{id}', [RealAnggaranFigureCilacapController::class, 'update'])->name('real-anggaran-figure-cilacap.update');
        Route::delete('/{id}', [RealAnggaranFigureCilacapController::class, 'destroy'])->name('real-anggaran-figure-cilacap.destroy');
    });

    // RencanaPemeliharaanCilacapController
    Route::prefix('monev/shrnp/input-data/rencana-pemeliharaan-cilacap')->group(function () {
        Route::get('/', [RencanaPemeliharaanCilacapController::class, 'index'])->name('rencana-pemeliharaan-cilacap');
        Route::post('/', [RencanaPemeliharaanCilacapController::class, 'store'])->name('rencana-pemeliharaan-cilacap.store');
        Route::get('/data', [RencanaPemeliharaanCilacapController::class, 'data'])->name('rencana-pemeliharaan-cilacap.data');
        Route::put('/{id}', [RencanaPemeliharaanCilacapController::class, 'update'])->name('rencana-pemeliharaan-cilacap.update');
        Route::delete('/{id}', [RencanaPemeliharaanCilacapController::class, 'destroy'])->name('rencana-pemeliharaan-cilacap.destroy');
    });

    // SapAssetCilacapController
    Route::prefix('monev/shrnp/input-data/sap-asset-cilacap')->group(function () {
        Route::get('/', [SapAssetCilacapController::class, 'index'])->name('sap-asset-cilacap');
        Route::post('/', [SapAssetCilacapController::class, 'store'])->name('sap-asset-cilacap.store');
        Route::get('/data', [SapAssetCilacapController::class, 'data'])->name('sap-asset-cilacap.data');
        Route::put('/{id}', [SapAssetCilacapController::class, 'update'])->name('sap-asset-cilacap.update');
        Route::delete('/{id}', [SapAssetCilacapController::class, 'destroy'])->name('sap-asset-cilacap.destroy');
    });

    // SistemInformasiAimsCilacapController
    Route::prefix('monev/shrnp/input-data/sistem-informasi-aims-cilacap')->group(function () {
        Route::get('/', [SistemInformasiAimsCilacapController::class, 'index'])->name('sistem-informasi-aims-cilacap');
        Route::post('/', [SistemInformasiAimsCilacapController::class, 'store'])->name('sistem-informasi-aims-cilacap.store');
        Route::get('/data', [SistemInformasiAimsCilacapController::class, 'data'])->name('sistem-informasi-aims-cilacap.data');
        Route::put('/{id}', [SistemInformasiAimsCilacapController::class, 'update'])->name('sistem-informasi-aims-cilacap.update');
        Route::delete('/{id}', [SistemInformasiAimsCilacapController::class, 'destroy'])->name('sistem-informasi-aims-cilacap.destroy');
    });

    // StatusPloCilacapController
    Route::prefix('monev/shrnp/input-data/status-plo-cilacap')->group(function () {
        Route::get('/', [StatusPloCilacapController::class, 'index'])->name('status-plo-cilacap');
        Route::post('/', [StatusPloCilacapController::class, 'store'])->name('status-plo-cilacap.store');
        Route::get('/data', [StatusPloCilacapController::class, 'data'])->name('status-plo-cilacap.data');
        Route::put('/{id}', [StatusPloCilacapController::class, 'update'])->name('status-plo-cilacap.update');
        Route::delete('/{id}', [StatusPloCilacapController::class, 'destroy'])->name('status-plo-cilacap.destroy');
    });
    Route::prefix('monev/shrnp/input-data/real-prog-fisik-cilacap')->group(function () {
        Route::get('/', [RealProgFisikAiCilacapController::class, 'index'])->name('real-prog-fisik-cilacap');
        Route::post('/', [RealProgFisikAiCilacapController::class, 'store'])->name('real-prog-fisik-cilacap.store');
        Route::get('/data', [RealProgFisikAiCilacapController::class, 'data'])->name('real-prog-fisik-cilacap.data');
        Route::put('/{id}', [RealProgFisikAiCilacapController::class, 'update'])->name('real-prog-fisik-cilacap.update');
        Route::delete('/{id}', [RealProgFisikAiCilacapController::class, 'destroy'])->name('real-prog-fisik-cilacap.destroy');
    });
    // AssetBreakdownBalikpapanController
    Route::prefix('monev/shrnp/input-data/asset-breakdown-balikpapan')->group(function () {
        Route::get('/', [AssetBreakdownBalikpapanController::class, 'index'])->name('asset-breakdown-balikpapan');
        Route::post('/', [AssetBreakdownBalikpapanController::class, 'store'])->name('asset-breakdown-balikpapan.store');
        Route::get('/data', [AssetBreakdownBalikpapanController::class, 'data'])->name('asset-breakdown-balikpapan.data');
        Route::put('/{id}', [AssetBreakdownBalikpapanController::class, 'update'])->name('asset-breakdown-balikpapan.update');
        Route::delete('/{id}', [AssetBreakdownBalikpapanController::class, 'destroy'])->name('asset-breakdown-balikpapan.destroy');
    });

    // AvailabilityBalikpapanController
    Route::prefix('monev/shrnp/input-data/availability-balikpapan')->group(function () {
        Route::get('/', [AvailabilityBalikpapanController::class, 'index'])->name('availability-balikpapan');
        Route::post('/', [AvailabilityBalikpapanController::class, 'store'])->name('availability-balikpapan.store');
        Route::get('/data', [AvailabilityBalikpapanController::class, 'data'])->name('availability-balikpapan.data');
        Route::put('/{id}', [AvailabilityBalikpapanController::class, 'update'])->name('availability-balikpapan.update');
        Route::delete('/{id}', [AvailabilityBalikpapanController::class, 'destroy'])->name('availability-balikpapan.destroy');
    });

    // KondisiVacantAimsBalikpapanController
    Route::prefix('monev/shrnp/input-data/kondisi-vacant-aims-balikpapan')->group(function () {
        Route::get('/', [KondisiVacantAimsBalikpapanController::class, 'index'])->name('kondisi-vacant-aims-balikpapan');
        Route::post('/', [KondisiVacantAimsBalikpapanController::class, 'store'])->name('kondisi-vacant-aims-balikpapan.store');
        Route::get('/data', [KondisiVacantAimsBalikpapanController::class, 'data'])->name('kondisi-vacant-aims-balikpapan.data');
        Route::put('/{id}', [KondisiVacantAimsBalikpapanController::class, 'update'])->name('kondisi-vacant-aims-balikpapan.update');
        Route::delete('/{id}', [KondisiVacantAimsBalikpapanController::class, 'destroy'])->name('kondisi-vacant-aims-balikpapan.destroy');
    });

    // MandatoryCertificationBalikpapanController
    Route::prefix('monev/shrnp/input-data/mandatory-certification-balikpapan')->group(function () {
        Route::get('/', [MandatoryCertificationBalikpapanController::class, 'index'])->name('mandatory-certification-balikpapan');
        Route::post('/', [MandatoryCertificationBalikpapanController::class, 'store'])->name('mandatory-certification-balikpapan.store');
        Route::get('/data', [MandatoryCertificationBalikpapanController::class, 'data'])->name('mandatory-certification-balikpapan.data');
        Route::put('/{id}', [MandatoryCertificationBalikpapanController::class, 'update'])->name('mandatory-certification-balikpapan.update');
        Route::delete('/{id}', [MandatoryCertificationBalikpapanController::class, 'destroy'])->name('mandatory-certification-balikpapan.destroy');
    });

    // PelatihanAimsBalikpapanController
    Route::prefix('monev/shrnp/input-data/pelatihan-aims-balikpapan')->group(function () {
        Route::get('/', [PelatihanAimsBalikpapanController::class, 'index'])->name('pelatihan-aims-balikpapan');
        Route::post('/', [PelatihanAimsBalikpapanController::class, 'store'])->name('pelatihan-aims-balikpapan.store');
        Route::get('/data', [PelatihanAimsBalikpapanController::class, 'data'])->name('pelatihan-aims-balikpapan.data');
        Route::put('/{id}', [PelatihanAimsBalikpapanController::class, 'update'])->name('pelatihan-aims-balikpapan.update');
        Route::delete('/{id}', [PelatihanAimsBalikpapanController::class, 'destroy'])->name('pelatihan-aims-balikpapan.destroy');
    });

    // RealAnggaranAiBalikpapanController
    Route::prefix('monev/shrnp/input-data/realisasi-anggaran-ai-balikpapan')->group(function () {
        Route::get('/', [RealAnggaranAiBalikpapanController::class, 'index'])->name('realisasi-anggaran-ai-balikpapan');
        Route::post('/', [RealAnggaranAiBalikpapanController::class, 'store'])->name('realisasi-anggaran-ai-balikpapan.store');
        Route::get('/data', [RealAnggaranAiBalikpapanController::class, 'data'])->name('realisasi-anggaran-ai-balikpapan.data');
        Route::put('/{id}', [RealAnggaranAiBalikpapanController::class, 'update'])->name('realisasi-anggaran-ai-balikpapan.update');
        Route::delete('/{id}', [RealAnggaranAiBalikpapanController::class, 'destroy'])->name('realisasi-anggaran-ai-balikpapan.destroy');
    });

    // RealAnggaranFigureBalikpapanController
    Route::prefix('monev/shrnp/input-data/realisasi-anggaran-figure-balikpapan')->group(function () {
        Route::get('/', [RealAnggaranFigureBalikpapanController::class, 'index'])->name('realisasi-anggaran-figure-balikpapan');
        Route::post('/', [RealAnggaranFigureBalikpapanController::class, 'store'])->name('realisasi-anggaran-figure-balikpapan.store');
        Route::get('/data', [RealAnggaranFigureBalikpapanController::class, 'data'])->name('realisasi-anggaran-figure-balikpapan.data');
        Route::put('/{id}', [RealAnggaranFigureBalikpapanController::class, 'update'])->name('realisasi-anggaran-figure-balikpapan.update');
        Route::delete('/{id}', [RealAnggaranFigureBalikpapanController::class, 'destroy'])->name('realisasi-anggaran-figure-balikpapan.destroy');
    });

    // RealProgFisikAiBalikpapanController
    Route::prefix('monev/shrnp/input-data/realisasi-prog-fisik-balikpapan')->group(function () {
        Route::get('/', [RealProgFisikAiBalikpapanController::class, 'index'])->name('realisasi-prog-fisik-balikpapan');
        Route::post('/', [RealProgFisikAiBalikpapanController::class, 'store'])->name('realisasi-prog-fisik-balikpapan.store');
        Route::get('/data', [RealProgFisikAiBalikpapanController::class, 'data'])->name('realisasi-prog-fisik-balikpapan.data');
        Route::put('/{id}', [RealProgFisikAiBalikpapanController::class, 'update'])->name('realisasi-prog-fisik-balikpapan.update');
        Route::delete('/{id}', [RealProgFisikAiBalikpapanController::class, 'destroy'])->name('realisasi-prog-fisik-balikpapan.destroy');
    });

    // RencanaPemeliharaanBalikpapanController
    Route::prefix('monev/shrnp/input-data/rencana-pemeliharaan-balikpapan')->group(function () {
        Route::get('/', [RencanaPemeliharaanBalikpapanController::class, 'index'])->name('rencana-pemeliharaan-balikpapan');
        Route::post('/', [RencanaPemeliharaanBalikpapanController::class, 'store'])->name('rencana-pemeliharaan-balikpapan.store');
        Route::get('/data', [RencanaPemeliharaanBalikpapanController::class, 'data'])->name('rencana-pemeliharaan-balikpapan.data');
        Route::put('/{id}', [RencanaPemeliharaanBalikpapanController::class, 'update'])->name('rencana-pemeliharaan-balikpapan.update');
        Route::delete('/{id}', [RencanaPemeliharaanBalikpapanController::class, 'destroy'])->name('rencana-pemeliharaan-balikpapan.destroy');
    });

    // SapAssetBalikpapanController
    Route::prefix('monev/shrnp/input-data/sap-asset-balikpapan')->group(function () {
        Route::get('/', [SapAssetBalikpapanController::class, 'index'])->name('sap-asset-balikpapan');
        Route::post('/', [SapAssetBalikpapanController::class, 'store'])->name('sap-asset-balikpapan.store');
        Route::get('/data', [SapAssetBalikpapanController::class, 'data'])->name('sap-asset-balikpapan.data');
        Route::put('/{id}', [SapAssetBalikpapanController::class, 'update'])->name('sap-asset-balikpapan.update');
        Route::delete('/{id}', [SapAssetBalikpapanController::class, 'destroy'])->name('sap-asset-balikpapan.destroy');
    });

    // SistemInformasiAimsBalikpapanController
    Route::prefix('monev/shrnp/input-data/sistem-informasi-aims-balikpapan')->group(function () {
        Route::get('/', [SistemInformasiAimsBalikpapanController::class, 'index'])->name('sistem-informasi-aims-balikpapan');
        Route::post('/', [SistemInformasiAimsBalikpapanController::class, 'store'])->name('sistem-informasi-aims-balikpapan.store');
        Route::get('/data', [SistemInformasiAimsBalikpapanController::class, 'data'])->name('sistem-informasi-aims-balikpapan.data');
        Route::put('/{id}', [SistemInformasiAimsBalikpapanController::class, 'update'])->name('sistem-informasi-aims-balikpapan.update');
        Route::delete('/{id}', [SistemInformasiAimsBalikpapanController::class, 'destroy'])->name('sistem-informasi-aims-balikpapan.destroy');
    });

    // StatusAssetAiBalikpapanController
    Route::prefix('monev/shrnp/input-data/status-asset-ai-balikpapan')->group(function () {
        Route::get('/', [StatusAssetAiBalikpapanController::class, 'index'])->name('status-asset-ai-balikpapan');
        Route::post('/', [StatusAssetAiBalikpapanController::class, 'store'])->name('status-asset-ai-balikpapan.store');
        Route::get('/data', [StatusAssetAiBalikpapanController::class, 'data'])->name('status-asset-ai-balikpapan.data');
        Route::put('/{id}', [StatusAssetAiBalikpapanController::class, 'update'])->name('status-asset-ai-balikpapan.update');
        Route::delete('/{id}', [StatusAssetAiBalikpapanController::class, 'destroy'])->name('status-asset-ai-balikpapan.destroy');
    });

    // StatusPloBalikpapanController
    Route::prefix('monev/shrnp/input-data/status-plo-balikpapan')->group(function () {
        Route::get('/', [StatusPloBalikpapanController::class, 'index'])->name('status-plo-balikpapan');
        Route::post('/', [StatusPloBalikpapanController::class, 'store'])->name('status-plo-balikpapan.store');
        Route::get('/data', [StatusPloBalikpapanController::class, 'data'])->name('status-plo-balikpapan.data');
        Route::put('/{id}', [StatusPloBalikpapanController::class, 'update'])->name('status-plo-balikpapan.update');
        Route::delete('/{id}', [StatusPloBalikpapanController::class, 'destroy'])->name('status-plo-balikpapan.destroy');
    });

    // AssetBreakdownBalonganController
    Route::prefix('monev/shrnp/input-data/asset-breakdown-balongan')->group(function () {
        Route::get('/', [AssetBreakdownBalonganController::class, 'index'])->name('asset-breakdown-balongan');
        Route::post('/', [AssetBreakdownBalonganController::class, 'store'])->name('asset-breakdown-balongan.store');
        Route::get('/data', [AssetBreakdownBalonganController::class, 'data'])->name('asset-breakdown-balongan.data');
        Route::put('/{id}', [AssetBreakdownBalonganController::class, 'update'])->name('asset-breakdown-balongan.update');
        Route::delete('/{id}', [AssetBreakdownBalonganController::class, 'destroy'])->name('asset-breakdown-balongan.destroy');
    });

    // AvailabilityBalonganController
    Route::prefix('monev/shrnp/input-data/availability-balongan')->group(function () {
        Route::get('/', [AvailabilityBalonganController::class, 'index'])->name('availability-balongan');
        Route::post('/', [AvailabilityBalonganController::class, 'store'])->name('availability-balongan.store');
        Route::get('/data', [AvailabilityBalonganController::class, 'data'])->name('availability-balongan.data');
        Route::put('/{id}', [AvailabilityBalonganController::class, 'update'])->name('availability-balongan.update');
        Route::delete('/{id}', [AvailabilityBalonganController::class, 'destroy'])->name('availability-balongan.destroy');
    });

    // KondisiVacantAimsBalonganController
    Route::prefix('monev/shrnp/input-data/kondisi-vacant-aims-balongan')->group(function () {
        Route::get('/', [KondisiVacantAimsBalonganController::class, 'index'])->name('kondisi-vacant-aims-balongan');
        Route::post('/', [KondisiVacantAimsBalonganController::class, 'store'])->name('kondisi-vacant-aims-balongan.store');
        Route::get('/data', [KondisiVacantAimsBalonganController::class, 'data'])->name('kondisi-vacant-aims-balongan.data');
        Route::put('/{id}', [KondisiVacantAimsBalonganController::class, 'update'])->name('kondisi-vacant-aims-balongan.update');
        Route::delete('/{id}', [KondisiVacantAimsBalonganController::class, 'destroy'])->name('kondisi-vacant-aims-balongan.destroy');
    });

    // MandatoryCertificationBalonganController
    Route::prefix('monev/shrnp/input-data/mandatory-certification-balongan')->group(function () {
        Route::get('/', [MandatoryCertificationBalonganController::class, 'index'])->name('mandatory-certification-balongan');
        Route::post('/', [MandatoryCertificationBalonganController::class, 'store'])->name('mandatory-certification-balongan.store');
        Route::get('/data', [MandatoryCertificationBalonganController::class, 'data'])->name('mandatory-certification-balongan.data');
        Route::put('/{id}', [MandatoryCertificationBalonganController::class, 'update'])->name('mandatory-certification-balongan.update');
        Route::delete('/{id}', [MandatoryCertificationBalonganController::class, 'destroy'])->name('mandatory-certification-balongan.destroy');
    });

    // PelatihanAimsBalonganController
    Route::prefix('monev/shrnp/input-data/pelatihan-aims-balongan')->group(function () {
        Route::get('/', [PelatihanAimsBalonganController::class, 'index'])->name('pelatihan-aims-balongan');
        Route::post('/', [PelatihanAimsBalonganController::class, 'store'])->name('pelatihan-aims-balongan.store');
        Route::get('/data', [PelatihanAimsBalonganController::class, 'data'])->name('pelatihan-aims-balongan.data');
        Route::put('/{id}', [PelatihanAimsBalonganController::class, 'update'])->name('pelatihan-aims-balongan.update');
        Route::delete('/{id}', [PelatihanAimsBalonganController::class, 'destroy'])->name('pelatihan-aims-balongan.destroy');
    });

    // RealisasiAnggaranAiBalonganController
    Route::prefix('monev/shrnp/input-data/realisasi-anggaran-ai-balongan')->group(function () {
        Route::get('/', [RealisasiAnggaranAiBalonganController::class, 'index'])->name('realisasi-anggaran-ai-balongan');
        Route::post('/', [RealisasiAnggaranAiBalonganController::class, 'store'])->name('realisasi-anggaran-ai-balongan.store');
        Route::get('/data', [RealisasiAnggaranAiBalonganController::class, 'data'])->name('realisasi-anggaran-ai-balongan.data');
        Route::put('/{id}', [RealisasiAnggaranAiBalonganController::class, 'update'])->name('realisasi-anggaran-ai-balongan.update');
        Route::delete('/{id}', [RealisasiAnggaranAiBalonganController::class, 'destroy'])->name('realisasi-anggaran-ai-balongan.destroy');
    });

    // RealisasiAnggaranFigureBalonganController
    Route::prefix('monev/shrnp/input-data/realisasi-anggaran-figure-balongan')->group(function () {
        Route::get('/', [RealisasiAnggaranFigureBalonganController::class, 'index'])->name('realisasi-anggaran-figure-balongan');
        Route::post('/', [RealisasiAnggaranFigureBalonganController::class, 'store'])->name('realisasi-anggaran-figure-balongan.store');
        Route::get('/data', [RealisasiAnggaranFigureBalonganController::class, 'data'])->name('realisasi-anggaran-figure-balongan.data');
        Route::put('/{id}', [RealisasiAnggaranFigureBalonganController::class, 'update'])->name('realisasi-anggaran-figure-balongan.update');
        Route::delete('/{id}', [RealisasiAnggaranFigureBalonganController::class, 'destroy'])->name('realisasi-anggaran-figure-balongan.destroy');
    });

    // RealisasiProgFisikAiBalonganController
    Route::prefix('monev/shrnp/input-data/realisasi-prog-fisik-balongan')->group(function () {
        Route::get('/', [RealisasiProgFisikAiBalonganController::class, 'index'])->name('realisasi-prog-fisik-balongan');
        Route::post('/', [RealisasiProgFisikAiBalonganController::class, 'store'])->name('realisasi-prog-fisik-balongan.store');
        Route::get('/data', [RealisasiProgFisikAiBalonganController::class, 'data'])->name('realisasi-prog-fisik-balongan.data');
        Route::put('/{id}', [RealisasiProgFisikAiBalonganController::class, 'update'])->name('realisasi-prog-fisik-balongan.update');
        Route::delete('/{id}', [RealisasiProgFisikAiBalonganController::class, 'destroy'])->name('realisasi-prog-fisik-balongan.destroy');
    });

    // RencanaPemeliharaanBalonganController
    Route::prefix('monev/shrnp/input-data/rencana-pemeliharaan-balongan')->group(function () {
        Route::get('/', [RencanaPemeliharaanBalonganController::class, 'index'])->name('rencana-pemeliharaan-balongan');
        Route::post('/', [RencanaPemeliharaanBalonganController::class, 'store'])->name('rencana-pemeliharaan-balongan.store');
        Route::get('/data', [RencanaPemeliharaanBalonganController::class, 'data'])->name('rencana-pemeliharaan-balongan.data');
        Route::put('/{id}', [RencanaPemeliharaanBalonganController::class, 'update'])->name('rencana-pemeliharaan-balongan.update');
        Route::delete('/{id}', [RencanaPemeliharaanBalonganController::class, 'destroy'])->name('rencana-pemeliharaan-balongan.destroy');
    });

    // SapAssetBalonganController
    Route::prefix('monev/shrnp/input-data/sap-asset-balongan')->group(function () {
        Route::get('/', [SapAssetBalonganController::class, 'index'])->name('sap-asset-balongan');
        Route::post('/', [SapAssetBalonganController::class, 'store'])->name('sap-asset-balongan.store');
        Route::get('/data', [SapAssetBalonganController::class, 'data'])->name('sap-asset-balongan.data');
        Route::put('/{id}', [SapAssetBalonganController::class, 'update'])->name('sap-asset-balongan.update');
        Route::delete('/{id}', [SapAssetBalonganController::class, 'destroy'])->name('sap-asset-balongan.destroy');
    });

    // SistemInformasiAimsBalonganController
    Route::prefix('monev/shrnp/input-data/sistem-informasi-aims-balongan')->group(function () {
        Route::get('/', [SistemInformasiAimsBalonganController::class, 'index'])->name('sistem-informasi-aims-balongan');
        Route::post('/', [SistemInformasiAimsBalonganController::class, 'store'])->name('sistem-informasi-aims-balongan.store');
        Route::get('/data', [SistemInformasiAimsBalonganController::class, 'data'])->name('sistem-informasi-aims-balongan.data');
        Route::put('/{id}', [SistemInformasiAimsBalonganController::class, 'update'])->name('sistem-informasi-aims-balongan.update');
        Route::delete('/{id}', [SistemInformasiAimsBalonganController::class, 'destroy'])->name('sistem-informasi-aims-balongan.destroy');
    });


    // StatusAssetAiBalonganController
    Route::prefix('monev/shrnp/input-data/status-asset-ai-balongan')->group(function () {
        Route::get('/', [StatusAssetAiBalonganController::class, 'index'])->name('status-asset-ai-balongan');
        Route::post('/', [StatusAssetAiBalonganController::class, 'store'])->name('status-asset-ai-balongan.store');
        Route::get('/data', [StatusAssetAiBalonganController::class, 'data'])->name('status-asset-ai-balongan.data');
        Route::put('/{id}', [StatusAssetAiBalonganController::class, 'update'])->name('status-asset-ai-balongan.update');
        Route::delete('/{id}', [StatusAssetAiBalonganController::class, 'destroy'])->name('status-asset-ai-balongan.destroy');
    });

    // StatusPloBalonganController
    Route::prefix('monev/shrnp/input-data/status-plo-balongan')->group(function () {
        Route::get('/', [StatusPloBalonganController::class, 'index'])->name('status-plo-balongan');
        Route::post('/', [StatusPloBalonganController::class, 'store'])->name('status-plo-balongan.store');
        Route::get('/data', [StatusPloBalonganController::class, 'data'])->name('status-plo-balongan.data');
        Route::put('/{id}', [StatusPloBalonganController::class, 'update'])->name('status-plo-balongan.update');
        Route::delete('/{id}', [StatusPloBalonganController::class, 'destroy'])->name('status-plo-balongan.destroy');
    });
    // AssetBreakdownKasimController
    Route::prefix('monev/shrnp/input-data/asset-breakdown-kasim')->group(function () {
        Route::get('/', [AssetBreakdownKasimController::class, 'index'])->name('asset-breakdown-kasim');
        Route::post('/', [AssetBreakdownKasimController::class, 'store'])->name('asset-breakdown-kasim.store');
        Route::get('/data', [AssetBreakdownKasimController::class, 'data'])->name('asset-breakdown-kasim.data');
        Route::put('/{id}', [AssetBreakdownKasimController::class, 'update'])->name('asset-breakdown-kasim.update');
        Route::delete('/{id}', [AssetBreakdownKasimController::class, 'destroy'])->name('asset-breakdown-kasim.destroy');
    });

    // KondisiVacantAimsKasimController
    Route::prefix('monev/shrnp/input-data/kondisi-vacant-aims-kasim')->group(function () {
        Route::get('/', [KondisiVacantAimsKasimController::class, 'index'])->name('kondisi-vacant-aims-kasim');
        Route::post('/', [KondisiVacantAimsKasimController::class, 'store'])->name('kondisi-vacant-aims-kasim.store');
        Route::get('/data', [KondisiVacantAimsKasimController::class, 'data'])->name('kondisi-vacant-aims-kasim.data');
        Route::put('/{id}', [KondisiVacantAimsKasimController::class, 'update'])->name('kondisi-vacant-aims-kasim.update');
        Route::delete('/{id}', [KondisiVacantAimsKasimController::class, 'destroy'])->name('kondisi-vacant-aims-kasim.destroy');
    });

    // MandatoryCertificationKasimController
    Route::prefix('monev/shrnp/input-data/mandatory-certification-kasim')->group(function () {
        Route::get('/', [MandatoryCertificationKasimController::class, 'index'])->name('mandatory-certification-kasim');
        Route::post('/', [MandatoryCertificationKasimController::class, 'store'])->name('mandatory-certification-kasim.store');
        Route::get('/data', [MandatoryCertificationKasimController::class, 'data'])->name('mandatory-certification-kasim.data');
        Route::put('/{id}', [MandatoryCertificationKasimController::class, 'update'])->name('mandatory-certification-kasim.update');
        Route::delete('/{id}', [MandatoryCertificationKasimController::class, 'destroy'])->name('mandatory-certification-kasim.destroy');
    });

    // PelatihanAimsKasimController
    Route::prefix('monev/shrnp/input-data/pelatihan-aims-kasim')->group(function () {
        Route::get('/', [PelatihanAimsKasimController::class, 'index'])->name('pelatihan-aims-kasim');
        Route::post('/', [PelatihanAimsKasimController::class, 'store'])->name('pelatihan-aims-kasim.store');
        Route::get('/data', [PelatihanAimsKasimController::class, 'data'])->name('pelatihan-aims-kasim.data');
        Route::put('/{id}', [PelatihanAimsKasimController::class, 'update'])->name('pelatihan-aims-kasim.update');
        Route::delete('/{id}', [PelatihanAimsKasimController::class, 'destroy'])->name('pelatihan-aims-kasim.destroy');
    });

    // RealAnggaranAiKasimController
    Route::prefix('monev/shrnp/input-data/realisasi-anggaran-ai-kasim')->group(function () {
        Route::get('/', [RealAnggaranAiKasimController::class, 'index'])->name('realisasi-anggaran-ai-kasim');
        Route::post('/', [RealAnggaranAiKasimController::class, 'store'])->name('realisasi-anggaran-ai-kasim.store');
        Route::get('/data', [RealAnggaranAiKasimController::class, 'data'])->name('realisasi-anggaran-ai-kasim.data');
        Route::put('/{id}', [RealAnggaranAiKasimController::class, 'update'])->name('realisasi-anggaran-ai-kasim.update');
        Route::delete('/{id}', [RealAnggaranAiKasimController::class, 'destroy'])->name('realisasi-anggaran-ai-kasim.destroy');
    });

    // RealAnggaranFigureKasimController
    Route::prefix('monev/shrnp/input-data/realisasi-anggaran-figure-kasim')->group(function () {
        Route::get('/', [RealAnggaranFigureKasimController::class, 'index'])->name('realisasi-anggaran-figure-kasim');
        Route::post('/', [RealAnggaranFigureKasimController::class, 'store'])->name('realisasi-anggaran-figure-kasim.store');
        Route::get('/data', [RealAnggaranFigureKasimController::class, 'data'])->name('realisasi-anggaran-figure-kasim.data');
        Route::put('/{id}', [RealAnggaranFigureKasimController::class, 'update'])->name('realisasi-anggaran-figure-kasim.update');
        Route::delete('/{id}', [RealAnggaranFigureKasimController::class, 'destroy'])->name('realisasi-anggaran-figure-kasim.destroy');
    });

    // RealProgFisikAiKasimController
    Route::prefix('monev/shrnp/input-data/realisasi-prog-fisik-ai-kasim')->group(function () {
        Route::get('/', [RealProgFisikAiKasimController::class, 'index'])->name('realisasi-prog-fisik-ai-kasim');
        Route::post('/', [RealProgFisikAiKasimController::class, 'store'])->name('realisasi-prog-fisik-ai-kasim.store');
        Route::get('/data', [RealProgFisikAiKasimController::class, 'data'])->name('realisasi-prog-fisik-ai-kasim.data');
        Route::put('/{id}', [RealProgFisikAiKasimController::class, 'update'])->name('realisasi-prog-fisik-ai-kasim.update');
        Route::delete('/{id}', [RealProgFisikAiKasimController::class, 'destroy'])->name('realisasi-prog-fisik-ai-kasim.destroy');
    });

    // RencanaPemeliharaanKasimController
    Route::prefix('monev/shrnp/input-data/rencana-pemeliharaan-kasim')->group(function () {
        Route::get('/', [RencanaPemeliharaanKasimController::class, 'index'])->name('rencana-pemeliharaan-kasim');
        Route::post('/', [RencanaPemeliharaanKasimController::class, 'store'])->name('rencana-pemeliharaan-kasim.store');
        Route::get('/data', [RencanaPemeliharaanKasimController::class, 'data'])->name('rencana-pemeliharaan-kasim.data');
        Route::put('/{id}', [RencanaPemeliharaanKasimController::class, 'update'])->name('rencana-pemeliharaan-kasim.update');
        Route::delete('/{id}', [RencanaPemeliharaanKasimController::class, 'destroy'])->name('rencana-pemeliharaan-kasim.destroy');
    });

    // SapAssetKasimController
    Route::prefix('monev/shrnp/input-data/sap-asset-kasim')->group(function () {
        Route::get('/', [SapAssetKasimController::class, 'index'])->name('sap-asset-kasim');
        Route::post('/', [SapAssetKasimController::class, 'store'])->name('sap-asset-kasim.store');
        Route::get('/data', [SapAssetKasimController::class, 'data'])->name('sap-asset-kasim.data');
        Route::put('/{id}', [SapAssetKasimController::class, 'update'])->name('sap-asset-kasim.update');
        Route::delete('/{id}', [SapAssetKasimController::class, 'destroy'])->name('sap-asset-kasim.destroy');
    });

    // SistemInformasiAimsKasimController
    Route::prefix('monev/shrnp/input-data/sistem-informasi-aims-kasim')->group(function () {
        Route::get('/', [SistemInformasiAimsKasimController::class, 'index'])->name('sistem-informasi-aims-kasim');
        Route::post('/', [SistemInformasiAimsKasimController::class, 'store'])->name('sistem-informasi-aims-kasim.store');
        Route::get('/data', [SistemInformasiAimsKasimController::class, 'data'])->name('sistem-informasi-aims-kasim.data');
        Route::put('/{id}', [SistemInformasiAimsKasimController::class, 'update'])->name('sistem-informasi-aims-kasim.update');
        Route::delete('/{id}', [SistemInformasiAimsKasimController::class, 'destroy'])->name('sistem-informasi-aims-kasim.destroy');
    });

    // StatusAssetAiKasimController
    Route::prefix('monev/shrnp/input-data/status-asset-ai-kasim')->group(function () {
        Route::get('/', [StatusAssetAiKasimController::class, 'index'])->name('status-asset-ai-kasim');
        Route::post('/', [StatusAssetAiKasimController::class, 'store'])->name('status-asset-ai-kasim.store');
        Route::get('/data', [StatusAssetAiKasimController::class, 'data'])->name('status-asset-ai-kasim.data');
        Route::put('/{id}', [StatusAssetAiKasimController::class, 'update'])->name('status-asset-ai-kasim.update');
        Route::delete('/{id}', [StatusAssetAiKasimController::class, 'destroy'])->name('status-asset-ai-kasim.destroy');
    });

    // StatusPloKasimController
    Route::prefix('monev/shrnp/input-data/status-plo-kasim')->group(function () {
        Route::get('/', [StatusPloKasimController::class, 'index'])->name('status-plo-kasim');
        Route::post('/', [StatusPloKasimController::class, 'store'])->name('status-plo-kasim.store');
        Route::get('/data', [StatusPloKasimController::class, 'data'])->name('status-plo-kasim.data');
        Route::put('/{id}', [StatusPloKasimController::class, 'update'])->name('status-plo-kasim.update');
        Route::delete('/{id}', [StatusPloKasimController::class, 'destroy'])->name('status-plo-kasim.destroy');
    });
    // AvailabilityKasimController
    Route::prefix('monev/shrnp/input-data/availability-kasim')->group(function () {
        Route::get('/', [AvailabilityKasimController::class, 'index'])->name('availability-kasim');
        Route::post('/', [AvailabilityKasimController::class, 'store'])->name('availability-kasim.store');
        Route::get('/data', [AvailabilityKasimController::class, 'data'])->name('availability-kasim.data');
        Route::put('/{id}', [AvailabilityKasimController::class, 'update'])->name('availability-kasim.update');
        Route::delete('/{id}', [AvailabilityKasimController::class, 'destroy'])->name('availability-kasim.destroy');
    });





    // SHU Asset Breadown Regional 1
    Route::prefix('monev/shu/input-data/aset-breakdown-regional-1')->group(function () {
        Route::get('/', [Regional1AssetBreakdownController::class, 'index'])->name('aset-breakdown-regional-1');
        Route::post('/', [Regional1AssetBreakdownController::class, 'store'])->name('aset-breakdown-regional-1.store');
        Route::get('/data', [Regional1AssetBreakdownController::class, 'data'])->name('aset-breakdown-regional-1.data');
        Route::put('/{id}', [Regional1AssetBreakdownController::class, 'update'])->name('aset-breakdown-regional-1.update');
        Route::delete('/{id}', [Regional1AssetBreakdownController::class, 'destroy'])->name('aset-breakdown-regional-1.destroy');
    });

    // SHU Asset Breakdown Regional 2
    Route::prefix('monev/shu/input-data/aset-breakdown-regional-2')->group(function () {
        Route::get('/', [Regional2AssetBreakdownController::class, 'index'])->name('aset-breakdown-regional-2');
        Route::post('/', [Regional2AssetBreakdownController::class, 'store'])->name('aset-breakdown-regional-2.store');
        Route::get('/data', [Regional2AssetBreakdownController::class, 'data'])->name('aset-breakdown-regional-2.data');
        Route::put('/{id}', [Regional2AssetBreakdownController::class, 'update'])->name('aset-breakdown-regional-2.update');
        Route::delete('/{id}', [Regional2AssetBreakdownController::class, 'destroy'])->name('aset-breakdown-regional-2.destroy');
    });

    // SHU Asset Breakdown Regional 3
    Route::prefix('monev/shu/input-data/aset-breakdown-regional-3')->group(function () {
        Route::get('/', [Regional3AssetBreakdownController::class, 'index'])->name('aset-breakdown-regional-3');
        Route::post('/', [Regional3AssetBreakdownController::class, 'store'])->name('aset-breakdown-regional-3.store');
        Route::get('/data', [Regional3AssetBreakdownController::class, 'data'])->name('aset-breakdown-regional-3.data');
        Route::put('/{id}', [Regional3AssetBreakdownController::class, 'update'])->name('aset-breakdown-regional-3.update');
        Route::delete('/{id}', [Regional3AssetBreakdownController::class, 'destroy'])->name('aset-breakdown-regional-3.destroy');
    });

    // SHU Asset Breakdown Regional 4
    Route::prefix('monev/shu/input-data/aset-breakdown-regional-4')->group(function () {
        Route::get('/', [Regional4AssetBreakdownController::class, 'index'])->name('aset-breakdown-regional-4');
        Route::post('/', [Regional4AssetBreakdownController::class, 'store'])->name('aset-breakdown-regional-4.store');
        Route::get('/data', [Regional4AssetBreakdownController::class, 'data'])->name('aset-breakdown-regional-4.data');
        Route::put('/{id}', [Regional4AssetBreakdownController::class, 'update'])->name('aset-breakdown-regional-4.update');
        Route::delete('/{id}', [Regional4AssetBreakdownController::class, 'destroy'])->name('aset-breakdown-regional-4.destroy');
    });

    // SHU Availability Regional 1
    Route::prefix('monev/shu/input-data/availability-regional-1')->group(function () {
        Route::get('/', [Regional1AvailabilityController::class, 'index'])->name('availability-regional-1');
        Route::post('/', [Regional1AvailabilityController::class, 'store'])->name('availability-regional-1.store');
        Route::get('/data', [Regional1AvailabilityController::class, 'data'])->name('availability-regional-1.data');
        Route::put('/{id}', [Regional1AvailabilityController::class, 'update'])->name('availability-regional-1.update');
        Route::delete('/{id}', [Regional1AvailabilityController::class, 'destroy'])->name('availability-regional-1.destroy');
    });

    // SHU Availability Regional 2
    Route::prefix('monev/shu/input-data/availability-regional-2')->group(function () {
        Route::get('/', [Regional2AvailabilityController::class, 'index'])->name('availability-regional-2');
        Route::post('/', [Regional2AvailabilityController::class, 'store'])->name('availability-regional-2.store');
        Route::get('/data', [Regional2AvailabilityController::class, 'data'])->name('availability-regional-2.data');
        Route::put('/{id}', [Regional2AvailabilityController::class, 'update'])->name('availability-regional-2.update');
        Route::delete('/{id}', [Regional2AvailabilityController::class, 'destroy'])->name('availability-regional-2.destroy');
    });

    // SHU Availability Regional 3
    Route::prefix('monev/shu/input-data/availability-regional-3')->group(function () {
        Route::get('/', [Regional3AvailabilityController::class, 'index'])->name('availability-regional-3');
        Route::post('/', [Regional3AvailabilityController::class, 'store'])->name('availability-regional-3.store');
        Route::get('/data', [Regional3AvailabilityController::class, 'data'])->name('availability-regional-3.data');
        Route::put('/{id}', [Regional3AvailabilityController::class, 'update'])->name('availability-regional-3.update');
        Route::delete('/{id}', [Regional3AvailabilityController::class, 'destroy'])->name('availability-regional-3.destroy');
    });

    // SHU Availability Regional 4
    Route::prefix('monev/shu/input-data/availability-regional-4')->group(function () {
        Route::get('/', [Regional4AvailabilityController::class, 'index'])->name('availability-regional-4');
        Route::post('/', [Regional4AvailabilityController::class, 'store'])->name('availability-regional-4.store');
        Route::get('/data', [Regional4AvailabilityController::class, 'data'])->name('availability-regional-4.data');
        Route::put('/{id}', [Regional4AvailabilityController::class, 'update'])->name('availability-regional-4.update');
        Route::delete('/{id}', [Regional4AvailabilityController::class, 'destroy'])->name('availability-regional-4.destroy');
    });

    // Regional1PelatihanAimsController
    Route::prefix('monev/shu/input-data/pelatihan-aims-regional-1')->group(function () {
        Route::get('/', [Regional1PelatihanAimsController::class, 'index'])->name('pelatihan-aims-regional-1');
        Route::post('/', [Regional1PelatihanAimsController::class, 'store'])->name('pelatihan-aims-regional-1.store');
        Route::get('/data', [Regional1PelatihanAimsController::class, 'data'])->name('pelatihan-aims-regional-1.data');
        Route::put('/{id}', [Regional1PelatihanAimsController::class, 'update'])->name('pelatihan-aims-regional-1.update');
        Route::delete('/{id}', [Regional1PelatihanAimsController::class, 'destroy'])->name('pelatihan-aims-regional-1.destroy');
    });

    // Regional2PelatihanAimsController
    Route::prefix('monev/shu/input-data/pelatihan-aims-regional-2')->group(function () {
        Route::get('/', [Regional2PelatihanAimsController::class, 'index'])->name('pelatihan-aims-regional-2');
        Route::post('/', [Regional2PelatihanAimsController::class, 'store'])->name('pelatihan-aims-regional-2.store');
        Route::get('/data', [Regional2PelatihanAimsController::class, 'data'])->name('pelatihan-aims-regional-2.data');
        Route::put('/{id}', [Regional2PelatihanAimsController::class, 'update'])->name('pelatihan-aims-regional-2.update');
        Route::delete('/{id}', [Regional2PelatihanAimsController::class, 'destroy'])->name('pelatihan-aims-regional-2.destroy');
    });

    // Regional3PelatihanAimsController
    Route::prefix('monev/shu/input-data/pelatihan-aims-regional-3')->group(function () {
        Route::get('/', [Regional3PelatihanAimsController::class, 'index'])->name('pelatihan-aims-regional-3');
        Route::post('/', [Regional3PelatihanAimsController::class, 'store'])->name('pelatihan-aims-regional-3.store');
        Route::get('/data', [Regional3PelatihanAimsController::class, 'data'])->name('pelatihan-aims-regional-3.data');
        Route::put('/{id}', [Regional3PelatihanAimsController::class, 'update'])->name('pelatihan-aims-regional-3.update');
        Route::delete('/{id}', [Regional3PelatihanAimsController::class, 'destroy'])->name('pelatihan-aims-regional-3.destroy');
    });

    // Regional4PelatihanAimsController
    Route::prefix('monev/shu/input-data/pelatihan-aims-regional-4')->group(function () {
        Route::get('/', [Regional4PelatihanAimsController::class, 'index'])->name('pelatihan-aims-regional-4');
        Route::post('/', [Regional4PelatihanAimsController::class, 'store'])->name('pelatihan-aims-regional-4.store');
        Route::get('/data', [Regional4PelatihanAimsController::class, 'data'])->name('pelatihan-aims-regional-4.data');
        Route::put('/{id}', [Regional4PelatihanAimsController::class, 'update'])->name('pelatihan-aims-regional-4.update');
        Route::delete('/{id}', [Regional4PelatihanAimsController::class, 'destroy'])->name('pelatihan-aims-regional-4.destroy');
    });

    // Regional1SistemInformasiController
    Route::prefix('monev/shu/input-data/sistem-informasi-aims-regional-1')->group(function () {
        Route::get('/', [Regional1SistemInformasiController::class, 'index'])->name('sistem-informasi-aims-regional-1');
        Route::post('/', [Regional1SistemInformasiController::class, 'store'])->name('sistem-informasi-aims-regional-1.store');
        Route::get('/data', [Regional1SistemInformasiController::class, 'data'])->name('sistem-informasi-aims-regional-1.data');
        Route::put('/{id}', [Regional1SistemInformasiController::class, 'update'])->name('sistem-informasi-aims-regional-1.update');
        Route::delete('/{id}', [Regional1SistemInformasiController::class, 'destroy'])->name('sistem-informasi-aims-regional-1.destroy');
    });

    // Regional2SistemInformasiController
    Route::prefix('monev/shu/input-data/sistem-informasi-aims-regional-2')->group(function () {
        Route::get('/', [Regional2SistemInformasiController::class, 'index'])->name('sistem-informasi-aims-regional-2');
        Route::post('/', [Regional2SistemInformasiController::class, 'store'])->name('sistem-informasi-aims-regional-2.store');
        Route::get('/data', [Regional2SistemInformasiController::class, 'data'])->name('sistem-informasi-aims-regional-2.data');
        Route::put('/{id}', [Regional2SistemInformasiController::class, 'update'])->name('sistem-informasi-aims-regional-2.update');
        Route::delete('/{id}', [Regional2SistemInformasiController::class, 'destroy'])->name('sistem-informasi-aims-regional-2.destroy');
    });

    // Regional3SistemInformasiController
    Route::prefix('monev/shu/input-data/sistem-informasi-aims-regional-3')->group(function () {
        Route::get('/', [Regional3SistemInformasiController::class, 'index'])->name('sistem-informasi-aims-regional-3');
        Route::post('/', [Regional3SistemInformasiController::class, 'store'])->name('sistem-informasi-aims-regional-3.store');
        Route::get('/data', [Regional3SistemInformasiController::class, 'data'])->name('sistem-informasi-aims-regional-3.data');
        Route::put('/{id}', [Regional3SistemInformasiController::class, 'update'])->name('sistem-informasi-aims-regional-3.update');
        Route::delete('/{id}', [Regional3SistemInformasiController::class, 'destroy'])->name('sistem-informasi-aims-regional-3.destroy');
    });

    // Regional4SistemInformasiController
    Route::prefix('monev/shu/input-data/sistem-informasi-aims-regional-4')->group(function () {
        Route::get('/', [Regional4SistemInformasiController::class, 'index'])->name('sistem-informasi-aims-regional-4');
        Route::post('/', [Regional4SistemInformasiController::class, 'store'])->name('sistem-informasi-aims-regional-4.store');
        Route::get('/data', [Regional4SistemInformasiController::class, 'data'])->name('sistem-informasi-aims-regional-4.data');
        Route::put('/{id}', [Regional4SistemInformasiController::class, 'update'])->name('sistem-informasi-aims-regional-4.update');
        Route::delete('/{id}', [Regional4SistemInformasiController::class, 'destroy'])->name('sistem-informasi-aims-regional-4.destroy');
    });

    // Regional1RencanaPemeliharaanController
    Route::prefix('monev/shu/input-data/rencana-pemeliharaan-regional-1')->group(function () {
        Route::get('/', [Regional1RencanaPemeliharaanController::class, 'index'])->name('rencana-pemeliharaan-regional-1');
        Route::post('/', [Regional1RencanaPemeliharaanController::class, 'store'])->name('rencana-pemeliharaan-regional-1.store');
        Route::get('/data', [Regional1RencanaPemeliharaanController::class, 'data'])->name('rencana-pemeliharaan-regional-1.data');
        Route::put('/{id}', [Regional1RencanaPemeliharaanController::class, 'update'])->name('rencana-pemeliharaan-regional-1.update');
        Route::delete('/{id}', [Regional1RencanaPemeliharaanController::class, 'destroy'])->name('rencana-pemeliharaan-regional-1.destroy');
    });

    // Regional2RencanaPemeliharaanController
    Route::prefix('monev/shu/input-data/rencana-pemeliharaan-regional-2')->group(function () {
        Route::get('/', [Regional2RencanaPemeliharaanController::class, 'index'])->name('rencana-pemeliharaan-regional-2');
        Route::post('/', [Regional2RencanaPemeliharaanController::class, 'store'])->name('rencana-pemeliharaan-regional-2.store');
        Route::get('/data', [Regional2RencanaPemeliharaanController::class, 'data'])->name('rencana-pemeliharaan-regional-2.data');
        Route::put('/{id}', [Regional2RencanaPemeliharaanController::class, 'update'])->name('rencana-pemeliharaan-regional-2.update');
        Route::delete('/{id}', [Regional2RencanaPemeliharaanController::class, 'destroy'])->name('rencana-pemeliharaan-regional-2.destroy');
    });

    // Regional3RencanaPemeliharaanController
    Route::prefix('monev/shu/input-data/rencana-pemeliharaan-regional-3')->group(function () {
        Route::get('/', [Regional3RencanaPemeliharaanController::class, 'index'])->name('rencana-pemeliharaan-regional-3');
        Route::post('/', [Regional3RencanaPemeliharaanController::class, 'store'])->name('rencana-pemeliharaan-regional-3.store');
        Route::get('/data', [Regional3RencanaPemeliharaanController::class, 'data'])->name('rencana-pemeliharaan-regional-3.data');
        Route::put('/{id}', [Regional3RencanaPemeliharaanController::class, 'update'])->name('rencana-pemeliharaan-regional-3.update');
        Route::delete('/{id}', [Regional3RencanaPemeliharaanController::class, 'destroy'])->name('rencana-pemeliharaan-regional-3.destroy');
    });

    // Regional4RencanaPemeliharaanController
    Route::prefix('monev/shu/input-data/rencana-pemeliharaan-regional-4')->group(function () {
        Route::get('/', [Regional4RencanaPemeliharaanController::class, 'index'])->name('rencana-pemeliharaan-regional-4');
        Route::post('/', [Regional4RencanaPemeliharaanController::class, 'store'])->name('rencana-pemeliharaan-regional-4.store');
        Route::get('/data', [Regional4RencanaPemeliharaanController::class, 'data'])->name('rencana-pemeliharaan-regional-4.data');
        Route::put('/{id}', [Regional4RencanaPemeliharaanController::class, 'update'])->name('rencana-pemeliharaan-regional-4.update');
        Route::delete('/{id}', [Regional4RencanaPemeliharaanController::class, 'destroy'])->name('rencana-pemeliharaan-regional-4.destroy');
    });
    // Regional1MandatoryCertificationController
    Route::prefix('monev/shu/input-data/mandatory-certification-regional-1')->group(function () {
        Route::get('/', [Regional1MandatoryCertificationController::class, 'index'])->name('mandatory-certification-regional-1');
        Route::post('/', [Regional1MandatoryCertificationController::class, 'store'])->name('mandatory-certification-regional-1.store');
        Route::get('/data', [Regional1MandatoryCertificationController::class, 'data'])->name('mandatory-certification-regional-1.data');
        Route::put('/{id}', [Regional1MandatoryCertificationController::class, 'update'])->name('mandatory-certification-regional-1.update');
        Route::delete('/{id}', [Regional1MandatoryCertificationController::class, 'destroy'])->name('mandatory-certification-regional-1.destroy');
    });

    // Regional2MandatoryCertificationController
    Route::prefix('monev/shu/input-data/mandatory-certification-regional-2')->group(function () {
        Route::get('/', [Regional2MandatoryCertificationController::class, 'index'])->name('mandatory-certification-regional-2');
        Route::post('/', [Regional2MandatoryCertificationController::class, 'store'])->name('mandatory-certification-regional-2.store');
        Route::get('/data', [Regional2MandatoryCertificationController::class, 'data'])->name('mandatory-certification-regional-2.data');
        Route::put('/{id}', [Regional2MandatoryCertificationController::class, 'update'])->name('mandatory-certification-regional-2.update');
        Route::delete('/{id}', [Regional2MandatoryCertificationController::class, 'destroy'])->name('mandatory-certification-regional-2.destroy');
    });

    // Regional3MandatoryCertificationController
    Route::prefix('monev/shu/input-data/mandatory-certification-regional-3')->group(function () {
        Route::get('/', [Regional3MandatoryCertificationController::class, 'index'])->name('mandatory-certification-regional-3');
        Route::post('/', [Regional3MandatoryCertificationController::class, 'store'])->name('mandatory-certification-regional-3.store');
        Route::get('/data', [Regional3MandatoryCertificationController::class, 'data'])->name('mandatory-certification-regional-3.data');
        Route::put('/{id}', [Regional3MandatoryCertificationController::class, 'update'])->name('mandatory-certification-regional-3.update');
        Route::delete('/{id}', [Regional3MandatoryCertificationController::class, 'destroy'])->name('mandatory-certification-regional-3.destroy');
    });

    // Regional4MandatoryCertificationController
    Route::prefix('monev/shu/input-data/mandatory-certification-regional-4')->group(function () {
        Route::get('/', [Regional4MandatoryCertificationController::class, 'index'])->name('mandatory-certification-regional-4');
        Route::post('/', [Regional4MandatoryCertificationController::class, 'store'])->name('mandatory-certification-regional-4.store');
        Route::get('/data', [Regional4MandatoryCertificationController::class, 'data'])->name('mandatory-certification-regional-4.data');
        Route::put('/{id}', [Regional4MandatoryCertificationController::class, 'update'])->name('mandatory-certification-regional-4.update');
        Route::delete('/{id}', [Regional4MandatoryCertificationController::class, 'destroy'])->name('mandatory-certification-regional-4.destroy');
    });

    // Regional1KondisiVacantAimsController
    Route::prefix('monev/shu/input-data/kondisi-vacant-fungsi-aims-regional-1')->group(function () {
        Route::get('/', [Regional1KondisiVacantAimsController::class, 'index'])->name('kondisi-vacant-fungsi-aims-regional-1');
        Route::post('/', [Regional1KondisiVacantAimsController::class, 'store'])->name('kondisi-vacant-fungsi-aims-regional-1.store');
        Route::get('/data', [Regional1KondisiVacantAimsController::class, 'data'])->name('kondisi-vacant-fungsi-aims-regional-1.data');
        Route::put('/{id}', [Regional1KondisiVacantAimsController::class, 'update'])->name('kondisi-vacant-fungsi-aims-regional-1.update');
        Route::delete('/{id}', [Regional1KondisiVacantAimsController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-regional-1.destroy');
    });

    // Regional2KondisiVacantAimsController
    Route::prefix('monev/shu/input-data/kondisi-vacant-fungsi-aims-regional-2')->group(function () {
        Route::get('/', [Regional2KondisiVacantAimsController::class, 'index'])->name('kondisi-vacant-fungsi-aims-regional-2');
        Route::post('/', [Regional2KondisiVacantAimsController::class, 'store'])->name('kondisi-vacant-fungsi-aims-regional-2.store');
        Route::get('/data', [Regional2KondisiVacantAimsController::class, 'data'])->name('kondisi-vacant-fungsi-aims-regional-2.data');
        Route::put('/{id}', [Regional2KondisiVacantAimsController::class, 'update'])->name('kondisi-vacant-fungsi-aims-regional-2.update');
        Route::delete('/{id}', [Regional2KondisiVacantAimsController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-regional-2.destroy');
    });

    // Regional3KondisiVacantAimsController
    Route::prefix('monev/shu/input-data/kondisi-vacant-fungsi-aims-regional-3')->group(function () {
        Route::get('/', [Regional3KondisiVacantAimsController::class, 'index'])->name('kondisi-vacant-fungsi-aims-regional-3');
        Route::post('/', [Regional3KondisiVacantAimsController::class, 'store'])->name('kondisi-vacant-fungsi-aims-regional-3.store');
        Route::get('/data', [Regional3KondisiVacantAimsController::class, 'data'])->name('kondisi-vacant-fungsi-aims-regional-3.data');
        Route::put('/{id}', [Regional3KondisiVacantAimsController::class, 'update'])->name('kondisi-vacant-fungsi-aims-regional-3.update');
        Route::delete('/{id}', [Regional3KondisiVacantAimsController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-regional-3.destroy');
    });

    // Regional4KondisiVacantAimsController
    Route::prefix('monev/shu/input-data/kondisi-vacant-fungsi-aims-regional-4')->group(function () {
        Route::get('/', [Regional4KondisiVacantAimsController::class, 'index'])->name('kondisi-vacant-fungsi-aims-regional-4');
        Route::post('/', [Regional4KondisiVacantAimsController::class, 'store'])->name('kondisi-vacant-fungsi-aims-regional-4.store');
        Route::get('/data', [Regional4KondisiVacantAimsController::class, 'data'])->name('kondisi-vacant-fungsi-aims-regional-4.data');
        Route::put('/{id}', [Regional4KondisiVacantAimsController::class, 'update'])->name('kondisi-vacant-fungsi-aims-regional-4.update');
        Route::delete('/{id}', [Regional4KondisiVacantAimsController::class, 'destroy'])->name('kondisi-vacant-fungsi-aims-regional-4.destroy');
    });
    Route::prefix('monev/shu/input-data/realisasi-anggaran-ai-regional-1')->group(function () {
        Route::get('/', [Regional1RealisasiAnggaranAiController::class, 'index'])->name('realisasi-anggaran-ai-regional-1');
        Route::post('/', [Regional1RealisasiAnggaranAiController::class, 'store'])->name('realisasi-anggaran-ai-regional-1.store');
        Route::get('/data', [Regional1RealisasiAnggaranAiController::class, 'data'])->name('realisasi-anggaran-ai-regional-1.data');
        Route::put('/{id}', [Regional1RealisasiAnggaranAiController::class, 'update'])->name('realisasi-anggaran-ai-regional-1.update');
        Route::delete('/{id}', [Regional1RealisasiAnggaranAiController::class, 'destroy'])->name('realisasi-anggaran-ai-regional-1.destroy');
    });

    Route::prefix('monev/shu/input-data/realisasi-anggaran-ai-regional-2')->group(function () {
        Route::get('/', [Regional2RealisasiAnggaranAiController::class, 'index'])->name('realisasi-anggaran-ai-regional-2');
        Route::post('/', [Regional2RealisasiAnggaranAiController::class, 'store'])->name('realisasi-anggaran-ai-regional-2.store');
        Route::get('/data', [Regional2RealisasiAnggaranAiController::class, 'data'])->name('realisasi-anggaran-ai-regional-2.data');
        Route::put('/{id}', [Regional2RealisasiAnggaranAiController::class, 'update'])->name('realisasi-anggaran-ai-regional-2.update');
        Route::delete('/{id}', [Regional2RealisasiAnggaranAiController::class, 'destroy'])->name('realisasi-anggaran-ai-regional-2.destroy');
    });

    Route::prefix('monev/shu/input-data/realisasi-anggaran-ai-regional-3')->group(function () {
        Route::get('/', [Regional3RealisasiAnggaranAiController::class, 'index'])->name('realisasi-anggaran-ai-regional-3');
        Route::post('/', [Regional3RealisasiAnggaranAiController::class, 'store'])->name('realisasi-anggaran-ai-regional-3.store');
        Route::get('/data', [Regional3RealisasiAnggaranAiController::class, 'data'])->name('realisasi-anggaran-ai-regional-3.data');
        Route::put('/{id}', [Regional3RealisasiAnggaranAiController::class, 'update'])->name('realisasi-anggaran-ai-regional-3.update');
        Route::delete('/{id}', [Regional3RealisasiAnggaranAiController::class, 'destroy'])->name('realisasi-anggaran-ai-regional-3.destroy');
    });

    Route::prefix('monev/shu/input-data/realisasi-anggaran-ai-regional-4')->group(function () {
        Route::get('/', [Regional4RealisasiAnggaranAiController::class, 'index'])->name('realisasi-anggaran-ai-regional-4');
        Route::post('/', [Regional4RealisasiAnggaranAiController::class, 'store'])->name('realisasi-anggaran-ai-regional-4.store');
        Route::get('/data', [Regional4RealisasiAnggaranAiController::class, 'data'])->name('realisasi-anggaran-ai-regional-4.data');
        Route::put('/{id}', [Regional4RealisasiAnggaranAiController::class, 'update'])->name('realisasi-anggaran-ai-regional-4.update');
        Route::delete('/{id}', [Regional4RealisasiAnggaranAiController::class, 'destroy'])->name('realisasi-anggaran-ai-regional-4.destroy');
    });

    Route::prefix('monev/shu/input-data/realisasi-progres-fisik-ai-regional-1')->group(function () {
        Route::get('/', [Regional1RealisasiProgresFisikAiController::class, 'index'])->name('realisasi-progres-fisik-ai-regional-1');
        Route::post('/', [Regional1RealisasiProgresFisikAiController::class, 'store'])->name('realisasi-progres-fisik-ai-regional-1.store');
        Route::get('/data', [Regional1RealisasiProgresFisikAiController::class, 'data'])->name('realisasi-progres-fisik-ai-regional-1.data');
        Route::put('/{id}', [Regional1RealisasiProgresFisikAiController::class, 'update'])->name('realisasi-progres-fisik-ai-regional-1.update');
        Route::delete('/{id}', [Regional1RealisasiProgresFisikAiController::class, 'destroy'])->name('realisasi-progres-fisik-ai-regional-1.destroy');
    });

    Route::prefix('monev/shu/input-data/realisasi-progres-fisik-ai-regional-2')->group(function () {
        Route::get('/', [Regional2RealisasiProgresFisikAiController::class, 'index'])->name('realisasi-progres-fisik-ai-regional-2');
        Route::post('/', [Regional2RealisasiProgresFisikAiController::class, 'store'])->name('realisasi-progres-fisik-ai-regional-2.store');
        Route::get('/data', [Regional2RealisasiProgresFisikAiController::class, 'data'])->name('realisasi-progres-fisik-ai-regional-2.data');
        Route::put('/{id}', [Regional2RealisasiProgresFisikAiController::class, 'update'])->name('realisasi-progres-fisik-ai-regional-2.update');
        Route::delete('/{id}', [Regional2RealisasiProgresFisikAiController::class, 'destroy'])->name('realisasi-progres-fisik-ai-regional-2.destroy');
    });

    Route::prefix('monev/shu/input-data/realisasi-progres-fisik-ai-regional-3')->group(function () {
        Route::get('/', [Regional3RealisasiProgresFisikAiController::class, 'index'])->name('realisasi-progres-fisik-ai-regional-3');
        Route::post('/', [Regional3RealisasiProgresFisikAiController::class, 'store'])->name('realisasi-progres-fisik-ai-regional-3.store');
        Route::get('/data', [Regional3RealisasiProgresFisikAiController::class, 'data'])->name('realisasi-progres-fisik-ai-regional-3.data');
        Route::put('/{id}', [Regional3RealisasiProgresFisikAiController::class, 'update'])->name('realisasi-progres-fisik-ai-regional-3.update');
        Route::delete('/{id}', [Regional3RealisasiProgresFisikAiController::class, 'destroy'])->name('realisasi-progres-fisik-ai-regional-3.destroy');
    });

    Route::prefix('monev/shu/input-data/realisasi-progres-fisik-ai-regional-4')->group(function () {
        Route::get('/', [Regional4RealisasiProgresFisikAiController::class, 'index'])->name('realisasi-progres-fisik-ai-regional-4');
        Route::post('/', [Regional4RealisasiProgresFisikAiController::class, 'store'])->name('realisasi-progres-fisik-ai-regional-4.store');
        Route::get('/data', [Regional4RealisasiProgresFisikAiController::class, 'data'])->name('realisasi-progres-fisik-ai-regional-4.data');
        Route::put('/{id}', [Regional4RealisasiProgresFisikAiController::class, 'update'])->name('realisasi-progres-fisik-ai-regional-4.update');
        Route::delete('/{id}', [Regional4RealisasiProgresFisikAiController::class, 'destroy'])->name('realisasi-progres-fisik-ai-regional-4.destroy');
    });

    Route::prefix('monev/shu/input-data/sap-asset-regional-1')->group(function () {
        Route::get('/', [Regional1SapAssetController::class, 'index'])->name('sap-asset-regional-1');
        Route::post('/', [Regional1SapAssetController::class, 'store'])->name('sap-asset-regional-1.store');
        Route::get('/data', [Regional1SapAssetController::class, 'data'])->name('sap-asset-regional-1.data');
        Route::put('/{id}', [Regional1SapAssetController::class, 'update'])->name('sap-asset-regional-1.update');
        Route::delete('/{id}', [Regional1SapAssetController::class, 'destroy'])->name('sap-asset-regional-1.destroy');
    });

    Route::prefix('monev/shu/input-data/sap-asset-regional-2')->group(function () {
        Route::get('/', [Regional2SapAssetController::class, 'index'])->name('sap-asset-regional-2');
        Route::post('/', [Regional2SapAssetController::class, 'store'])->name('sap-asset-regional-2.store');
        Route::get('/data', [Regional2SapAssetController::class, 'data'])->name('sap-asset-regional-2.data');
        Route::put('/{id}', [Regional2SapAssetController::class, 'update'])->name('sap-asset-regional-2.update');
        Route::delete('/{id}', [Regional2SapAssetController::class, 'destroy'])->name('sap-asset-regional-2.destroy');
    });

    Route::prefix('monev/shu/input-data/sap-asset-regional-3')->group(function () {
        Route::get('/', [Regional3SapAssetController::class, 'index'])->name('sap-asset-regional-3');
        Route::post('/', [Regional3SapAssetController::class, 'store'])->name('sap-asset-regional-3.store');
        Route::get('/data', [Regional3SapAssetController::class, 'data'])->name('sap-asset-regional-3.data');
        Route::put('/{id}', [Regional3SapAssetController::class, 'update'])->name('sap-asset-regional-3.update');
        Route::delete('/{id}', [Regional3SapAssetController::class, 'destroy'])->name('sap-asset-regional-3.destroy');
    });

    Route::prefix('monev/shu/input-data/sap-asset-regional-4')->group(function () {
        Route::get('/', [Regional4SapAssetController::class, 'index'])->name('sap-asset-regional-4');
        Route::post('/', [Regional4SapAssetController::class, 'store'])->name('sap-asset-regional-4.store');
        Route::get('/data', [Regional4SapAssetController::class, 'data'])->name('sap-asset-regional-4.data');
        Route::put('/{id}', [Regional4SapAssetController::class, 'update'])->name('sap-asset-regional-4.update');
        Route::delete('/{id}', [Regional4SapAssetController::class, 'destroy'])->name('sap-asset-regional-4.destroy');
    });

    Route::prefix('monev/shu/input-data/status-ai-regional-1')->group(function () {
        Route::get('/', [Regional1StatusAiController::class, 'index'])->name('status-ai-regional-1');
        Route::post('/', [Regional1StatusAiController::class, 'store'])->name('status-ai-regional-1.store');
        Route::get('/data', [Regional1StatusAiController::class, 'data'])->name('status-ai-regional-1.data');
        Route::put('/{id}', [Regional1StatusAiController::class, 'update'])->name('status-ai-regional-1.update');
        Route::delete('/{id}', [Regional1StatusAiController::class, 'destroy'])->name('status-ai-regional-1.destroy');
    });

    Route::prefix('monev/shu/input-data/status-ai-regional-2')->group(function () {
        Route::get('/', [Regional2StatusAiController::class, 'index'])->name('status-ai-regional-2');
        Route::post('/', [Regional2StatusAiController::class, 'store'])->name('status-ai-regional-2.store');
        Route::get('/data', [Regional2StatusAiController::class, 'data'])->name('status-ai-regional-2.data');
        Route::put('/{id}', [Regional2StatusAiController::class, 'update'])->name('status-ai-regional-2.update');
        Route::delete('/{id}', [Regional2StatusAiController::class, 'destroy'])->name('status-ai-regional-2.destroy');
    });

    Route::prefix('monev/shu/input-data/status-ai-regional-3')->group(function () {
        Route::get('/', [Regional3StatusAiController::class, 'index'])->name('status-ai-regional-3');
        Route::post('/', [Regional3StatusAiController::class, 'store'])->name('status-ai-regional-3.store');
        Route::get('/data', [Regional3StatusAiController::class, 'data'])->name('status-ai-regional-3.data');
        Route::put('/{id}', [Regional3StatusAiController::class, 'update'])->name('status-ai-regional-3.update');
        Route::delete('/{id}', [Regional3StatusAiController::class, 'destroy'])->name('status-ai-regional-3.destroy');
    });

    Route::prefix('monev/shu/input-data/status-ai-regional-4')->group(function () {
        Route::get('/', [Regional4StatusAiController::class, 'index'])->name('status-ai-regional-4');
        Route::post('/', [Regional4StatusAiController::class, 'store'])->name('status-ai-regional-4.store');
        Route::get('/data', [Regional4StatusAiController::class, 'data'])->name('status-ai-regional-4.data');
        Route::put('/{id}', [Regional4StatusAiController::class, 'update'])->name('status-ai-regional-4.update');
        Route::delete('/{id}', [Regional4StatusAiController::class, 'destroy'])->name('status-ai-regional-4.destroy');
    });
    Route::prefix('monev/shu/input-data/status-plo-regional-1')->group(function () {
        Route::get('/', [Regional1StatusPloController::class, 'index'])->name('status-plo-regional-1');
        Route::post('/', [Regional1StatusPloController::class, 'store'])->name('status-plo-regional-1.store');
        Route::get('/data', [Regional1StatusPloController::class, 'data'])->name('status-plo-regional-1.data');
        Route::put('/{id}', [Regional1StatusPloController::class, 'update'])->name('status-plo-regional-1.update');
        Route::delete('/{id}', [Regional1StatusPloController::class, 'destroy'])->name('status-plo-regional-1.destroy');
    });

    Route::prefix('monev/shu/input-data/status-plo-regional-2')->group(function () {
        Route::get('/', [Regional2StatusPloController::class, 'index'])->name('status-plo-regional-2');
        Route::post('/', [Regional2StatusPloController::class, 'store'])->name('status-plo-regional-2.store');
        Route::get('/data', [Regional2StatusPloController::class, 'data'])->name('status-plo-regional-2.data');
        Route::put('/{id}', [Regional2StatusPloController::class, 'update'])->name('status-plo-regional-2.update');
        Route::delete('/{id}', [Regional2StatusPloController::class, 'destroy'])->name('status-plo-regional-2.destroy');
    });

    Route::prefix('monev/shu/input-data/status-plo-regional-3')->group(function () {
        Route::get('/', [Regional3StatusPloController::class, 'index'])->name('status-plo-regional-3');
        Route::post('/', [Regional3StatusPloController::class, 'store'])->name('status-plo-regional-3.store');
        Route::get('/data', [Regional3StatusPloController::class, 'data'])->name('status-plo-regional-3.data');
        Route::put('/{id}', [Regional3StatusPloController::class, 'update'])->name('status-plo-regional-3.update');
        Route::delete('/{id}', [Regional3StatusPloController::class, 'destroy'])->name('status-plo-regional-3.destroy');
    });

    Route::prefix('monev/shu/input-data/status-plo-regional-4')->group(function () {
        Route::get('/', [Regional4StatusPloController::class, 'index'])->name('status-plo-regional-4');
        Route::post('/', [Regional4StatusPloController::class, 'store'])->name('status-plo-regional-4.store');
        Route::get('/data', [Regional4StatusPloController::class, 'data'])->name('status-plo-regional-4.data');
        Route::put('/{id}', [Regional4StatusPloController::class, 'update'])->name('status-plo-regional-4.update');
        Route::delete('/{id}', [Regional4StatusPloController::class, 'destroy'])->name('status-plo-regional-4.destroy');
    });
    Route::prefix('monev/shu/input-data/realisasi-anggaran-figure-regional-1')->group(function () {
        Route::get('/', [Regional1RealisasiAnggaranFigureController::class, 'index'])->name('realisasi-anggaran-figure-regional-1');
        Route::post('/', [Regional1RealisasiAnggaranFigureController::class, 'store'])->name('realisasi-anggaran-figure-regional-1.store');
        Route::get('/data', [Regional1RealisasiAnggaranFigureController::class, 'data'])->name('realisasi-anggaran-figure-regional-1.data');
        Route::put('/{id}', [Regional1RealisasiAnggaranFigureController::class, 'update'])->name('realisasi-anggaran-figure-regional-1.update');
        Route::delete('/{id}', [Regional1RealisasiAnggaranFigureController::class, 'destroy'])->name('realisasi-anggaran-figure-regional-1.destroy');
    });

    Route::prefix('monev/shu/input-data/realisasi-anggaran-figure-regional-2')->group(function () {
        Route::get('/', [Regional2RealisasiAnggaranFigureController::class, 'index'])->name('realisasi-anggaran-figure-regional-2');
        Route::post('/', [Regional2RealisasiAnggaranFigureController::class, 'store'])->name('realisasi-anggaran-figure-regional-2.store');
        Route::get('/data', [Regional2RealisasiAnggaranFigureController::class, 'data'])->name('realisasi-anggaran-figure-regional-2.data');
        Route::put('/{id}', [Regional2RealisasiAnggaranFigureController::class, 'update'])->name('realisasi-anggaran-figure-regional-2.update');
        Route::delete('/{id}', [Regional2RealisasiAnggaranFigureController::class, 'destroy'])->name('realisasi-anggaran-figure-regional-2.destroy');
    });

    Route::prefix('monev/shu/input-data/realisasi-anggaran-figure-regional-3')->group(function () {
        Route::get('/', [Regional3RealisasiAnggaranFigureController::class, 'index'])->name('realisasi-anggaran-figure-regional-3');
        Route::post('/', [Regional3RealisasiAnggaranFigureController::class, 'store'])->name('realisasi-anggaran-figure-regional-3.store');
        Route::get('/data', [Regional3RealisasiAnggaranFigureController::class, 'data'])->name('realisasi-anggaran-figure-regional-3.data');
        Route::put('/{id}', [Regional3RealisasiAnggaranFigureController::class, 'update'])->name('realisasi-anggaran-figure-regional-3.update');
        Route::delete('/{id}', [Regional3RealisasiAnggaranFigureController::class, 'destroy'])->name('realisasi-anggaran-figure-regional-3.destroy');
    });

    Route::prefix('monev/shu/input-data/realisasi-anggaran-figure-regional-4')->group(function () {
        Route::get('/', [Regional4RealisasiAnggaranFigureController::class, 'index'])->name('realisasi-anggaran-figure-regional-4');
        Route::post('/', [Regional4RealisasiAnggaranFigureController::class, 'store'])->name('realisasi-anggaran-figure-regional-4.store');
        Route::get('/data', [Regional4RealisasiAnggaranFigureController::class, 'data'])->name('realisasi-anggaran-figure-regional-4.data');
        Route::put('/{id}', [Regional4RealisasiAnggaranFigureController::class, 'update'])->name('realisasi-anggaran-figure-regional-4.update');
        Route::delete('/{id}', [Regional4RealisasiAnggaranFigureController::class, 'destroy'])->name('realisasi-anggaran-figure-regional-4.destroy');
    });

    // SHU Target Status AI
    // SHU Target KPI
    Route::prefix('monev/shu/kinerja/shu-target-kpi-2025-ai')->group(function () {
        Route::get('/', [TargetKpiAiShuController::class, 'index'])->name('shu-target-kpi-2025-ai');
        Route::post('/', [TargetKpiAiShuController::class, 'store'])->name('shu-target-kpi-2025-ai.store');
        Route::get('/data', [TargetKpiAiShuController::class, 'data'])->name('shu-target-kpi-2025-ai.data');
        Route::put('/{id}', [TargetKpiAiShuController::class, 'update'])->name('shu-target-kpi-2025-ai.update');
        Route::delete('/{id}', [TargetKpiAiShuController::class, 'destroy'])->name('shu-target-kpi-2025-ai.destroy');
    });

    // SHU Prognosa Status AI
    Route::prefix('monev/shu/kinerja/shu-prognosa-status-ai')->group(function () {
        Route::get('/', [PrognosaStatusAiShuController::class, 'index'])->name('shu-prognosa-status-ai');
        Route::post('/', [PrognosaStatusAiShuController::class, 'store'])->name('shu-prognosa-status-ai.store');
        Route::get('/data', [PrognosaStatusAiShuController::class, 'data'])->name('shu-prognosa-status-ai.data');
        Route::put('/{id}', [PrognosaStatusAiShuController::class, 'update'])->name('shu-prognosa-status-ai.update');
        Route::delete('/{id}', [PrognosaStatusAiShuController::class, 'destroy'])->name('shu-prognosa-status-ai.destroy');
    });
    // SHU Target Kinerja Status PLO
    Route::prefix('monev/shu/kinerja/shu-kumulatif-status-plo')->group(function () {
        Route::get('/', [KumulatifStatusPloController::class, 'index'])->name('shu-kumulatif-status-plo');
        Route::post('/', [KumulatifStatusPloController::class, 'store'])->name('shu-kumulatif-status-plo.store');
        Route::get('/data', [KumulatifStatusPloController::class, 'data'])->name('shu-kumulatif-status-plo.data');
        Route::put('/{id}', [KumulatifStatusPloController::class, 'update'])->name('shu-kumulatif-status-plo.update');
        Route::delete('/{id}', [KumulatifStatusPloController::class, 'destroy'])->name('shu-kumulatif-status-plo.destroy');
    });

    Route::prefix('monev/shu/kinerja/shu-prognosa-status-plo')->group(function () {
        Route::get('/', [PrognosaStatusPloController::class, 'index'])->name('shu-prognosa-status-plo');
        Route::post('/', [PrognosaStatusPloController::class, 'store'])->name('shu-prognosa-status-plo.store');
        Route::get('/data', [PrognosaStatusPloController::class, 'data'])->name('shu-prognosa-status-plo.data');
        Route::put('/{id}', [PrognosaStatusPloController::class, 'update'])->name('shu-prognosa-status-plo.update');
        Route::delete('/{id}', [PrognosaStatusPloController::class, 'destroy'])->name('shu-prognosa-status-plo.destroy');
    });

    Route::prefix('monev/shu/kinerja/shu-target-penurunan-plo')->group(function () {
        Route::get('/', [TargetPenurunanPloController::class, 'index'])->name('shu-target-penurunan-plo');
        Route::post('/', [TargetPenurunanPloController::class, 'store'])->name('shu-target-penurunan-plo.store');
        Route::get('/data', [TargetPenurunanPloController::class, 'data'])->name('shu-target-penurunan-plo.data');
        Route::put('/{id}', [TargetPenurunanPloController::class, 'update'])->name('shu-target-penurunan-plo.update');
        Route::delete('/{id}', [TargetPenurunanPloController::class, 'destroy'])->name('shu-target-penurunan-plo.destroy');
    });

    Route::prefix('monev/shu/kinerja/shu-kinerja-kpi-status-ai')->group(function () {
        Route::get('/', [KinerjaKpiStatusAiShuController::class, 'index'])->name('shu-kinerja-kpi-status-ai');
        Route::post('/', [KinerjaKpiStatusAiShuController::class, 'store'])->name('shu-kinerja-kpi-status-ai.store');
        Route::get('/data', [KinerjaKpiStatusAiShuController::class, 'data'])->name('shu-kinerja-kpi-status-ai.data');
        Route::put('/{id}', [KinerjaKpiStatusAiShuController::class, 'update'])->name('shu-kinerja-kpi-status-ai.update');
        Route::delete('/{id}', [KinerjaKpiStatusAiShuController::class, 'destroy'])->name('shu-kinerja-kpi-status-ai.destroy');
    });
    Route::prefix('monev/shu/kinerja/shu-kinerja-kpi-pemnhn-plo')->group(function () {
        Route::get('/', [KinerjaKpiPemnhnPloShuController::class, 'index'])->name('shu-kinerja-kpi-pemnhn-plo');
        Route::post('/', [KinerjaKpiPemnhnPloShuController::class, 'store'])->name('shu-kinerja-kpi-pemnhn-plo.store');
        Route::get('/data', [KinerjaKpiPemnhnPloShuController::class, 'data'])->name('shu-kinerja-kpi-pemnhn-plo.data');
        Route::put('/{id}', [KinerjaKpiPemnhnPloShuController::class, 'update'])->name('shu-kinerja-kpi-pemnhn-plo.update');
        Route::delete('/{id}', [KinerjaKpiPemnhnPloShuController::class, 'destroy'])->name('shu-kinerja-kpi-pemnhn-plo.destroy');
    });
    Route::prefix('monev/shu/kinerja/shu-kpi-mandatory-certi-summary')->group(function () {
        Route::get('/', [KinerjaMandatoryCertiSummaryShuController::class, 'index'])->name('shu-kpi-mandatory-certi-summary');
        Route::post('/', [KinerjaMandatoryCertiSummaryShuController::class, 'store'])->name('shu-kpi-mandatory-certi-summary.store');
        Route::get('/data', [KinerjaMandatoryCertiSummaryShuController::class, 'data'])->name('shu-kpi-mandatory-certi-summary.data');
        Route::put('/{id}', [KinerjaMandatoryCertiSummaryShuController::class, 'update'])->name('shu-kpi-mandatory-certi-summary.update');
        Route::delete('/{id}', [KinerjaMandatoryCertiSummaryShuController::class, 'destroy'])->name('shu-kpi-mandatory-certi-summary.destroy');
    });
    // SHU Target Kinerja Tl
    Route::prefix('monev/shu/kinerja/tindak-lanjut-monev-shu')->group(function () {
        Route::get('/', [HasilMonevShuController::class, 'index'])->name('tindak-lanjut-monev-shu');
        Route::post('/', [HasilMonevShuController::class, 'store'])->name('tindak-lanjut-monev-shu.store');
        Route::get('/data', [HasilMonevShuController::class, 'data'])->name('tindak-lanjut-monev-shu.data');
        Route::put('/{id}', [HasilMonevShuController::class, 'update'])->name('tindak-lanjut-monev-shu.update');
        Route::delete('/{id}', [HasilMonevShuController::class, 'destroy'])->name('tindak-lanjut-monev-shu.destroy');
    });

    Route::prefix('monev/shu/kinerja/highlight-mandatory-certification-shu')->group(function () {
        Route::get('/', [HighlightMandatoryCertificationShuController::class, 'index'])->name('highlight-mandatory-certification-shu');
        Route::post('/', [HighlightMandatoryCertificationShuController::class, 'store'])->name('highlight-mandatory-certification-shu.store');
        Route::get('/data', [HighlightMandatoryCertificationShuController::class, 'data'])->name('highlight-mandatory-certification-shu.data');
        Route::put('/{id}', [HighlightMandatoryCertificationShuController::class, 'update'])->name('highlight-mandatory-certification-shu.update');
        Route::delete('/{id}', [HighlightMandatoryCertificationShuController::class, 'destroy'])->name('highlight-mandatory-certification-shu.destroy');
    });

    Route::prefix('monev/shu/kinerja/highlight-status-ai-shu')->group(function () {
        Route::get('/', [HighlightStatusAiShuController::class, 'index'])->name('highlight-status-ai-shu');
        Route::post('/', [HighlightStatusAiShuController::class, 'store'])->name('highlight-status-ai-shu.store');
        Route::get('/data', [HighlightStatusAiShuController::class, 'data'])->name('highlight-status-ai-shu.data');
        Route::put('/{id}', [HighlightStatusAiShuController::class, 'update'])->name('highlight-status-ai-shu.update');
        Route::delete('/{id}', [HighlightStatusAiShuController::class, 'destroy'])->name('highlight-status-ai-shu.destroy');
    });

    Route::prefix('monev/shu/kinerja/highlight-status-plo-shu')->group(function () {
        Route::get('/', [HighlightStatusPloShuController::class, 'index'])->name('highlight-status-plo-shu');
        Route::post('/', [HighlightStatusPloShuController::class, 'store'])->name('highlight-status-plo-shu.store');
        Route::get('/data', [HighlightStatusPloShuController::class, 'data'])->name('highlight-status-plo-shu.data');
        Route::put('/{id}', [HighlightStatusPloShuController::class, 'update'])->name('highlight-status-plo-shu.update');
        Route::delete('/{id}', [HighlightStatusPloShuController::class, 'destroy'])->name('highlight-status-plo-shu.destroy');
    });

    Route::prefix('monev/shu/kinerja/highlight-realisasi-aims-shu')->group(function () {
        Route::get('/', [HighlightRealisasiAimsShuController::class, 'index'])->name('highlight-realisasi-aims-shu');
        Route::post('/', [HighlightRealisasiAimsShuController::class, 'store'])->name('highlight-realisasi-aims-shu.store');
        Route::get('/data', [HighlightRealisasiAimsShuController::class, 'data'])->name('highlight-realisasi-aims-shu.data');
        Route::put('/{id}', [HighlightRealisasiAimsShuController::class, 'update'])->name('highlight-realisasi-aims-shu.update');
        Route::delete('/{id}', [HighlightRealisasiAimsShuController::class, 'destroy'])->name('highlight-realisasi-aims-shu.destroy');
    });
    Route::prefix('monev/shu/kinerja/highlight-informasi-domain-shu')->group(function () {
        Route::get('/', [HighlightInformasiDomainShuController::class, 'index'])->name('highlight-informasi-domain-shu');
        Route::post('/', [HighlightInformasiDomainShuController::class, 'store'])->name('highlight-informasi-domain-shu.store');
        Route::get('/data', [HighlightInformasiDomainShuController::class, 'data'])->name('highlight-informasi-domain-shu.data');
        Route::put('/{id}', [HighlightInformasiDomainShuController::class, 'update'])->name('highlight-informasi-domain-shu.update');
        Route::delete('/{id}', [HighlightInformasiDomainShuController::class, 'destroy'])->name('highlight-informasi-domain-shu.destroy');
    });
    Route::prefix('monev/shu/kinerja/target-sap-asset-shu')->group(function () {
        Route::get('/', [TargetSapAssetShuController::class, 'index'])->name('target-sap-asset-shu');
        Route::post('/', [TargetSapAssetShuController::class, 'store'])->name('target-sap-asset-shu.store');
        Route::get('/data', [TargetSapAssetShuController::class, 'data'])->name('target-sap-asset-shu.data');
        Route::put('/{id}', [TargetSapAssetShuController::class, 'update'])->name('target-sap-asset-shu.update');
        Route::delete('/{id}', [TargetSapAssetShuController::class, 'destroy'])->name('target-sap-asset-shu.destroy');
    });
    Route::prefix('monev/shu/kinerja/target-mandatory-certification-shu')->group(function () {
        Route::get('/', [TargetMandatoryCertificationShuController::class, 'index'])->name('target-mandatory-certification-shu');
        Route::post('/', [TargetMandatoryCertificationShuController::class, 'store'])->name('target-mandatory-certification-shu.store');
        Route::get('/data', [TargetMandatoryCertificationShuController::class, 'data'])->name('target-mandatory-certification-shu.data');
        Route::put('/{id}', [TargetMandatoryCertificationShuController::class, 'update'])->name('target-mandatory-certification-shu.update');
        Route::delete('/{id}', [TargetMandatoryCertificationShuController::class, 'destroy'])->name('target-mandatory-certification-shu.destroy');
    });




    // SHG Target Kinerja Tl
    Route::prefix('monev/shg/kinerja/tindak-lanjut-hasil-monev')->group(function () {
        Route::get('/', [HasilMonevTlController::class, 'index'])->name('tindak-lanjut-hasil-monev');
        Route::post('/', [HasilMonevTlController::class, 'store'])->name('tindak-lanjut-hasil-monev.store');
        Route::get('/data', [HasilMonevTlController::class, 'data'])->name('tindak-lanjut-hasil-monev.data');
        Route::put('/{id}', [HasilMonevTlController::class, 'update'])->name('tindak-lanjut-hasil-monev.update');
        Route::delete('/{id}', [HasilMonevTlController::class, 'destroy'])->name('tindak-lanjut-hasil-monev.destroy');
    });

    Route::prefix('monev/shg/kinerja/tindak-lanjut-highlight-informasi-domain')->group(function () {
        Route::get('/', [HighligtInformasiDomainTlController::class, 'index'])->name('tindak-lanjut-highlight-informasi-domain');
        Route::post('/', [HighligtInformasiDomainTlController::class, 'store'])->name('tindak-lanjut-highlight-informasi-domain.store');
        Route::get('/data', [HighligtInformasiDomainTlController::class, 'data'])->name('tindak-lanjut-highlight-informasi-domain.data');
        Route::put('/{id}', [HighligtInformasiDomainTlController::class, 'update'])->name('tindak-lanjut-highlight-informasi-domain.update');
        Route::delete('/{id}', [HighligtInformasiDomainTlController::class, 'destroy'])->name('tindak-lanjut-highlight-informasi-domain.destroy');
    });

    Route::prefix('monev/shg/kinerja/tindak-lanjut-highlight-mandatory-certification')->group(function () {
        Route::get('/', [HighligtMandatoryCertificationTlController::class, 'index'])->name('tindak-lanjut-highlight-mandatory-certification');
        Route::post('/', [HighligtMandatoryCertificationTlController::class, 'store'])->name('tindak-lanjut-highlight-mandatory-certification.store');
        Route::get('/data', [HighligtMandatoryCertificationTlController::class, 'data'])->name('tindak-lanjut-highlight-mandatory-certification.data');
        Route::put('/{id}', [HighligtMandatoryCertificationTlController::class, 'update'])->name('tindak-lanjut-highlight-mandatory-certification.update');
        Route::delete('/{id}', [HighligtMandatoryCertificationTlController::class, 'destroy'])->name('tindak-lanjut-highlight-mandatory-certification.destroy');
    });

    Route::prefix('monev/shg/kinerja/tindak-lanjut-highlight-realisasi-aims')->group(function () {
        Route::get('/', [HighligtRealisasiAimsTlController::class, 'index'])->name('tindak-lanjut-highlight-realisasi-aims');
        Route::post('/', [HighligtRealisasiAimsTlController::class, 'store'])->name('tindak-lanjut-highlight-realisasi-aims.store');
        Route::get('/data', [HighligtRealisasiAimsTlController::class, 'data'])->name('tindak-lanjut-highlight-realisasi-aims.data');
        Route::put('/{id}', [HighligtRealisasiAimsTlController::class, 'update'])->name('tindak-lanjut-highlight-realisasi-aims.update');
        Route::delete('/{id}', [HighligtRealisasiAimsTlController::class, 'destroy'])->name('tindak-lanjut-highlight-realisasi-aims.destroy');
    });

    Route::prefix('monev/shg/kinerja/tindak-lanjut-highlight-status-ai')->group(function () {
        Route::get('/', [HighligtStatusaiTlController::class, 'index'])->name('tindak-lanjut-highlight-status-ai');
        Route::post('/', [HighligtStatusaiTlController::class, 'store'])->name('tindak-lanjut-highlight-status-ai.store');
        Route::get('/data', [HighligtStatusaiTlController::class, 'data'])->name('tindak-lanjut-highlight-status-ai.data');
        Route::put('/{id}', [HighligtStatusaiTlController::class, 'update'])->name('tindak-lanjut-highlight-status-ai.update');
        Route::delete('/{id}', [HighligtStatusaiTlController::class, 'destroy'])->name('tindak-lanjut-highlight-status-ai.destroy');
    });

    Route::prefix('monev/shg/kinerja/tindak-lanjut-highlight-status-plo')->group(function () {
        Route::get('/', [HighligtStatusPloTlController::class, 'index'])->name('tindak-lanjut-highlight-status-plo');
        Route::post('/', [HighligtStatusPloTlController::class, 'store'])->name('tindak-lanjut-highlight-status-plo.store');
        Route::get('/data', [HighligtStatusPloTlController::class, 'data'])->name('tindak-lanjut-highlight-status-plo.data');
        Route::put('/{id}', [HighligtStatusPloTlController::class, 'update'])->name('tindak-lanjut-highlight-status-plo.update');
        Route::delete('/{id}', [HighligtStatusPloTlController::class, 'destroy'])->name('tindak-lanjut-highlight-status-plo.destroy');
    });


    // SHCNT Sistem Informasi
    Route::prefix('monev/shcnt/input-data/sistem-informasi-aims-region-1')->group(function () {
        Route::get('/', [Region1SistemInformasiController::class, 'index'])->name('sistem-informasi-aims-region-1');
        Route::post('/', [Region1SistemInformasiController::class, 'store'])->name('sistem-informasi-aims-region-1.store');
        Route::get('/data', [Region1SistemInformasiController::class, 'data'])->name('sistem-informasi-aims-region-1.data');
        Route::put('/{id}', [Region1SistemInformasiController::class, 'update'])->name('sistem-informasi-aims-region-1.update');
        Route::delete('/{id}', [Region1SistemInformasiController::class, 'destroy'])->name('sistem-informasi-aims-region-1.destroy');
    });
    Route::prefix('monev/shcnt/input-data/sistem-informasi-aims-region-2')->group(function () {
        Route::get('/', [Region2SistemInformasiController::class, 'index'])->name('sistem-informasi-aims-region-2');
        Route::post('/', [Region2SistemInformasiController::class, 'store'])->name('sistem-informasi-aims-region-2.store');
        Route::get('/data', [Region2SistemInformasiController::class, 'data'])->name('sistem-informasi-aims-region-2.data');
        Route::put('/{id}', [Region2SistemInformasiController::class, 'update'])->name('sistem-informasi-aims-region-2.update');
        Route::delete('/{id}', [Region2SistemInformasiController::class, 'destroy'])->name('sistem-informasi-aims-region-2.destroy');
    });
    Route::prefix('monev/shcnt/input-data/sistem-informasi-aims-region-3')->group(function () {
        Route::get('/', [Region3SistemInformasiController::class, 'index'])->name('sistem-informasi-aims-region-3');
        Route::post('/', [Region3SistemInformasiController::class, 'store'])->name('sistem-informasi-aims-region-3.store');
        Route::get('/data', [Region3SistemInformasiController::class, 'data'])->name('sistem-informasi-aims-region-3.data');
        Route::put('/{id}', [Region3SistemInformasiController::class, 'update'])->name('sistem-informasi-aims-region-3.update');
        Route::delete('/{id}', [Region3SistemInformasiController::class, 'destroy'])->name('sistem-informasi-aims-region-3.destroy');
    });
    Route::prefix('monev/shcnt/input-data/sistem-informasi-aims-region-4')->group(function () {
        Route::get('/', [Region4SistemInformasiController::class, 'index'])->name('sistem-informasi-aims-region-4');
        Route::post('/', [Region4SistemInformasiController::class, 'store'])->name('sistem-informasi-aims-region-4.store');
        Route::get('/data', [Region4SistemInformasiController::class, 'data'])->name('sistem-informasi-aims-region-4.data');
        Route::put('/{id}', [Region4SistemInformasiController::class, 'update'])->name('sistem-informasi-aims-region-4.update');
        Route::delete('/{id}', [Region4SistemInformasiController::class, 'destroy'])->name('sistem-informasi-aims-region-4.destroy');
    });
    Route::prefix('monev/shcnt/input-data/sistem-informasi-aims-region-5')->group(function () {
        Route::get('/', [Region5SistemInformasiController::class, 'index'])->name('sistem-informasi-aims-region-5');
        Route::post('/', [Region5SistemInformasiController::class, 'store'])->name('sistem-informasi-aims-region-5.store');
        Route::get('/data', [Region5SistemInformasiController::class, 'data'])->name('sistem-informasi-aims-region-5.data');
        Route::put('/{id}', [Region5SistemInformasiController::class, 'update'])->name('sistem-informasi-aims-region-5.update');
        Route::delete('/{id}', [Region5SistemInformasiController::class, 'destroy'])->name('sistem-informasi-aims-region-5.destroy');
    });
    Route::prefix('monev/shcnt/input-data/sistem-informasi-aims-region-6')->group(function () {
        Route::get('/', [Region6SistemInformasiController::class, 'index'])->name('sistem-informasi-aims-region-6');
        Route::post('/', [Region6SistemInformasiController::class, 'store'])->name('sistem-informasi-aims-region-6.store');
        Route::get('/data', [Region6SistemInformasiController::class, 'data'])->name('sistem-informasi-aims-region-6.data');
        Route::put('/{id}', [Region6SistemInformasiController::class, 'update'])->name('sistem-informasi-aims-region-6.update');
        Route::delete('/{id}', [Region6SistemInformasiController::class, 'destroy'])->name('sistem-informasi-aims-region-6.destroy');
    });
    Route::prefix('monev/shcnt/input-data/sistem-informasi-aims-region-7')->group(function () {
        Route::get('/', [Region7SistemInformasiController::class, 'index'])->name('sistem-informasi-aims-region-7');
        Route::post('/', [Region7SistemInformasiController::class, 'store'])->name('sistem-informasi-aims-region-7.store');
        Route::get('/data', [Region7SistemInformasiController::class, 'data'])->name('sistem-informasi-aims-region-7.data');
        Route::put('/{id}', [Region7SistemInformasiController::class, 'update'])->name('sistem-informasi-aims-region-7.update');
        Route::delete('/{id}', [Region7SistemInformasiController::class, 'destroy'])->name('sistem-informasi-aims-region-7.destroy');
    });
    Route::prefix('monev/shcnt/input-data/sistem-informasi-aims-region-8')->group(function () {
        Route::get('/', [Region8SistemInformasiController::class, 'index'])->name('sistem-informasi-aims-region-8');
        Route::post('/', [Region8SistemInformasiController::class, 'store'])->name('sistem-informasi-aims-region-8.store');
        Route::get('/data', [Region8SistemInformasiController::class, 'data'])->name('sistem-informasi-aims-region-8.data');
        Route::put('/{id}', [Region8SistemInformasiController::class, 'update'])->name('sistem-informasi-aims-region-8.update');
        Route::delete('/{id}', [Region8SistemInformasiController::class, 'destroy'])->name('sistem-informasi-aims-region-8.destroy');
    });

    // SHCNT Asset Breakdown
    Route::prefix('monev/shcnt/input-data/asset-breakdown-region-1')->group(function () {
        Route::get('/', [Region1AssetBreakdownController::class, 'index'])->name('asset-breakdown-region-1');
        Route::post('/', [Region1AssetBreakdownController::class, 'store'])->name('asset-breakdown-region-1.store');
        Route::get('/data', [Region1AssetBreakdownController::class, 'data'])->name('asset-breakdown-region-1.data');
        Route::put('/{id}', [Region1AssetBreakdownController::class, 'update'])->name('asset-breakdown-region-1.update');
        Route::delete('/{id}', [Region1AssetBreakdownController::class, 'destroy'])->name('asset-breakdown-region-1.destroy');
    });
    Route::prefix('monev/shcnt/input-data/asset-breakdown-region-2')->group(function () {
        Route::get('/', [Region2AssetBreakdownController::class, 'index'])->name('asset-breakdown-region-2');
        Route::post('/', [Region2AssetBreakdownController::class, 'store'])->name('asset-breakdown-region-2.store');
        Route::get('/data', [Region2AssetBreakdownController::class, 'data'])->name('asset-breakdown-region-2.data');
        Route::put('/{id}', [Region2AssetBreakdownController::class, 'update'])->name('asset-breakdown-region-2.update');
        Route::delete('/{id}', [Region2AssetBreakdownController::class, 'destroy'])->name('asset-breakdown-region-2.destroy');
    });
    Route::prefix('monev/shcnt/input-data/asset-breakdown-region-3')->group(function () {
        Route::get('/', [Region3AssetBreakdownController::class, 'index'])->name('asset-breakdown-region-3');
        Route::post('/', [Region3AssetBreakdownController::class, 'store'])->name('asset-breakdown-region-3.store');
        Route::get('/data', [Region3AssetBreakdownController::class, 'data'])->name('asset-breakdown-region-3.data');
        Route::put('/{id}', [Region3AssetBreakdownController::class, 'update'])->name('asset-breakdown-region-3.update');
        Route::delete('/{id}', [Region3AssetBreakdownController::class, 'destroy'])->name('asset-breakdown-region-3.destroy');
    });
    Route::prefix('monev/shcnt/input-data/asset-breakdown-region-4')->group(function () {
        Route::get('/', [Region4AssetBreakdownController::class, 'index'])->name('asset-breakdown-region-4');
        Route::post('/', [Region4AssetBreakdownController::class, 'store'])->name('asset-breakdown-region-4.store');
        Route::get('/data', [Region4AssetBreakdownController::class, 'data'])->name('asset-breakdown-region-4.data');
        Route::put('/{id}', [Region4AssetBreakdownController::class, 'update'])->name('asset-breakdown-region-4.update');
        Route::delete('/{id}', [Region4AssetBreakdownController::class, 'destroy'])->name('asset-breakdown-region-4.destroy');
    });
    Route::prefix('monev/shcnt/input-data/asset-breakdown-region-5')->group(function () {
        Route::get('/', [Region5AssetBreakdownController::class, 'index'])->name('asset-breakdown-region-5');
        Route::post('/', [Region5AssetBreakdownController::class, 'store'])->name('asset-breakdown-region-5.store');
        Route::get('/data', [Region5AssetBreakdownController::class, 'data'])->name('asset-breakdown-region-5.data');
        Route::put('/{id}', [Region5AssetBreakdownController::class, 'update'])->name('asset-breakdown-region-5.update');
        Route::delete('/{id}', [Region5AssetBreakdownController::class, 'destroy'])->name('asset-breakdown-region-5.destroy');
    });
    Route::prefix('monev/shcnt/input-data/asset-breakdown-region-6')->group(function () {
        Route::get('/', [Region6AssetBreakdownController::class, 'index'])->name('asset-breakdown-region-6');
        Route::post('/', [Region6AssetBreakdownController::class, 'store'])->name('asset-breakdown-region-6.store');
        Route::get('/data', [Region6AssetBreakdownController::class, 'data'])->name('asset-breakdown-region-6.data');
        Route::put('/{id}', [Region6AssetBreakdownController::class, 'update'])->name('asset-breakdown-region-6.update');
        Route::delete('/{id}', [Region6AssetBreakdownController::class, 'destroy'])->name('asset-breakdown-region-6.destroy');
    });
    Route::prefix('monev/shcnt/input-data/asset-breakdown-region-7')->group(function () {
        Route::get('/', [Region7AssetBreakdownController::class, 'index'])->name('asset-breakdown-region-7');
        Route::post('/', [Region7AssetBreakdownController::class, 'store'])->name('asset-breakdown-region-7.store');
        Route::get('/data', [Region7AssetBreakdownController::class, 'data'])->name('asset-breakdown-region-7.data');
        Route::put('/{id}', [Region7AssetBreakdownController::class, 'update'])->name('asset-breakdown-region-7.update');
        Route::delete('/{id}', [Region7AssetBreakdownController::class, 'destroy'])->name('asset-breakdown-region-7.destroy');
    });
    Route::prefix('monev/shcnt/input-data/asset-breakdown-region-8')->group(function () {
        Route::get('/', [Region8AssetBreakdownController::class, 'index'])->name('asset-breakdown-region-8');
        Route::post('/', [Region8AssetBreakdownController::class, 'store'])->name('asset-breakdown-region-8.store');
        Route::get('/data', [Region8AssetBreakdownController::class, 'data'])->name('asset-breakdown-region-8.data');
        Route::put('/{id}', [Region8AssetBreakdownController::class, 'update'])->name('asset-breakdown-region-8.update');
        Route::delete('/{id}', [Region8AssetBreakdownController::class, 'destroy'])->name('asset-breakdown-region-8.destroy');
    });

    // SHCNT Rencana Pemeliharaan
    Route::prefix('monev/shcnt/input-data/rencana-pemeliharaan-region-1')->group(function () {
        Route::get('/', [Region1RencanaPemeliharaanController::class, 'index'])->name('rencana-pemeliharaan-region-1');
        Route::post('/', [Region1RencanaPemeliharaanController::class, 'store'])->name('rencana-pemeliharaan-region-1.store');
        Route::get('/data', [Region1RencanaPemeliharaanController::class, 'data'])->name('rencana-pemeliharaan-region-1.data');
        Route::put('/{id}', [Region1RencanaPemeliharaanController::class, 'update'])->name('rencana-pemeliharaan-region-1.update');
        Route::delete('/{id}', [Region1RencanaPemeliharaanController::class, 'destroy'])->name('rencana-pemeliharaan-region-1.destroy');
    });
    Route::prefix('monev/shcnt/input-data/rencana-pemeliharaan-region-2')->group(function () {
        Route::get('/', [Region2RencanaPemeliharaanController::class, 'index'])->name('rencana-pemeliharaan-region-2');
        Route::post('/', [Region2RencanaPemeliharaanController::class, 'store'])->name('rencana-pemeliharaan-region-2.store');
        Route::get('/data', [Region2RencanaPemeliharaanController::class, 'data'])->name('rencana-pemeliharaan-region-2.data');
        Route::put('/{id}', [Region2RencanaPemeliharaanController::class, 'update'])->name('rencana-pemeliharaan-region-2.update');
        Route::delete('/{id}', [Region2RencanaPemeliharaanController::class, 'destroy'])->name('rencana-pemeliharaan-region-2.destroy');
    });
    Route::prefix('monev/shcnt/input-data/rencana-pemeliharaan-region-3')->group(function () {
        Route::get('/', [Region3RencanaPemeliharaanController::class, 'index'])->name('rencana-pemeliharaan-region-3');
        Route::post('/', [Region3RencanaPemeliharaanController::class, 'store'])->name('rencana-pemeliharaan-region-3.store');
        Route::get('/data', [Region3RencanaPemeliharaanController::class, 'data'])->name('rencana-pemeliharaan-region-3.data');
        Route::put('/{id}', [Region3RencanaPemeliharaanController::class, 'update'])->name('rencana-pemeliharaan-region-3.update');
        Route::delete('/{id}', [Region3RencanaPemeliharaanController::class, 'destroy'])->name('rencana-pemeliharaan-region-3.destroy');
    });
    Route::prefix('monev/shcnt/input-data/rencana-pemeliharaan-region-4')->group(function () {
        Route::get('/', [Region4RencanaPemeliharaanController::class, 'index'])->name('rencana-pemeliharaan-region-4');
        Route::post('/', [Region4RencanaPemeliharaanController::class, 'store'])->name('rencana-pemeliharaan-region-4.store');
        Route::get('/data', [Region4RencanaPemeliharaanController::class, 'data'])->name('rencana-pemeliharaan-region-4.data');
        Route::put('/{id}', [Region4RencanaPemeliharaanController::class, 'update'])->name('rencana-pemeliharaan-region-4.update');
        Route::delete('/{id}', [Region4RencanaPemeliharaanController::class, 'destroy'])->name('rencana-pemeliharaan-region-4.destroy');
    });
    Route::prefix('monev/shcnt/input-data/rencana-pemeliharaan-region-5')->group(function () {
        Route::get('/', [Region5RencanaPemeliharaanController::class, 'index'])->name('rencana-pemeliharaan-region-5');
        Route::post('/', [Region5RencanaPemeliharaanController::class, 'store'])->name('rencana-pemeliharaan-region-5.store');
        Route::get('/data', [Region5RencanaPemeliharaanController::class, 'data'])->name('rencana-pemeliharaan-region-5.data');
        Route::put('/{id}', [Region5RencanaPemeliharaanController::class, 'update'])->name('rencana-pemeliharaan-region-5.update');
        Route::delete('/{id}', [Region5RencanaPemeliharaanController::class, 'destroy'])->name('rencana-pemeliharaan-region-5.destroy');
    });
    Route::prefix('monev/shcnt/input-data/rencana-pemeliharaan-region-6')->group(function () {
        Route::get('/', [Region6RencanaPemeliharaanController::class, 'index'])->name('rencana-pemeliharaan-region-6');
        Route::post('/', [Region6RencanaPemeliharaanController::class, 'store'])->name('rencana-pemeliharaan-region-6.store');
        Route::get('/data', [Region6RencanaPemeliharaanController::class, 'data'])->name('rencana-pemeliharaan-region-6.data');
        Route::put('/{id}', [Region6RencanaPemeliharaanController::class, 'update'])->name('rencana-pemeliharaan-region-6.update');
        Route::delete('/{id}', [Region6RencanaPemeliharaanController::class, 'destroy'])->name('rencana-pemeliharaan-region-6.destroy');
    });
    Route::prefix('monev/shcnt/input-data/rencana-pemeliharaan-region-7')->group(function () {
        Route::get('/', [Region7RencanaPemeliharaanController::class, 'index'])->name('rencana-pemeliharaan-region-7');
        Route::post('/', [Region7RencanaPemeliharaanController::class, 'store'])->name('rencana-pemeliharaan-region-7.store');
        Route::get('/data', [Region7RencanaPemeliharaanController::class, 'data'])->name('rencana-pemeliharaan-region-7.data');
        Route::put('/{id}', [Region7RencanaPemeliharaanController::class, 'update'])->name('rencana-pemeliharaan-region-7.update');
        Route::delete('/{id}', [Region7RencanaPemeliharaanController::class, 'destroy'])->name('rencana-pemeliharaan-region-7.destroy');
    });
    Route::prefix('monev/shcnt/input-data/rencana-pemeliharaan-region-8')->group(function () {
        Route::get('/', [Region8RencanaPemeliharaanController::class, 'index'])->name('rencana-pemeliharaan-region-8');
        Route::post('/', [Region8RencanaPemeliharaanController::class, 'store'])->name('rencana-pemeliharaan-region-8.store');
        Route::get('/data', [Region8RencanaPemeliharaanController::class, 'data'])->name('rencana-pemeliharaan-region-8.data');
        Route::put('/{id}', [Region8RencanaPemeliharaanController::class, 'update'])->name('rencana-pemeliharaan-region-8.update');
        Route::delete('/{id}', [Region8RencanaPemeliharaanController::class, 'destroy'])->name('rencana-pemeliharaan-region-8.destroy');
    });

    // Availability SHCNT
    Route::prefix('monev/shcnt/input-data/availability-region-1')->group(function () {
        Route::get('/', [Region1AvailabilityController::class, 'index'])->name('availability-region-1');
        Route::post('/', [Region1AvailabilityController::class, 'store'])->name('availability-region-1.store');
        Route::get('/data', [Region1AvailabilityController::class, 'data'])->name('availability-region-1.data');
        Route::put('/{id}', [Region1AvailabilityController::class, 'update'])->name('availability-region-1.update');
        Route::delete('/{id}', [Region1AvailabilityController::class, 'destroy'])->name('availability-region-1.destroy');
    });
    Route::prefix('monev/shcnt/input-data/availability-region-2')->group(function () {
        Route::get('/', [Region2AvailabilityController::class, 'index'])->name('availability-region-2');
        Route::post('/', [Region2AvailabilityController::class, 'store'])->name('availability-region-2.store');
        Route::get('/data', [Region2AvailabilityController::class, 'data'])->name('availability-region-2.data');
        Route::put('/{id}', [Region2AvailabilityController::class, 'update'])->name('availability-region-2.update');
        Route::delete('/{id}', [Region2AvailabilityController::class, 'destroy'])->name('availability-region-2.destroy');
    });
    Route::prefix('monev/shcnt/input-data/availability-region-3')->group(function () {
        Route::get('/', [Region3AvailabilityController::class, 'index'])->name('availability-region-3');
        Route::post('/', [Region3AvailabilityController::class, 'store'])->name('availability-region-3.store');
        Route::get('/data', [Region3AvailabilityController::class, 'data'])->name('availability-region-3.data');
        Route::put('/{id}', [Region3AvailabilityController::class, 'update'])->name('availability-region-3.update');
        Route::delete('/{id}', [Region3AvailabilityController::class, 'destroy'])->name('availability-region-3.destroy');
    });
    Route::prefix('monev/shcnt/input-data/availability-region-4')->group(function () {
        Route::get('/', [Region4AvailabilityController::class, 'index'])->name('availability-region-4');
        Route::post('/', [Region4AvailabilityController::class, 'store'])->name('availability-region-4.store');
        Route::get('/data', [Region4AvailabilityController::class, 'data'])->name('availability-region-4.data');
        Route::put('/{id}', [Region4AvailabilityController::class, 'update'])->name('availability-region-4.update');
        Route::delete('/{id}', [Region4AvailabilityController::class, 'destroy'])->name('availability-region-4.destroy');
    });
    Route::prefix('monev/shcnt/input-data/availability-region-5')->group(function () {
        Route::get('/', [Region5AvailabilityController::class, 'index'])->name('availability-region-5');
        Route::post('/', [Region5AvailabilityController::class, 'store'])->name('availability-region-5.store');
        Route::get('/data', [Region5AvailabilityController::class, 'data'])->name('availability-region-5.data');
        Route::put('/{id}', [Region5AvailabilityController::class, 'update'])->name('availability-region-5.update');
        Route::delete('/{id}', [Region5AvailabilityController::class, 'destroy'])->name('availability-region-5.destroy');
    });
    Route::prefix('monev/shcnt/input-data/availability-region-6')->group(function () {
        Route::get('/', [Region6AvailabilityController::class, 'index'])->name('availability-region-6');
        Route::post('/', [Region6AvailabilityController::class, 'store'])->name('availability-region-6.store');
        Route::get('/data', [Region6AvailabilityController::class, 'data'])->name('availability-region-6.data');
        Route::put('/{id}', [Region6AvailabilityController::class, 'update'])->name('availability-region-6.update');
        Route::delete('/{id}', [Region6AvailabilityController::class, 'destroy'])->name('availability-region-6.destroy');
    });
    Route::prefix('monev/shcnt/input-data/availability-region-7')->group(function () {
        Route::get('/', [Region7AvailabilityController::class, 'index'])->name('availability-region-7');
        Route::post('/', [Region7AvailabilityController::class, 'store'])->name('availability-region-7.store');
        Route::get('/data', [Region7AvailabilityController::class, 'data'])->name('availability-region-7.data');
        Route::put('/{id}', [Region7AvailabilityController::class, 'update'])->name('availability-region-7.update');
        Route::delete('/{id}', [Region7AvailabilityController::class, 'destroy'])->name('availability-region-7.destroy');
    });
    Route::prefix('monev/shcnt/input-data/availability-region-8')->group(function () {
        Route::get('/', [Region8AvailabilityController::class, 'index'])->name('availability-region-8');
        Route::post('/', [Region8AvailabilityController::class, 'store'])->name('availability-region-8.store');
        Route::get('/data', [Region8AvailabilityController::class, 'data'])->name('availability-region-8.data');
        Route::put('/{id}', [Region8AvailabilityController::class, 'update'])->name('availability-region-8.update');
        Route::delete('/{id}', [Region8AvailabilityController::class, 'destroy'])->name('availability-region-8.destroy');
    });
    Route::prefix('monev/shcnt/input-data/pelatihan-aims-region-1')->group(function () {
        Route::get('/', [Region1PelatihanAimsController::class, 'index'])->name('pelatihan-aims-region-1');
        Route::post('/', [Region1PelatihanAimsController::class, 'store'])->name('pelatihan-aims-region-1.store');
        Route::get('/data', [Region1PelatihanAimsController::class, 'data'])->name('pelatihan-aims-region-1.data');
        Route::put('/{id}', [Region1PelatihanAimsController::class, 'update'])->name('pelatihan-aims-region-1.update');
        Route::delete('/{id}', [Region1PelatihanAimsController::class, 'destroy'])->name('pelatihan-aims-region-1.destroy');
    });

    Route::prefix('monev/shcnt/input-data/pelatihan-aims-region-2')->group(function () {
        Route::get('/', [Region2PelatihanAimsController::class, 'index'])->name('pelatihan-aims-region-2');
        Route::post('/', [Region2PelatihanAimsController::class, 'store'])->name('pelatihan-aims-region-2.store');
        Route::get('/data', [Region2PelatihanAimsController::class, 'data'])->name('pelatihan-aims-region-2.data');
        Route::put('/{id}', [Region2PelatihanAimsController::class, 'update'])->name('pelatihan-aims-region-2.update');
        Route::delete('/{id}', [Region2PelatihanAimsController::class, 'destroy'])->name('pelatihan-aims-region-2.destroy');
    });

    Route::prefix('monev/shcnt/input-data/pelatihan-aims-region-3')->group(function () {
        Route::get('/', [Region3PelatihanAimsController::class, 'index'])->name('pelatihan-aims-region-3');
        Route::post('/', [Region3PelatihanAimsController::class, 'store'])->name('pelatihan-aims-region-3.store');
        Route::get('/data', [Region3PelatihanAimsController::class, 'data'])->name('pelatihan-aims-region-3.data');
        Route::put('/{id}', [Region3PelatihanAimsController::class, 'update'])->name('pelatihan-aims-region-3.update');
        Route::delete('/{id}', [Region3PelatihanAimsController::class, 'destroy'])->name('pelatihan-aims-region-3.destroy');
    });

    Route::prefix('monev/shcnt/input-data/pelatihan-aims-region-4')->group(function () {
        Route::get('/', [Region4PelatihanAimsController::class, 'index'])->name('pelatihan-aims-region-4');
        Route::post('/', [Region4PelatihanAimsController::class, 'store'])->name('pelatihan-aims-region-4.store');
        Route::get('/data', [Region4PelatihanAimsController::class, 'data'])->name('pelatihan-aims-region-4.data');
        Route::put('/{id}', [Region4PelatihanAimsController::class, 'update'])->name('pelatihan-aims-region-4.update');
        Route::delete('/{id}', [Region4PelatihanAimsController::class, 'destroy'])->name('pelatihan-aims-region-4.destroy');
    });

    Route::prefix('monev/shcnt/input-data/pelatihan-aims-region-5')->group(function () {
        Route::get('/', [Region5PelatihanAimsController::class, 'index'])->name('pelatihan-aims-region-5');
        Route::post('/', [Region5PelatihanAimsController::class, 'store'])->name('pelatihan-aims-region-5.store');
        Route::get('/data', [Region5PelatihanAimsController::class, 'data'])->name('pelatihan-aims-region-5.data');
        Route::put('/{id}', [Region5PelatihanAimsController::class, 'update'])->name('pelatihan-aims-region-5.update');
        Route::delete('/{id}', [Region5PelatihanAimsController::class, 'destroy'])->name('pelatihan-aims-region-5.destroy');
    });

    Route::prefix('monev/shcnt/input-data/pelatihan-aims-region-6')->group(function () {
        Route::get('/', [Region6PelatihanAimsController::class, 'index'])->name('pelatihan-aims-region-6');
        Route::post('/', [Region6PelatihanAimsController::class, 'store'])->name('pelatihan-aims-region-6.store');
        Route::get('/data', [Region6PelatihanAimsController::class, 'data'])->name('pelatihan-aims-region-6.data');
        Route::put('/{id}', [Region6PelatihanAimsController::class, 'update'])->name('pelatihan-aims-region-6.update');
        Route::delete('/{id}', [Region6PelatihanAimsController::class, 'destroy'])->name('pelatihan-aims-region-6.destroy');
    });

    Route::prefix('monev/shcnt/input-data/pelatihan-aims-region-7')->group(function () {
        Route::get('/', [Region7PelatihanAimsController::class, 'index'])->name('pelatihan-aims-region-7');
        Route::post('/', [Region7PelatihanAimsController::class, 'store'])->name('pelatihan-aims-region-7.store');
        Route::get('/data', [Region7PelatihanAimsController::class, 'data'])->name('pelatihan-aims-region-7.data');
        Route::put('/{id}', [Region7PelatihanAimsController::class, 'update'])->name('pelatihan-aims-region-7.update');
        Route::delete('/{id}', [Region7PelatihanAimsController::class, 'destroy'])->name('pelatihan-aims-region-7.destroy');
    });

    Route::prefix('monev/shcnt/input-data/pelatihan-aims-region-8')->group(function () {
        Route::get('/', [Region8PelatihanAimsController::class, 'index'])->name('pelatihan-aims-region-8');
        Route::post('/', [Region8PelatihanAimsController::class, 'store'])->name('pelatihan-aims-region-8.store');
        Route::get('/data', [Region8PelatihanAimsController::class, 'data'])->name('pelatihan-aims-region-8.data');
        Route::put('/{id}', [Region8PelatihanAimsController::class, 'update'])->name('pelatihan-aims-region-8.update');
        Route::delete('/{id}', [Region8PelatihanAimsController::class, 'destroy'])->name('pelatihan-aims-region-8.destroy');
    });
    
    // mandatory certification
    Route::prefix('monev/shcnt/input-data/mandatory-certification-region-1')->group(function () {
        Route::get('/', [Region1MandatoryCertiController::class, 'index'])->name('mandatory-certification-region-1');
        Route::post('/', [Region1MandatoryCertiController::class, 'store'])->name('mandatory-certification-region-1.store');
        Route::get('/data', [Region1MandatoryCertiController::class, 'data'])->name('mandatory-certification-region-1.data');
        Route::put('/{id}', [Region1MandatoryCertiController::class, 'update'])->name('mandatory-certification-region-1.update');
        Route::delete('/{id}', [Region1MandatoryCertiController::class, 'destroy'])->name('mandatory-certification-region-1.destroy');
    });
    Route::prefix('monev/shcnt/input-data/mandatory-certification-region-2')->group(function () {
        Route::get('/', [Region2MandatoryCertiController::class, 'index'])->name('mandatory-certification-region-2');
        Route::post('/', [Region2MandatoryCertiController::class, 'store'])->name('mandatory-certification-region-2.store');
        Route::get('/data', [Region2MandatoryCertiController::class, 'data'])->name('mandatory-certification-region-2.data');
        Route::put('/{id}', [Region2MandatoryCertiController::class, 'update'])->name('mandatory-certification-region-2.update');
        Route::delete('/{id}', [Region2MandatoryCertiController::class, 'destroy'])->name('mandatory-certification-region-2.destroy');
    });
    Route::prefix('monev/shcnt/input-data/mandatory-certification-region-3')->group(function () {
        Route::get('/', [Region3MandatoryCertiController::class, 'index'])->name('mandatory-certification-region-3');
        Route::post('/', [Region3MandatoryCertiController::class, 'store'])->name('mandatory-certification-region-3.store');
        Route::get('/data', [Region3MandatoryCertiController::class, 'data'])->name('mandatory-certification-region-3.data');
        Route::put('/{id}', [Region3MandatoryCertiController::class, 'update'])->name('mandatory-certification-region-3.update');
        Route::delete('/{id}', [Region3MandatoryCertiController::class, 'destroy'])->name('mandatory-certification-region-3.destroy');
    });
    Route::prefix('monev/shcnt/input-data/mandatory-certification-region-4')->group(function () {
        Route::get('/', [Region4MandatoryCertiController::class, 'index'])->name('mandatory-certification-region-4');
        Route::post('/', [Region4MandatoryCertiController::class, 'store'])->name('mandatory-certification-region-4.store');
        Route::get('/data', [Region4MandatoryCertiController::class, 'data'])->name('mandatory-certification-region-4.data');
        Route::put('/{id}', [Region4MandatoryCertiController::class, 'update'])->name('mandatory-certification-region-4.update');
        Route::delete('/{id}', [Region4MandatoryCertiController::class, 'destroy'])->name('mandatory-certification-region-4.destroy');
    });
    Route::prefix('monev/shcnt/input-data/mandatory-certification-region-5')->group(function () {
        Route::get('/', [Region5MandatoryCertiController::class, 'index'])->name('mandatory-certification-region-5');
        Route::post('/', [Region5MandatoryCertiController::class, 'store'])->name('mandatory-certification-region-5.store');
        Route::get('/data', [Region5MandatoryCertiController::class, 'data'])->name('mandatory-certification-region-5.data');
        Route::put('/{id}', [Region5MandatoryCertiController::class, 'update'])->name('mandatory-certification-region-5.update');
        Route::delete('/{id}', [Region5MandatoryCertiController::class, 'destroy'])->name('mandatory-certification-region-5.destroy');
    });
    Route::prefix('monev/shcnt/input-data/mandatory-certification-region-6')->group(function () {
        Route::get('/', [Region6MandatoryCertiController::class, 'index'])->name('mandatory-certification-region-6');
        Route::post('/', [Region6MandatoryCertiController::class, 'store'])->name('mandatory-certification-region-6.store');
        Route::get('/data', [Region6MandatoryCertiController::class, 'data'])->name('mandatory-certification-region-6.data');
        Route::put('/{id}', [Region6MandatoryCertiController::class, 'update'])->name('mandatory-certification-region-6.update');
        Route::delete('/{id}', [Region6MandatoryCertiController::class, 'destroy'])->name('mandatory-certification-region-6.destroy');
    });
    Route::prefix('monev/shcnt/input-data/mandatory-certification-region-7')->group(function () {
        Route::get('/', [Region7MandatoryCertiController::class, 'index'])->name('mandatory-certification-region-7');
        Route::post('/', [Region7MandatoryCertiController::class, 'store'])->name('mandatory-certification-region-7.store');
        Route::get('/data', [Region7MandatoryCertiController::class, 'data'])->name('mandatory-certification-region-7.data');
        Route::put('/{id}', [Region7MandatoryCertiController::class, 'update'])->name('mandatory-certification-region-7.update');
        Route::delete('/{id}', [Region7MandatoryCertiController::class, 'destroy'])->name('mandatory-certification-region-7.destroy');
    });
    Route::prefix('monev/shcnt/input-data/mandatory-certification-region-8')->group(function () {
        Route::get('/', [Region8MandatoryCertiController::class, 'index'])->name('mandatory-certification-region-8');
        Route::post('/', [Region8MandatoryCertiController::class, 'store'])->name('mandatory-certification-region-8.store');
        Route::get('/data', [Region8MandatoryCertiController::class, 'data'])->name('mandatory-certification-region-8.data');
        Route::put('/{id}', [Region8MandatoryCertiController::class, 'update'])->name('mandatory-certification-region-8.update');
        Route::delete('/{id}', [Region8MandatoryCertiController::class, 'destroy'])->name('mandatory-certification-region-8.destroy');
    });

    // Kondisi Vacant AIMS
    Route::prefix('monev/shcnt/input-data/kondisi-vacant-aims-region-1')->group(function () {
        Route::get('/', [Region1KondisiVacantAimsController::class, 'index'])->name('kondisi-vacant-aims-region-1');
        Route::post('/', [Region1KondisiVacantAimsController::class, 'store'])->name('kondisi-vacant-aims-region-1.store');
        Route::get('/data', [Region1KondisiVacantAimsController::class, 'data'])->name('kondisi-vacant-aims-region-1.data');
        Route::put('/{id}', [Region1KondisiVacantAimsController::class, 'update'])->name('kondisi-vacant-aims-region-1.update');
        Route::delete('/{id}', [Region1KondisiVacantAimsController::class, 'destroy'])->name('kondisi-vacant-aims-region-1.destroy');
    });
    Route::prefix('monev/shcnt/input-data/kondisi-vacant-aims-region-2')->group(function () {
        Route::get('/', [Region2KondisiVacantAimsController::class, 'index'])->name('kondisi-vacant-aims-region-2');
        Route::post('/', [Region2KondisiVacantAimsController::class, 'store'])->name('kondisi-vacant-aims-region-2.store');
        Route::get('/data', [Region2KondisiVacantAimsController::class, 'data'])->name('kondisi-vacant-aims-region-2.data');
        Route::put('/{id}', [Region2KondisiVacantAimsController::class, 'update'])->name('kondisi-vacant-aims-region-2.update');
        Route::delete('/{id}', [Region2KondisiVacantAimsController::class, 'destroy'])->name('kondisi-vacant-aims-region-2.destroy');
    });
    Route::prefix('monev/shcnt/input-data/kondisi-vacant-aims-region-3')->group(function () {
        Route::get('/', [Region3KondisiVacantAimsController::class, 'index'])->name('kondisi-vacant-aims-region-3');
        Route::post('/', [Region3KondisiVacantAimsController::class, 'store'])->name('kondisi-vacant-aims-region-3.store');
        Route::get('/data', [Region3KondisiVacantAimsController::class, 'data'])->name('kondisi-vacant-aims-region-3.data');
        Route::put('/{id}', [Region3KondisiVacantAimsController::class, 'update'])->name('kondisi-vacant-aims-region-3.update');
        Route::delete('/{id}', [Region3KondisiVacantAimsController::class, 'destroy'])->name('kondisi-vacant-aims-region-3.destroy');
    });
    Route::prefix('monev/shcnt/input-data/kondisi-vacant-aims-region-4')->group(function () {
        Route::get('/', [Region4KondisiVacantAimsController::class, 'index'])->name('kondisi-vacant-aims-region-4');
        Route::post('/', [Region4KondisiVacantAimsController::class, 'store'])->name('kondisi-vacant-aims-region-4.store');
        Route::get('/data', [Region4KondisiVacantAimsController::class, 'data'])->name('kondisi-vacant-aims-region-4.data');
        Route::put('/{id}', [Region4KondisiVacantAimsController::class, 'update'])->name('kondisi-vacant-aims-region-4.update');
        Route::delete('/{id}', [Region4KondisiVacantAimsController::class, 'destroy'])->name('kondisi-vacant-aims-region-4.destroy');
    });
    Route::prefix('monev/shcnt/input-data/kondisi-vacant-aims-region-5')->group(function () {
        Route::get('/', [Region5KondisiVacantAimsController::class, 'index'])->name('kondisi-vacant-aims-region-5');
        Route::post('/', [Region5KondisiVacantAimsController::class, 'store'])->name('kondisi-vacant-aims-region-5.store');
        Route::get('/data', [Region5KondisiVacantAimsController::class, 'data'])->name('kondisi-vacant-aims-region-5.data');
        Route::put('/{id}', [Region5KondisiVacantAimsController::class, 'update'])->name('kondisi-vacant-aims-region-5.update');
        Route::delete('/{id}', [Region5KondisiVacantAimsController::class, 'destroy'])->name('kondisi-vacant-aims-region-5.destroy');
    });
    Route::prefix('monev/shcnt/input-data/kondisi-vacant-aims-region-6')->group(function () {
        Route::get('/', [Region6KondisiVacantAimsController::class, 'index'])->name('kondisi-vacant-aims-region-6');
        Route::post('/', [Region6KondisiVacantAimsController::class, 'store'])->name('kondisi-vacant-aims-region-6.store');
        Route::get('/data', [Region6KondisiVacantAimsController::class, 'data'])->name('kondisi-vacant-aims-region-6.data');
        Route::put('/{id}', [Region6KondisiVacantAimsController::class, 'update'])->name('kondisi-vacant-aims-region-6.update');
        Route::delete('/{id}', [Region6KondisiVacantAimsController::class, 'destroy'])->name('kondisi-vacant-aims-region-6.destroy');
    });
    Route::prefix('monev/shcnt/input-data/kondisi-vacant-aims-region-7')->group(function () {
        Route::get('/', [Region7KondisiVacantAimsController::class, 'index'])->name('kondisi-vacant-aims-region-7');
        Route::post('/', [Region7KondisiVacantAimsController::class, 'store'])->name('kondisi-vacant-aims-region-7.store');
        Route::get('/data', [Region7KondisiVacantAimsController::class, 'data'])->name('kondisi-vacant-aims-region-7.data');
        Route::put('/{id}', [Region7KondisiVacantAimsController::class, 'update'])->name('kondisi-vacant-aims-region-7.update');
        Route::delete('/{id}', [Region7KondisiVacantAimsController::class, 'destroy'])->name('kondisi-vacant-aims-region-7.destroy');
    });
    Route::prefix('monev/shcnt/input-data/kondisi-vacant-aims-region-8')->group(function () {
        Route::get('/', [Region8KondisiVacantAimsController::class, 'index'])->name('kondisi-vacant-aims-region-8');
        Route::post('/', [Region8KondisiVacantAimsController::class, 'store'])->name('kondisi-vacant-aims-region-8.store');
        Route::get('/data', [Region8KondisiVacantAimsController::class, 'data'])->name('kondisi-vacant-aims-region-8.data');
        Route::put('/{id}', [Region8KondisiVacantAimsController::class, 'update'])->name('kondisi-vacant-aims-region-8.update');
        Route::delete('/{id}', [Region8KondisiVacantAimsController::class, 'destroy'])->name('kondisi-vacant-aims-region-8.destroy');
    });
});



Route::middleware(['auth'])->group(function () {
    Route::redirect('   ettings', 'settings/profile');
    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
});


require __DIR__ . '/auth.php';
