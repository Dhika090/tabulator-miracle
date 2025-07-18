<?php

namespace App\Http\Controllers\SHPNRE\TargetKinerja;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\TargetKinerja\TargetSapAssetPnreRequest;
use App\Models\SHPNRE\TargetKinerja\TargetSapAssetPnre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TargetSapAssetPnreController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = TargetSapAssetPnre::all();
            return response()->json($TargetPLO);
        }

        return view('SHPNRE.TargetKinerja.TargetSapAsset.TargetSapAsset');
    }


    public function store(TargetSapAssetPnreRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = TargetSapAssetPnre::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = TargetSapAssetPnre::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(TargetSapAssetPnreRequest $request, $id)
    {
        $progress = TargetSapAssetPnre::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = TargetSapAssetPnre::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
