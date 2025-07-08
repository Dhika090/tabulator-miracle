<?php

namespace App\Http\Controllers\SHG\InputTargetKinerja;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\TargetKinerja\KumulatifStatusPloShgRequest;
use App\Models\SHG\TargetKinerja\KumulatifStatusPloShg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KumulatifStatusPloShgController extends Controller
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
        return view('SHG.InputTargetKinerja.StatusPlo.KumulatifStatusPloShg', compact('tabs'));
    }

    public function data()
    {
        $TargetPLO = KumulatifStatusPloShg::select('*')
            ->select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, periode + '-01', 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }

    public function store(KumulatifStatusPloShgRequest $request)
    {
        $data = $request->validated();
        $data = KumulatifStatusPloShg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(KumulatifStatusPloShgRequest $request, $id)
    {
        $progress = KumulatifStatusPloShg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = KumulatifStatusPloShg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
