<?php

namespace App\Http\Controllers\SHG\InputDataMonev\kalimantan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Kalimantan\MandatoryCertificationKjgRequest;
use App\Models\SHG\Kalimantan\MandatoryCertificationKjg;
use Illuminate\Support\Facades\DB;

class MandatoryCertificationKjgController extends Controller
{
    public function index()
    {
        $sertifikasiOptions = [
            "(Maintenance) Planner Academy",
            "Advanced Corrosion & Material Technology",
            "API 510 - Pressure Vessel Inspector",
            "API 570 - Piping Inspector",
            "API 571 - Corrosion and Materials",
            "API 617 - Reciprocating Compressor",
            "API 653 - Aboveground Storage Tank",
            "API 687 Rotor Repair",
            "API 936 - Refractory Personnel",
            "API RP 941 - Steel for Hydrogen service at elevated temperatures in petroleum & petrochemical plants",
            "API RP 2000 - Venting Atmospheric and Low-pressure Storage Tanks",
            "API RP 2350 - Overfill Protection for Storage Tanks in Petroleum Facilities",
            "API RP 941 - Steels for Hydrogen Service at Elevated Temperatures and Pressures in Petroleum Refineries and Petrochemical Plants",
            "ASME B31.3 - Process Piping",
            "ASME Section VIII Division 1 & 2 - Pressure Vessel Series",
            "Asset Integrity Management System",
            "Basic Electrical, Process Control Stationary & Rotary Mechanical Equipment",
            "Basic Equipment Care (BEC)",
            "Basic Instrument & Control",
            "Basic Operational Care (BOC)",
            "Basic Process Unit",
            "Bimtek Kualifikasi Tenaga Ahli Inspektur Pipa Penyalur Migas",
            "Bridge Room Resource Management (BRRM)",
            "Carbonates in the Petroleum Industry",
            "Cathodic Protection",
            "Certified Maintenance and Reliability Professional (CMRP)",
            "Coating Inspector Level I",
            "Coating Inspector Level II",
            "Engine Room Resource Management (ERRM)",
            "Failure Analysis & Troubleshooting for Compressor",
            "Failure Mode Effect Analysis",
            "Fitness-For-Service (FFS) and Engineering Critical Assessment (ECA) for Piping",
            "Grounding and Lightning Protection System",
            "Hazard Identification and Risk Assessment",
            "High Voltage, Equipment and Testing",
            "High Voltage, Management on Ship",
            "Hull and Machinery (Maintenance)",
            "IEC 62561-5:2017 for Lightning Protection System Components",
            "Inspection & Preventive Maintenance Jetty",
            "Inspector Ahli Ketel Uap / Boiler (AK3U)",
            "Inspektur Tanki Timbun",
            "Inspektur Bejana Tekan",
            "Inspektur Listrik Migas",
            "Inventory of Hazardous Materials, IHM and EU SRR",
            "ISO 55001 Lead Auditor",
            "Life Cycle Assessment",
            "Maintenance Management",
            "Mooring, Equipment Inspection",
            "Mooring, Risk assessment and management",
            "NDT Level -1 (ECT, PT, MT, UT, dll)",
            "NDT Level -2 (ECT, PT, MT, UT, dll)",
            "Operation and Maintenance of Inert Gas Systems (Edition 3)",
            "Part or Material Knowledge & Sourcing",
            "Pelatihan Ahli Teknik (AT)",
            "Pelatihan dan Sertifikasi Inspektur Tangki",
            "Periodic Maintenance and Inspection of Lifting Equipment",
            "Pipeline Integrity Management System (PIMS)",
            "POP (Pengawas Operasional Pertama) dan POM (Pengawas Operasional Madya)",
            "Pump Operation, Maintenance and Troubleshooting",
            "RBI Engineer",
            "Reliability Centered Maintenance",
            "Risk Based Inspection",
            "SAP Modul Plant Maintenance",
            "Sertifikasi BNSP - Pipe Fitter",
            "Sertifikasi Inspektur Peralatan (Pipa Penyalur, Bejana Tekan, Tanki Timbun, Rotating, dll)",
            "Sertifikasi Inspektur Pesawat Angkat (Crane Inspector)",
            "Sertifikasi Inspektur Rotating Equipment",
            "Sertifikasi Inspektur Tangki Timbun",
            "Sertifikasi Kompetensi Kerja Kalibrasi dan Instrumentasi (Teknisi Tingkat II)",
            "Sertifikasi Life Cycle Assessment (LCA)",
            "Sertifikasi O&M Peralatan (Pipa Penyalur, Bejana Tekan, Tanki Timbun, Rotating, dll)",
            "Sertifikasi Operator Mesin Balancing",
            "Sertifikasi Operator Pesawat Angkat",
            "Sertifikasi Pemeliharaan Steam Turbine",
            "Shell & Tube Heat Exchanger",
            "Ship Inspection Report 2.0",
            "SIRE 2.0, The ship inspection",
            "SKKNI Perawatan Mekanik: Pengawas",
            "SKKNI Teknik Listrik Migas: Pengawas",
            "SKTTK/ Sertifikasi kompetensi Tenaga kelistrikan",
            "Turbomachinery Inspection & Maintenance",
            "Turn Around Management Academy (T/A Brick) - Execution"
        ];

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI 2025 KJG',
                'route' => route('kalimantan-jawa-gas'),
                'active' => request()->routeIs('kalimantan-jawa-gas'),
            ],
            [
                'title' => 'Mandatory Certification KJG',
                'route' => route('mandatory-certification-kjg'),
                'active' => request()->routeIs('mandatory-certification-kjg'),
            ],
            [
                'title' => 'Asset Breakdown KJG',
                'route' => route('asset-breakdown-kjg'),
                'active' => request()->routeIs('asset-breakdown-kjg'),
            ],
            [
                'title' => 'Status PLO KJG',
                'route' => route('status-plo-kjg'),
                'active' => request()->routeIs('status-plo-kjg'),
            ],
            [
                'title' => 'Kondisi Vacant Fungsi AIMS KJG',
                'route' => route('kondisi-vacant-fungsi-aims-kjg'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-kjg'),
            ],
            [
                'title' => 'Pelatihan AIMS KJG',
                'route' => route('pelatihan-aims-kjg'),
                'active' => request()->routeIs('pelatihan-aims-kjg'),
            ],
            [
                'title' => 'Sistem Informasi AIMS KJG',
                'route' => route('sistem-informasi-aims-kjg'),
                'active' => request()->routeIs('sistem-informasi-aims-kjg'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Besar KJG 2025',
                'route' => route('rencana-pemeliharaan-besar-kjg'),
                'active' => request()->routeIs('rencana-pemeliharaan-besar-kjg'),
            ],
            [
                'title' => 'Realisasi Anggaran AI KJG 2025',
                'route' => route('realisasi-anggaran-ai-kjg'),
                'active' => request()->routeIs('realisasi-anggaran-ai-kjg'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI KJG 2025',
                'route' => route('realisasi-progress-fisik-ai-kjg'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-kjg'),
            ],
            [
                'title' => 'Availability KJG',
                'route' => route('availability-kjg'),
                'active' => request()->routeIs('availability-kjg'),
            ],
            [
                'title' => 'AIR BUDGET TAGGING KJG',
                'route' => route('air-budget-tagging-kjg'),
                'active' => request()->routeIs('air-budget-tagging-kjg'),
            ],
        ];

        return view('SHG.InputDataMonev.kalimantanJawa.MandatoryCertificationKJG', compact('tabs', 'sertifikasiOptions'));
    }


    public function data()
    {
        $TargetPLO = MandatoryCertificationKjg::select('*')
            ->orderByRaw("STR_TO_DATE(CONCAT('01-', periode), '%d-%b-%y') ASC")
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(MandatoryCertificationKjgRequest $request)
    {
        $data = $request->validated();
        $data = MandatoryCertificationKjg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(MandatoryCertificationKjgRequest $request, $id)
    {
        $progress = MandatoryCertificationKjg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = MandatoryCertificationKjg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
