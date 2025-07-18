<?php

namespace App\Http\Controllers\SHG\InputDataMonev\GagasEnergi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\GagasEnergi\AssetBreakdownGEIRequest;
use App\Models\SHG\GagasEnergi\AssetBreakdownGEI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssetBreakdownGEIController extends Controller
{

    public function index(Request $request)
    {

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI GEI',
                'route' => route('gagas-energi-indonesia'),
                'active' => request()->routeIs('gagas-energi-indonesia'),
            ],
            [
                'title' => 'Mandatory Certification GEI',
                'route' => route('mandatory-certification-gei'),
                'active' => request()->routeIs('mandatory-certification-gei'),
            ],
            [
                'title' => 'Asset Breakdown GEI',
                'route' => route('asset-breakdown-gei'),
                'active' => request()->routeIs('asset-breakdown-gei'),
            ],
            [
                'title' => 'Sistem Informasi AIMS GEI',
                'route' => route('sistem-informasi-aims-gei'),
                'active' => request()->routeIs('sistem-informasi-aims-gei'),
            ],
            [
                'title' => 'Kondisi Vacant Fungsi AIMS GEI',
                'route' => route('kondisi-vacant-fungsi-aims-gei'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-gei'),
            ],
            [
                'title' => 'Status PLO GEI',
                'route' => route('status-plo-gei'),
                'active' => request()->routeIs('status-plo-gei'),
            ],
            [
                'title' => 'Pelatihan AIMS GEI',
                'route' => route('pelatihan-aims-gei'),
                'active' => request()->routeIs('pelatihan-aims-gei'),
            ],
            [
                'title' => 'Availability GEI',
                'route' => route('availability-gei'),
                'active' => request()->routeIs('availability-gei'),
            ],
            [
                'title' => 'Realisasi Anggaran AI GEI',
                'route' => route('realisasi-anggaran-ai-gei'),
                'active' => request()->routeIs('realisasi-anggaran-ai-gei'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI GEI',
                'route' => route('realisasi-progress-fisik-ai-gei'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-gei'),
            ],
            [
                'title' => 'Rencana Pemeliharaan GEI',
                'route' => route('rencana-pemeliharaan-gei'),
                'active' => request()->routeIs('rencana-pemeliharaan-gei'),
            ],
            [
                'title' => 'Air Budget Tagging GEI',
                'route' => route('air-budget-tagging-gei'),
                'active' => request()->routeIs('air-budget-tagging-gei'),
            ],
        ];

        return view('SHG.InputDataMonev.gagasEnergi.AssetBreakdownGEI', compact('tabs'));
    }

    public function store(AssetBreakdownGEIRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = AssetBreakdownGEI::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = AssetBreakdownGEI::select('*')
          ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(AssetBreakdownGEIRequest $request, $id)
    {
        $progress = AssetBreakdownGEI::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = AssetBreakdownGEI::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
