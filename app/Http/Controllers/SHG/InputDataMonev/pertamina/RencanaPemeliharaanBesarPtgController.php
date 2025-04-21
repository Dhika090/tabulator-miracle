<?php

namespace App\Http\Controllers\SHG\InputDataMonev\pertamina;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHG\Pertamina\RencanaPemeliharaanBesarPtgRequest;
use App\Models\SHG\Pertamina\RencanaPemeliharaanBesarPtg;
use Illuminate\Http\Request;

class RencanaPemeliharaanBesarPtgController extends Controller
{
    public function index()
    {
        return view('SHG.InputDataMonev.pertamina.RencanaPemeliharaanBesarPtg');
    }

    public function data()
    {
        return response()->json(RencanaPemeliharaanBesarPtg::all());
    }

    public function store(RencanaPemeliharaanBesarPtgRequest $request)
    {
        $data = $request->validated();
        $data = RencanaPemeliharaanBesarPtg::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $data
        ]);
    }

    public function update(RencanaPemeliharaanBesarPtgRequest $request, $id)
    {
        $progress = RencanaPemeliharaanBesarPtg::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = RencanaPemeliharaanBesarPtg::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
