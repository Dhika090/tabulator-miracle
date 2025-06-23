<?php

namespace App\Http\Controllers\SHU\InputDataMonev\RencanaPemeliharaan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\RencanaPemeliharaan\Regional3RencanaPemeliharaanRequest;
use App\Models\SHU\RencanaPemeliharaan\Regional3RencanaPemeliharaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional3RencanaPemeliharaanController extends Controller
{
    
    public function index(Request $request)
    {
        $tabs = collect(config('shu-rencana-pemeliharaan'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHU.InputDataMonev.RencanaPemeliharaan.Regional3RencanaPemeliharaan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional3RencanaPemeliharaanRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional3RencanaPemeliharaan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional3RencanaPemeliharaan::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('03-', periode), 320) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional3RencanaPemeliharaanRequest $request, $id)
    {
        $progress = Regional3RencanaPemeliharaan::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional3RencanaPemeliharaan::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
