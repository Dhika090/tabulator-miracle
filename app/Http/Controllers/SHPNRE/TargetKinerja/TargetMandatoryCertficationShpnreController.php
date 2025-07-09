<?php

namespace App\Http\Controllers\SHPNRE\TargetKinerja;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHPNRE\TargetKinerja\TargetKinerjaMandatoryCertificationShpnreRequest;
use App\Models\SHPNRE\TargetKinerja\TargetKinerjaMandatoryCertificationShpnre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TargetMandatoryCertficationShpnreController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = TargetKinerjaMandatoryCertificationShpnre::all();
            return response()->json($TargetPLO);
        }

        return view('SHPNRE.TargetKinerja.TargetKinerjaMandatoryCertificationShpnre');
    }


    public function store(TargetKinerjaMandatoryCertificationShpnreRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = TargetKinerjaMandatoryCertificationShpnre::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = TargetKinerjaMandatoryCertificationShpnre::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(TargetKinerjaMandatoryCertificationShpnreRequest $request, $id)
    {
        $progress = TargetKinerjaMandatoryCertificationShpnre::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = TargetKinerjaMandatoryCertificationShpnre::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
