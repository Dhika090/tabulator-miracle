<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\SapAsset;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\Sap\Region7SapAssetRequest;
use App\Models\SHCNT\Sap\Region7SapAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region7SapAssetController extends Controller
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

        return view('SHCNT.InputDataMonev.SapAsset.Region7SapAsset', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region7SapAssetRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region7SapAsset::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region7SapAsset::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('07-', periode), 720) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region7SapAssetRequest $request, $id)
    {
        $progress = Region7SapAsset::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region7SapAsset::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
