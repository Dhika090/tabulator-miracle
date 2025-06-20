<?php

namespace App\Http\Controllers\SHIML\InputDataMonev\Pet;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHIML\Pet\MandatoryCertificationPetRequest;
use App\Models\SHIML\Pet\MandatoryCertificationPet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MandatoryCertificationPetController extends Controller
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
                'title' => 'Status Asset 2025 AI PET',
                'route' => route('pet'),
                'active' => request()->routeIs('pet'),
            ],
            [
                'title' => 'Asset Breakdown PET',
                'route' => route('asset-breakdown-pet'),
                'active' => request()->routeIs('asset-breakdown-pet'),
            ],
            [
                'title' => 'Availability PET',
                'route' => route('availability-pet'),
                'active' => request()->routeIs('availability-pet'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims PET',
                'route' => route('kondisi-vacant-aims-pet'),
                'active' => request()->routeIs('kondisi-vacant-aims-pet'),
            ],
            [
                'title' => 'Mandatory Certification PET',
                'route' => route('mandatory-certification-pet'),
                'active' => request()->routeIs('mandatory-certification-pet'),
            ],
            [
                'title' => 'Pelatihan Aims PET',
                'route' => route('pelatihan-aims-pet'),
                'active' => request()->routeIs('pelatihan-aims-pet'),
            ],
            [
                'title' => 'Rencana Pemeliharaan PET',
                'route' => route('rencana-pemeliharaan-pet'),
                'active' => request()->routeIs('rencana-pemeliharaan-pet'),
            ],
            [
                'title' => 'Real Anggaran AI PET',
                'route' => route('real-anggaran-ai-pet'),
                'active' => request()->routeIs('real-anggaran-ai-pet'),
            ],
            [
                'title' => 'Real Anggaran Figure PET',
                'route' => route('real-anggaran-figure-pet'),
                'active' => request()->routeIs('real-anggaran-figure-pet'),
            ],
            [
                'title' => 'Real Prog Fisik PET',
                'route' => route('real-prog-fisik-pet'),
                'active' => request()->routeIs('real-prog-fisik-pet'),
            ],
            [
                'title' => 'Sistem Informasi Aims PET',
                'route' => route('sistem-informasi-aims-pet'),
                'active' => request()->routeIs('sistem-informasi-aims-pet'),
            ],
            [
                'title' => 'Status PLO PET',
                'route' => route('status-plo-pet'),
                'active' => request()->routeIs('status-plo-pet'),
            ],
            [
                'title' => 'SAP Asset PET',
                'route' => route('sap-asset-pet'),
                'active' => request()->routeIs('sap-asset-pet'),
            ],


        ];
        return view('SHIML.InputDataMonev.Pet.MandatoryCertificationPet', compact('tabs', 'sertifikasiOptions'));
    }

    public function store(MandatoryCertificationPetRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = MandatoryCertificationPet::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = MandatoryCertificationPet::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();
        return response()->json($TargetPLO);
    }
    public function update(MandatoryCertificationPetRequest $request, $id)
    {
        $progress = MandatoryCertificationPet::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = MandatoryCertificationPet::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
