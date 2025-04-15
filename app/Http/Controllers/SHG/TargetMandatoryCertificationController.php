<?php

namespace App\Http\Controllers\SHG;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHGMandatoryCertificationRequest;
use App\Models\SHGMandatoryCertification;
use Illuminate\Http\Request;

class TargetMandatoryCertificationController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = SHGMandatoryCertification::all();
            return response()->json($TargetPLO);
        }
        return view('SHG.TargetMandatoryCertification');
    }


    public function store(SHGMandatoryCertificationRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = SHGMandatoryCertification::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function getData()
    {
        $TargetPLO = SHGMandatoryCertification::all();
        return response()->json($TargetPLO);
    }
}
