<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PgnSor2;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PgnSor2\StatusAssetAiSOR2Request;
use App\Models\SHG\PgnSor2\StatusAssetAiSOR2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusAssetAiSOR2Controller extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiSOR2::all();
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
                'title' => 'Status Asset 2025 AI PGN SOR 2',
                'route' => route('pgn-sor2'),
                'active' => request()->routeIs('pgn-sor2'),
            ],
            [
                'title' => 'Asset Breakdown PGN SOR 2',
                'route' => route('asset-breakdown-sor2'),
                'active' => request()->routeIs('asset-breakdown-sor2'),
            ],
            [
                'title' => 'Status PLO 2025 PGN SOR 2',
                'route' => route('status-plo-sor2'),
                'active' => request()->routeIs('status-plo-sor2'),
            ],
            [
                'title' => 'Pelatihan Aims 2025 PGN SOR 2',
                'route' => route('pelatihan-aims-sor2'),
                'active' => request()->routeIs('pelatihan-aims-sor2'),
            ],
            [
                'title' => 'Mandatory Certification  PGN SOR 2',
                'route' => route('mandatory-certification-sor2'),
                'active' => request()->routeIs('mandatory-certification-sor2'),
            ],
            [
                'title' => 'Kondisi Vacant Aims PGN SOR 2',
                'route' => route('kondisi-vacant-aims-sor2'),
                'active' => request()->routeIs('kondisi-vacant-aims-sor2'),
            ],
            [
                'title' => 'Sistem Informasi Aims PGN SOR 2',
                'route' => route('sistem-informasi-aims-sor2'),
                'active' => request()->routeIs('sistem-informasi-aims-sor2'),
            ],
            [
                'title' => 'Rencana Pemeliharaan PGN SOR 2',
                'route' => route('rencana-pemeliharaan-sor2'),
                'active' => request()->routeIs('rencana-pemeliharaan-sor2'),
            ],
            [
                'title' => 'Reliability PGN SOR 2',
                'route' => route('reliability-sor2'),
                'active' => request()->routeIs('reliability-sor2'),
            ],
            [
                'title' => 'Availability PGN SOR 2',
                'route' => route('availability-sor2'),
                'active' => request()->routeIs('availability-sor2'),
            ],
            [
                'title' => 'Realisasi Anggaran AI PGN SOR 2',
                'route' => route('realisasi-anggaran-ai-sor2'),
                'active' => request()->routeIs('realisasi-anggaran-ai-sor2'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PGN SOR 2',
                'route' => route('realisasi-progress-fisik-ai-sor2'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-sor2'),
            ],
            [
                'title' => 'Air Budget Tagging PGN SOR 2',
                'route' => route('air-budget-tagging-sor2'),
                'active' => request()->routeIs('air-budget-tagging-sor2'),
            ],
        ];

        return view('SHG.InputDataMonev.PgnSor2.StatusAssetAiSOR2', compact('tabs', 'companies'));
    }

    public function data()
    {
        $TargetPLO = StatusAssetAiSOR2::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();
        return response()->json($TargetPLO);
    }

    public function store(StatusAssetAiSOR2Request $request)
    {
        $data = $request->validated();
        $data = StatusAssetAiSOR2::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(StatusAssetAiSOR2Request $request, $id)
    {
        $progress = StatusAssetAiSOR2::findOrFail($id);

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
        $target = StatusAssetAiSOR2::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
