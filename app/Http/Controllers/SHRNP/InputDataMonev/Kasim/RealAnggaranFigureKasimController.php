<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Kasim;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Kasim\RealAnggaranFigureKasimRequest;
use App\Models\SHRNP\Kasim\RealAnggaranFigureKasim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RealAnggaranFigureKasimController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shrnp-kasim'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHRNP.InputDataMonev.Kasim.RealAnggaranFigureKasim', [
            'tabs' => $tabs,

        ]);
    }

    public function store(RealAnggaranFigureKasimRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = RealAnggaranFigureKasim::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = RealAnggaranFigureKasim::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(RealAnggaranFigureKasimRequest $request, $id)
    {
        $progress = RealAnggaranFigureKasim::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = RealAnggaranFigureKasim::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
