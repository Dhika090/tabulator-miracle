<?php

namespace App\Http\Controllers\SHG\InputDataMonev\kalimantan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Kalimantan\AirBudgetTaggingKJGRequest;
use App\Models\SHG\Kalimantan\AirBudgetTaggingKJG;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AirBudgetTaggingKJGController extends Controller
{
    public function index()
    {
        // return view('SHG.InputDataMonev.kalimantanJawa.AirBudgetTaggingKJG');
        $tabs = [
            [
                'title' => 'Status Asset 2025 AI 2025 KJG',
                'route' => route('kalimantan-jawa-gas'),
                'active' => request()->routeIs('kalimantan-jawa-gas'),
            ],
            [
                'title' => 'Mandatory Certification KJG',
                'route' => route('mandatory-certification-kjg'),
                'active' => request()->routeIs('mandatory-certification-kjg'),
            ],
            [
                'title' => 'Asset Breakdown KJG',
                'route' => route('asset-breakdown-kjg'),
                'active' => request()->routeIs('asset-breakdown-kjg'),
            ],
            [
                'title' => 'Status PLO KJG',
                'route' => route('status-plo-kjg'),
                'active' => request()->routeIs('status-plo-kjg'),
            ],
            [
                'title' => 'Kondisi Vacant Fungsi AIMS KJG',
                'route' => route('kondisi-vacant-fungsi-aims-kjg'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-kjg'),
            ],
            [
                'title' => 'Pelatihan AIMS KJG',
                'route' => route('pelatihan-aims-kjg'),
                'active' => request()->routeIs('pelatihan-aims-kjg'),
            ],
            [
                'title' => 'Sistem Informasi AIMS KJG',
                'route' => route('sistem-informasi-aims-kjg'),
                'active' => request()->routeIs('sistem-informasi-aims-kjg'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Besar KJG 2025',
                'route' => route('rencana-pemeliharaan-besar-kjg'),
                'active' => request()->routeIs('rencana-pemeliharaan-besar-kjg'),
            ],
            [
                'title' => 'Realisasi Anggaran AI KJG 2025',
                'route' => route('realisasi-anggaran-ai-kjg'),
                'active' => request()->routeIs('realisasi-anggaran-ai-kjg'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI KJG 2025',
                'route' => route('realisasi-progress-fisik-ai-kjg'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-kjg'),
            ],
            [
                'title' => 'Availability KJG',
                'route' => route('availability-kjg'),
                'active' => request()->routeIs('availability-kjg'),
            ],
            [
                'title' => 'AIR BUDGET TAGGING KJG',
                'route' => route('air-budget-tagging-kjg'),
                'active' => request()->routeIs('air-budget-tagging-kjg'),
            ],
        ];

        return view('SHG.InputDataMonev.kalimantanJawa.AirBudgetTaggingKJG', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = AirBudgetTaggingKJG::select('*')
            ->orderByRaw("STR_TO_DATE(CONCAT('01-', periode), '%d-%b-%y') ASC")
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(AirBudgetTaggingKJGRequest $request)
    {
        $data = $request->validated();
        $data = AirBudgetTaggingKJG::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(AirBudgetTaggingKJGRequest $request, $id)
    {
        $progress = AirBudgetTaggingKJG::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = AirBudgetTaggingKJG::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
