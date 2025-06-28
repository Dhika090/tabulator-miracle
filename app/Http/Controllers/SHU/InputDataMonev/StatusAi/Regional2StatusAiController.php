<?php

namespace App\Http\Controllers\SHU\InputDataMonev\StatusAi;

use App\Http\Controllers\Controller;
use App\Http\Requests\SHU\StatusAi\Regional2StatusAiRequest;
use App\Models\SHU\StatusAi\Regional2StatusAi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Regional2StatusAiController extends Controller
{

    public function index(Request $request)
    {
        $tabs = collect(config('shu-status-ai'))->map(function ($tab) {
            return [
                'title' => $tab['title'],
                'route' => route($tab['route']),
                'active' => request()->routeIs($tab['route']),
            ];
        });

        return view('SHU.InputDataMonev.StatusAi.Regional2StatusAi', [
            'tabs' => $tabs,

        ]);
    }

    public function store(Regional2StatusAiRequest $request)
    {
        $validated = $request->validated();
        $TargetPLO = Regional2StatusAi::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil disimpan',
            'data' => $TargetPLO,
        ]);
    }

    public function data()
    {
        $TargetPLO = Regional2StatusAi::select('*')
            ->addSelect(DB::raw("TRY_CONVERT(DATE, CONCAT('02-', periode), 220) as periode_date"))
            ->orderBy('periode_date', 'asc')
            ->get();

        return response()->json($TargetPLO);
    }
    public function update(Regional2StatusAiRequest $request, $id)
    {
        $progress = Regional2StatusAi::findOrFail($id);
        $progress->update($request->validated());

        return response()->json(['success' => true, 'message' => 'Data berhasil diupdate']);
    }


    public function destroy($id)
    {
        $target = Regional2StatusAi::findOrFail($id);
        $target->delete();

        return response()->json(['success' => true, 'message' => 'Data berhasil dihapus']);
    }
}
