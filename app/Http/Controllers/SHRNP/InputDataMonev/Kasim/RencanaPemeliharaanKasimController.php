<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Kasim;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Kasim\RencanaPemeliharaanKasimRequest;
use App\Models\SHRNP\Kasim\RencanaPemeliharaanKasim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RencanaPemeliharaanKasimController extends Controller
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

        return view('SHRNP.InputDataMonev.Kasim.RencanaPemeliharaanKasim', [
            'tabs' => $tabs,

        ]);
    }

    public function store(RencanaPemeliharaanKasimRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = RencanaPemeliharaanKasim::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = RencanaPemeliharaanKasim::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(RencanaPemeliharaanKasimRequest $request, $id)
    {
        $progress = RencanaPemeliharaanKasim::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = RencanaPemeliharaanKasim::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
