<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\RealisasiProgFisikAi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\RealisasiProgFisikAi\Region8RealisasiProgFisikAiRequest;
use App\Models\SHCNT\RealisasiProgFisikAi\Region8RealisasiProgFisikAi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region8RealisasiProgFisikAiController extends Controller
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

        return view('SHCNT.InputDataMonev.RealisasiProgresFisikAi.Region8RealisasiProgFisikAi', [
            'tabs' => $tabs,

        ]);
    }


    public function store(Region8RealisasiProgFisikAiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region8RealisasiProgFisikAi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region8RealisasiProgFisikAi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('08-', periode), 820) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region8RealisasiProgFisikAiRequest $request, $id)
    {
        $progress = Region8RealisasiProgFisikAi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region8RealisasiProgFisikAi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
