<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pertamina;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertamina\PelatihanAIMSPtgRequest;
use App\Models\SHG\Pertamina\PelatihanAIMSPtg;
use Illuminate\Http\Request;

class PelatihanAIMSPtgController extends Controller
{
    public function index()
    {
        return view('SHG.InputDataMonev.pertamina.PelatihanAIMSPtg');
    }

    public function data()
    {
        return response()->json(PelatihanAIMSPtg::all());
    }

    public function store(PelatihanAIMSPtgRequest $request)
    {
        $data = $request->validated();
        $data = PelatihanAIMSPtg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(PelatihanAIMSPtgRequest $request, $id)
    {
        $progress = PelatihanAIMSPtg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = PelatihanAIMSPtg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
