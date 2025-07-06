<?php

namespace App\Http\Controllers\SHU\TargetKinerja\KinerjaKpiAssetIntegrity;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\TargetKinerja\KpiMandatoryCertiSummaryShuRequest;
use App\Models\SHU\TargetKinerja\KpiMandatoryCertiSummaryShu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KinerjaMandatoryCertiSummaryShuController extends Controller
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

        return view('SHU.TargetKinerja.KinerjaKpiAssetIntegrity.KpiMandatoryCertiSummaryShu', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = KpiMandatoryCertiSummaryShu::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(KpiMandatoryCertiSummaryShuRequest $request)
    {
        $data = $request->validated();
        $data = KpiMandatoryCertiSummaryShu::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(KpiMandatoryCertiSummaryShuRequest $request, $id)
    {
        $progress = KpiMandatoryCertiSummaryShu::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = KpiMandatoryCertiSummaryShu::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
