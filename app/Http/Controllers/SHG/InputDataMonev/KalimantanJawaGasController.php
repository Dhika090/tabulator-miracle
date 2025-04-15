<?php

namespace App\Http\Controllers\SHG\InputDataMonev;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataMonevKalimantanJawaGasRequest;
use App\Models\DataMonevKalimantanJawaGas;
use Illuminate\Http\Request;

class KalimantanJawaGasController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = DataMonevKalimantanJawaGas::all();
            return response()->json($TargetPLO);
        }

        $companies = [
            'PGN',
            'PTG',
            'PTSG',
            'PGN, PAG, SAKA, WMP',
            'GEI',
            'TGI',
            'WMN',
            'PLI',
            'PDG',
            'KJG',
            'PAG',
            'NR'
        ];
        // return view('SHG.InputDataMonev.PertaminaGas');
        return view('SHG.InputDataMonev.KalimantanJawaGas', compact('companies'));
    }


    public function store(DataMonevKalimantanJawaGasRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = DataMonevKalimantanJawaGas::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function getData()
    {
        $TargetPLO = DataMonevKalimantanJawaGas::all();
        return response()->json($TargetPLO);
    }
}
