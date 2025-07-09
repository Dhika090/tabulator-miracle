<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\RencanaPemeliharaan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\RencanaPemeliharaan\Region7RencanaPemeliharaanRequest;
use App\Models\SHCNT\RencanaPemeliharaan\Region7RencanaPemeliharaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region7RencanaPemeliharaanController extends Controller
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

        return view('SHCNT.InputDataMonev.RencanaPemeliharaan.Region7RencanaPemeliharaan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region7RencanaPemeliharaanRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region7RencanaPemeliharaan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region7RencanaPemeliharaan::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('07-', periode), 720) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region7RencanaPemeliharaanRequest $request, $id)
    {
        $progress = Region7RencanaPemeliharaan::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region7RencanaPemeliharaan::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
