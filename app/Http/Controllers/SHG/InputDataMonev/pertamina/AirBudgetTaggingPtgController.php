<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pertamina;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertamina\AirBudgetTaggingPtgRequest;
use App\Models\SHG\Pertamina\AirBudgetTaggingPtg;
use Illuminate\Http\Request;

class AirBudgetTaggingPtgController extends Controller
{
    public function index()
    {
        $tabs = [
            [
                'title' => 'Status Asset 2025 AI 2025 PTG',
                'route' => route('pertamina-gas'),
                'active' => request()->routeIs('pertamina-gas'),
            ],
            [
                'title' => 'Mandatory Certification PTG',
                'route' => route('mandatory-certification-ptg'),
                'active' => request()->routeIs('mandatory-certification-ptg'),
            ],
            [
                'title' => 'SAP Asset PTG',
                'route' => route('sap-asset-ptg'),
                'active' => request()->routeIs('sap-asset-ptg'),
            ],
            [
                'title' => 'Status PLO PTG',
                'route' => route('status-plo-ptg'),
                'active' => request()->routeIs('status-plo-ptg'),
            ],
            [
                'title' => 'Asset Breakdown PTG',
                'route' => route('asset-breakdown-ptg'),
                'active' => request()->routeIs('asset-breakdown-ptg'),
            ],
            [
                'title' => 'Kondisi Vacant Fungsi AIMS PTG',
                'route' => route('kondisi-vacant-fungsi-aims-ptg'),
                'active' => request()->routeIs('kondisi-vacant-fungsi-aims-ptg'),
            ],
            [
                'title' => 'Rencana Pemeliharaan Besar PTG',
                'route' => route('rencana-pemeliharaan-besar-ptg'),
                'active' => request()->routeIs('rencana-pemeliharaan-besar-ptg'),
            ],
            [
                'title' => 'Sistem Informasi AIMS PTG',
                'route' => route('sistem-informasi-aims-ptg'),
                'active' => request()->routeIs('sistem-informasi-aims-ptg'),
            ],
            [
                'title' => 'Pelatihan AIMS PTG',
                'route' => route('pelatihan-aims-ptg'),
                'active' => request()->routeIs('pelatihan-aims-ptg'),
            ],
            [
                'title' => 'Realisasi Anggaran AI 2025 PTG',
                'route' => route('realisasi-anggaran-ai-ptg'),
                'active' => request()->routeIs('realisasi-anggaran-ai-ptg'),
            ],
            [
                'title' => 'Realisasi Progress Fisik AI PTG 2025',
                'route' => route('realisasi-progress-fisik-ai-ptg'),
                'active' => request()->routeIs('realisasi-progress-fisik-ai-ptg'),
            ],
            [
                'title' => 'Availability PTG',
                'route' => route('availability-ptg'),
                'active' => request()->routeIs('availability-ptg'),
            ],
            [
                'title' => 'AIR BUDGET TAGGING PTG',
                'route' => route('air-budget-tagging-ptg'),
                'active' => request()->routeIs('air-budget-tagging-ptg'),
            ],
        ];

        return view('SHG.InputDataMonev.pertamina.AirBudgetTaggingPtg', compact('tabs'));
        // return view('SHG.InputDataMonev.pertamina.AirBudgetTaggingPtg');
    }

    public function data()
    {
        $TargetPLO = AirBudgetTaggingPtg::select('*')
            ->orderByRaw("STR_TO_DATE(CONCAT(periode, '-01'), '%Y-%m-%d') ASC")
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(AirBudgetTaggingPtgRequest $request)
    {
        $data = $request->validated();
        $data = AirBudgetTaggingPtg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(AirBudgetTaggingPtgRequest $request, $id)
    {
        $validated = [];

        $validated['jumlah_aset_critical_pce'] = $request->filled('jumlah_aset_critical_pce')
            ? (int) floatval($request->jumlah_aset_critical_pce)
            : null;

        $validated['jumlah_aset_critical_sece'] = $request->filled('jumlah_aset_critical_sece')
            ? (int) floatval($request->jumlah_aset_critical_sece)
            : null;

        $validated['jumlah_aset_important'] = $request->filled('jumlah_aset_important')
            ? (int) floatval($request->jumlah_aset_important)
            : null;

        $validated['jumlah_aset_secondary'] = $request->filled('jumlah_aset_secondary')
            ? (int) floatval($request->jumlah_aset_secondary)
            : null;

        AirBudgetTaggingPtg::findOrFail($id)->update($validated);
    }


    public function destroy($id)
    {
        $target = AirBudgetTaggingPtg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
