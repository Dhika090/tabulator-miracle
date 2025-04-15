<?php

namespace App\Http\Controllers\SHG;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHGKpiAssetIntegrityRequest;
use App\Models\SHGKpiAssetIntegrity;
use Illuminate\Http\Request;

class KpiAssetIntegrityController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = SHGKpiAssetIntegrity::all();
            return response()->json($TargetPLO);
        }

        return view('SHG.KpiAssetIntegrity');
    }


    public function store(SHGKpiAssetIntegrityRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = SHGKpiAssetIntegrity::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function getData()
    {
        $TargetPLO = SHGKpiAssetIntegrity::all();
        return response()->json($TargetPLO);
    }
}
