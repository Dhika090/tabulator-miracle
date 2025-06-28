<?php

namespace App\Http\Controllers\SHU\InputDataMonev\SapAsset;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\SapAsset\Regional3SapAssetRequest;
use App\Models\SHU\SapAsset\Regional3SapAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional3SapAssetController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shu-sap-asset'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHU.InputDataMonev.SapAsset.Regional3SapAsset', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional3SapAssetRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional3SapAsset::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional3SapAsset::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('03-', periode), 320) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional3SapAssetRequest $request, $id)
    {
        $progress = Regional3SapAsset::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional3SapAsset::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
