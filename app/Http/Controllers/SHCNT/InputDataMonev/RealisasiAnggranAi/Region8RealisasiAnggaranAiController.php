<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\RealisasiAnggranAi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\RealisasiAnggaranAi\Region8RealisasiAnggaranAiRequest;
use App\Models\SHCNT\RealisasiAnggaranAi\Region8RealisasiAnggaranAi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region8RealisasiAnggaranAiController extends Controller
{
    public function index(Request $request)
    {
        $tabs = collect(config('shcnt-realisasi-anggarai-ai'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHCNT.InputDataMonev.RealisasiAnggaranAi.Region8RealisasiAnggaranAi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region8RealisasiAnggaranAiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region8RealisasiAnggaranAi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region8RealisasiAnggaranAi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('08-', periode), 820) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region8RealisasiAnggaranAiRequest $request, $id)
    {
        $progress = Region8RealisasiAnggaranAi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region8RealisasiAnggaranAi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
