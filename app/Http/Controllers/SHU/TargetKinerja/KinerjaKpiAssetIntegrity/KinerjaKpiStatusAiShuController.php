<?php

namespace App\Http\Controllers\SHU\TargetKinerja\KinerjaKpiAssetIntegrity;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\TargetKinerja\KinerjaKpiStatusAiShuRequest;
use App\Models\SHU\TargetKinerja\KinerjaKpiStatusAiShu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KinerjaKpiStatusAiShuController extends Controller
{

    public function index()
    {
        $tabs = [
            [
                'title' => 'Kinerja KPI Status AI',
                'route' => route('shu-kinerja-kpi-status-ai'),
                'active' => request()->routeIs('shu-kinerja-kpi-status-ai'),
            ],
            [
                'title' => 'Kinerja KPI Pemnhn PLO',
                'route' => route('shu-kinerja-kpi-pemnhn-plo'),
                'active' => request()->routeIs('shu-kinerja-kpi-pemnhn-plo'),
            ],
            [
                'title' => 'KPI Mandatory Certi Summary',
                'route' => route('shu-kpi-mandatory-certi-summary'),
                'active' => request()->routeIs('shu-kpi-mandatory-certi-summary'),
            ], 
        ];

        return view('SHU.TargetKinerja.KinerjaKpiAssetIntegrity.KinerjaKpiStatusAiShu', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = KinerjaKpiStatusAiShu::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(KinerjaKpiStatusAiShuRequest $request)
    {
        $data = $request->validated();
        $data = KinerjaKpiStatusAiShu::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(KinerjaKpiStatusAiShuRequest $request, $id)
    {
        $progress = KinerjaKpiStatusAiShu::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = KinerjaKpiStatusAiShu::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
