<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PertaDayaGas;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertadaya\StatusAssetAiPDGRequest;
use App\Models\SHG\PertaDaya\StatusAssetAiPDG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusAssetAiPDGController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiPDG::all();
            return response()->json($TargetPLO);
        }

        $companies = [
            'PGN',
            'PTG',
            'PTSG',
            'PGN, PAG, SAKA, WMP',
            'GEI',
            'TGI',
            'WMN',
            'PLI',
            'PDG',
            'KJG',
            'PAG',
            'NR'
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

        return view('SHG.InputDataMonev.PertaDayaGas', compact('tabs', 'companies'));
    }

    public function data()
    {
        $TargetPLO = StatusAssetAiPDG::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }


    public function store(StatusAssetAiPDGRequest $request)
    {
        $data = $request->validated();
        $data = StatusAssetAiPDG::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(StatusAssetAiPDGRequest $request, $id)
    {
        $progress = StatusAssetAiPDG::findOrFail($id);

        $data = $request->validated();

        $intFields = [
            'jumlah',

            'sece_low_breakdown',
            'sece_medium_due_date_inspection',
            'sece_medium_low_condition',
            'sece_medium_low_performance',
            'sece_high',

            'pce_low_breakdown',
            'pce_medium_due_date_inspection',
            'pce_medium_low_condition',
            'pce_medium_low_performance',
            'pce_high',

            'important_low_breakdown',
            'important_medium_due_date_inspection',
            'important_medium_low_condition',
            'important_medium_low_performance',
            'important_high',

            'secondary_low_breakdown',
            'secondary_medium_due_date_inspection',
            'secondary_medium_low_condition',
            'secondary_medium_low_performance',
            'secondary_high',

            'kegiatan_penurunan_low',
            'kegiatan_penurunan_med',

        ];

        foreach ($intFields as $field) {
            if (isset($data[$field])) {
                $data[$field] = (int) $data[$field];
            }
        }
        $progress->update($data);

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = StatusAssetAiPDG::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
