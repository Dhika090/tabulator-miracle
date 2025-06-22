<?php

namespace App\Http\Controllers\SHU\InputDataMonev\AssetBreakdown;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\AssetBreakdown\Regional2AssetBreakdownRequest;
use App\Models\SHU\AssetBreakdown\Regional2AssetBreakdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional2AssetBreakdownController extends Controller
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

        return view('SHU.InputDataMonev.AssetBreakdown.Regional2', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional2AssetBreakdownRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional2AssetBreakdown::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional2AssetBreakdown::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional2AssetBreakdownRequest $request, $id)
    {
        $progress = Regional2AssetBreakdown::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional2AssetBreakdown::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
