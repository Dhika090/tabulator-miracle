<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\StatusAssetIntegrity;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\StatusAssetegrity\Region7StatusAssetIntegrityRequest;
use App\Models\SHCNT\StatusAssetegrity\Region7StatusAssetIntegrity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region7StatusAssetIntegrityController extends Controller
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

        return view('SHCNT.InputDataMonev.StatusAi.Region7StatusAssetIntegrity', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region7StatusAssetIntegrityRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region7StatusAssetIntegrity::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region7StatusAssetIntegrity::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('07-', periode), 720) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region7StatusAssetIntegrityRequest $request, $id)
    {
        $progress = Region7StatusAssetIntegrity::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region7StatusAssetIntegrity::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
