<?php

namespace App\Http\Controllers\SHG\InputTargetKinerja;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\InputTargetKinerja\KinerjaKpiPemnhnPloShgRequest;
use App\Models\SHG\TargetKinerja\KinerjaKpiPemnhnPloShg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KinerjaKpiPemnhnPloShgController extends Controller
{
    public function index()
    {
        $tabs = [
            [
                'title' => 'Kinerja KPI Status AI',
                'route' => route('shg-kinerja-kpi-status-ai'),
                'active' => request()->routeIs('shg-kinerja-kpi-status-ai'),
            ],
            [
                'title' => 'Kinerja KPI Pemnhn PLO',
                'route' => route('shg-kinerja-kpi-pemnhn-plo'),
                'active' => request()->routeIs('shg-kinerja-kpi-pemnhn-plo'),
            ],
            [
                'title' => 'KPI Mandatory Certi Summary',
                'route' => route('shg-kpi-mandatory-certi-summary'),
                'active' => request()->routeIs('shg-kpi-mandatory-certi-summary'),
            ],
        ];

        return view('SHG.InputTargetKinerja.KinerjaKpiAssetIntegrity.KinerjaKpiPemnhnPloShg', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = KinerjaKpiPemnhnPloShg::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(KinerjaKpiPemnhnPloShgRequest $request)
    {
        $data = $request->validated();
        $data = KinerjaKpiPemnhnPloShg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(KinerjaKpiPemnhnPloShgRequest $request, $id)
    {
        $progress = KinerjaKpiPemnhnPloShg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = KinerjaKpiPemnhnPloShg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
