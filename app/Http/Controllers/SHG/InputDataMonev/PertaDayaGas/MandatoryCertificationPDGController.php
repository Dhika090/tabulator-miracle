<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PertaDayaGas;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertadaya\MandatoryCertificationPDGRequest;
use App\Models\SHG\PertaDaya\MandatoryCertificationPDG;
use Illuminate\Http\Request;

class MandatoryCertificationPDGController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = MandatoryCertificationPDG::all();
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
                'title' => 'Status Asset 2025 AI PDG',
                'route' => route('perta-daya-gas'),
                'active' => request()->routeIs('perta-daya-gas'),
            ],
            [
                'title' => 'Mandatory Certification PDG',
                'route' => route('mandatory-certification-pdg'),
                'active' => request()->routeIs('mandatory-certification-pdg'),
            ],
            [
                'title' => 'Status PLO PDG',
                'route' => route('status-plo-pdg'),
                'active' => request()->routeIs('status-plo-pdg'),
            ],
            [
                'title' => 'Asset Breakdown PDG',
                'route' => route('asset-breakdown-pdg'),
                'active' => request()->routeIs('asset-breakdown-pdg'),
            ],
            [
                'title' => 'Pelatihan AIMS PDG',
                'route' => route('pelatihan-aims-pdg'),
                'active' => request()->routeIs('pelatihan-aims-pdg'),
            ],
            [
                'title' => 'Kondisi Vacant Aims PDG',
                'route' => route('kondisi-vacant-aims-pdg'),
                'active' => request()->routeIs('kondisi-vacant-aims-pdg'),
            ],
            [
                'title' => 'Availability PDG',
                'route' => route('availability-pdg'),
                'active' => request()->routeIs('availability-pdg'),
            ],
            [
                'title' => 'Sistem Informasi AIMS PDG',
                'route' => route('sistem-informasi-aims-pdg'),
                'active' => request()->routeIs('sistem-informasi-aims-pdg'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Besar PDG',
                'route' => route('rencana-pemeliharaan-pdg'),
                'active' => request()->routeIs('rencana-pemeliharaan-pdg'),
            ],
            [
                'title' => 'Realisasi Anggaran AI PDG',
                'route' => route('realisasi-anggaran-ai-pdg'),
                'active' => request()->routeIs('realisasi-anggaran-ai-pdg'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PDG',
                'route' => route('realisasi-progress-fisik-ai-pdg'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-pdg'),
            ],
        ];

        return view('SHG.InputDataMonev.PertaDaya.MandatoryCertificationPDG', compact('tabs', 'sertifikasiOptions'));
    }

    public function data()
    {
        return response()->json(MandatoryCertificationPDG::all());
    }


    public function store(MandatoryCertificationPDGRequest $request)
    {
        $data = $request->validated();
        $data = MandatoryCertificationPDG::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(MandatoryCertificationPDGRequest $request, $id)
    {
        $progress = MandatoryCertificationPDG::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = MandatoryCertificationPDG::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
