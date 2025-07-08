<?php

namespace App\Http\Controllers\SHG\InputTargetKinerja;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\TargetKinerja\PrognosaStatusPloShgRequest;
use App\Models\SHG\TargetKinerja\PrognosaStatusPloShg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrognosaStatusPloShgController extends Controller
{


    public function index()
    {
        $tabs = [
            [
                'title' => 'Target Penurunan PLO',
                'route' => route('shg-target-penurunan-plo'),
                'active' => request()->routeIs('shg-target-penurunan-plo'),
            ],
            [
                'title' => 'Kumulatif Status PLO',
                'route' => route('shg-kumulatif-status-plo'),
                'active' => request()->routeIs('shg-kumulatif-status-plo'),
            ],
            [
                'title' => 'Prognosa Status PLO',
                'route' => route('shg-prognosa-status-plo'),
                'active' => request()->routeIs('shg-prognosa-status-plo'),
            ],
        ];
        return view('SHG.InputTargetKinerja.StatusPlo.PrognosaStatusPloShg', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = PrognosaStatusPloShg::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(PrognosaStatusPloShgRequest $request)
    {
        $data = $request->validated();
        $data = PrognosaStatusPloShg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(PrognosaStatusPloShgRequest $request, $id)
    {
        $progress = PrognosaStatusPloShg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = PrognosaStatusPloShg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
