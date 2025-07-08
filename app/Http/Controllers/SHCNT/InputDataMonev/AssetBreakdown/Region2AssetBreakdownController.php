<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\AssetBreakdown;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\AssetBreakdown\Region2AssetBreakdownRequest;
use App\Models\SHCNT\AssetBreakdown\Region2AssetBreakdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region2AssetBreakdownController extends Controller
{
   
    public function index(Request $request)
    {
        $tabs = collect(config('shcnt-asset-breakdown'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHCNT.InputDataMonev.AssetBreakdown.Region2AssetBreakdown', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region2AssetBreakdownRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region2AssetBreakdown::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region2AssetBreakdown::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region2AssetBreakdownRequest $request, $id)
    {
        $progress = Region2AssetBreakdown::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }
}
