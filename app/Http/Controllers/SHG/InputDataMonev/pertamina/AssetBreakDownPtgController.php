<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pertamina;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertamina\AssetBreakdownPtgRequest;
use App\Models\SHG\Pertamina\AssetBreakdownPtg;
use Illuminate\Http\Request;

class AssetBreakDownPtgController extends Controller
{
    public function index()
    {
        return view('SHG.InputDataMonev.pertamina.AssetBreakdownPtg');
    }


    public function data()
    {
        return response()->json(AssetBreakdownPtg::all());
    }

    public function store(AssetBreakdownPtgRequest $request)
    {
        $data = $request->validated();
        $data = AssetBreakdownPtg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(AssetBreakdownPtgRequest $request, $id)
    {
        $progress = AssetBreakdownPtg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = AssetBreakdownPtg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
