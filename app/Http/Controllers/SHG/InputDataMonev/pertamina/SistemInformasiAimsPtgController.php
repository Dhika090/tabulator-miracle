<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pertamina;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertamina\SistemInformasiAimsPtgRequest;
use App\Models\SHG\Pertamina\SistemInformasiAimsPtg;
use Illuminate\Http\Request;

class SistemInformasiAimsPtgController extends Controller
{
    public function index()
    {
        return view('SHG.InputDataMonev.pertamina.SistemInformasiAimsPtg');
    }

    public function data()
    {
        return response()->json(SistemInformasiAimsPtg::all());
    }

    public function store(SistemInformasiAimsPtgRequest $request)
    {
        $data = $request->validated();
        $data = SistemInformasiAimsPtg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(SistemInformasiAimsPtgRequest $request, $id)
    {
        $progress = SistemInformasiAimsPtg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = SistemInformasiAimsPtg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
