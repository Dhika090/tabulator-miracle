<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\AssetBreakdown;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\AssetBreakdown\Region8AssetBreakdownRequest;
use App\Models\SHCNT\AssetBreakdown\Region8AssetBreakdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region8AssetBreakdownController extends Controller
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

        return view('SHCNT.InputDataMonev.AssetBreakdown.Region8AssetBreakdown', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region8AssetBreakdownRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region8AssetBreakdown::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region8AssetBreakdown::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('08-', periode), 820) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region8AssetBreakdownRequest $request, $id)
    {
        $progress = Region8AssetBreakdown::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }
}
