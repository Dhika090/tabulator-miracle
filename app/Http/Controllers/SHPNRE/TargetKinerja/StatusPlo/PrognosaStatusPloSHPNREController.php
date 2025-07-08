<?php

namespace App\Http\Controllers\SHPNRE\TargetKinerja\StatusPlo;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\TargetKinerja\PrognosaStatusPloSHPNRERequest;
use App\Models\SHPNRE\TargetKinerja\PrognosaStatusPloSHPNRE;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrognosaStatusPloSHPNREController extends Controller
{
    public function index()
    {
        $tabs = [
            [
                'title' => 'Target Penurunan PLO',
                'route' => route('shpnre-target-penurunan-plo'),
                'active' => request()->routeIs('shpnre-target-penurunan-plo'),
            ],
            [
                'title' => 'Kumulatif Status PLO',
                'route' => route('shpnre-kumulatif-status-plo'),
                'active' => request()->routeIs('shpnre-kumulatif-status-plo'),
            ],
            [
                'title' => 'Prognosa Status PLO',
                'route' => route('shpnre-prognosa-status-plo'),
                'active' => request()->routeIs('shpnre-prognosa-status-plo'),
            ],
        ];
        return view('SHPNRE.TargetKinerja.StatusPlo.PrognosaStatusPloSHPNRE', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = PrognosaStatusPloSHPNRE::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(PrognosaStatusPloSHPNRERequest $request)
    {
        $data = $request->validated();
        $data = PrognosaStatusPloSHPNRE::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(PrognosaStatusPloSHPNRERequest $request, $id)
    {
        $progress = PrognosaStatusPloSHPNRE::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = PrognosaStatusPloSHPNRE::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
