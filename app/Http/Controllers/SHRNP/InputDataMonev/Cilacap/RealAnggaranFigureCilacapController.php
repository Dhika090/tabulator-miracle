<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Cilacap;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Cilacap\RealAnggaranFigureCilacapRequest;
use App\Models\SHRNP\Cilacap\RealAnggaranFigureCilacap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RealAnggaranFigureCilacapController extends Controller
{



    public function index(Request $request)
    {
        $tabs = collect(config('cilacap-tabs'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHRNP.InputDataMonev.Cilacap.RealAnggaranFigureCilacap', [
            'tabs' => $tabs,

        ]); 
    }  

    public function store(RealAnggaranFigureCilacapRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = RealAnggaranFigureCilacap::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = RealAnggaranFigureCilacap::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->addSelect(DB::raw("YEAR(TRY_CONVERT(DATE, CONCAT('01-', periode), 120)) as periode_year"))
            ->orderBy('periode_year', 'asc')
            ->orderBy('no', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(RealAnggaranFigureCilacapRequest $request, $id)
    {
        $progress = RealAnggaranFigureCilacap::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = RealAnggaranFigureCilacap::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
