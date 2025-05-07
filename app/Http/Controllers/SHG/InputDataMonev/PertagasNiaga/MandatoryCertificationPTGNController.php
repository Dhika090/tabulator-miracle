<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PertagasNiaga\MandatoryCertificationPTGNRequest;
use App\Models\SHG\PertagasNiaga\MandatoryCertificationPTGN;
use Illuminate\Http\Request;

class MandatoryCertificationPTGNController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = MandatoryCertificationPTGN::all();
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
                'title' => 'Status Asset 2025 AI PTGN',
                'route' => route('pertagas-niaga'),
                'active' => request()->routeIs('pertagas-niaga'),
            ],
            [
                'title' => 'PLAN Mandatory Certification PTGN',
                'route' => route('plan-mandatory-certification-ptgn'),
                'active' => request()->routeIs('plan-mandatory-certification-ptgn'),
            ],
            [
                'title' => 'Mandatory Certification PTGN',
                'route' => route('mandatory-certification-ptgn'),
                'active' => request()->routeIs('mandatory-certification-ptgn'),
            ],
            [
                'title' => 'Asset Breakdown PTGN',
                'route' => route('asset-breakdown-ptgn'),
                'active' => request()->routeIs('asset-breakdown-ptgn'),
            ],
            [
                'title' => 'Status PLO PTGN',
                'route' => route('status-plo-ptgn'),
                'active' => request()->routeIs('status-plo-ptgn'),
            ],
            [
                'title' => 'Kondisi Vacant Aims PTGN',
                'route' => route('kondisi-vacant-fungsi-aims-ptgn'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-ptgn'),
            ],
            [
                'title' => 'Sistem Informasi Aims PTGN',
                'route' => route('sistem-informasi-aims-ptgn'),
                'active' => request()->routeIs('sistem-informasi-aims-ptgn'),
            ],
            [
                'title' => 'Pelatihan Aims PTGN',
                'route' => route('pelatihan-aims-ptgn'),
                'active' => request()->routeIs('pelatihan-aims-ptgn'),
            ],
            [
                'title' => 'Rencana Pemeliharaan PTGN',
                'route' => route('rencana-pemeliharaan-ptgn'),
                'active' => request()->routeIs('rencana-pemeliharaan-ptgn'),
            ],
            [
                'title' => 'Availability PTGN',
                'route' => route('availability-ptgn'),
                'active' => request()->routeIs('availability-ptgn'),
            ],
            [
                'title' => 'Air Budget Tagging PTGN',
                'route' => route('air-budget-tagging-ptgn'),
                'active' => request()->routeIs('air-budget-tagging-ptgn'),
            ],
            [
                'title' => 'Realisasi Anggaran AI PTGN',
                'route' => route('realisasi-anggaran-ai-ptgn'),
                'active' => request()->routeIs('realisasi-anggaran-ai-ptgn'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PTGN',
                'route' => route('realisasi-progress-fisik-ai-ptgn'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-ptgn'),
            ],
        ];

        return view('SHG.InputDataMonev.pertagasNiaga.MandatoryCertificationPTGN', compact('tabs', 'sertifikasiOptions'));
    }


    public function store(MandatoryCertificationPTGNRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = MandatoryCertificationPTGN::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = MandatoryCertificationPTGN::all();
        return response()->json($TargetPLO);
    }
    public function update(MandatoryCertificationPTGNRequest $request, $id)
    {
        $progress = MandatoryCertificationPTGN::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = MandatoryCertificationPTGN::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
