<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PgnSor3;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PgnSor3\MandatoryCertificationSOR3Request;
use App\Models\SHG\PgnSor3\MandatoryCertificationSOR3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MandatoryCertificationSOR3controller extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = MandatoryCertificationSOR3::all();
            return response()->json($TargetPLO);
        }

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
                'title' => 'Status Asset 2025 AI PGN SOR 3',
                'route' => route('pgn-sor3'),
                'active' => request()->routeIs('pgn-sor3'),
            ],
            [
                'title' => 'Asset Breakdown PGN SOR 3',
                'route' => route('asset-breakdown-sor3'),
                'active' => request()->routeIs('asset-breakdown-sor3'),
            ],
            [
                'title' => 'Status PLO 2025 PGN SOR 3',
                'route' => route('status-plo-sor3'),
                'active' => request()->routeIs('status-plo-sor3'),
            ],
            [
                'title' => 'Pelatihan Aims 2025 PGN SOR 3',
                'route' => route('pelatihan-aims-sor3'),
                'active' => request()->routeIs('pelatihan-aims-sor3'),
            ],
            [
                'title' => 'Mandatory Certification  PGN SOR 3',
                'route' => route('mandatory-certification-sor3'),
                'active' => request()->routeIs('mandatory-certification-sor3'),
            ],
            [
                'title' => 'Kondisi Vacant Aims PGN SOR 3',
                'route' => route('kondisi-vacant-aims-sor3'),
                'active' => request()->routeIs('kondisi-vacant-aims-sor3'),
            ],
            [
                'title' => 'Sistem Informasi Aims PGN SOR 3',
                'route' => route('sistem-informasi-aims-sor3'),
                'active' => request()->routeIs('sistem-informasi-aims-sor3'),
            ],
            [
                'title' => 'Rencana Pemeliharaan PGN SOR 3',
                'route' => route('rencana-pemeliharaan-sor3'),
                'active' => request()->routeIs('rencana-pemeliharaan-sor3'),
            ],
            [
                'title' => 'Reliability PGN SOR 3',
                'route' => route('reliability-sor3'),
                'active' => request()->routeIs('reliability-sor3'),
            ],
            [
                'title' => 'Realisasi Anggaran AI PGN SOR 3',
                'route' => route('realisasi-anggaran-ai-sor3'),
                'active' => request()->routeIs('realisasi-anggaran-ai-sor3'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PGN SOR 3',
                'route' => route('realisasi-progress-fisik-ai-sor3'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-sor3'),
            ],
            [
                'title' => 'Air Budget Tagging PGN SOR 3',
                'route' => route('air-budget-tagging-sor3'),
                'active' => request()->routeIs('air-budget-tagging-sor3'),
            ],
        ];
        $tabs = [
            [
                'title' => 'Status Asset 2025 AI PGN SOR 3',
                'route' => route('pgn-sor3'),
                'active' => request()->routeIs('pgn-sor3'),
            ],
            [
                'title' => 'Asset Breakdown PGN SOR 3',
                'route' => route('asset-breakdown-sor3'),
                'active' => request()->routeIs('asset-breakdown-sor3'),
            ],
            [
                'title' => 'Status PLO 2025 PGN SOR 3',
                'route' => route('status-plo-sor3'),
                'active' => request()->routeIs('status-plo-sor3'),
            ],
            [
                'title' => 'Pelatihan Aims 2025 PGN SOR 3',
                'route' => route('pelatihan-aims-sor3'),
                'active' => request()->routeIs('pelatihan-aims-sor3'),
            ],
            [
                'title' => 'Mandatory Certification  PGN SOR 3',
                'route' => route('mandatory-certification-sor3'),
                'active' => request()->routeIs('mandatory-certification-sor3'),
            ],
            [
                'title' => 'Kondisi Vacant Aims PGN SOR 3',
                'route' => route('kondisi-vacant-aims-sor3'),
                'active' => request()->routeIs('kondisi-vacant-aims-sor3'),
            ],
            [
                'title' => 'Sistem Informasi Aims PGN SOR 3',
                'route' => route('sistem-informasi-aims-sor3'),
                'active' => request()->routeIs('sistem-informasi-aims-sor3'),
            ],
            [
                'title' => 'Rencana Pemeliharaan PGN SOR 3',
                'route' => route('rencana-pemeliharaan-sor3'),
                'active' => request()->routeIs('rencana-pemeliharaan-sor3'),
            ],
            [
                'title' => 'Availability PGN SOR 3',
                'route' => route('availability-sor3'),
                'active' => request()->routeIs('availability-sor3'),
            ],
            [
                'title' => 'Reliability PGN SOR 3',
                'route' => route('reliability-sor3'),
                'active' => request()->routeIs('reliability-sor3'),
            ],
            [
                'title' => 'Realisasi Anggaran AI PGN SOR 3',
                'route' => route('realisasi-anggaran-ai-sor3'),
                'active' => request()->routeIs('realisasi-anggaran-ai-sor3'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PGN SOR 3',
                'route' => route('realisasi-progress-fisik-ai-sor3'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-sor3'),
            ],
            [
                'title' => 'Air Budget Tagging PGN SOR 3',
                'route' => route('air-budget-tagging-sor3'),
                'active' => request()->routeIs('air-budget-tagging-sor3'),
            ],
        ];

        return view('SHG.InputDataMonev.PgnSor3.MandatoryCertificationSOR3', compact('tabs', 'sertifikasiOptions'));
    }

    public function store(MandatoryCertificationSOR3Request $request)
    {
        $validated = $request->validated();
        $TargetPLO = MandatoryCertificationSOR3::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = MandatoryCertificationSOR3::select('*')
            ->addSelect(DB::raw("
            STR_TO_DATE(CONCAT('01-', periode), '%d-%b-%Y') as periode_date
        "))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(MandatoryCertificationSOR3Request $request, $id)
    {
        $progress = MandatoryCertificationSOR3::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = MandatoryCertificationSOR3::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
