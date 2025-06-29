<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Balikpapan\RencanaPemeliharaanBalikpapanRequest;
use App\Models\SHRNP\Balikpapan\RencanaPemeliharaanBalikpapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RencanaPemeliharaanBalikpapanController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shrnp-balikpapan'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHRNP.InputDataMonev.Balikpapan.RencanaPemeliharaanBalikpapan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(RencanaPemeliharaanBalikpapanRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = RencanaPemeliharaanBalikpapan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = RencanaPemeliharaanBalikpapan::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(RencanaPemeliharaanBalikpapanRequest $request, $id)
    {
        $progress = RencanaPemeliharaanBalikpapan::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = RencanaPemeliharaanBalikpapan::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
