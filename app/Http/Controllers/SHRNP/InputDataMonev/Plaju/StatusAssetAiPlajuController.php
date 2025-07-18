<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Plaju;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Plaju\StatusAssetAiPlajuRequest;
use App\Models\SHRNP\Plaju\StatusAssetAiPlaju;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusAssetAiPlajuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiPlaju::all();
            return response()->json(data: $TargetPLO);
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
                'title' => 'Status Asset 2025 AI Plaju',
                'route' => route('plaju'),
                'active' => request()->routeIs('plaju'),
            ],
            [
                'title' => 'Asset Breakdown Plaju',
                'route' => route('asset-breakdown-plaju'),
                'active' => request()->routeIs('asset-breakdown-plaju'),
            ],
            [
                'title' => 'Availability Plaju',
                'route' => route('availability-plaju'),
                'active' => request()->routeIs('availability-plaju'),
            ],
            [
                'title' => 'Kondisi Vacant Funsgi Aims Plaju',
                'route' => route('kondisi-vacant-aims-plaju'),
                'active' => request()->routeIs('kondisi-vacant-aims-plaju'),
            ],
            [
                'title' => 'Mandatory Certification Plaju',
                'route' => route('mandatory-certification-plaju'),
                'active' => request()->routeIs('mandatory-certification-plaju'),
            ],
            [
                'title' => 'Pelatihan Aims Plaju',
                'route' => route('pelatihan-aims-plaju'),
                'active' => request()->routeIs('pelatihan-aims-plaju'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Plaju',
                'route' => route('rencana-pemeliharaan-plaju'),
                'active' => request()->routeIs('rencana-pemeliharaan-plaju'),
            ],
            [
                'title' => 'Realisasi Anggaran AI Plaju',
                'route' => route('real-anggaran-ai-plaju'),
                'active' => request()->routeIs('real-anggaran-ai-plaju'),
            ],
            [
                'title' => 'Realisasi Anggaran Figure Plaju',
                'route' => route('real-anggaran-figure-plaju'),
                'active' => request()->routeIs('real-anggaran-figure-plaju'),
            ],
            [
                'title' => 'Realisasi Prog Fisik AI Plaju',
                'route' => route('real-prog-fisik-plaju'),
                'active' => request()->routeIs('real-prog-fisik-plaju'),
            ],
            [
                'title' => 'Sistem Informasi Aims Plaju',
                'route' => route('sistem-informasi-aims-plaju'),
                'active' => request()->routeIs('sistem-informasi-aims-plaju'),
            ],
            [
                'title' => 'Status PLO Plaju',
                'route' => route('status-plo-plaju'),
                'active' => request()->routeIs('status-plo-plaju'),
            ],
            [
                'title' => 'SAP Asset Plaju',
                'route' => route('sap-asset-plaju'),
                'active' => request()->routeIs('sap-asset-plaju'),
            ],


        ];
        return view('SHRNP.InputDataMonev.Plaju.StatusAssetAiPlaju', compact('tabs', 'companies'));
    }

    public function store(StatusAssetAiPlajuRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = StatusAssetAiPlaju::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = StatusAssetAiPlaju::select('*')
                 ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(StatusAssetAiPlajuRequest $request, $id)
    {
        $progress = StatusAssetAiPlaju::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = StatusAssetAiPlaju::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
