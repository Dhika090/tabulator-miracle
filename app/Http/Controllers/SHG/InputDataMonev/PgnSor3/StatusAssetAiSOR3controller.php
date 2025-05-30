<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PgnSor3;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PgnSor3\StatusAssetAiSOR3Request;
use App\Models\SHG\PgnSor3\StatusAssetAiSOR3;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusAssetAiSOR3controller extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiSOR3::all();
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
                'title' => 'Status Asset 2025 AI PGN SOR 3',
                'route' => route('pgn-sor3'),
                'active' => request()->routeIs('pgn-sor3'),
            ],
            [
                'title' => 'Asset Breakdown PGN SOR 3',
                'route' => route('asset-breakdown-sor3'),
                'active' => request()->routeIs('asset-breakdown-sor3'),
            ],
            [
                'title' => 'Status PLO 2025 PGN SOR 3',
                'route' => route('status-plo-sor3'),
                'active' => request()->routeIs('status-plo-sor3'),
            ],
            [
                'title' => 'Pelatihan Aims 2025 PGN SOR 3',
                'route' => route('pelatihan-aims-sor3'),
                'active' => request()->routeIs('pelatihan-aims-sor3'),
            ],
            [
                'title' => 'Mandatory Certification  PGN SOR 3',
                'route' => route('mandatory-certification-sor3'),
                'active' => request()->routeIs('mandatory-certification-sor3'),
            ],
            [
                'title' => 'Kondisi Vacant Aims PGN SOR 3',
                'route' => route('kondisi-vacant-aims-sor3'),
                'active' => request()->routeIs('kondisi-vacant-aims-sor3'),
            ],
            [
                'title' => 'Sistem Informasi Aims PGN SOR 3',
                'route' => route('sistem-informasi-aims-sor3'),
                'active' => request()->routeIs('sistem-informasi-aims-sor3'),
            ],
            [
                'title' => 'Rencana Pemeliharaan PGN SOR 3',
                'route' => route('rencana-pemeliharaan-sor3'),
                'active' => request()->routeIs('rencana-pemeliharaan-sor3'),
            ],
            [
                'title' => 'Availability PGN SOR 3',
                'route' => route('availability-sor3'),
                'active' => request()->routeIs('availability-sor3'),
            ],
            [
                'title' => 'Reliability PGN SOR 3',
                'route' => route('reliability-sor3'),
                'active' => request()->routeIs('reliability-sor3'),
            ],
            [
                'title' => 'Realisasi Anggaran AI PGN SOR 3',
                'route' => route('realisasi-anggaran-ai-sor3'),
                'active' => request()->routeIs('realisasi-anggaran-ai-sor3'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PGN SOR 3',
                'route' => route('realisasi-progress-fisik-ai-sor3'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-sor3'),
            ],
            [
                'title' => 'Air Budget Tagging PGN SOR 3',
                'route' => route('air-budget-tagging-sor3'),
                'active' => request()->routeIs('air-budget-tagging-sor3'),
            ],
        ];

        return view('SHG.InputDataMonev.PgnSor3.StatusAssetAiSOR3', compact('tabs', 'companies'));
    }

    public function data()
    {
        $TargetPLO = StatusAssetAiSOR3::select('*')
            ->addSelect(DB::raw("
            STR_TO_DATE(CONCAT('01-', periode), '%d-%b-%Y') as periode_date
        "))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(StatusAssetAiSOR3Request $request)
    {
        $data = $request->validated();
        $data = StatusAssetAiSOR3::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(StatusAssetAiSOR3Request $request, $id)
    {
        $progress = StatusAssetAiSOR3::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = StatusAssetAiSOR3::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
