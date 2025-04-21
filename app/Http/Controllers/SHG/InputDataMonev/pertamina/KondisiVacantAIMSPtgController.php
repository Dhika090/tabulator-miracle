<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pertamina;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertamina\KondisiVacantAIMSPtgRequest;
use App\Models\SHG\Pertamina\KondisiVacantAIMSPtg;
use Illuminate\Http\Request;

class KondisiVacantAIMSPtgController extends Controller
{
    public function index()
    {
        return view('SHG.InputDataMonev.pertamina.KondisiVacantFungsiAIMSPtg');
    }

    public function data()
    {
        return response()->json(KondisiVacantAIMSPtg::all());
    }

    public function store(KondisiVacantAIMSPtgRequest $request)
    {
        $data = $request->validated();
        $data = KondisiVacantAIMSPtg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(KondisiVacantAIMSPtgRequest $request, $id)
    {
        $progress = KondisiVacantAIMSPtg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = KondisiVacantAIMSPtg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
