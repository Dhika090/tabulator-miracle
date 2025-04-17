<?php

namespace App\Http\Controllers\SHG\InputTargetKinerja;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHGTargeStatusAssetIntergrityRequest;
use App\Models\SHGTargetStatusAssetIntgrity;
use Illuminate\Http\Request;

class StatusAssetInteregrityController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = SHGTargetStatusAssetIntgrity::all();
            return response()->json($TargetPLO);
        }

        return view('SHG.InputTargetKinerja.StatusAssetInteregrity');
    }


    public function store(SHGTargeStatusAssetIntergrityRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = SHGTargetStatusAssetIntgrity::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function getData()
    {
        $TargetPLO = SHGTargetStatusAssetIntgrity::all();
        return response()->json($TargetPLO);
    }
}
