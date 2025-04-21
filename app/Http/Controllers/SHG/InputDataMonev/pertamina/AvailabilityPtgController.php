<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pertamina;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertamina\AvailabilityPtgRequest;
use App\Models\SHG\Pertamina\AvailabilityPtg;
use Illuminate\Http\Request;

class AvailabilityPtgController extends Controller
{
    public function index()
    {
        return view('SHG.InputDataMonev.pertamina.AvailabilityPtg');
    }

    public function data()
    {
        return response()->json(AvailabilityPtg::all());
    }

    public function store(AvailabilityPtgRequest $request)
    {
        $data = $request->validated();
        $data = AvailabilityPtg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(AvailabilityPtgRequest $request, $id)
    {
        $progress = AvailabilityPtg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = AvailabilityPtg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
