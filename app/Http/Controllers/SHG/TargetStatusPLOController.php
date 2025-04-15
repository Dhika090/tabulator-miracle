<?php

namespace App\Http\Controllers\SHG;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHGTargetStatusPloRequest;
use App\Models\SHGTargetStatusPlo;
use Illuminate\Http\Request;

class TargetStatusPLOController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = SHGTargetStatusPlo::all();
            return response()->json($TargetPLO);
        }

        return view('SHG.TargetStatusPLO');
    }


    public function store(SHGTargetStatusPloRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = SHGTargetStatusPlo::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }
    public function getData()
    {
        $TargetPLO = SHGTargetStatusPlo::all();
        return response()->json($TargetPLO);
    }
}
