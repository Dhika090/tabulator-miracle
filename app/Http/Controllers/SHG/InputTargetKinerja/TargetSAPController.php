<?php

namespace App\Http\Controllers\SHG\InputTargetKinerja;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHGKinerjaTargetSAPRequest;
use App\Models\SHGKinerjaTargetSAP;
use Illuminate\Http\Request;

class TargetSAPController extends Controller
{

    public function index()
    {
        return view('SHG.InputTargetKinerja.TargetSapAsset');
    }

    public function data()
    {
        return response()->json(SHGKinerjaTargetSAP::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'unit_operasi' => 'required|string',
            'jumlah' => 'required|numeric',
        ]);

        $data = SHGKinerjaTargetSAP::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }


    public function update(Request $request, $id)
    {
        $target = SHGKinerjaTargetSAP::findOrFail($id);
        $target->update([
            'unit_operasi' => $request->unit_operasi,
            'jumlah' => $request->jumlah,
        ]);

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = SHGKinerjaTargetSAP::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
