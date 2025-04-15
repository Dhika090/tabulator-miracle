<?php

namespace App\Http\Controllers\SHG;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHGTargetSapAssetRequest;
use App\Models\SHGTargetSapAsset;
use Illuminate\Http\Request;

class TargetSapAssetController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = SHGTargetSapAsset::all();
            return response()->json($TargetPLO);
        }

        return view('SHG.TargetSApAsset');
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

    public function getData()
    {
        $TargetPLO = SHGTargetSapAsset::all();
        return response()->json($TargetPLO);
    }
}
