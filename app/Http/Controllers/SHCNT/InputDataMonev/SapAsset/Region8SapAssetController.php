<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\SapAsset;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\Sap\Region8SapAssetRequest;
use App\Models\SHCNT\Sap\Region8SapAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region8SapAssetController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shcnt-sap-asset'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHCNT.InputDataMonev.SapAsset.Region8SapAsset', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region8SapAssetRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region8SapAsset::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region8SapAsset::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('08-', periode), 820) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region8SapAssetRequest $request, $id)
    {
        $progress = Region8SapAsset::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region8SapAsset::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
