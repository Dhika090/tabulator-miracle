<?php

namespace App\Http\Controllers\SHU\InputDataMonev\AssetBreakdown;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\AssetBreakdown\Regional3AssetBreakdownRequest;
use App\Models\SHU\AssetBreakdown\Regional3AssetBreakdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional3AssetBreakdownController extends Controller
{
    
    public function index(Request $request)
    {
        $tabs = collect(config('shu-asset-breakdown'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHU.InputDataMonev.AssetBreakdown.Regional3', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional3AssetBreakdownRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional3AssetBreakdown::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional3AssetBreakdown::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('03-', periode), 320) as periode_date"))
            ->orderBy('periode', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional3AssetBreakdownRequest $request, $id)
    {
        $progress = Regional3AssetBreakdown::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional3AssetBreakdown::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
