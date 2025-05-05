<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PertaArunGas;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PertaArun\StatusAssetAiPAGRequest;
use App\Models\SHG\pertaArun\StatusAssetAiPAG;
use Illuminate\Http\Request;

class StatusAssetAiPAGController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiPAG::all();
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
                'title' => 'Status Asset 2025 AI PAG',
                'route' => route('perta-arun-gas'),
                'active' => request()->routeIs('perta-arun-gas'),
            ],
            [
                'title' => 'Mandatory Certification PAG',
                'route' => route('mandatory-certification-pag'),
                'active' => request()->routeIs('mandatory-certification-pag'),
            ],
            [
                'title' => 'Asset Breakdown PAG',
                'route' => route('asset-breakdown-pag'),
                'active' => request()->routeIs('asset-breakdown-pag'),
            ],
            [
                'title' => 'Status PLO PAG',
                'route' => route('status-plo-pag'),
                'active' => request()->routeIs('status-plo-pag'),
            ],
            [
                'title' => 'Kondisi Vacant Aims PAG',
                'route' => route('kondisi-vacant-aims-pag'),
                'active' => request()->routeIs('kondisi-vacant-aims-pag'),
            ],
            [
                'title' => 'Pelatihan Aims PAG',
                'route' => route('pelatihan-aims-pag'),
                'active' => request()->routeIs('pelatihan-aims-pag'),
            ],
            [
                'title' => 'Sistem Informasi Aims PAG',
                'route' => route('sistem-informasi-aims-pag'),
                'active' => request()->routeIs('sistem-informasi-aims-pag'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Besar PAG',
                'route' => route('rencana-pemeliharaan-pag'),
                'active' => request()->routeIs('rencana-pemeliharaan-pag'),
            ],
            [
                'title' => 'Availability PAG',
                'route' => route('availability-pag'),
                'active' => request()->routeIs('availability-pag'),
            ],
            [
                'title' => 'Realisasi Anggaran AI PAG',
                'route' => route('realisasi-anggaran-ai-pag'),
                'active' => request()->routeIs('realisasi-anggaran-ai-pag'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PAG',
                'route' => route('realisasi-progress-fisik-ai-pag'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-pag'),
            ],
        ];

        return view('SHG.InputDataMonev.PertaArunGas', compact('tabs', 'companies'));
    }


    public function store(StatusAssetAiPAGRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = StatusAssetAiPAG::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = StatusAssetAiPAG::all();
        return response()->json($TargetPLO);
    }
    public function update(StatusAssetAiPAGRequest $request, $id)
    {
        $progress = StatusAssetAiPAG::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = StatusAssetAiPAG::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
