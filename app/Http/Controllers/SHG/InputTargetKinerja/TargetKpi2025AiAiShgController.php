<?php

namespace App\Http\Controllers\SHG\InputTargetKinerja;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\TargetKinerja\TargetKpi2025AiShgRequest;
use App\Models\SHG\TargetKinerja\TargetKpi2025AiShg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TargetKpi2025AiAiShgController extends Controller
{

    public function index()
    {
        $tabs = [
            [
                'title' => 'Target KPI 2025 AI',
                'route' => route('shg-target-kpi-2025-ai'),
                'active' => request()->routeIs('shg-target-kpi-2025-ai'),
            ],
            [
                'title' => 'Prognosa Status AI',
                'route' => route('shg-prognosa-status-ai'),
                'active' => request()->routeIs('shg-prognosa-status-ai'),
            ],
        ];

        return view('SHG.InputTargetKinerja.TargetStatusIntergrity.TargetKpi2025AiShg', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = TargetKpi2025AiShg::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(TargetKpi2025AiShgRequest $request)
    {
        $data = $request->validated();
        $data = TargetKpi2025AiShg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(TargetKpi2025AiShgRequest $request, $id)
    {
        $progress = TargetKpi2025AiShg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = TargetKpi2025AiShg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
