<?php

namespace App\Http\Controllers\SHG;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHGTindakLanjutHasilMonevRequest;
use App\Models\SHGTindakLanjutHasilMonev;
use Illuminate\Http\Request;

class HasilMonevController extends Controller
{

    // public function index(Request $request)
    // {
    //     if ($request->wantsJson()) {
    //         $TargetPLO = SHGTindakLanjutHasilMonev::all();
    //         return response()->json($TargetPLO);
    //     }

    //     return view('SHG.TindakLanjutHasilMonev');
    // }


    // public function store(SHGTindakLanjutHasilMonevRequest $request)
    // {
    //     $validated = $request->validated();
    //     $TargetPLO = SHGTindakLanjutHasilMonev::create($validated);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Data berhasil disimpan',
    //         'data' => $TargetPLO,
    //     ]);
    // }

    // public function getData()
    // {
    //     $TargetPLO = SHGTindakLanjutHasilMonev::all();
    //     return response()->json($TargetPLO);
    // }
}
