<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\StatusAssetIntegrity;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\StatusAssetegrity\Region6StatusAssetIntegrityRequest;
use App\Models\SHCNT\StatusAssetegrity\Region6StatusAssetIntegrity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region6StatusAssetIntegrityController extends Controller
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

        return view('SHCNT.InputDataMonev.StatusAi.Region6StatusAssetIntegrity', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region6StatusAssetIntegrityRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region6StatusAssetIntegrity::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region6StatusAssetIntegrity::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('06-', periode), 620) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region6StatusAssetIntegrityRequest $request, $id)
    {
        $progress = Region6StatusAssetIntegrity::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region6StatusAssetIntegrity::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
