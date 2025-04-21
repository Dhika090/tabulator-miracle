<?php

namespace App\Http\Controllers\SHG\InputDataMonev;

use App\Http\Controllers\Controller;
use App\Http\Requests\DataMonevPertaminaGasRequest;
use App\Models\DataMonevPertaminaGas;
use Illuminate\Http\Request;

class PertaminaGasController extends Controller
{
    public function index()
    {
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

        return view('SHG.InputDataMonev.PertaminaGas', compact('companies'));
    }

    public function data()
    {
        
        return response()->json(DataMonevPertaminaGas::all());
    }

    public function store(DataMonevPertaminaGasRequest $request)
    {
        $data = $request->validated();
        $data = DataMonevPertaminaGas::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }


    public function update(DataMonevPertaminaGasRequest $request, $id)
    {
        $progress = DataMonevPertaminaGas::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = DataMonevPertaminaGas::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
