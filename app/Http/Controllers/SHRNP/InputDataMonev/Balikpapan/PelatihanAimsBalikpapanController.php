<?php

namespace App\Http\Controllers\SHRNP\InputDataMonev\Balikpapan;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHRNP\Balikpapan\PelatihanAimsBalikpapanRequest;
use App\Models\SHRNP\Balikpapan\PelatihanAimsBalikpapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelatihanAimsBalikpapanController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shrnp-balikpapan'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHRNP.InputDataMonev.Balikpapan.PelatihanAimsBalikpapan', [
            'tabs' => $tabs,

        ]);
    }

    public function store(PelatihanAimsBalikpapanRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = PelatihanAimsBalikpapan::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = PelatihanAimsBalikpapan::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('01-', periode), 120) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(PelatihanAimsBalikpapanRequest $request, $id)
    {
        $progress = PelatihanAimsBalikpapan::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = PelatihanAimsBalikpapan::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
