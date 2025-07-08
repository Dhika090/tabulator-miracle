<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\AssetBreakdown;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\AssetBreakdown\Region6AssetBreakdownRequest;
use App\Models\SHCNT\AssetBreakdown\Region6AssetBreakdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region6AssetBreakdownController extends Controller
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

        return view('SHCNT.InputDataMonev.AssetBreakdown.Region6AssetBreakdown', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region6AssetBreakdownRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region6AssetBreakdown::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region6AssetBreakdown::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('06-', periode), 620) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region6AssetBreakdownRequest $request, $id)
    {
        $progress = Region6AssetBreakdown::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }
}
