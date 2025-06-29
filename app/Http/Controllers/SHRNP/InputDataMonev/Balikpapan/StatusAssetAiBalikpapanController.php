<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Balikpapan\StatusAssetAiBalikpapanRequest;
use App\Models\SHRNP\Balikpapan\StatusAssetAiBalikpapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusAssetAiBalikpapanController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetAiBalikpapan::all();
            return response()->json(data: $TargetPLO);
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
        $tabs = collect(config('shrnp-balikpapan'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHRNP.InputDataMonev.Balikpapan.StatusAssetAiBalikpapan', [
            'tabs' => $tabs,
            'companies' => $companies

        ]);
    }

    public function store(StatusAssetAiBalikpapanRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = StatusAssetAiBalikpapan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = StatusAssetAiBalikpapan::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(StatusAssetAiBalikpapanRequest $request, $id)
    {
        $progress = StatusAssetAiBalikpapan::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = StatusAssetAiBalikpapan::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
