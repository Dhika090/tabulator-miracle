<?php

namespace App\Http\Controllers\SHU\TargetKinerja;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\TargetKinerja\TargetMandatoryCertificationShuRequest;
use App\Models\SHU\TargetKinerja\TargetMandatoryCertificationShu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TargetMandatoryCertificationShuController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = TargetMandatoryCertificationShu::all();
            return response()->json($TargetPLO);
        }

        return view('Shu.TargetKinerja.TargetMandatoryCertificationShu');
    }


    public function store(TargetMandatoryCertificationShuRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = TargetMandatoryCertificationShu::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = TargetMandatoryCertificationShu::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(TargetMandatoryCertificationShuRequest $request, $id)
    {
        $progress = TargetMandatoryCertificationShu::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = TargetMandatoryCertificationShu::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
