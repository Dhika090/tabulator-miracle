<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pertamina;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertamina\SapAssetPtgRequest;
use App\Models\SHG\Pertamina\SapAssetPtg;
use Illuminate\Http\Request;

class SapAssetPtgController extends Controller
{
    public function index()
    {
        return view('SHG.InputDataMonev.pertamina.SapAssetPTG');
    }


    public function data()
    {
        return response()->json(SapAssetPtg::all());
    }

    public function store(SapAssetPtgRequest $request)
    {
        $data = $request->validated();
        $data = SapAssetPtg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(SapAssetPtgRequest $request, $id)
    {
        $progress = SapAssetPtg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = SapAssetPtg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
