<?php

namespace App\Http\Controllers\SHG\InputDataMonev\PertagasNiaga;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\PertagasNiaga\StatusAssetAiPTGNRequest;
use App\Models\SHG\PertagasNiaga\StatusAssetAiPTGN;
use Illuminate\Http\Request;

class StatusAssetAiPTGNController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiPTGN::all();
            return response()->json($TargetPLO);
        }

        $companies = [
            'PGN',
            'PTG',
            'PTGN',
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

        $tabs = [
            [
                'title' => 'Status Asset 2025 AI PTGN',
                'route' => route('pertagas-niaga'),
                'active' => request()->routeIs('pertagas-niaga'),
            ],
           
        ];

        return view('SHG.InputDataMonev.pertagasNiaga.pertagasNiaga', compact('tabs', 'companies'));
    }


    public function data()
    {
        return response()->json(StatusAssetAiPTGN::all());
    }


    public function store(StatusAssetAiPTGNRequest $request)
    {
        $data = $request->validated();
        $data = StatusAssetAiPTGN::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(StatusAssetAiPTGNRequest $request, $id)
    {
        $progress = StatusAssetAiPTGN::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = StatusAssetAiPTGN::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
