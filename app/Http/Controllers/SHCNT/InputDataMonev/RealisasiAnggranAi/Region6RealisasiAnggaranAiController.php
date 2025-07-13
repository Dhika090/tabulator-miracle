<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\RealisasiAnggranAi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\RealisasiAnggaranAi\Region6RealisasiAnggaranAiRequest;
use App\Models\SHCNT\RealisasiAnggaranAi\Region6RealisasiAnggaranAi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region6RealisasiAnggaranAiController extends Controller
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

        return view('SHCNT.InputDataMonev.RealisasiAnggaranAi.Region6RealisasiAnggaranAi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region6RealisasiAnggaranAiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region6RealisasiAnggaranAi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region6RealisasiAnggaranAi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('06-', periode), 620) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region6RealisasiAnggaranAiRequest $request, $id)
    {
        $progress = Region6RealisasiAnggaranAi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region6RealisasiAnggaranAi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
