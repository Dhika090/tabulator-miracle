<?php

namespace App\Http\Controllers\SHU\TargetKinerja;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\TargetKinerja\PrognosaStatusAiShuRequest;
use App\Models\SHU\TargetKinerja\PrognosaStatusAiShu;
use Illuminate\Support\Facades\DB;

class PrognosaStatusAiShuController extends Controller
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

        return view('SHU.TargetKinerja.TargetStatusIntergrity.PrognosaStatusAiShu', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = PrognosaStatusAiShu::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(PrognosaStatusAiShuRequest $request)
    {
        $data = $request->validated();
        $data = PrognosaStatusAiShu::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(PrognosaStatusAiShuRequest $request, $id)
    {
        $progress = PrognosaStatusAiShu::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = PrognosaStatusAiShu::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
