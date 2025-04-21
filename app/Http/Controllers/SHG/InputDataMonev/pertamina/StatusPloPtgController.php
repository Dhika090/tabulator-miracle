<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pertamina;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertamina\StatusPloPtgRequest;
use App\Models\SHG\Pertamina\StatusPloPtg;
use Illuminate\Http\Request;

class StatusPloPtgController extends Controller
{
    public function index()
    {
        return view('SHG.InputDataMonev.pertamina.StatusPloPTG');
    }

    public function data()
    {
        return response()->json(StatusPloPtg::all());
    }

    public function store(StatusPloPtgRequest $request)
    {
        $data = $request->validated();
        $data = StatusPloPtg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(StatusPloPtgRequest $request, $id)
    {
        $progress = StatusPloPtg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = StatusPloPtg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
