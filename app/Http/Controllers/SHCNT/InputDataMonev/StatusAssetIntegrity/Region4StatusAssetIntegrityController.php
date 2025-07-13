<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\StatusAssetIntegrity;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\StatusAssetegrity\Region4StatusAssetIntegrityRequest;
use App\Models\SHCNT\StatusAssetegrity\Region4StatusAssetIntegrity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region4StatusAssetIntegrityController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shcnt-status-asset-integrity'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHCNT.InputDataMonev.StatusAi.Region4StatusAssetIntegrity', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region4StatusAssetIntegrityRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region4StatusAssetIntegrity::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region4StatusAssetIntegrity::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('04-', periode), 420) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region4StatusAssetIntegrityRequest $request, $id)
    {
        $progress = Region4StatusAssetIntegrity::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region4StatusAssetIntegrity::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
