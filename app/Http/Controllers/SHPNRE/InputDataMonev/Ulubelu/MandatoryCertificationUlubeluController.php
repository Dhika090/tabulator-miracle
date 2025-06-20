<?php

namespace App\Http\Controllers\SHPNRE\InputDataMonev\Ulubelu;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\Ulubelu\MandatoryCertificationUlubeluRequest;
use App\Models\SHPNRE\Ulubelu\MandatoryCertificationUlubelu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MandatoryCertificationUlubeluController extends Controller
{

    public function index(Request $request)
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
                'title' => 'Status Asset 2025 AI Ulubelu',
                'route' => route('ulubelu'),
                'active' => request()->routeIs('ulubelu'),
            ],
            [
                'title' => 'Asset Breakdown Ulubelu',
                'route' => route('asset-breakdown-ulubelu'),
                'active' => request()->routeIs('asset-breakdown-ulubelu'),
            ],
            [
                'title' => 'Availability Ulubelu',
                'route' => route('availability-ulubelu'),
                'active' => request()->routeIs('availability-ulubelu'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims Ulubelu',
                'route' => route('kondisi-vacant-aims-ulubelu'),
                'active' => request()->routeIs('kondisi-vacant-aims-ulubelu'),
            ],
            [
                'title' => 'Mandatory Certification Aims Lumut Balai',
                'route' => route('mandatory-certification-ulubelu'),
                'active' => request()->routeIs('mandatory-certification-ulubelu'),
            ],
            [
                'title' => 'Pelatihan Aims Ulubelu',
                'route' => route('pelatihan-aims-ulubelu'),
                'active' => request()->routeIs('pelatihan-aims-ulubelu'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Ulubelu',
                'route' => route('rencana-pemeliharaan-ulubelu'),
                'active' => request()->routeIs('rencana-pemeliharaan-ulubelu'),
            ],
            [
                'title' => 'Real Anggaran AI Ulubelu',
                'route' => route('real-anggaran-ai-ulubelu'),
                'active' => request()->routeIs('real-anggaran-ai-ulubelu'),
            ],
            [
                'title' => 'Real Anggaran Figure Ulubelu',
                'route' => route('real-anggaran-figure-ulubelu'),
                'active' => request()->routeIs('real-anggaran-figure-ulubelu'),
            ],
            [
                'title' => 'Realisasi Prog Fisik Ulubelu',
                'route' => route('real-prog-fisik-ulubelu'),
                'active' => request()->routeIs('real-prog-fisik-ulubelu'),
            ],
            [
                'title' => 'Sistem Informasi Aims Ulubelu',
                'route' => route('sistem-informasi-aims-ulubelu'),
                'active' => request()->routeIs('sistem-informasi-aims-ulubelu'),
            ],
            [
                'title' => 'Summary PLO Ulubelu',
                'route' => route('summary-plo-ulubelu'),
                'active' => request()->routeIs('summary-plo-ulubelu'),
            ],
            [
                'title' => 'SAP Asset Ulubelu',
                'route' => route('sap-asset-ulubelu'),
                'active' => request()->routeIs('sap-asset-ulubelu'),
            ]
        ];
        return view('SHPNRE.InputDataMonev.Ulubelu.MandatoryCertificationUlubelu', compact('tabs', 'sertifikasiOptions'));
    }

    public function store(MandatoryCertificationUlubeluRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = MandatoryCertificationUlubelu::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = MandatoryCertificationUlubelu::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(MandatoryCertificationUlubeluRequest $request, $id)
    {
        $progress = MandatoryCertificationUlubelu::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = MandatoryCertificationUlubelu::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
