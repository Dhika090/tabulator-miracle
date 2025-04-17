<?php

namespace App\Http\Controllers\SHG\InputTargetKinerja;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHGKinerjaTargetStatusRequest;
use App\Models\SHGKinerjaTargetStatus;
use Illuminate\Http\Request;

class TargetStatusAssetController extends Controller
{
    public function index()
    {
        return view('SHG.InputTargetKinerja.TargetStatusAsset');
    }

    public function data()
    {
        return response()->json(SHGKinerjaTargetStatus::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'periode' => 'required|string',
            'company' => 'required|string',
            'asset_group' => 'required|string',
            'green_integrity' => 'nullable|integer',
            'yellow_integrity' => 'nullable|integer',
            'red_integrity' => 'nullable|integer',
            'low_sece' => 'nullable|integer',
            'low_pce' => 'nullable|integer',
            'low_important' => 'nullable|integer',
            'information' => 'nullable|string',
        ]);

        $data = SHGKinerjaTargetStatus::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }


    public function update(SHGKinerjaTargetStatusRequest $request, $id)
    {
        $target = SHGKinerjaTargetStatus::findOrFail($id);
        $target->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
    }


    public function destroy($id)
    {
        $target = SHGKinerjaTargetStatus::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}

