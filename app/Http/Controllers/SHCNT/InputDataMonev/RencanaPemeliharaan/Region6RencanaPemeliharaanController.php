<?php

namespace App\Http\Controllers\SHCNT\InputDataMonev\RencanaPemeliharaan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHCNT\RencanaPemeliharaan\Region6RencanaPemeliharaanRequest;
use App\Models\SHCNT\RencanaPemeliharaan\Region6RencanaPemeliharaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Region6RencanaPemeliharaanController extends Controller
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

        return view('SHCNT.InputDataMonev.RencanaPemeliharaan.Region6RencanaPemeliharaan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Region6RencanaPemeliharaanRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Region6RencanaPemeliharaan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Region6RencanaPemeliharaan::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('06-', periode), 620) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Region6RencanaPemeliharaanRequest $request, $id)
    {
        $progress = Region6RencanaPemeliharaan::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Region6RencanaPemeliharaan::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
