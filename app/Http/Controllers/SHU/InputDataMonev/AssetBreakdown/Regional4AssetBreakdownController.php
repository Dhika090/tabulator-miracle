<?php

namespace App\Http\Controllers\SHU\InputDataMonev\AssetBreakdown;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\AssetBreakdown\Regional4AssetBreakdownRequest;
use App\Models\SHU\AssetBreakdown\Regional4AssetBreakdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional4AssetBreakdownController extends Controller
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

        return view('SHU.InputDataMonev.AssetBreakdown.Regional4', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional4AssetBreakdownRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional4AssetBreakdown::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional4AssetBreakdown::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('04-', periode), 420) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional4AssetBreakdownRequest $request, $id)
    {
        $progress = Regional4AssetBreakdown::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional4AssetBreakdown::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
