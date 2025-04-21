<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pertamina;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertamina\AirBudgetTaggingPtgRequest;
use App\Models\SHG\Pertamina\AirBudgetTaggingPtg;
use Illuminate\Http\Request;

class AirBudgetTaggingPtgController extends Controller
{
    public function index()
    {
        return view('SHG.InputDataMonev.pertamina.AirBudgetTaggingPtg');
    }

    public function data()
    {
        return response()->json(AirBudgetTaggingPtg::all());
    }

    public function store(AirBudgetTaggingPtgRequest $request)
    {
        $data = $request->validated();
        $data = AirBudgetTaggingPtg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(AirBudgetTaggingPtgRequest $request, $id)
    {
        $progress = AirBudgetTaggingPtg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = AirBudgetTaggingPtg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
