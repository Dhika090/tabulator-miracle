<?php

namespace App\Http\Controllers\SHG;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHGTargetSapAssetRequest;
use App\Models\SHGTargetSapAsset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TargetSapAssetController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = SHGTargetSapAsset::all();
            return response()->json($TargetPLO);
        }

        return view('SHG.TargetSapAsset');
    }


    public function store(SHGTargetSapAssetRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = SHGTargetSapAsset::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = SHGTargetSapAsset::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(SHGTargetSapAssetRequest $request, $id)
    {
        $progress = SHGTargetSapAsset::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = SHGTargetSapAsset::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
