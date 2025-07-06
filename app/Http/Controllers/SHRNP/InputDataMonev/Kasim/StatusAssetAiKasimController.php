<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Kasim;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Kasim\StatusAssetAiKasimRequest;
use App\Models\SHRNP\Kasim\StatusAssetKasim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusAssetAiKasimController extends Controller
{

    public function index(Request $request)
    {

        if ($request->wantsJson()) {
            $TargetPLO = StatusAssetKasim::all();
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
        $tabs = collect(config('shrnp-kasim'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHRNP.InputDataMonev.Kasim.StatusAssetAiKasim', [
            'tabs' => $tabs,
            'companies' => $companies

        ]);
    }

    public function store(StatusAssetAiKasimRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = StatusAssetKasim::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = StatusAssetKasim::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(StatusAssetAiKasimRequest $request, $id)
    {
        $progress = StatusAssetKasim::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = StatusAssetKasim::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
