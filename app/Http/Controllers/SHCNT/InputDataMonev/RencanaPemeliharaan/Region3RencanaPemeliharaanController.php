<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\RencanaPemeliharaan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\RencanaPemeliharaan\Region3RencanaPemeliharaanRequest;
use App\Models\SHCNT\RencanaPemeliharaan\Region3RencanaPemeliharaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region3RencanaPemeliharaanController extends Controller
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

        return view('SHCNT.InputDataMonev.RencanaPemeliharaan.Region3RencanaPemeliharaan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region3RencanaPemeliharaanRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region3RencanaPemeliharaan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region3RencanaPemeliharaan::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('03-', periode), 320) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region3RencanaPemeliharaanRequest $request, $id)
    {
        $progress = Region3RencanaPemeliharaan::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region3RencanaPemeliharaan::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
