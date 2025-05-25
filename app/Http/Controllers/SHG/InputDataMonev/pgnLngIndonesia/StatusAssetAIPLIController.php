<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pgnlngindonesia;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataMonevKalimantanJawaGasRequest;
use App\Http\Requests\SHG\PgnLngIndonesia\StatusAssetAIPLIRequest;
use App\Models\SHG\PgnLngIndonesia\StatusAssetAiPLI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusAssetAIPLIController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiPLI::all();
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
                'title' => 'Status Asset 2025 AI 2025 PLI',
                'route' => route('pgn-lng-indonesia'),
                'active' => request()->routeIs('pgn-lng-indonesia'),
            ],
            [
                'title' => 'Status PLO PLI',
                'route' => route('status-plo-pli'),
                'active' => request()->routeIs('status-plo-pli'),
            ],
            [
                'title' => 'Mandatory Certification PLI',
                'route' => route('mandatory-certification-pli'),
                'active' => request()->routeIs('mandatory-certification-pli'),
            ],
            [
                'title' => 'Asset Breakdown PLI',
                'route' => route('asset-breakdown-pli'),
                'active' => request()->routeIs('asset-breakdown-pli'),
            ],
            [
                'title' => 'Kondisi Vacant Fungsi AIMS PTSG',
                'route' => route('kondisi-vacant-fungsi-aims-pli'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-pli'),
            ],
            [
                'title' => 'Rencana Pemeliharaan PLI',
                'route' => route('rencana-pemeliharaan-besar-pli'),
                'active' => request()->routeIs('rencana-pemeliharaan-besar-pli'),
            ],
            [
                'title' => 'Sistem Informasi AIMS PLI',
                'route' => route('sistem-informasi-aims-pli'),
                'active' => request()->routeIs('sistem-informasi-aims-pli'),
            ],
            [
                'title' => 'Pelatihan AIMS PLI',
                'route' => route('pelatihan-aims-pli'),
                'active' => request()->routeIs('pelatihan-aims-pli'),
            ],
            [
                'title' => 'Realisasi Anggaran AI PLI',
                'route' => route('realisasi-anggaran-ai-pli'),
                'active' => request()->routeIs('realisasi-anggaran-ai-pli'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PLI',
                'route' => route('realisasi-progress-fisik-ai-pli'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-pli'),
            ],
            [
                'title' => 'Availability PLI',
                'route' => route('availability-pli'),
                'active' => request()->routeIs('availability-pli'),
            ],
            [
                'title' => 'Air Budget Tagging PLI',
                'route' => route('air-budget-tagging-pli'),
                'active' => request()->routeIs('air-budget-tagging-pli'),
            ],
        ];

        return view('SHG.InputDataMonev.PgnLngIndoensia', compact('tabs', 'companies'));
    }


    public function store(StatusAssetAIPLIRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = StatusAssetAiPLI::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
       $TargetPLO = StatusAssetAiPLI::select('*')
            ->orderByRaw("STR_TO_DATE(CONCAT(periode, '-01'), '%Y-%m-%d') ASC")
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(StatusAssetAIPLIRequest $request, $id)
    {
        $progress = StatusAssetAiPLI::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = StatusAssetAiPLI::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
