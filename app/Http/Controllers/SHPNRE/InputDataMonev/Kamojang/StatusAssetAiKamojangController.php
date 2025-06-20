<?php

namespace App\Http\Controllers\SHPNRE\InputDataMonev\Kamojang;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\Kamojang\StatusAssetAiKamojangRequest;
use App\Models\SHPNRE\Kamojang\StatusAssetAiKamojang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusAssetAiKamojangController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiKamojang::all();
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
                'title' => 'Status Asset 2025 AI Kamojang',
                'route' => route('kamojang'),
                'active' => request()->routeIs('kamojang'),
            ],
            [
                'title' => 'Asset Breakdown Kamojang',
                'route' => route('asset-breakdown-kamojang'),
                'active' => request()->routeIs('asset-breakdown-kamojang'),
            ],
            [
                'title' => 'Availability Kamojang',
                'route' => route('availability-kamojang'),
                'active' => request()->routeIs('availability-kamojang'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims Kamojang',
                'route' => route('kondisi-vacant-aims-kamojang'),
                'active' => request()->routeIs('kondisi-vacant-aims-kamojang'),
            ],
            [
                'title' => 'Mandatory Certification Aims Lumut Balai',
                'route' => route('mandatory-certification-kamojang'),
                'active' => request()->routeIs('mandatory-certification-kamojang'),
            ],
            [
                'title' => 'Pelatihan Aims Kamojang',
                'route' => route('pelatihan-aims-kamojang'),
                'active' => request()->routeIs('pelatihan-aims-kamojang'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Kamojang',
                'route' => route('rencana-pemeliharaan-kamojang'),
                'active' => request()->routeIs('rencana-pemeliharaan-kamojang'),
            ],
            [
                'title' => 'Real Anggaran AI Kamojang',
                'route' => route('real-anggaran-ai-kamojang'),
                'active' => request()->routeIs('real-anggaran-ai-kamojang'),
            ],
            [
                'title' => 'Real Anggaran Figure Kamojang',
                'route' => route('real-anggaran-figure-kamojang'),
                'active' => request()->routeIs('real-anggaran-figure-kamojang'),
            ],
            [
                'title' => 'Realisasi Prog Fisik Kamojang',
                'route' => route('real-prog-fisik-kamojang'),
                'active' => request()->routeIs('real-prog-fisik-kamojang'),
            ],
            [
                'title' => 'Sistem Informasi Aims Kamojang',
                'route' => route('sistem-informasi-aims-kamojang'),
                'active' => request()->routeIs('sistem-informasi-aims-kamojang'),
            ],
            [
                'title' => 'Summary PLO Kamojang',
                'route' => route('summary-plo-kamojang'),
                'active' => request()->routeIs('summary-plo-kamojang'),
            ],
            [
                'title' => 'SAP Asset Kamojang',
                'route' => route('sap-asset-kamojang'),
                'active' => request()->routeIs('sap-asset-kamojang'),
            ]
        ];
        return view('SHPNRE.InputDataMonev.Kamojang.StatusAssetAiKamojang', compact('tabs', 'companies'));
    }

    public function store(StatusAssetAiKamojangRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = StatusAssetAiKamojang::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = StatusAssetAiKamojang::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(StatusAssetAiKamojangRequest $request, $id)
    {
        $progress = StatusAssetAiKamojang::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = StatusAssetAiKamojang::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }

}
