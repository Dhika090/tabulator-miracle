<?php

namespace App\Http\Controllers\SHG\InputTArgetKinerja;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHGKinerjaTarget2025AIRequest;
use App\Models\SHGKinerjaTarget2025AI;
use Illuminate\Http\Request;

class Target2025KPIController extends Controller
{
    public function index()
    {
        return view('SHG.InputTargetKinerja.Target2025AI');
    }

    public function data()
    {
        return response()->json(SHGKinerjaTarget2025AI::all());
    }

    public function store(SHGKinerjaTarget2025AIRequest $request)
    {
        $target = SHGKinerjaTarget2025AI::create($request->validated());
        return response()->json(['success' => true, 'message' => 'Data berhasil disimpan', 'data' => $target]);
    }


    public function update(Request $request, $id)
    {
        $target = SHGKinerjaTarget2025AI::findOrFail($id);
        $target->update([
            'unit_operasi' => $request->unit_operasi,
            'jumlah' => $request->jumlah,
        ]);

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }

    public function destroy($id)
    {
        $target = SHGKinerjaTarget2025AI::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
