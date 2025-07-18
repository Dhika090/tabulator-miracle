<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pertamina;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertamina\KondisiVacantAIMSPtgRequest;
use App\Models\SHG\Pertamina\KondisiVacantAIMSPtg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KondisiVacantAIMSPtgController extends Controller
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

        return view('SHG.InputDataMonev.pertamina.KondisiVacantFungsiAIMSPtg', compact('tabs'));
        // return view('SHG.InputDataMonev.pertamina.KondisiVacantFungsiAIMSPtg');
    }

    public function data()
    {
        $TargetPLO = KondisiVacantAIMSPtg::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(KondisiVacantAIMSPtgRequest $request)
    {
        $data = $request->validated();
        $data = KondisiVacantAIMSPtg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(KondisiVacantAIMSPtgRequest $request, $id)
    {
        $progress = KondisiVacantAIMSPtg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = KondisiVacantAIMSPtg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
