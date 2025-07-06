<?php

namespace App\Http\Controllers\SHU\TargetKinerja\StatusPlo;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\TargetKinerja\PrognosaStatusPloSHURequest;
use App\Models\SHU\TargetKinerja\PrognosaStatusPloSHU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrognosaStatusPloController extends Controller
{

    public function index()
    {
        $tabs = [
            [
                'title' => 'Target Penurunan PLO',
                'route' => route('shu-target-penurunan-plo'),
                'active' => request()->routeIs('shu-target-penurunan-plo'),
            ],
            [
                'title' => 'Kumulatif Status PLO',
                'route' => route('shu-kumulatif-status-plo'),
                'active' => request()->routeIs('shu-kumulatif-status-plo'),
            ],
            [
                'title' => 'Prognosa Status PLO',
                'route' => route('shu-prognosa-status-plo'),
                'active' => request()->routeIs('shu-prognosa-status-plo'),
            ],
        ];

        return view('SHU.TargetKinerja.StatusPlo.PrognosaStatusPloSHU', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = PrognosaStatusPloSHU::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(PrognosaStatusPloSHURequest $request)
    {
        $data = $request->validated();
        $data = PrognosaStatusPloSHU::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(PrognosaStatusPloSHURequest $request, $id)
    {
        $progress = PrognosaStatusPloSHU::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = PrognosaStatusPloSHU::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
