<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PgnSor3;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PgnSor3\AirBudgetTaggingSOR3Request;
use App\Models\SHG\PgnSor3\AirBudgetTaggingSOR3;
use Illuminate\Http\Request;

class AirBudgetTaggingSOR3controller extends Controller
{
    public function index(Request $request)
    {

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

        return view('SHG.InputDataMonev.PgnSor3.AirBudgetTaggingSOR3', compact('tabs'));
    }

    public function store(AirBudgetTaggingSOR3Request $request)
    {
        $validated = $request->validated();
        $TargetPLO = AirBudgetTaggingSOR3::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = AirBudgetTaggingSOR3::all();
        return response()->json($TargetPLO);
    }
    public function update(AirBudgetTaggingSOR3Request $request, $id)
    {
        $progress = AirBudgetTaggingSOR3::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = AirBudgetTaggingSOR3::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
