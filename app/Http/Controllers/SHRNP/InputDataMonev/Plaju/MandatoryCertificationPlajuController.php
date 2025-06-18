<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Plaju;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Plaju\MandatoryCertificationPlajuRequest;
use App\Models\SHRNP\Plaju\MandatoryCertificationPlaju;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MandatoryCertificationPlajuController extends Controller
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
                'title' => 'Status Asset 2025 AI Plaju',
                'route' => route('plaju'),
                'active' => request()->routeIs('plaju'),
            ],
            [
                'title' => 'Asset Breakdown Plaju',
                'route' => route('asset-breakdown-plaju'),
                'active' => request()->routeIs('asset-breakdown-plaju'),
            ],
            [
                'title' => 'Availability Plaju',
                'route' => route('availability-plaju'),
                'active' => request()->routeIs('availability-plaju'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims Plaju',
                'route' => route('kondisi-vacant-aims-plaju'),
                'active' => request()->routeIs('kondisi-vacant-aims-plaju'),
            ],
            [
                'title' => 'Mandatory Certification Plaju',
                'route' => route('mandatory-certification-plaju'),
                'active' => request()->routeIs('mandatory-certification-plaju'),
            ],
            [
                'title' => 'Pelatihan Aims Plaju',
                'route' => route('pelatihan-aims-plaju'),
                'active' => request()->routeIs('pelatihan-aims-plaju'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Plaju',
                'route' => route('rencana-pemeliharaan-plaju'),
                'active' => request()->routeIs('rencana-pemeliharaan-plaju'),
            ],
            [
                'title' => 'Real Anggaran AI Plaju',
                'route' => route('real-anggaran-ai-plaju'),
                'active' => request()->routeIs('real-anggaran-ai-plaju'),
            ],
            [
                'title' => 'Real Anggaran Figure Plaju',
                'route' => route('real-anggaran-figure-plaju'),
                'active' => request()->routeIs('real-anggaran-figure-plaju'),
            ],
            [
                'title' => 'Real Prog Fisik Plaju',
                'route' => route('real-prog-fisik-plaju'),
                'active' => request()->routeIs('real-prog-fisik-plaju'),
            ],
            [
                'title' => 'Sistem Informasi Aims Plaju',
                'route' => route('sistem-informasi-aims-plaju'),
                'active' => request()->routeIs('sistem-informasi-aims-plaju'),
            ],
            [
                'title' => 'Status PLO Plaju',
                'route' => route('status-plo-plaju'),
                'active' => request()->routeIs('status-plo-plaju'),
            ],
            [
                'title' => 'SAP Asset Plaju',
                'route' => route('sap-asset-plaju'),
                'active' => request()->routeIs('sap-asset-plaju'),
            ],


        ];
        return view('SHRNP.InputDataMonev.Plaju.MandatoryCertificationPlaju', compact('tabs', 'sertifikasiOptions'));
    }

    public function store(MandatoryCertificationPlajuRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = MandatoryCertificationPlaju::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = MandatoryCertificationPlaju::select('*')
            ->addSelect(DB::raw("
            STR_TO_DATE(CONCAT('0-', periode), '%d-%b-%Y') as periode_date
        "))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(MandatoryCertificationPlajuRequest $request, $id)
    {
        $progress = MandatoryCertificationPlaju::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = MandatoryCertificationPlaju::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
