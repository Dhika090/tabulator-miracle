<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PgnSor2;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PgnSor2\ReliabilitySOR2Request;
use App\Models\SHG\PgnSor2\ReliabilitySOR2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReliabilitySOR2Controller extends Controller
{

    public function index(Request $request)
    {

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

        return view('SHG.InputDataMonev.PgnSor2.ReliabilitySOR2', compact('tabs'));
    }

    public function store(ReliabilitySOR2Request $request)
    {
        $validated = $request->validated();
        $TargetPLO = ReliabilitySOR2::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = ReliabilitySOR2::select('*')
             ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();
        return response()->json($TargetPLO);
    }

    public function update(ReliabilitySOR2Request $request, $id)
    {
        $progress = ReliabilitySOR2::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = ReliabilitySOR2::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
