<?php

namespace App\Http\Controllers\SHU\InputDataMonev\AssetBreakdown;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\AssetBreakdown\Regional1AssetBreakdownRequest;
use App\Models\SHU\AssetBreakdown\Regional1AssetBreakdown;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional1AssetBreakdownController extends Controller
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

        return view('SHU.InputDataMonev.AssetBreakdown.Regional1', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional1AssetBreakdownRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional1AssetBreakdown::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional1AssetBreakdown::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional1AssetBreakdownRequest $request, $id)
    {
        $progress = Regional1AssetBreakdown::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional1AssetBreakdown::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
