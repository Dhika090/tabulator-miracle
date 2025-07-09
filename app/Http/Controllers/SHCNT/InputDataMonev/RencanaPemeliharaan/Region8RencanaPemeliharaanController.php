<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\RencanaPemeliharaan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\RencanaPemeliharaan\Region8RencanaPemeliharaanRequest;
use App\Models\SHCNT\RencanaPemeliharaan\Region8RencanaPemeliharaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region8RencanaPemeliharaanController extends Controller
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

        return view('SHCNT.InputDataMonev.RencanaPemeliharaan.Region8RencanaPemeliharaan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region8RencanaPemeliharaanRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region8RencanaPemeliharaan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region8RencanaPemeliharaan::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('08-', periode), 820) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region8RencanaPemeliharaanRequest $request, $id)
    {
        $progress = Region8RencanaPemeliharaan::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region8RencanaPemeliharaan::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
