<?php

namespace App\Http\Controllers\SHG\InputDataMonev;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PertaSamtan\StatusAssetAIPTSGRequest;
use App\Models\SHG\PertaSamtan\StatusAssetAIPTSG;
use Illuminate\Http\Request;

class PertaSamtanGasController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAIPTSG::all();
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
                'title' => 'Status Asset 2025 AI 2025 KJG',
                'route' => route('perta-samtan-gas'),
                'active' => request()->routeIs('perta-samtan-gas'),
            ],
            // [
            //     'title' => 'Mandatory Certification KJG',
            //     // 'route' => route('mandatory-certification-ptsg'),
            //     'active' => request()->routeIs('mandatory-certification-ptsg'),
            // ],
            // [
            //     'title' => 'Asset Breakdown KJG',
            //     // 'route' => route('asset-breakdown-ptsg'),
            //     'active' => request()->routeIs('asset-breakdown-ptsg'),
            // ],
            // [
            //     'title' => 'Status PLO KJG',
            //     // 'route' => route('status-plo-ptsg'),
            //     'active' => request()->routeIs('status-plo-ptsg'),
            // ],
            // [
            //     'title' => 'Kondisi Vacant Fungsi AIMS KJG',
            //     // 'route' => route('kondisi-vacant-fungsi-aims-ptsg'),
            //     'active' => request()->routeIs('kondisi-vacant-fungsi-aims-ptsg'),
            // ],
            // [
            //     'title' => 'Pelatihan AIMS KJG',
            //     // 'route' => route('pelatihan-aims-ptsg'),
            //     'active' => request()->routeIs('pelatihan-aims-ptsg'),
            // ],
            // [
            //     'title' => 'Sistem Informasi AIMS ptsg',
            //     // 'route' => route('sistem-informasi-aims-ptsg'),
            //     'active' => request()->routeIs('sistem-informasi-aims-ptsg'),
            // ],
            // [
            //     'title' => 'Rencana Pemeliharaan Besar KJG 2025',
            //     // 'route' => route('rencana-pemeliharaan-besar-ptsg'),
            //     'active' => request()->routeIs('rencana-pemeliharaan-besar-ptsg'),
            // ],
            // [
            //     'title' => 'Realisasi Anggaran AI KJG 2025',
            //     // 'route' => route('realisasi-anggaran-ai-ptsg'),
            //     'active' => request()->routeIs('realisasi-anggaran-ai-ptsg'),
            // ],
            // [
            //     'title' => 'Realisasi Progress Fisik AI KJG 2025',
            //     // 'route' => route('realisasi-progress-fisik-ai-ptsg'),
            //     'active' => request()->routeIs('realisasi-progress-fisik-ai-ptsg'),
            // ],
            // [
            //     'title' => 'Availability KJG',
            //     // 'route' => route('availability-ptsg'),
            //     'active' => request()->routeIs('availability-ptsg'),
            // ],
            // [
            //     'title' => 'AIR BUDGET TAGGING KJG',
            //     'route' => route('air-budget-tagging-ptsg'),
            //     // 'active' => request()->routeIs('air-budget-tagging-ptsg'),
            // ],
        ];

        return view('SHG.InputDataMonev.PertaSamtanGas', compact('tabs', 'companies'));
    }


    public function store(StatusAssetAIPTSGRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = StatusAssetAIPTSG::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = StatusAssetAIPTSG::all();
        return response()->json($TargetPLO);
    }
    public function update(StatusAssetAIPTSGRequest $request, $id)
    {
        $progress = StatusAssetAIPTSG::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = StatusAssetAIPTSG::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
