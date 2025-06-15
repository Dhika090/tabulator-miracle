<?php

namespace App\Http\Controllers\SHPNRE\InputDataMonev\Jawa1Power;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\Jawa1Power\MandatoryCertificationJawa1PowerRequest;
use App\Models\SHPNRE\Jawa1Power\MandatoryCertificationJawa1Power;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MandatoryCertificationJawa1PowerController extends Controller
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
                'title' => 'Status Asset 2025 AI Jawa 1 Power',
                'route' => route('jawa1power'),
                'active' => request()->routeIs('jawa1power'),
            ],
            [
                'title' => 'Asset Breakdown Jawa 1 Power',
                'route' => route('asset-breakdown-jawa1power'),
                'active' => request()->routeIs('asset-breakdown-jawa1power'),
            ],
            [
                'title' => 'Availability Jawa 1 Power',
                'route' => route('availability-jawa1power'),
                'active' => request()->routeIs('availability-jawa1power'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims Jawa 1 Power',
                'route' => route('kondisi-vacant-aims-jawa1power'),
                'active' => request()->routeIs('kondisi-vacant-aims-jawa1power'),
            ],
            [
                'title' => 'Mandatory Certification Jawa 1 Power',
                'route' => route('mandatory-certification-jawa1power'),
                'active' => request()->routeIs('mandatory-certification-jawa1power'),
            ],
            [
                'title' => 'Pelatihan Aims Jawa 1 Power',
                'route' => route('pelatihan-aims-jawa1power'),
                'active' => request()->routeIs('pelatihan-aims-jawa1power'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Jawa 1 Power',
                'route' => route('rencana-pemeliharaan-jawa1power'),
                'active' => request()->routeIs('rencana-pemeliharaan-jawa1power'),
            ],
            [
                'title' => 'Real Anggaran AI Jawa 1 Power',
                'route' => route('real-anggaran-ai-jawa1power'),
                'active' => request()->routeIs('real-anggaran-ai-jawa1power'),
            ],
            [
                'title' => 'Real Anggaran Figure Jawa 1 Power',
                'route' => route('real-anggaran-figure-jawa1power'),
                'active' => request()->routeIs('real-anggaran-figure-jawa1power'),
            ],
            [
                'title' => 'Real Prog Fisik Jawa 1 Power',
                'route' => route('real-prog-fisik-jawa1power'),
                'active' => request()->routeIs('real-prog-fisik-jawa1power'),
            ],
            [
                'title' => 'Sistem Informasi Aims Jawa 1 Power',
                'route' => route('sistem-informasi-aims-jawa1power'),
                'active' => request()->routeIs('sistem-informasi-aims-jawa1power'),
            ],
            [
                'title' => 'Summary PLO Jawa 1 Power',
                'route' => route('summary-plo-jawa1power'),
                'active' => request()->routeIs('summary-plo-jawa1power'),
            ],

        ];
        return view('SHPNRE.InputDataMonev.Jawa1Power.MandatoryCertificationJawa1Power', compact('tabs','sertifikasiOptions'));
    }

    public function store(MandatoryCertificationJawa1PowerRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = MandatoryCertificationJawa1Power::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = MandatoryCertificationJawa1Power::select('*')
            ->addSelect(DB::raw("
            STR_TO_DATE(CONCAT('01-', periode), '%d-%b-%Y') as periode_date
        "))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(MandatoryCertificationJawa1PowerRequest $request, $id)
    {
        $progress = MandatoryCertificationJawa1Power::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = MandatoryCertificationJawa1Power::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
