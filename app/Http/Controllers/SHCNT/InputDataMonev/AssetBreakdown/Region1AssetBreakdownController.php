<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\AssetBreakdown;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\AssetBreakdown\Region1AssetBreakdownRequest;
use App\Models\SHCNT\AssetBreakdown\Region1AssetBreakdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region1AssetBreakdownController extends Controller
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

        return view('SHCNT.InputDataMonev.AssetBreakdown.Region1AssetBreakdown', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region1AssetBreakdownRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region1AssetBreakdown::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region1AssetBreakdown::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region1AssetBreakdownRequest $request, $id)
    {
        $progress = Region1AssetBreakdown::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }
}
