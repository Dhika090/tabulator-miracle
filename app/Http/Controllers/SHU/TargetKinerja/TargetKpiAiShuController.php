<?php

namespace App\Http\Controllers\SHU\TargetKinerja;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\TargetKinerja\TargetKpiAiShuRequest;
use App\Models\SHU\TargetKinerja\TargetKpiAiShu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TargetKpiAiShuController extends Controller
{

    public function index()
    {
        $tabs = [
            [
                'title' => 'Target KPI 2025 AI',
                'route' => route('shu-target-kpi-2025-ai'),
                'active' => request()->routeIs('shu-target-kpi-2025-ai'),
            ],
            [
                'title' => 'Prognosa Status AI',
                'route' => route('shu-prognosa-status-ai'),
                'active' => request()->routeIs('shu-prognosa-status-ai'),
            ],
        ];

        return view('SHU.TargetKinerja.TargetStatusIntergrity.TargetKpiAiShu', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = TargetKpiAiShu::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(TargetKpiAiShuRequest $request)
    {
        $data = $request->validated();
        $data = TargetKpiAiShu::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(TargetKpiAiShuRequest $request, $id)
    {
        $progress = TargetKpiAiShu::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = TargetKpiAiShu::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
