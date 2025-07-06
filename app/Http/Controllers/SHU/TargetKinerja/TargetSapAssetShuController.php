<?php

namespace App\Http\Controllers\SHU\TargetKinerja;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\TargetKinerja\TargetSapAssetShuRequest;
use App\Models\SHU\TargetKinerja\TargetSapAssetShu;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class TargetSapAssetShuController extends Controller
{

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $TargetPLO = TargetSapAssetShu::all();
            return response()->json($TargetPLO);
        }

        return view('Shu.TargetKinerja.TargetSapAsset');
    }


    public function store(TargetSapAssetShuRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = TargetSapAssetShu::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = TargetSapAssetShu::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(TargetSapAssetShuRequest $request, $id)
    {
        $progress = TargetSapAssetShu::findOrFail($id);

        $currentMonth = Carbon::now()->format('Y-m');
        $updatedMonth = optional($progress->updated_at)->format('Y-m');
        $createdMonth = optional($progress->created_at)->format('Y-m');

        $canEdit = (
            ($updatedMonth && $updatedMonth === $currentMonth) ||
            (is_null($updatedMonth) && $createdMonth === $currentMonth)
        );

        if (!$canEdit) {
            return response()->json([
                'success' => false,
                'message' => 'Data ini tidak bisa diubah karena tidak dibuat atau diperbarui di bulan ini.'
            ], 403);
        }

        $progress->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diupdate'
        ]);
    }


    public function destroy($id)
    {
        $target = TargetSapAssetShu::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
