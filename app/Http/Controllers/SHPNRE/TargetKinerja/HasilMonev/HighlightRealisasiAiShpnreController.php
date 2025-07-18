<?php

namespace App\Http\Controllers\SHPNRE\TargetKinerja\HasilMonev;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\TargetKinerja\TindakLanjut\HighLightRealisasiAimsShpnreRequest;
use App\Models\SHPNRE\TargetKinerja\TindakLanjut\HighLightRealisasiAimsShpnre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HighlightRealisasiAiShpnreController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shpnre-tindak-lanjut-hasil-monev'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHPNRE.TargetKinerja.HasilMonev.HighLightRealisasiAimsShpnre', [
            'tabs' => $tabs,

        ]);
    }

    public function store(HighLightRealisasiAimsShpnreRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = HighLightRealisasiAimsShpnre::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = HighLightRealisasiAimsShpnre::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->orderBy('no', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(HighLightRealisasiAimsShpnreRequest $request, $id)
    {
        $progress = HighLightRealisasiAimsShpnre::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = HighLightRealisasiAimsShpnre::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
