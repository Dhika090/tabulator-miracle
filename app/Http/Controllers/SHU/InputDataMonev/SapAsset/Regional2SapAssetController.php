<?php

namespace App\Http\Controllers\SHU\InputDataMonev\SapAsset;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\SapAsset\Regional2SapAssetRequest;
use App\Models\SHU\SapAsset\Regional2SapAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional2SapAssetController extends Controller
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

        return view('SHU.InputDataMonev.SapAsset.Regional2SapAsset', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional2SapAssetRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional2SapAsset::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional2SapAsset::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional2SapAssetRequest $request, $id)
    {
        $progress = Regional2SapAsset::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional2SapAsset::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
