<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pertamina;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertamina\RealisasiProgressFisikAI2025PtgRequest;
use App\Models\SHG\Pertamina\RealisasiProgressFisikAI2025Ptg;
use Illuminate\Http\Request;

class RealisasiProgressFisikAI2025PtgController extends Controller
{
    public function index()
    {
        return view('SHG.InputDataMonev.pertamina.RealisasiProgressFisikAI2025Ptg');
    }

    public function data()
    {
        return response()->json(RealisasiProgressFisikAI2025Ptg::all());
    }

    public function store(RealisasiProgressFisikAI2025PtgRequest $request)
    {
        $data = $request->validated();
        $data = RealisasiProgressFisikAI2025Ptg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(RealisasiProgressFisikAI2025PtgRequest $request, $id)
    {
        $progress = RealisasiProgressFisikAI2025Ptg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = RealisasiProgressFisikAI2025Ptg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
