<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Balongan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Balongan\RealProgFisikAiBalonganRequest;
use App\Models\SHRNP\Balongan\RealProgFisikAiBalongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RealisasiProgFisikAiBalonganController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shrnp-balongan'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHRNP.InputDataMonev.Balongan.RealProgFisikAiBalongan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(RealProgFisikAiBalonganRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = RealProgFisikAiBalongan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = RealProgFisikAiBalongan::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(RealProgFisikAiBalonganRequest $request, $id)
    {
        $progress = RealProgFisikAiBalongan::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = RealProgFisikAiBalongan::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
