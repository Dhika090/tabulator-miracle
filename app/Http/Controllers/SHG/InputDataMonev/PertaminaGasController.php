<?php

namespace App\Http\Controllers\SHG\InputDataMonev;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataMonevPertaminaGasRequest;
use App\Models\DataMonevPertaminaGas;
use Illuminate\Http\Request;

class PertaminaGasController extends Controller
{
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = DataMonevPertaminaGas::all();
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
        return view('SHG.InputDataMonev.PertaminaGas', compact('companies'));
    }


    public function store(DataMonevPertaminaGasRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = DataMonevPertaminaGas::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function getData()
    {
        $TargetPLO = DataMonevPertaminaGas::all();
        return response()->json($TargetPLO);
    }
}
