<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pertamina;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertamina\RealisasiAnggaranAiPtg2025Request;
use App\Models\SHG\Pertamina\RealisasiAnggaranAiPtg2025;
use Illuminate\Http\Request;

class RealisasiAnggaranAIPtg2025Controller extends Controller
{
    public function index()
    {
        return view('SHG.InputDataMonev.pertamina.RealisasiAnggaranAI2025Ptg');
    }

    public function data()
    {
        return response()->json(RealisasiAnggaranAiPtg2025::all());
    }

    public function store(RealisasiAnggaranAiPtg2025Request $request)
    {
        $data = $request->validated();
        $data = RealisasiAnggaranAiPtg2025::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(RealisasiAnggaranAiPtg2025Request $request, $id)
    {
        $progress = RealisasiAnggaranAiPtg2025::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = RealisasiAnggaranAiPtg2025::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
