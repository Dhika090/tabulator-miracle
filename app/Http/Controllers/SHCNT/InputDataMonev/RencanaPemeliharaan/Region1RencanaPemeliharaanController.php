<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\RencanaPemeliharaan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\RencanaPemeliharaan\Region1RencanaPemeliharaanRequest;
use App\Models\SHCNT\RencanaPemeliharaan\Region1RencanaPemeliharaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region1RencanaPemeliharaanController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shcnt-rencana-pemeliharaan'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHCNT.InputDataMonev.RencanaPemeliharaan.Region1RencanaPemeliharaan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region1RencanaPemeliharaanRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region1RencanaPemeliharaan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region1RencanaPemeliharaan::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region1RencanaPemeliharaanRequest $request, $id)
    {
        $progress = Region1RencanaPemeliharaan::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region1RencanaPemeliharaan::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
