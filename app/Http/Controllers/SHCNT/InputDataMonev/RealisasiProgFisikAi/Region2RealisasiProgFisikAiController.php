<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\RealisasiProgFisikAi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\RealisasiProgFisikAi\Region2RealisasiProgFisikAiRequest;
use App\Models\SHCNT\RealisasiProgFisikAi\Region2RealisasiProgFisikAi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region2RealisasiProgFisikAiController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shcnt-realisasi-progress-fisik-ai'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHCNT.InputDataMonev.RealisasiProgresFisikAi.Region2RealisasiProgFisikAi', [
            'tabs' => $tabs,

        ]);
    }


    public function store(Region2RealisasiProgFisikAiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region2RealisasiProgFisikAi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region2RealisasiProgFisikAi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region2RealisasiProgFisikAiRequest $request, $id)
    {
        $progress = Region2RealisasiProgFisikAi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region2RealisasiProgFisikAi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
