<?php

namespace App\Http\Controllers\SHIML\InputDataMonev\Pis;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHIML\Pis\MandatoryCertificationPisRequest;
use App\Models\SHIML\Pis\MandatoryCertificationPis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MandatoryCertificationPisController extends Controller
{

    public function index(Request $request)
    {
        $sertifikasiOptions = [
            "(Maintenance) Planner Academy",
            "Advanced Corrosion & Material Technology",
            "API 50 - Pressure Vessel Inspector",
            "API 570 - Piping Inspector",
            "API 57 - Corrosion and Materials",
            "API 67 - Reciprocating Compressor",
            "API 653 - Aboveground Storage Tank",
            "API 687 Rotor Repair",
            "API 936 - Refractory Personnel",
            "API RP 94 - Steel for Hydrogen service at elevated temperatures in petroleum & petrochemical plants",
            "API RP 2000 - Venting Atmospheric and Low-pressure Storage Tanks",
            "API RP 2350 - Overfill Protection for Storage Tanks in Petroleum Facilities",
            "API RP 94 - Steels for Hydrogen Service at Elevated Temperatures and Pressures in Petroleum Refineries and Petrochemical Plants",
            "ASME B3.3 - Process Piping",
            "ASME Section VIII Division  & 2 - Pressure Vessel Series",
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
            "IEC 6256-5:207 for Lightning Protection System Components",
            "Inspection & Preventive Maintenance Jetty",
            "Inspector Ahli Ketel Uap / Boiler (AK3U)",
            "Inspektur Tanki Timbun",
            "Inspektur Bejana Tekan",
            "Inspektur Listrik Migas",
            "Inventory of Hazardous Materials, IHM and EU SRR",
            "ISO 5500 Lead Auditor",
            "Life Cycle Assessment",
            "Maintenance Management",
            "Mooring, Equipment Inspection",
            "Mooring, Risk assessment and management",
            "NDT Level - (ECT, PT, MT, UT, dll)",
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
                'title' => 'Status Asset 2025 AI   PIS',
                'route' => route('pis'),
                'active' => request()->routeIs('pis'),
            ],
            [
                'title' => 'Asset Breakdown   PIS',
                'route' => route('asset-breakdown-pis'),
                'active' => request()->routeIs('asset-breakdown-pis'),
            ],
            [
                'title' => 'Availability   PIS',
                'route' => route('availability-pis'),
                'active' => request()->routeIs('availability-pis'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims   PIS',
                'route' => route('kondisi-vacant-aims-pis'),
                'active' => request()->routeIs('kondisi-vacant-aims-pis'),
            ],
            [
                'title' => 'Mandatory Certification   PIS',
                'route' => route('mandatory-certification-pis'),
                'active' => request()->routeIs('mandatory-certification-pis'),
            ],
            [
                'title' => 'Pelatihan Aims   PIS',
                'route' => route('pelatihan-aims-pis'),
                'active' => request()->routeIs('pelatihan-aims-pis'),
            ],
            [
                'title' => 'Rencana Pemeliharaan   PIS',
                'route' => route('rencana-pemeliharaan-pis'),
                'active' => request()->routeIs('rencana-pemeliharaan-pis'),
            ],
            [
                'title' => 'Real Anggaran AI   PIS',
                'route' => route('real-anggaran-ai-pis'),
                'active' => request()->routeIs('real-anggaran-ai-pis'),
            ],
            [
                'title' => 'Real Anggaran Figure   PIS',
                'route' => route('real-anggaran-figure-pis'),
                'active' => request()->routeIs('real-anggaran-figure-pis'),
            ],
            [
                'title' => 'Real Prog Fisik   PIS',
                'route' => route('real-prog-fisik-pis'),
                'active' => request()->routeIs('real-prog-fisik-pis'),
            ],
            [
                'title' => 'Sistem Informasi Aims   PIS',
                'route' => route('sistem-informasi-aims-pis'),
                'active' => request()->routeIs('sistem-informasi-aims-pis'),
            ],
            [
                'title' => 'Status PLO PIS',
                'route' => route('status-plo-pis'),
                'active' => request()->routeIs('status-plo-pis'),
            ],
            [
                'title' => 'SAP Asset PIS',
                'route' => route('sap-asset-pis'),
                'active' => request()->routeIs('sap-asset-pis'),
            ],


        ];
        return view('SHIML.InputDataMonev.Pis.MandatoryCertificationPis', compact('tabs','sertifikasiOptions'));
    }

    public function store(MandatoryCertificationPisRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = MandatoryCertificationPis::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = MandatoryCertificationPis::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();
        return response()->json($TargetPLO);
    }
    public function update(MandatoryCertificationPisRequest $request, $id)
    {
        $progress = MandatoryCertificationPis::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = MandatoryCertificationPis::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
