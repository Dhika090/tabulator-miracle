<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PgnSor1;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PgnSor1\StatusAssetAiSOR1Request;
use App\Models\SHG\PgnSor1\StatusAssetAiSOR1;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusAssetAiSOR1Controller extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiSOR1::all();
            return response()->json($TargetPLO);
        }

        $companies = [
            'PGN',
            'PTG',
            'PTGN',
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
                'title' => 'Status Asset 2025 AI PGN SOR 1',
                'route' => route('pgn-sor1'),
                'active' => request()->routeIs('pgn-sor1'),
            ],
            [
                'title' => 'Mandatory Certification SOR 1',
                'route' => route('mandatory-certification-sor1'),
                'active' => request()->routeIs('mandatory-certification-sor1'),
            ],
            [
                'title' => 'Asset Breakdown SOR 1',
                'route' => route('asset-breakdown-sor1'),
                'active' => request()->routeIs('asset-breakdown-sor1'),
            ],
            [
                'title' => 'Status PLO SOR 1',
                'route' => route('status-plo-sor1'),
                'active' => request()->routeIs('status-plo-sor1'),
            ],
            [
                'title' => 'Kondisi Vacant Fungsi AIMS SOR 1',
                'route' => route('kondisi-vacant-fungsi-aims-sor1'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-sor1'),
            ],
            [
                'title' => 'Rencana Pemeliharaan SOR 1',
                'route' => route('rencana-pemeliharaan-sor1'),
                'active' => request()->routeIs('rencana-pemeliharaan-sor1'),
            ],
            [
                'title' => 'Sistem Informasi AIMS SOR 1',
                'route' => route('sistem-informasi-aims-sor1'),
                'active' => request()->routeIs('sistem-informasi-aims-sor1'),
            ],
            [
                'title' => 'Pelatihan AIMS SOR 1',
                'route' => route('pelatihan-aims-sor1'),
                'active' => request()->routeIs('pelatihan-aims-sor1'),
            ],
            [
                'title' => 'Realisasi Anggaran AI SOR 1',
                'route' => route('realisasi-anggaran-ai-sor1'),
                'active' => request()->routeIs('realisasi-anggaran-ai-sor1'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI SOR 1',
                'route' => route('realisasi-progress-fisik-ai-sor1'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-sor1'),
            ],
            [
                'title' => 'Availability SOR 1',
                'route' => route('availability-sor1'),
                'active' => request()->routeIs('availability-sor1'),
            ],
            [
                'title' => 'Reliability SOR 1',
                'route' => route('reliability-sor1'),
                'active' => request()->routeIs('reliability-sor1'),
            ],
            [
                'title' => 'Air Budget Tagging SOR 1',
                'route' => route('air-budget-tagging-sor1'),
                'active' => request()->routeIs('air-budget-tagging-sor1'),
            ],
        ];

        return view('SHG.InputDataMonev.PgnSor1.StatusAssetAiSOR1', compact('tabs', 'companies'));
    }

    public function data()
    {
        $TargetPLO = StatusAssetAiSOR1::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();
        return response()->json($TargetPLO);
    }


    public function store(StatusAssetAiSOR1Request $request)
    {
        $data = $request->validated();
        $data = StatusAssetAiSOR1::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(StatusAssetAiSOR1Request $request, $id)
    {
        $progress = StatusAssetAiSOR1::findOrFail($id);

        $data = $request->validated();

        $intFields = [
            'jumlah',

            'sece_low_integrity_breakdown',
            'sece_medium_due_date_inspection',
            'sece_medium_low_condition',
            'sece_medium_low_performance',
            'sece_high_integrity',

            'pce_low_integrity_breakdown',
            'pce_medium_due_date_inspection',
            'pce_medium_low_condition',
            'pce_medium_low_performance',
            'pce_high_integrity',

            'important_low_integrity_breakdown',
            'important_medium_due_date_inspection',
            'important_medium_low_condition',
            'important_medium_low_performance',
            'important_high_integrity',

            'secondary_low_integrity_breakdown',
            'secondary_medium_due_date_inspection',
            'secondary_medium_low_condition',
            'secondary_medium_low_performance',
            'secondary_high_integrity',

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
        $target = StatusAssetAiSOR1::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
